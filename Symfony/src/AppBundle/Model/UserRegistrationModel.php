<?php

namespace AppBundle\Model;

/**
 * Description of RegistrationModel
 *
 * @author laxman
 */
class UserRegistrationModel {
    
    private $name,$pass,$email;
    
    public function __construct($data) {
        
        $this->setName($data['name']);
        $this->setPass($data['password']);
        $this->setEmail($data['email']);
        return $this;
        
    }
    
    function getName() {
        return $this->name;
    }
    
    function getPass() {
        return $this->pass;
    }

    function getEmail() {
        return $this->email;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    
}
