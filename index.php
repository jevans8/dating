<?php

//Julia Evans
//4/21/2020
//F3 routing file

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

//Instantiate the framework (Base class)
$f3 = Base::instance(); //Class::method()

//Define a default route
$f3->route('GET /', function(){

    $view = new Template();
    echo $view->render('views/home.html');
});

//Run the framework (fat free)
$f3->run();

