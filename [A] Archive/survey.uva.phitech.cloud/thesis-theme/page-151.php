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

    <?php if(PhitechSurvey::code_is_valid($_GET['code']) && $_GET['code']): ?>
        Hallo wereld :)
    <?php else: ?>
        <h1>Participatiecode invoeren</h1>
        <?php $shortcode = "[gravityform id='4']"; ?>
        <?php echo do_shortcode( $shortcode ); ?>
    <?php endif; ?>
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