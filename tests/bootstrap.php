<?php

/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once "vendor" . \DIRECTORY_SEPARATOR . "autoload.php";

\spl_autoload_register(function($class) {
    if (class_exists($class) == true) {
        return;
    }
    $classPath = \str_replace("\\", \DIRECTORY_SEPARATOR, $class);
    $filePath = \sprintf("src%s%s.php", \DIRECTORY_SEPARATOR, $classPath);
    if ((is_file($filePath) && is_readable($filePath)) == true) {
        include_once $filePath;
    }
});