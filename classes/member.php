<?php

/**
 * Class Member
 * Contains the methods for all member objects
 * @author Julia Evans
 * @version 1.0
 */
class Member
{
    //instance variables
    private $_fname;
    private $_lname;
    private $_age;
    private $_gender;
    private $_phone;
    private $_email;
    private $_state;
    private $_seeking;
    private $_bio;

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Default constructor
     * @param $fname member's first name
     * @param $lname member's last name
     * @param $age member's age
     * @param $gender member's gender
     * @param $phone member's phone
     * @param $email member's email
     * @param $state member's state
     * @param $seeking member's seeking gender
     * @param $bio member's bio
     */
    public function __construct($fname = '', $lname = '', $age = '', $gender = '', $phone = '', $email = '', $state = '', $seeking = '', $bio = '')
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_age = $age;
        $this->_gender = $gender;
        $this->_phone = $phone;
        $this->_email = $email;
        $this->_state = $state;
        $this->_seeking = $seeking;
        $this->_bio = $bio;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * getter for first name
     * @return string first name
     */
    public function getFName()
    {
        return $this->_fname;
    }

    /**
     * setter for first name
     * @param $fname
     */
    public function setFName($fname)
    {
        $this->_fname = $fname;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * getter for last name
     * @return string last name
     */
    public function getLName()
    {
        return $this->_lname;
    }

    /**
     * setter for last name
     * @param $lname
     */
    public function setLName($lname)
    {
        $this->_lname = $lname;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * getter for age
     * @return number age
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * setter for age
     * @param $age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * getter for gender
     * @return string gender
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * setter for gender
     * @param $gender
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * getter for phone number
     * @return string phone
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * setter for phone number
     * @param $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * getter for email address
     * @return string email
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * setter for email address
     * @param $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * getter for state
     * @return string state
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * setter for state
     * @param $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * getter for seeking
     * @return string seeking
     */
    public function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * setter for seeking
     * @param $seeking
     */
    public function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * getter for bio
     * @return string bio
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * setter for bio
     * @param $bio
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}