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
interface IModule
{

    /**
     * Set the module name.
     * 
     * ATENCTION: Is recommended use this method with the protected access!
     * 
     * @param string $moduleName
     */
    function setModuleName($moduleName);
    function getModuleName();
    
    /**
     * Set the module name.
     * 
     * ATENCTION: Is recommended use this method with the protected access!
     * 
     * @param string $moduleDescription
     */
    function setModuleDescription($moduleDescription);
    function getModuleDescription();

    /**
     * Set the module version.
     * 
     * ATENCTION: Is recommended use this method with the protected access!
     * 
     * @param string $moduleVersion
     */
    function setModuleVersion($moduleVersion = '0.1.0');
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
