<?php
/**
 * IModule
 *
 * Interface to modules
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

namespace BFWPToolkit\Module;

use BFWPToolkit\Application;

interface IModule
{

    function __construct(Application $app);

    /**
     * Load the informations of the module from app.json
     */
    function loadModuleInfos();

    /**
     * Set the module name.
     * 
     * ATENCTION: Is recommended use this method with the protected access!
     * 
     * @param string $moduleName
     */
    function getModuleName();

    /**
     * Set the module name.
     * 
     * ATENCTION: Is recommended use this method with the protected access!
     * 
     * @param string $moduleDescription
     */
    function getModuleDescription();

    /**
     * Set the module version.
     * 
     * ATENCTION: Is recommended use this method with the protected access!
     * 
     * @param string $moduleVersion
     */
    function getModuleVersion();

    /**
     * Set the module UI.
     * 
     * If is set as false, the module don't displaying on frontend. This means that this module will be running in background.
     */
    function setModuleUI($showInUI = true);

    function getModuleUI();

    /**
     * Run the Module.
     */
    function run();

}
