<?php
if (!defined('ABSPATH'))
    die('No direct script access allowed');

/** SITE
 * *********** *//* GLOBAL *//* CONSTANTS */
define('BFWPTK_NAME', 'Backfront WP Toolkit');
define('BFWPTK_SLUG', 'bf_wp_toolkit');
define('BFWPTK_DOMAIN', 'BFWPToolkit');
define('BFWPTK_VERSION', '0.1.0');

define('BFWPTK_ABSPATH', dirname(__FILE__));
define('BFWPTK_HOME_URL', get_home_url());

define('BFWPTK_APP_DIR', BFWPTK_ABSPATH . '/src/BFWPToolkit'); //CORE DIRECTORY PATH
define('BFWPTK_CORE_PATH', BFWPTK_ABSPATH . '/src');
define('BFWPTK_MODULE_PATH', BFWPTK_ABSPATH . '/modules');
define('BFWPTK_INCLUDES_PATH', BFWPTK_ABSPATH . '/includes');
define('BFWPTK_ASSETS', BFWPTK_ABSPATH . '/front/assets');
define('BFWPTK_AUTOLOAD', BFWPTK_ABSPATH . '/vendor/autoload.php');
define('BFWPTK_VIEWS_PATH', BFWPTK_APP_DIR . '/Views');
define('BFWPTK_ADMIN_PATH', BFWPTK_ABSPATH . '/admin');
define('BFWPTK_FRONT_PATH', BFWPTK_ABSPATH . '/front');

define('BFWPTK_AUTH', '<YOUR HASH HERE!>'); //Used in authentications

$autoloader = require_once(BFWPTK_AUTOLOAD);

$autoloader->addPsr4('BFWPToolkit\\', __DIR__ . '/src/BFWPToolkit/');
$autoloader->addPsr4('Module\\', BFWPTK_MODULE_PATH);

//$autoloader->add();
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
