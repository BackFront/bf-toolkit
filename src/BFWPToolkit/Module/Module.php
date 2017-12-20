<?php
/**
 * <b>Module</b>
 *
 * The core os modules.
 * Responsible for managing modules
 * 
 * @package         Backfront
 * @subpackage      Module
 * @version         0.1.0
 *
 * @author          Douglas Alves <alves.douglaz@gmail.com>
 * @link            https://github.com/snddigitall/bf-toolkit
 * @License:        Apache License 2.0
 * @License URI:    https://www.apache.org/licenses/LICENSE-2.0
 * @since           0.1.0
 */

namespace BFWPToolkit\Module
{

    use BFWPToolkit\Application;

    class Module
    {

        /**
         * Instance of application
         * @var BFWPToolkit\Application $app 
         */
        protected $app;

        /**
         * Stores the loaded modules
         * @var array
         */
        protected $loadedModules = array();

        /**
         * Current working module
         * @var array 
         */
        protected $currentModule;

        function __construct(Application $app)
        {
            $this->app = $app;
        }

        /**
         * Register a module
         * 
         * @param type $module
         * @param type $path
         */
        public function registerModule($module, $path)
        {
            $this->loadedModules[] = [
                "module" => $module,
                "path" => $path
            ];
            return $this;
        }

        public function getCurrentModule()
        {
            return $this->currentModule;
        }

        /**
         * Lists all modules registered
         */
        public function listModules()
        {
            
        }

        /**
         * Return a recusive directory
         * 
         * @param type $root
         * @return type
         */
        function getRecursiveDir($dir, &$results = array())
        {
            if (!is_dir($dir))
                return;
            $files = scandir($dir);

            foreach ($files as $value) {
                $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
                if (is_dir($path) && $value != "." && $value != "..") {
                    $this->getRecursiveDir($path, $results);
                    $results[] = $path;
                }
            }
            return $results;
        }

        /**
         * Gets all controllers from current module
         * 
         * @param $controllerPath
         */
        function getModuleControllers($controllerPath)
        {
            $files = array();

            //Instance main class first
            $MN = $this->currentModule['module']; //Module name
            $MP = $this->currentModule['path']; //Path to modules
            $CNS = "\Module\\{$MN}\\Controller\\{$MN}Controller"; //Namespace for main class of the current module

            require_once("{$MP}/{$MN}/Controller/{$MN}Controller.php"); //Include main class

            foreach (glob($controllerPath . DIRECTORY_SEPARATOR . "*Controller.php") as $filename) {

                $controllerName = str_replace(array($controllerPath . "/", ".php"), array("", ""), $filename);
                if ($controllerName != "{$MN}Controller")
                    $files[] = $controllerName;
            }

            if (class_exists($CNS))
                new $CNS($this->app);

            foreach ($files as $instanceFiles) {
                $moduleClassName = "\Module\\{$this->currentModule['module']}\\Controller\\{$instanceFiles}";
                if (class_exists($moduleClassName)) {
                    new $moduleClassName($this->app);
                }
            }
        }

        //Lista os modulos disponiveis
        public function run()
        {
            foreach ($this->loadedModules as $module) {

                //Set the current module
                $this->currentModule = $module;

                $modulePath = $module['path'] . DIRECTORY_SEPARATOR . $module['module'];

                //Verify if the module path exists
                if (is_dir($modulePath)) {

                    //Gets the controllers of the module and run this
                    $moduleControllers = $this->getModuleControllers($modulePath . '/Controller');
                } else {
                    continue;
                }
            }
        }

        public function updateModule()
        {
            
        }

//Verifica e atualiza os modulos. Baixa novos modulos caso disponiveis

        public function generateHash()
        {
            
        }

//Gera um hash de verificacao unico para cada modulo

    }
}