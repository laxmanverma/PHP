<?php


namespace AppBundle\Dao;
use AppBundle\Model\EmployeeRegistration;
use \PDO;
/**
 * Description of EmployeeDao
 *
 * @author laxman
 */
class EmployeeDao {
    private $status,$connection;
    
    function __construct() {
        try{
            $this->connection = new PDO("mysql:host=localhost;dbname=secTask;charset=utf8",'root','root');
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function insert(EmployeeRegistration $employeeData){
        $userId = $employeeData->getUserId();
        $name = $employeeData->getName();
        $email= $employeeData->getEmail();
        $department = $employeeData->getDepartment();
        
        try{
            $stmt = $this->connection->prepare("INSERT INTO employee (user_id,emp_name,emp_email,emp_dep) VALUES (:id,:name,:email,:department)");
            $stmt->execute(['id'=> $userId,'name'=> $name,'email'=>$email,'department'=>$department]);
            $status = "Success";
            
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            $status = "Failure";
        }
        return $status;
    }

    public function getEmployeeDetails($userID){
        
        try{
            $stmt= $this->connection->prepare("select * from employee where user_id=:id");
            $rows= $stmt->execute(['id'=>$userID]);
            if ($rows > 0) 
            {
		$data = $stmt->fetchAll();
//                var_dump($data);die;
		return $data;
            }
            
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function deleteEmployee($employeeId){
        
        try{
            $stmt = $this->connection->prepare("delete from employee where emp_id=:id");
            $stmt->execute(['id'=>$employeeId]);
            $status = "Success";
            
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            $status = "Failure";
        }
        return $status;
    }
}
