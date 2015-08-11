<?php

namespace Gravatar;


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

try {
    
    echo "<pre>";
    
    $response = new Response(
        new QrProfileRequest(new
            Account('krzysiekpiasecki@gmail.com')
        )
    );
    
    echo $response;
    
    
} catch (\Throwable $e) {
    var_dump($e);
    throw $e;
}

