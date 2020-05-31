<?php

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
     * @return string first name
     */
    public function getFName()
    {
        return $this->_fname;
    }

    /**
     * @param $fname first name
     */
    public function setFName($fname)
    {
        $this->_fname = $fname;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @return string last name
     */
    public function getLName()
    {
        return $this->_lname;
    }

    /**
     * @param $lname last name
     */
    public function setLName($lname)
    {
        $this->_lname = $lname;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @return number age
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * @param $age age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @return string gender
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * @param $gender gender
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @return string phone
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param $phone phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @return string email
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param $email email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @return string state
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param $state state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @return string seeking
     */
    public function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * @param $seeking seeking
     */
    public function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @return string bio
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * @param $bio bio
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}