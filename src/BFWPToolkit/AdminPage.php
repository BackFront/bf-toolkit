<?php
/**
 * <b>AdminPage</b>
 *
 * Controllers to pages admin
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

    class AdminPage
    {
        
        /**
         * List all modules in admin page
         * 
         * @param \Twig_Environment $templateSystem
         * @return string Return the HTML page.
         */
        static function modulos(\Twig_Environment $templateSystem)
        {
            return $templateSystem->render('AdminPages/modules.twig', array(
                        "modules" =>
                        array(
                            array(
                                "image" => [ "src" => "http://placehold.it/300x200"],
                                "content" => [
                                    "header" => "Módulo Base",
                                    "meta" => "v0.1.0",
                                    "description" => "Módulo Base com alguns Helpers"
                                ],
                                "extra" => [
                                    "mod_is_on" => true,
                                ],
                                "author" => [
                                    "name" => "backfront",
                                    "url" => "https://github.com/backfront"
                                ],
                                "badges" => [
                                    "verified" => true,
                                    "official" => true,
                                    "secure" => true
                                ]
                            ),
                            array(
                                "image" => [ "src" => "http://placehold.it/300x200"],
                                "content" => [
                                    "header" => "Módulo Base",
                                    "meta" => "v0.1.0",
                                    "description" => "Módulo Base com alguns Helpers"
                                ],
                                "extra" => [
                                    "mod_is_on" => true,
                                ],
                                "author" => [
                                    "name" => "backfront",
                                    "url" => "https://github.com/backfront"
                                ],
                                "badges" => [
                                    "verified" => false,
                                    "official" => false,
                                    "secure" => true
                                ]
                            ), array(
                                "image" => [ "src" => "http://placehold.it/300x200"],
                                "content" => [
                                    "header" => "Módulo Base",
                                    "meta" => "v0.1.0",
                                    "description" => "Módulo Base com alguns Helpers"
                                ],
                                "extra" => [
                                    "mod_is_on" => false,
                                ],
                                "author" => [
                                    "name" => "backfront",
                                    "url" => "https://github.com/backfront"
                                ],
                                "badges" => [
                                    "verified" => true,
                                    "official" => false,
                                    "secure" => false
                                ]
                            )
                            , array(
                                "image" => [ "src" => "http://placehold.it/300x200"],
                                "content" => [
                                    "header" => "Módulo Base",
                                    "meta" => "v0.1.0",
                                    "description" => "Módulo Base com alguns Helpers"
                                ],
                                "extra" => [
                                    "mod_is_on" => true,
                                ],
                                "author" => [
                                    "name" => "backfront",
                                    "url" => "https://github.com/backfront"
                                ],
                                "badges" => [
                                    "verified" => false,
                                    "official" => false,
                                    "secure" => false
                                ]
                            )
                        )
            ));
        }

    }
}
