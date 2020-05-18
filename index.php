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

    //if form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        //validate first name
        if(empty($_POST['fname']) || !validName($_POST['fname']))
        {
            //set an error variable in the f3 hive
            $f3->set('errors["fname"]', "Invalid first name");
        }

        //validate last name
        if(empty($_POST['lname']) || !validName($_POST['lname']))
        {
            //set an error variable in the f3 hive
            $f3->set('errors["lname"]', "Invalid last name");
        }

        //validate age
        if(empty($_POST['age']) || !validAge($_POST['age']))
        {
            //set an error variable in the f3 hive
            $f3->set('errors["age"]', "Invalid age");
        }

        //validate phone
        if(empty($_POST['phone']) || !validPhone($_POST['phone']))
        {
            //set an error variable in the f3 hive
            $f3->set('errors["phone"]', "Invalid phone number");
        }

        //if valid data
        if(empty($f3->get('errors')))
        {
            $_SESSION['fname'] = $_POST['fname'];
            $_SESSION['lname'] = $_POST['lname'];
            $_SESSION['age'] = $_POST['age'];
            $_SESSION['gender'] = $_POST['gender'];
            $_SESSION['phone'] = $_POST['phone'];

            //redirect
            $f3->reroute('profile');
        }

        //store variables in f3 hive
        $f3->set('fname', $_POST['fname']);
        $f3->set('lname', $_POST['lname']);
        $f3->set('age', $_POST['age']);
        $f3->set('selectedGender', $_POST['gender']); //NOT WORKING!!!
        $f3->set('phone', $_POST['phone']);

    }

    $view = new Template();
    echo $view->render('views/personal.html');

});

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Profile page route
$f3->route('GET|POST /profile', function($f3){

    $states = getStates();
    $f3->set('states', $states); //put into f3 hive

    //if form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        //validate email
        if(empty($_POST['email']) || !validEmail($_POST['email']))
        {
            //set an error variable in the f3 hive
            $f3->set('errors["email"]', "Invalid email address");
        }

        //if valid data
        if(empty($f3->get('errors')))
        {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['state'] = $_POST['state'];
            $_SESSION['seeking'] = $_POST['genderSeeking'];
            $_SESSION['bio'] = $_POST['bio'];

            //redirect
            $f3->reroute('interests');
        }

        //store variables in f3 hive
        $f3->set('email', $_POST['email']);
        //$f3->set('state', $_POST['state']);
        //$f3->set('seeking', $_POST['seeking']);
        $f3->set('bio', $_POST['bio']);

    }

    $view = new Template();
    echo $view->render('views/profile.html');

});

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Interests page route
$f3->route('GET|POST /interests', function($f3){

    $indoorInterests = getIndoor();
    $f3->set('indoorInterests', $indoorInterests); //put into f3 hive

    $outdoorInterests = getOutdoor();
    $f3->set('outdoorInterests', $outdoorInterests); //put into f3 hive

    //if form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        //to avoid null value (otherwise array_merge won't work)
        if(empty($_POST['indoorInterests']))
        {
            $_POST['indoorInterests'] = array();
        }
        if(empty($_POST['outdoorInterests']))
        {
            $_POST['outdoorInterests'] = array();
        }

        //validate interests
        if(!validIndoor($_POST['indoorInterests']) || !validOutdoor($_POST['outdoorInterests']))
        {
            //set an error variable in the f3 hive
            $f3->set('errors["interests"]', "Invalid interests");

        }

        //if valid data
        if(empty($f3->get('errors')))
        {
            $interests = array_merge($_POST['indoorInterests'], $_POST['outdoorInterests']);
            $_SESSION['interests'] = $interests;

            //redirect
            $f3->reroute('summary');
        }

        //don't store variables in f3 hive because we don't want the form to be sticky
        //if form is spoofed, we want all the values to reset

    }

    $view = new Template();
    echo $view->render('views/interests.html');

});

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Profile summary page route
$f3->route('GET|POST /summary', function(){

    $view = new Template();
    echo $view->render('views/summary.html');

    session_unset();
    $_SESSION = [];
    session_destroy();

});

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Run the framework (fat free)
$f3->run();

