<?php

namespace AppBundle\Model;

/**
 * Description of LoginVer
 *
 * @author laxman
 */
class LoginDetails {
    
    var $username,$pass;
    
    function __construct($data) {
        $this->setUsername($data['user']);
        $this->setPass($data['password']);
        return $this;
    }
    
    function getUsername() {
        return $this->username;
    }

    function getPass() {
        return $this->pass;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }


}
