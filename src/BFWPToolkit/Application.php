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

namespace BFWPToolkit
{

    use Backfront\Wordpress\Admin\Navegation;
    use Backfront\Generator\Tab;
    use BFWPToolkit\Module\Module;

    class Application extends \Backfront\Wordpress\Application
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
         * @var      string    $pluginName The string used to uniquely identify this plugin.
         */
        protected $pluginName;

        /**
         * The current version of the plugin.
         *
         * @since    0.2.0
         * @access   protected
         * @var      string $version The current version of the plugin.
         */
        protected $version;

        /**
         * The instance for Module class
         *
         * @since    0.2.0
         * @access   public
         * @var      string $moduleInstance The instance class.
         */
        public $moduleInstance;

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
            $this->version = (!empty(BFWPTK_VERSION)) ? BFWPTK_VERSION : '0.1.0';
            $this->pluginName = (!empty(BFWPTK_SLUG)) ? BFWPTK_VERSION : 'BFWPToolkit';
            $this->TPLPATH = (!empty(BFWPTK_VIEWS_PATH)) ? BFWPTK_VIEWS_PATH : null;
            $this->MDLPATH = (!empty(BFWPTK_MODULE_PATH)) ? BFWPTK_MODULE_PATH : null;
        }

        public function registerModule($moduleName, $path = null)
        {
            if (is_null(self::getInstance()->MDLPATH) && empty($path)):
                trigger_error("It is not possible to make calls to the modules. It is necessary to specify the modules directory before", E_USER_NOTICE);
                return $this;
            else:
                if (!isset($this->moduleInstance)):
                    $this->getInstance()->moduleInstance = new Module($this->getInstance());
                endif;
            endif;
            $this
                    ->getInstance()
                    ->moduleInstance
                    ->registerModule($moduleName, (!empty($path)) ? $path : self::getInstance()->MDLPATH);
            return $this;
        }

        /**
         * Adding the nav menu and submenu in wordpress admin.
         * 
         * @since       0.2.0-beta
         * @return      void
         */
        public function buildNav()
        {
            $nav = new Navegation();
            $nav->addMenu(BFWPTK_SLUG, 'BFWPToolkit', 'manage_options', array($this, 'buildPianel'), null, 'dashicons-image-filter');
        }

        /**
         * Panel callback to nav menu
         * 
         * @since       0.2.0-beta
         * @return      void
         */
        public function buildPianel()
        {
            $tab = new Tab($this);
            $tab->addTabItem([
                        'id' => 'modules',
                        'text' => 'Módulos',
                        'active' => true], AdminPage::modulos($this->getInstance()))
                    ->addTabItem([
                        'id' => 'update',
                        'text' => 'Atualizações',
                        'label' => 2], "Coming soon")
                    ->addTabItem([
                        'id' => 'config',
                        'text' => 'Configurações'], "Coming soon");

            echo $this->wrappContent(
                    $tab->build()
            );
        }

        protected function wrappContent($content)
        {
            $top_menu = $this->twig()->render('Collections/Menu.twig', array(
                "menu" => [
                    "header" => BFWPTK_NAME,
                    "itens" => array(
                        ["text" => "Sobre"],
                    ),
                    "right" => '<input class="umb ui primary button" id="submit" name="submit" value="Salvar" type="submit">',
                ]
            ));


            return $this->twig()->render('Blocks/block_page.twig', array(
                        "page" => [
                            "header" => $top_menu,
                            "content" => $content
                        ]
            ));
        }

        /**
         * Run application
         * 
         * @since       0.1.0-beta
         * @return \BFWPToolkit\Application
         */
        public function run()
        {
            add_action('admin_menu', array($this, 'buildNav'));
            $this->getInstance()->moduleInstance->run(); //Run modules class
            return $this;
        }

    }
}
