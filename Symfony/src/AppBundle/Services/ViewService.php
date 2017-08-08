<?php

namespace AppBundle\Services;

use AppBundle\Dao\EmployeeDao;
/**
 * Description of ViewService
 *
 * @author laxman
 */
class ViewService {
    
    private $dao;
    
    function __construct(){			
        $this->dao = new EmployeeDao();
    }
    
    public function viewService($userID){
        
        $data=$this->dao->getEmployeeDetails($userID);
        return $data;
    }
}
