<?php

    session_start();
    date_default_timezone_set('America/Sao_Paulo');
    $autoload = function($class){
        if($class == 'Email'){
            include('classes/phpmailer/PHPMailerAutoload.php');
        }
        include('classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);

    define('INCLUDE_PATH','http://localhost/soraphya/'); 
    // define('INCLUDE_PATH','https://soraphya.com/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
    define('BASE_DIR_PAINEL',__DIR__."\painel");

    
    // define('HOST','localhost');
    // define('DB','soraphya_painel');
    // define('USER','soraphya_root');
    // define('PASS','gxV2g0xRL{cq');

    define('HOST','localhost');
    define('DB','soraphya');
    define('USER','root');
    define('PASS','');


    function pegaCargo($indice){
        return Painel::$cargos[$indice];
    }

?>