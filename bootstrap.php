<?php
if (!defined('ABSPATH'))
    die('No direct script access allowed');

/** SITE
 * *********** *//* GLOBAL *//* CONSTANTS */
define('BFWPTK_NAME', 'Backfront WP Toolkit');
define('BFWPTK_SLUG', 'bf_wp_toolkit');
define('BFWPTK_DOMAIN', 'BFWPToolkit');
define('BFWPTK_APP_DIR', '/BFWPToolkit'); //CORE DIRECTORY PATH
define('BFWPTK_VERSION', '0.1.0');
define('BFWPTK_MODULE_PATH', '/modules');
define('BFWPTK_VIEWS_PATH', '/src' . BFWPTK_APP_DIR . '/Views');
define('BFWPTK_INCLUDES_PATH', '/includes');
define('BFWPTK_HOME_URL', get_home_url());

define('BFWPTK_ADMIN_PATH', get_template_directory() . '/admin');
define('BFWPTK_FRONT_PATH', get_template_directory() . '/front');
define('BFWPTK_AUTOLOAD', '/vendor/autoload.php');

define('BFWPTK_ASSETS', get_template_directory_uri() . '/front/assets');
define('BFWPTK_MODEL_PATH', get_template_directory() . '/src');
define('BFWPTK_TEMPLATE_PATH', get_template_directory());
define('BFWPTK_TEMPLATE_URI', get_template_directory_uri());
define('BFWPTK_AUTH', '<YOUR HASH HERE!>'); //Used in authentications

$autoloader = require_once(dirname(__FILE__) . '/vendor/autoload.php');

/**
 * Application setup
 * @since 0.1.0
 */
add_action('init', function(){
   //Your inits 
});

/**
 * Default theme definitions
 * @since 0.1.0
 */
add_action('after_setup_theme', function(){
    //Your setups
});
