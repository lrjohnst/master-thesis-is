<?php
    function debug($var) {
        $debug = "";
        $debug .= '<pre style="background-color:#F7F7F7; color:#333; padding:10px; font-family:monospace; font-size:14px; border:2px solid #ccc; border-radius:5px;">';
        $debug .= '<span style="background-color:#e6e6e6; color:#333; padding:2px 5px; border-radius:3px;">DEBUG</span> ';
        $debug .= '<span style="color:#069;">(' . gettype($var) . ')</span>';
        $debug .= '<span style="color:#c00; font-weight:bold;">' . htmlspecialchars(var_export($var, true)) . '</span>';
        $debug .= '</pre>';
        return $debug;
    }

    $post_meta = get_post_meta(get_the_id());
    $survey_form = new SurveyForms($post_meta['form_system_name'][0]);
    $measurement = [
        'id' => 2,
        'created_at' => '',
        'updated_at' => '',
        'participant_code' => '',
        'entries' => [
            2 => 1, // form_id => entry_id
        ],
    ];

    // Get the form object associated with the entry
    $form_id = $survey_form->form['gravity_form_id'];
    $form = GFAPI::get_form( $form_id );

    // Get the entry object
    $entry_id = $measurement['entries'][$survey_form->form['gravity_form_id']];
    $entry = GFAPI::get_entry( $entry_id );

    // Generate the shortcode attributes
    $atts = [
        'id' => $form_id,
        'title' => 'false',
        'description' => 'false',
        'ajax' => 'false',
        'field_values' => [],
    ];

    // Populate the field_values attribute with the pre-filled values
    foreach ( $form['fields'] as $field ) {
        $value = rgar( $entry, $field->id );

        // Handle checkbox fields differently
        if ( $field->type == 'checkbox' ) {
            $value_tmp = "";

            // Loop through the keys of $values and compare the integer part with $field->id
            foreach ( $entry as $key => $value ) {
                $key_parts = explode( '.', $key );
                $key_int = (int) $key_parts[0];

                if ( $key_int === $field->id ) {
                    $value_tmp .= $value . ",";
                }
            }
            $value = rtrim($value_tmp, ",");
        }
        $atts['field_values'][ 'input_' . $field->id ] = $value;
    }

    // Generate the Gravity Forms shortcode with pre-filled values
    $query_string = "";
    foreach($atts['field_values'] as $key => $value) {
        $query_string .= $key . "=" . $value . "&";
    }
    $query_string = rtrim($query_string, "&");
    $shortcode = "[gravityform id='" . $atts['id'] . "' title='" . $atts['title'] . "' description='" . $atts['description'] . "' ajax='" . $atts['ajax'] . "' field_values='" . $query_string . "']";
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/wp-content/themes/thesis-theme/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="/wp-content/themes/thesis-theme/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/wp-content/themes/thesis-theme/css/main.css">

        <script src="/wp-content/themes/thesis-theme/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <nav role="navigation">
          <div class="container">

          </div>
        </nav>
        <div class="container">
            <div class="progress">
                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $survey_form->form['progress_percentage']; ?>%" aria-valuenow="<?php echo $survey_form->form['progress_percentage']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <?php //echo debug($shortcode); ?>
            <?php echo do_shortcode( $shortcode ); ?>
            <footer>
                <p></p>
            </footer>
        </div> <!-- /container -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/wp-content/themes/thesis-theme/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="/wp-content/themes/thesis-theme/js/vendor/bootstrap.min.js"></script>
        <script src="/wp-content/themes/thesis-theme/js/main.js"></script>
        <?php wp_footer(); ?>
    </body>
</html>