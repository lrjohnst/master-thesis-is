<?php
/**
 * Plugin Name: Phitech Survey
 * Plugin URI: https://github.com/phitech-consulting/wordpress-plugin-template
 * Description: 
 * Version: v0.1 []
 * Author: Phitech Consulting
 * Author URI: https://phitech.consulting
 */


/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/* Initialise the plugin */
new PhitechSurvey();


class PhitechSurvey
{
    public $wpdb;


    /**
     * Build the instance
     */
    public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        add_action('wp_loaded', [$this, 'load_plugin']); // Soon as WooCommerce loads, load resources
    }


    /**
     * Load WC Dependencies
     * @return void
     */
    public function load_plugin() {

		// Get DB object
		global $wpdb;

        // Include
        require_once(plugin_dir_path( __FILE__ ) . 'includes/class-survey.php');
        require_once(plugin_dir_path( __FILE__ ) . 'includes/class-form.php');
		
		// Create measurements table if not exists
		$sql_measurements = "
			CREATE TABLE IF NOT EXISTS " . $wpdb->prefix . "measurements (
				id BIGINT AUTO_INCREMENT PRIMARY KEY,
				created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
				updated_at TIMESTAMP on update CURRENT_TIMESTAMP,
				participant_code VARCHAR(255) NOT NULL UNIQUE,
				entries TEXT NULL
			);
		";
		$wpdb->query($sql_measurements);
		
		// Create measurements_meta table if not exists
//		$sql_measurements_meta = "
//			CREATE TABLE IF NOT EXISTS " . $wpdb->prefix . "measurements_meta (
//				id BIGINT AUTO_INCREMENT PRIMARY KEY,
//				created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//				updated_at TIMESTAMP on update CURRENT_TIMESTAMP,
//				participant_code VARCHAR(255) NOT NULL,
//				form_name VARCHAR(255),
//				meta_key VARCHAR(255) NOT NULL,
//				meta_value longtext,
//				UNIQUE KEY (participant_code, meta_key),
//				CONSTRAINT fk_measurements_meta_participant_code FOREIGN KEY (participant_code) REFERENCES " . $wpdb->prefix . "measurements(participant_code) ON UPDATE CASCADE
//			);
//		";
        $sql_measurements_meta = "
			CREATE TABLE IF NOT EXISTS " . $wpdb->prefix . "measurements_meta (
				id BIGINT AUTO_INCREMENT PRIMARY KEY,
				created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
				updated_at TIMESTAMP on update CURRENT_TIMESTAMP,
				measurement_id BIGINT NOT NULL,
				meta_key VARCHAR(255) NOT NULL,
				meta_value longtext,
				UNIQUE KEY (measurement_id, meta_key),
				CONSTRAINT fk_measurements_meta_measurement_id FOREIGN KEY (measurement_id) REFERENCES " . $wpdb->prefix . "measurements(id) ON UPDATE CASCADE
			);
		";
		$wpdb->query($sql_measurements_meta);


        $sql_participant_codes = "
			CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "participant_codes` (
              `id` BIGINT AUTO_INCREMENT PRIMARY KEY,
              `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
              `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
              `body` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL UNIQUE,
              `used` tinyint(1) NOT NULL DEFAULT 0
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
		";
		$wpdb->query($sql_participant_codes);

        // Set up action hooks for processing form entries
        $survey_forms = new SurveyForms();
        foreach($survey_forms->forms as $form) {
            add_action('gform_after_submission_' . $form['gravity_form_id'], [$this, 'store_measurement'], 10, 2);
        }

        // Initialize options in case they do not exist yet
//        add_option('example_options_set', array(
//            "example_parameter_1" => "",
//            "example_parameter_2" => "",
//            "example_parameter_3" => ""
//        ));

        // Load action and filter hooks
//        add_shortcode('example_shortcode', [$this, 'example_shortcode_callback']);
//        add_action('example_action_hook', [$this, 'example_action_hook_callback'], 10, 2);


    }



    public function store_measurement($entry, $form) {


        // Get the field ID of the field inside $entry that contains Participant Code
        foreach ($form['fields'] as $field) {
            if ($field->label == "Participant code") {
                $participant_code_field_id = $field->id;
                break;
            }
        }

        // Compose 'entries' field: first get entries, if any, and then (re)place entry_id for this current $form_id.
        $entries = $this->wpdb->get_results("SELECT entries FROM " . $wpdb->prefix . "measurements WHERE participant_code = '" . $entry[$participant_code_field_id] . "'");
        $entries = $entries[0]->entries;
        $entries = $entries ? json_decode($entries, true) : [];
        $entries[$entry['form_id']] = $entry['id'];
        $entries = json_encode($entries);

        // Insert measurement main
        $insert = [
            'participant_code' => 'test-d',
            'entries' => $entries,
        ];
        $this->wpdb->insert($wpdb->prefix . "measurements", $insert);
        $id = $this->wpdb->insert_id;

        // Insert measurement meta
        $data = array(
            ['measurement_id' => $id, 'meta_key' => 'key1', 'meta_value' => 'value1'],
            ['measurement_id' => $id, 'meta_key' => 'key2', 'meta_value' => 'value3'],
            ['measurement_id' => $id, 'meta_key' => 'key3', 'meta_value' => 'value3'],
        );

        // Build the SQL query string
        $sql = "INSERT INTO " . $wpdb->prefix . "measurement_meta (measurement_id, meta_key, meta_value) VALUES ";
        $values = [];
        foreach ($data as $row) {
            $values[] = "('" . implode("', '", $row) . "')";
        }
        $sql .= implode(", ", $values);

        // Execute the query
        $result = $this->wpdb->query($sql);

//        wp_mail("l.johnston@phitech.consulting", "test", $id . " = " . print_r($sql, true)); // Debugging
        wp_mail("l.johnston@phitech.consulting", "test", $id . " = " . print_r($participant_code_field_id, true)); // Debugging
    }


    /**
     * @param $code
     * @return bool|void
     */
    public static function code_is_valid($code) {
        global $wpdb;
        $query = "SELECT id, used FROM " . $wpdb->prefix . "participant_codes WHERE body = '" . addslashes($code) . "'";
        $code_record = $wpdb->get_results($query);
        if(!empty($code_record)) {
            if($code_record[0]->used == 1) {
                return false;
            } elseif($code_record[0]->used == 0) {
                return true;
            }
        } else {
            return false;
        }
    }
}