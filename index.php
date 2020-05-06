<?php

//Julia Evans
//4/21/2020
//F3 routing file (the controller)

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

//Instantiate the framework (Base class)
$f3 = Base::instance(); //Class::method()

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Default route
$f3->route('GET /', function(){

    $view = new Template();
    echo $view->render('views/home.html');

});

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Personal information route
$f3->route('GET /personal', function(){

    $view = new Template();
    echo $view->render('views/personal.html');

});

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Profile page route
$f3->route('GET /profile', function(){

    $view = new Template();
    echo $view->render('views/profile.html');

});

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Interests page route
$f3->route('GET /interests', function(){

    $view = new Template();
    echo $view->render('views/interests.html');

});

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Profile summary page route
$f3->route('GET /summary', function(){

    $view = new Template();
    echo $view->render('views/summary.html');

});

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Run the framework (fat free)
$f3->run();

