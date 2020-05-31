<?php

class PremiumMember extends Member
{
    //instance variables
    private $_indoorInterests;
    private $_outdoorInterests;
    private $_interests;

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Default constructor
     * @param $indoorInterests indoor interests
     */
    public function __construct($indoorInterests = '', $outdoorInterests = '')
    {
        $this->_indoorInterests = $indoorInterests;
        $this->_outdoorInterests = $outdoorInterests;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @return array indoor interests
     */
    public function getIndoorInterests()
    {
        return $this->_indoorInterests;
    }

    /**
     * @param $indoorInterests indoor interests
     */
    public function setIndoorInterests($indoorInterests)
    {
        $this->_indoorInterests = $indoorInterests;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @return array outdoor interests
     */
    public function getOutdoorInterests()
    {
        return $this->_outdoorInterests;
    }

    /**
     * @param $outdoorInterests outdoor interests
     */
    public function setOutdoorInterests($outdoorInterests)
    {
        $this->_outdoorInterests = $outdoorInterests;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @param $interests interests
     */
    public function setInterests($interests)
    {
        $this->_interests = $interests;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}