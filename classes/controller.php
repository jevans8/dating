<?php

/**
 * Class Controller
 */
class Controller
{
    private $_f3; //router

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Controller constructor.
     * @param $_f3
     */
    public function __construct($_f3)
    {
        $this->_f3 = $_f3;
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Process default route (home page)
     */
    public function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Process personal info route
     */
    public function personal()
    {
        global $validator;

        //if form has been submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //validate first name
            if(empty($_POST['fname']))
            {
                $this->_f3->set('errors["fname"]', "Required field");
            }
            else if(!$validator->validName($_POST['fname']))
            {
                $this->_f3->set('errors["fname"]', "Please enter a valid name");
            }

            //validate last name
            if(empty($_POST['lname']))
            {
                $this->_f3->set('errors["lname"]', "Required field");
            }
            else if(!$validator->validName($_POST['lname']))
            {
                $this->_f3->set('errors["lname"]', "Please enter a valid name");
            }

            //validate age
            if(empty($_POST['age']))
            {
                $this->_f3->set('errors["age"]', "Required field");
            }
            else if(!$validator->validAge($_POST['age']))
            {
                $this->_f3->set('errors["age"]', "Please enter a valid age");
            }

            //validate phone
            if(empty($_POST['phone']))
            {
                $this->_f3->set('errors["phone"]', "Required field");
            }
            else if(!$validator->validPhone($_POST['phone']))
            {
                $this->_f3->set('errors["phone"]', "Please enter a valid phone number");
            }

            //if valid data
            if(empty($this->_f3->get('errors')))
            {
                $_SESSION['fname'] = $_POST['fname'];
                $_SESSION['lname'] = $_POST['lname'];
                $_SESSION['age'] = $_POST['age'];
                $_SESSION['gender'] = $_POST['gender'];
                $_SESSION['phone'] = $_POST['phone'];
                $_SESSION['premium'] = $_POST['premium'];

                //redirect
                $this->_f3->reroute('profile');
            }

            //store variables in f3 hive (to make form sticky)
            $this->_f3->set('fname', $_POST['fname']);
            $this->_f3->set('lname', $_POST['lname']);
            $this->_f3->set('age', $_POST['age']);
            $this->_f3->set('selectedGender', $_POST['gender']);
            $this->_f3->set('phone', $_POST['phone']);
            $this->_f3->set('premium', $_POST['premium']);

        }

        $view = new Template();
        echo $view->render('views/personal.html');
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Process profile route
     */
    public function profile()
    {
        global $validator;

        $states = getStates();
        $this->_f3->set('states', $states); //put into f3 hive

        //if form has been submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //validate email
            if(empty($_POST['email']))
            {
                $this->_f3->set('errors["email"]', "Required field");
            }
            else if(!$validator->validEmail($_POST['email']))
            {
                $this->_f3->set('errors["email"]', "Please enter a valid email address");
            }

            //if valid data
            if(empty($this->_f3->get('errors')))
            {
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['state'] = $_POST['state'];
                $_SESSION['seeking'] = $_POST['genderSeeking'];
                $_SESSION['bio'] = $_POST['bio'];

                //redirect to proper page based on membership status
                if($_SESSION['premium'])
                {
                    $this->_f3->reroute('interests');
                }
                else
                {
                    $this->_f3->reroute('summary');
                }

            }

            //store variables in f3 hive
            $this->_f3->set('email', $_POST['email']);
            $this->_f3->set('selectedState', $_POST['state']);
            $this->_f3->set('genderSeeking', $_POST['genderSeeking']);
            $this->_f3->set('bio', $_POST['bio']);

        }

        $view = new Template();
        echo $view->render('views/profile.html');
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Process interests route
     */
    public function interests()
    {
        global $validator;

        $indoorInterests = getIndoor();
        $this->_f3->set('indoorInterests', $indoorInterests); //put into f3 hive

        $outdoorInterests = getOutdoor();
        $this->_f3->set('outdoorInterests', $outdoorInterests); //put into f3 hive

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
            if(!$validator->validIndoor($_POST['indoorInterests']) || !$validator->validOutdoor($_POST['outdoorInterests']))
            {
                //set an error variable in the f3 hive
                $this->_f3->set('errors["interests"]', "Invalid interests");
            }

            //if valid data
            if(empty($this->_f3->get('errors')))
            {
                $interests = array_merge($_POST['indoorInterests'], $_POST['outdoorInterests']);
                $_SESSION['interests'] = $interests;

                //redirect
                $this->_f3->reroute('summary');
            }

            //don't store interests variables in f3 hive because we don't want the interest form to be sticky
            //if form is spoofed, we want all the values to reset

        }

        $view = new Template();
        echo $view->render('views/interests.html');
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Process summary route
     */
    public function summary()
    {
        $view = new Template();
        echo $view->render('views/summary.html');

        session_unset();
        $_SESSION = [];
        session_destroy();
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}