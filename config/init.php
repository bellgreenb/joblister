<?php
//start session in order for session variables to work
session_start();

//config file
require_once'config.php';

//include helper file
require_once'helpers/system_helper.php';

//autoloader
spl_autoload_register(function($class_name){
    require_once 'lib/'.$class_name.'.php';
});

