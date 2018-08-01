<?php

namespace Classes\Models;

class User extends Model {

    /**
    * Find a user
    * 
    * @param integer User id
    * @return array
    */
    public static function find($id)
    {
        
        $user = containerGet('database')->fetchAssoc('SELECT * FROM users WHERE name = ?', array($id));
        return $user;
    }

}