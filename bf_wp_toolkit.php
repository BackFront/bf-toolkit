<?php
/**
 * @link              https://github.com/snddigitall/bf-toolkit
 * @since             0.1.0
 * @version           0.1.0
 * @package           WPBFToolkit
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
 * Text Domain:       bf_wp_toolkit
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC'))
    die('No direct script access allowed');

/** PLUGIN
 * *********** *//* GLOBAL *//* CONFIGURATIONS */
require_once(dirname(__FILE__) . '/bootstrap.php'); //Don't remove this line

if (!function_exists('activate_' . BFWPTK_SLUG)) :

    /**
     * The code that runs during plugin activation.
     */
    function activate_bfwptoolkit()
    {
        require_once plugin_dir_path(__FILE__) . 'includes/activator.php';
        BFWPToolkit_Activator::activate();
    }

endif;


if (!function_exists('deactivate_' . BFWPTK_SLUG)):

    /**
     * The code that runs during plugin deactivation.
     */
    function deactivate_bfwptoolkit()
    {
        require_once plugin_dir_path(__FILE__) . 'includes/deactivator.php';
        BFWPToolkit_Deactivate::deactivate();
    }

endif;


if (!function_exists('bf_load_dependences')):

    /** Load, include and required dependences * */
    function bf_load_dependences()
    {

        add_action('admin_enqueue_scripts', function($hook)
        {
            if ($hook == "toplevel_page_" . BFWPTK_SLUG) {
                /** ====================
                 *  STYLES
                 * ===================== *//* Semantic-UI */
                wp_enqueue_style('semantic_ui', BFWPTK_ASSETS_URL . '/libs/semantic_ui/semantic.min.css');
                
                /* ===================== *//* Bootstrap */
                wp_enqueue_style('bootstrap_grid', BFWPTK_ASSETS_URL . '/css/bootstrap_grid.css');

                /** AMDIN
                 * ===================== *//* Reset */
                wp_enqueue_style('bf_admin_reset', BFWPTK_ASSETS_URL . '/css/admin/reset_admin.css');
                wp_enqueue_style('bf_admin_custom', BFWPTK_ASSETS_URL . '/css/admin/custom_admin.css');
                


                /** ====================
                 *  SCRIPTS
                 * ===================== *//* Semantic-UI */
                wp_enqueue_script('semantic_ui', BFWPTK_ASSETS_URL . '/libs/semantic_ui/semantic.min.js', array('jquery'));

                /** ==================== *//* Loader */
                wp_enqueue_script('loader', BFWPTK_ASSETS_URL . '/js/loader.js', array('jquery', 'semantic_ui'));
            }
        });
    }

endif;

register_activation_hook(__FILE__, 'activate_' . BFWPTK_SLUG);
register_deactivation_hook(__FILE__, 'deactivate_' . BFWPTK_SLUG);

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . '/src/' . BFWPTK_DOMAIN . DIRECTORY_SEPARATOR . 'Application.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.2.0
 */
function run_bf_wp_toolkit()
{
    $plugin = \BFWPToolkit\Application::getInstance();

    $plugin
            ->registerModule('Base')
            ->registerModule('FacebookLogin');
    $plugin->run();
}

//Run plugin application
bf_load_dependences();
run_bf_wp_toolkit();
