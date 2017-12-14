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
    class Module
    {
        public function listModules(){} //Lista os modulos disponiveis
        public function registerModule(){} //Registra um novo modulo
        public function updateModule(){} //Verifica e atualiza os modulos. Baixa novos modulos caso disponiveis
        public function generateHash(){} //Gera um hash de verificacao unico para cada modulo
    }
}
