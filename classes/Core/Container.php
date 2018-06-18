<?php

namespace Classes\Core;

class Container {

    /**
    * Container data
    *
    * @access private
    */
    public static $containerData = [];

    /**
    * Put stuff to container
    *
    * @param string Container key
    * @param mixed
    * @return void
    */
    public static function put($key, $value)
    {
        $key = sha1($key);
        self::$containerData[$key] = $value;
    }

    /**
    * Get stuff from container
    *
    * @param string
    * @return mixed
    */
    public static function get($key)
    {
        $key = sha1($key);

        if (!isset(self::$containerData[$key])) {
            return null;
        }

        return self::$containerData[$key];
    }
}
