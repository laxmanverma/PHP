<?php

namespace AppBundle\Model;

/**
 * Description of EmployeeRegistration
 *
 * @author laxman
 */
class EmployeeRegistration {
    
    private $name,$email,$department,$userId;
    
    function __construct($data) {
        $this->setUserId($data['userid']);
        $this->setName($data['name']);
        $this->setEmail($data['email']);
        $this->setDepartment($data['department']);
        return $this;
    }
            
    function getUserId() {
        return $this->userId;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }
    
    function getName() {
        return $this->name;
    }

    function getEmail() {
        return $this->email;
    }

    function getDepartment() {
        return $this->department;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setDepartment($department) {
        $this->department = $department;
    }


}
