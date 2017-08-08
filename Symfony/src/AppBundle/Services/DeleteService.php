<?php

namespace AppBundle\Services;

use AppBundle\Dao\EmployeeDao;

/**
 * Description of DeleteService
 *
 * @author laxman
 */
class DeleteService {
    
    private $dao;
    
    function __construct(){			
        $this->dao = new EmployeeDao();
    }
    
    public function deleteEmployee($employeeId){
        
        $status = $this->dao->deleteEmployee($employeeId);
	return $status;
    }
}
