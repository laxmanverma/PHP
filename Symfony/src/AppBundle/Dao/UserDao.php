<?php

namespace AppBundle\Dao;

use AppBundle\Model\UserRegistrationModel;
use AppBundle\Model\LoginDetails;
use \PDO;
/**
 * Description of Dao
 *
 * @author laxman
 */
        
class UserDao {
    
    private $status,$connection;
    
    function __construct() {
        try{
            $this->connection = new PDO("mysql:host=localhost;dbname=secTask;charset=utf8",'root','root');
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function insert(UserRegistrationModel $userdata){
        $name = $userdata->getName();
        $pass = $userdata->getPass();
        $email = $userdata->getEmail();
        
        try{

            $stmt = $this->connection->prepare("INSERT INTO user (user_name,user_pass,user_email) VALUES(:name,:pass,:email)");
//            $stmt->execute((array)$userdata);
            $stmt->execute(['name'=> $name, 'pass'=>$pass, 'email'=>$email]);
            $status = "Success";
            
        } catch (PDOException $e) {
            echo "Failed Registration !! ";
            $status = "Failure";
        }
        return $status;
        
    }
    
    public function loginAuthentication(LoginDetails $loginData){
        
        $name = $loginData->getUsername();
        $pass = $loginData->getPass();
        
        try{
            
            $stmt = $this->connection->prepare("select * from user where user_name=:name and user_pass=:pass");
            $rows = $stmt->execute(['name'=>$name, 'pass'=>$pass]);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $userID=$stmt->fetch();
            $array[0] = $rows;
            $array[1] = $userID['user_id'];
//            echo $_SESSION['userId'];die;
            
        } catch (PDOException $e) {
            
            echo "Failed Registration !! ";
            
        }
        return $array;
    }
    
}
