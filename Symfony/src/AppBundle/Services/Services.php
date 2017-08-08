<?php

namespace AppBundle\Services;

use AppBundle\Dao\UserDao;
use AppBundle\Model\UserRegistrationModel;
use AppBundle\Model\LoginDetails;
/**
 * Description of services
 *
 * @author laxman
 */

class Services {
    
    private $dao;
    
    function __construct(){			
        $this->dao = new UserDao();
    }
    
    public function registrationService(UserRegistrationModel $userDetails){
        
        $status = $this->dao->insert($userDetails);
	return $status;
        
    }
    
    public function loginService(LoginDetails $loginDetails){
        $array = $this->dao->loginAuthentication($loginDetails);
        if($array[0] == 1){
            $status = "Success";
            $array[0] = $status;

//            $_SESSION['userId']= $array[1];
        }
        else {
            $status = "Failure";
        }
        return $array;
    }
}
