<?php
/**
 * <b>BFWPToolkit</b>
 *
 * The core plugin class.
 * 
 * @package         Backfront
 * @subpackage      Application
 * @version         0.1.0
 *
 * @author          Douglas Alves <alves.douglaz@gmail.com>
 * @link            https://github.com/snddigitall/bf-toolkit
 * @License:        Apache License 2.0
 * @License URI:    https://www.apache.org/licenses/LICENSE-2.0
 * @since           0.1.0
 */

namespace Application
{

    class BFWPToolkit
    {

        /**
         * The loader that's responsible for maintaining and registering all hooks that power
         * the plugin.
         *
         * @since    0.2.0
         * @access   protected
         * @var      $loader Maintains and registers all hooks for the plugin.
         */
        protected $loader;

        /**
         * The unique identifier of this plugin.
         *
         * @since    0.2.0
         * @access   protected
         * @var      string    $plugin_name The string used to uniquely identify this plugin.
         */
        protected $plugin_name;

        /**
         * The current version of the plugin.
         *
         * @since    0.2.0
         * @access   protected
         * @var      string $version The current version of the plugin.
         */
        protected $version;

        /**
         * Define the core functionality of the plugin.
         *
         * Set the plugin name and the plugin version that can be used throughout the plugin.
         * Load the dependencies, define the locale, and set the hooks for the admin area and
         * the public-facing side of the site.
         *
         * @since    0.2.0
         */
        public function __construct()
        {
            $this->version = (defined(BFWPTK_VERSION)) ? BFWPTK_VERSION : '1.0.0';
            $this->plugin_name = (defined(BFWPTK_SLUG)) ? BFWPTK_VERSION : null;
        }

    }
}
