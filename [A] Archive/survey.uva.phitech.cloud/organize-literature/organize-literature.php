<?php
/**
 * Plugin Name: Organize Literature
 * Plugin URI: https://github.com/phitech-consulting/wordpress-plugin-template
 * Description: Organizes literature.
 * Version: v1.0 []
 * Author: Phitech Consulting
 * Author URI: https://phitech.consulting
 */


/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/* Initialise the plugin */
new OrganizeLiterature();


class OrganizeLiterature
{

    /**
     * Build the instance
     */
    public function __construct() {
        add_action('wp_loaded', array( $this, 'load_plugin')); // Soon as Wordpress is loads, load resources
    }


    /**
     * Load WC Dependencies
     * @return void
     */
    public function load_plugin() {

        /* Include */
        require_once(plugin_dir_path( __FILE__ ) . 'includes/class_resource.php');
//        require_once(plugin_dir_path( __FILE__ ) . 'admin/example-admin-page.php');

        /* Initialize options in case they do not exist yet */
//        add_option('example_options_set', array(
//            "example_parameter_1" => "",
//            "example_parameter_2" => "",
//            "example_parameter_3" => ""
//        ));

        /* Load action and filter hooks */
        //add_shortcode('example_shortcode', [$this, 'example_shortcode_callback']);
        //add_action('example_action_hook', [$this, 'example_action_hook_callback'], 10, 2);
    }


    /**
     * @return string
     */
    //function example_shortcode_callback(){
        //$html = "<div id='example-shortcode-output'>";
        //$html .= "<h2>Wordpress Plugin Template</h2>";
        //$html .= "</div>";
        //return $html;
    //}


    /**
	 * Here a docblock (in PHPstorm one rule up from function declaration type: /** (enter) to auto-generate docblock.
	 * Describe what this function does.
     * @param $example_parameter_one
     * @param $example_parameter_two
     * @return void
     */
    //public function example_action_hook_callback($example_parameter_one, $example_parameter_two) {

        // Here your program
    //}
}