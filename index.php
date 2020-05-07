<?php

//Julia Evans
//4/21/2020
//F3 routing file (the controller)

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

//Require the autoload file
require_once('vendor/autoload.php');
require_once('model/data.php');

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
$f3->route('GET|POST /personal', function($f3){

    echo $_SERVER['REQUEST_METHOD'];
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    //if form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        //$_SESSION['condiments'] = $_POST['condiment'];

        //redirect
        $f3->reroute('profile');

    }

    $view = new Template();
    echo $view->render('views/personal.html');

});

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Profile page route
$f3->route('GET|POST /profile', function($f3){

    echo $_SERVER['REQUEST_METHOD'];
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    $states = getStates();
    $f3->set('states', $states); //put into f3 hive

    //if form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        //$_SESSION['condiments'] = $_POST['condiment'];

        //redirect
        $f3->reroute('interests');

    }

    $view = new Template();
    echo $view->render('views/profile.html');

});

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Interests page route
$f3->route('GET|POST /interests', function($f3){

    echo $_SERVER['REQUEST_METHOD'];
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    $indoorInterests = getIndoor();
    $f3->set('indoorInterests', $indoorInterests); //put into f3 hive

    $outdoorInterests = getOutdoor();
    $f3->set('outdoorInterests', $outdoorInterests); //put into f3 hive

    //if form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        //$_SESSION['condiments'] = $_POST['condiment'];

        //redirect
        $f3->reroute('summary');

    }

    $view = new Template();
    echo $view->render('views/interests.html');

});

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Profile summary page route
$f3->route('GET|POST /summary', function(){

    echo $_SERVER['REQUEST_METHOD'];
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    //if form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        //$_SESSION['condiments'] = $_POST['condiment'];

        //redirect
        //$f3->reroute('profile');

    }

    $view = new Template();
    echo $view->render('views/summary.html');

    session_destroy();

});

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Run the framework (fat free)
$f3->run();

