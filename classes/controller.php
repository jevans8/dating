<?php

/**
 * Class Controller
 * Contains the routing methods for the dating app
 * @author Julia Evans
 * @version 1.0
 */
class Controller
{
    private $_f3; //router

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Controller object constructor.
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
                if($_POST['premium'])
                {
                    $_member = new PremiumMember();
                }
                else
                {
                    $_member = new Member();
                }

                //set object variables
                $_member->setFName($_POST['fname']);
                $_member->setLName($_POST['lname']);
                $_member->setAge($_POST['age']);
                $_member->setGender($_POST['gender']);
                $_member->setPhone($_POST['phone']);

                //save member object in session
                $_SESSION['member'] = $_member;

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

        $states = $validator->getStates();
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
                $_SESSION['member']->setEmail($_POST['email']);
                $_SESSION['member']->setState($_POST['state']);
                $_SESSION['member']->setSeeking($_POST['genderSeeking']);
                $_SESSION['member']->setBio($_POST['bio']);

                //redirect to proper page based on membership status
                if($_SESSION['member'] instanceof PremiumMember)
                {
                    //$this->_f3->reroute('interests');
                    $this->_f3->reroute('upload');
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
     * Process image upload route
     */
    public function upload()
    {
        $_SESSION['member']->setImage('/328/dating/images/profile.png');

        //if upload file button on form has been submitted
        if (isset($_FILES['fileToUpload']))
        {
            $dirName = "uploads/";
            $file = $_FILES['fileToUpload'];

            //Define valid file types
            $validTypes = array('image/jpeg', 'image/jpg', 'image/png');

            //If good file type
            if(in_array($file['type'], $validTypes))
            {
                //Move file to uploads directory
                move_uploaded_file($file['tmp_name'], $dirName . $file['name']);

                //Save image file path
                $filePath = $dirName . $file['name'];
                $this->_f3->set("image", "$filePath");
                $_SESSION['member']->setImage($filePath);

                //Success message
                $this->_f3->set("uploads['success]", "Uploaded {$file['name']} successfully!");
            }
            else
            {
                //Error message
                $this->_f3->set("uploads['failure']", "Invalid file type. Allowed types: jpeg, jpg, png");
            }

        }

        //if Next button on form has been submitted
        if(isset($_POST['nextBtn']))
        {
            $this->_f3->reroute('interests');
        }

        $view = new Template();
        echo $view->render('views/upload.html');
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Process interests route
     */
    public function interests()
    {
        global $validator;

        //generate check boxes
        $indoorInterests = $validator->getIndoor();
        $this->_f3->set('indoorInterests', $indoorInterests); //put into f3 hive
        $outdoorInterests = $validator->getOutdoor();
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
                $_SESSION['member']->setIndoorInterests($_POST['indoorInterests']);
                $_SESSION['member']->setOutdoorInterests($_POST['outdoorInterests']);
                $interests = array_merge($_SESSION['member']->getIndoorInterests(), $_SESSION['member']->getOutdoorInterests());
                $_SESSION['member']->setInterests($interests);

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
        $_SESSION = array();
        session_destroy();
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}