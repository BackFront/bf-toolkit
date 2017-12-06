<?php
/**
 * @link              https://github.com/snddigitall/bf-toolkit
 * @since             0.1.0
 * @package           Backfront
 *
 * @wordpress-plugin
 * Plugin Name:       Backfront WP Toolkit
 * Plugin URI:        https://github.com/snddigitall/bf-toolkit
 * Description:       A toolkit plugin containing multiple shortcodes to Wordpress 
 * Version:           0.1.0
 * Author:            Douglas Alves <alves.douglaz@gmail.com>
 * Author URI:        https://github.com/backfront/
 * License:           Apache License 2.0
 * License URI:       https://www.apache.org/licenses/LICENSE-2.0
 * Text Domain:       Backfront WP Toolkit
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC'))
    die('No direct script access allowed');

/** SITE
 * *********** *//* GLOBAL *//* CONFIGURATIONS */
require_once(dirname(__FILE__) . '/bootstrap.php'); //Don't remove this line

if (!function_exists('activate_' . BFWPTK_SLUG)) {

    /**
     * The code that runs during plugin activation.
     * This action is documented in includes/class-plugin-name-activator.php
     */
    function activate_bf_wp_toolkit()
    {
        
    }

}
if (!function_exists('deactivate_' . BFWPTK_SLUG)) {

    /**
     * The code that runs during plugin deactivation.
     * This action is documented in includes/class-plugin-name-deactivator.php
     */
    function deactivate_bf_wp_toolkit()
    {
        
    }

}

register_activation_hook(__FILE__, 'activate_' . BFWPTK_SLUG);
register_deactivation_hook(__FILE__, 'deactivate_' . BFWPTK_SLUG);

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . '/src/Application/';
