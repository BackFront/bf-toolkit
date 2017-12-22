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

    use BFWPToolkit\Application;

    class AdminPage
    {

        /**
         * List all modules in admin page
         * 
         * @param BFWPToolkit\Application $app
         * @return string Return the HTML page.
         */
        static function modulos(Application $app)
        {
            $modules = array();

            foreach ($app->moduleInstance->listModules() as $module) {
                $json = $app->moduleInstance->getModuleInfos($module['path'] . DIRECTORY_SEPARATOR . $module['module']);

                if (!$json)
                    continue;

                $modules[] = array(
                    "image" => ["src" => $json->cover],
                    "content" => [
                        "header" => $json->name,
                        "meta" => $json->version,
                        "description" => $json->description
                    ],
                    "badges" => [
                        "verified" => true,
                        "official" => true,
                        "secure" => true
                    ],
                    "author" => [
                        "name" => $json->authors[0]->name,
                        "url" => $json->authors[0]->url
                    ],
                    "extra" => [
                        "mod_is_on" => true,
                    ]
                );
            }

            return
                            $app
                            ->twig()
                            ->render('AdminPages/modules.twig', array(
                                "modules" => $modules
            ));
        }

        static function about($app)
        {
            return $app->twig()->render('AdminPages/about.twig', array(null));
        }

    }
}
