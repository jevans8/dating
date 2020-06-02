<?php

/**
 * Class PremiumMember
 * Contains the methods for PremiumMember objects and inherits from Member class
 * @author Julia Evans
 * @version 1.0
 */
class PremiumMember extends Member
{
    //instance variables
    private $_indoorInterests;
    private $_outdoorInterests;
    private $_interests;
    private $_profileImage;

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Default constructor
     * @param $indoorInterests
     * @param $outdoorInterests
     */
    public function __construct($indoorInterests = array(), $outdoorInterests = array())
    {
        $this->_indoorInterests = $indoorInterests;
        $this->_outdoorInterests = $outdoorInterests;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * getter for indoor interests
     * @return array indoor interests
     */
    public function getIndoorInterests()
    {
        return $this->_indoorInterests;
    }

    /**
     * setter for indoor interests
     * @param $indoorInterests
     */
    public function setIndoorInterests($indoorInterests)
    {
        $this->_indoorInterests = $indoorInterests;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * getter for outdoor interests
     * @return array outdoor interests
     */
    public function getOutdoorInterests()
    {
        return $this->_outdoorInterests;
    }

    /**
     * setter for outdoor interests
     * @param $outdoorInterests
     */
    public function setOutdoorInterests($outdoorInterests)
    {
        $this->_outdoorInterests = $outdoorInterests;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * getter for all interests
     * @return array all interests
     */
    public function getInterests()
    {
        return $this->_interests;
    }

    /**
     * setter for all interests
     * @param $interests
     */
    public function setInterests($interests)
    {
        $this->_interests = $interests;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * getter for profile image
     * @return String file path name
     */
    public function getImage()
    {
        return $this->_profileImage;
    }

    /**
     * setter for profile image
     * @param $filePath
     */
    public function setImage($filePath)
    {
        $this->_profileImage = $filePath;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}