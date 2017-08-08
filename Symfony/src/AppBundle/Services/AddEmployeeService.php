<?php

namespace AppBundle\Services;

use AppBundle\Dao\EmployeeDao;
use AppBundle\Model\EmployeeRegistration;
/**
 * Description of AddEmployeeService
 *
 * @author laxman
 */
class AddEmployeeService {
    
    private $dao;
    
    function __construct(){			
        $this->dao = new EmployeeDao();
    }
    
    public function registrationService(EmployeeRegistration $employeeDetails){
        
        $status = $this->dao->insert($employeeDetails);
	return $status;
        
    }
}
