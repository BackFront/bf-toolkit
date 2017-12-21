<?php
/**
 * Just say 'hello world'
 *
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

class HelloWorldController
{

    public function __construct()
    {
        echo "<script>alert('" . __NAMESPACE__ . "')</script>";
    }

}
