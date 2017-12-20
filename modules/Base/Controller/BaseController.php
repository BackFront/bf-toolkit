<?php
/**
 * BaseController
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

namespace Module\Base\Controller;

use BFWPToolkit\Application;

class BaseController implements \BFWPToolkit\Module\IModule
{

    protected $app;

    /**
     * store the infos from app.json
     * @var array $moduleInfo
     */
    protected $moduleInfo = array();

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->run();
    }

    public function loadModuleInfos()
    {
        $m = $this->app->moduleInstance->getCurrentModule();
        $this->moduleInfo = json_decode(file_get_contents("{$m['path']}/{$m['module']}/app.json"));
        return $this;
    }

    public function getModuleInfos()
    {
        return $this->moduleInfo;
    }

    public function getModuleUI()
    {
        
    }

    public function setModuleUI($showInUI = true)
    {
        
    }

    public function run()
    {
        $this->loadModuleInfos();
    }

}
