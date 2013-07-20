<?php
/**
 * User: rrogers
 * Date: 7/19/13
 * Time: 11:53 PM
 */

namespace Magento;

use Magento\krumo;
class PHPConsole
{
    public static $debugOutput;

    public static function init()
    {

        define('PHP_CONSOLE_VERSION', '1.3.0-dev');
        require 'krumo/class.krumo.php';

        ini_set('display_errors', 1);
        error_reporting(E_ALL | E_STRICT);

        self::$debugOutput = '';

        if (isset($_POST['code'])) {
            $code = $_POST['code'];

            if (get_magic_quotes_gpc()) {
                $code = stripslashes($code);
            }

            // if there's only one line wrap it into a krumo() call
            if (preg_match('#^(?!var_dump|echo|print|< )([^\r\n]+?);?\s*$#is', $code, $m) && trim($m[1])) {
                $code = 'krumo('.$m[1].');';
            }

            // replace '< foo' by krumo(foo)
            $code = preg_replace('#^<\s+(.+?);?[\r\n]?$#m', 'krumo($1);', $code);

            // replace newlines in the entire code block by the new specified one
            // i.e. put #\r\n on the first line to emulate a file with windows line
            // endings if you're on a unix box
            if (preg_match('{#((?:\\\\[rn]){1,2})}', $code, $m)) {
                $newLineBreak = str_replace(array('\\n', '\\r'), array("\n", "\r"), $m[1]);
                $code = preg_replace('#(\r?\n|\r\n?)#', $newLineBreak, $code);
            }

            ob_start();
            eval($code);
            self::$debugOutput = ob_get_clean();

            if (isset($_GET['js'])) {
                header('Content-Type: text/plain');
                echo self::$debugOutput;
                die('#end-php-console-output#');
            }
        }

    }
}