<?php

/**
 * Class Validator
 * Contains the validation methods for the dating app
 * @author Julia Evans
 * @version 1.0
 */
class Validator
{
    /**
     * Return a value indicating if a string is all alphabetic
     * @param $name
     * @return bool
     */
    function validName($name)
    {
        return ctype_alpha($name);
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Return a value indicating if an age is numeric and between 18 and 118
     * @param $age
     * @return bool
     */
    function validAge($age)
    {
        return is_numeric($age) && $age >= 18 && $age <= 118;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Return a value indicating if a phone number is valid
     * @param $phone
     * @return bool
     */
    function validPhone($phone)
    {
        return strlen($phone) >= 10;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Return a value indicating if an email address is valid
     * @param $email
     * @return bool
     */
    function validEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Checks each selected indoor interest against a list of valid options
     * @param $input array of interests
     * @return bool
     */
    function validIndoor($input)
    {
        $validInterests = getIndoor();
        foreach($input as $interest)
        {
            if(!in_array($interest, $validInterests))
            {
                return false;
            }
        }
        return true;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Checks each selected outdoor interest against a list of valid options
     * @param $input array of interests
     * @return bool
     */
    function validOutdoor($input)
    {
        $validInterests = getOutdoor();
        foreach($input as $interest)
        {
            if(!in_array($interest, $validInterests))
            {
                return false;
            }
        }
        return true;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Returns an array of all the states
     * @return array of all 50 states
     */
    function getStates()
    {
        $states = array("Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut",
            "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky",
            "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri",
            "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina",
            "North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina",
            "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia",
            "Wisconsin", "Wyoming");
        return $states;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Returns an array of all the indoor interests
     * @return array of all indoor interests
     */
    function getIndoor()
    {
        $indoor = array("tv", "movies", "cooking", "board games", "puzzles", "reading", "playing cards", "video games");
        return $indoor;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Returns an array of all the outdoor interests
     * @return array of all outdoor interests
     */
    function getOutdoor()
    {
        $outdoor = array("hiking", "biking", "swimming", "collecting", "walking", "climbing");
        return $outdoor;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}

