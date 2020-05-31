<?php

//Julia Evans
//4/21/2020
//F3 routing file (the controller)

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');
require_once('model/data.php');

//Start a session (AFTER the autoload)
session_start();

//Instantiate the framework (Base class)
$f3 = Base::instance(); //Class::method()

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Default (home) route
$f3->route('GET /', function()
{
    $GLOBALS['controller']->home();
});

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Personal information route
$f3->route('GET|POST /personal', function()
{
    $GLOBALS['controller']->personal();
});

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Profile page route
$f3->route('GET|POST /profile', function()
{
    $GLOBALS['controller']->profile();
});

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Interests page route
$f3->route('GET|POST /interests', function()
{
    $GLOBALS['controller']->interests();
});

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Profile summary page route
$f3->route('GET|POST /summary', function()
{
    $GLOBALS['controller']->summary();
});

//////////////////////////////////////////////////////////////////////////////////////////////////////
//Run the framework (fat free)
$f3->run();

