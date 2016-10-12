<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        if ((isset($_REQUEST[$key]))) {
            return $_REQUEST[$key];
        }
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        if (self::has($key)) {
            return self::has($key);
        } else {
            $_REQUEST[$key] = $default;
            return $_REQUEST[$key]; 
        }
    }


   public static function getString($key, $min = 5, $max = 30) {

        if (!is_string(static::get($key)) || is_numeric(static::get($key))) {

            throw new InvalidArgumentException("Error Processing Request. Entry Must Be String at " . $key . ".");
            
        }

        if (!is_numeric($min) || !is_numeric($max)) {

            throw new InvalidArgumentException("Error Processing Request. Entry must be Number at Min and Max."); 
        }

        return trim(static::get($key));

    } 
    

    public static function getNumber($key, $default = 0) {

        if (!is_numeric(static::get($key, $default))) {

            throw new Exception("Error Processing Request. Entry Must Be Number at " . $key . ".");
            
        }

        return floatval(static::get($key));

    }

    public static function getDate($key) {

        if (!strtotime(static::get($key))) {

            throw new Exception("Error Processing Request. Entry Must Be Date at " . $key . ".");
        }

        return new DateTime(static::get($key));
    }
    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
