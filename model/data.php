<?php

//checks to see that a string is all alphabetic
function validName($name)
{
    return ctype_alpha($name);
}

//checks to see that an age is numeric and between 18 and 118
function validAge($age)
{
    return is_numeric($age) && $age >= 18 && $age <= 118;
}

//checks to see that a phone number is valid (you can decide what constitutes a “valid” phone number)
function validPhone($phone)
{
    return strlen($phone) >= 10;
}

//checks to see that an email address is valid
function validEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

//checks each selected indoor interest against a list of valid options
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

//checks each selected outdoor interest against a list of valid options.
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

//returns an array of all the states
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

//returns an array of all the indoor interests
function getIndoor()
{
    $indoor = array("tv", "movies", "cooking", "board games", "puzzles", "reading", "playing cards", "video games");
    return $indoor;
}

//returns an array of all the outdoor interests
function getOutdoor()
{
    $outdoor = array("hiking", "biking", "swimming", "collecting", "walking", "climbing");
    return $outdoor;
}