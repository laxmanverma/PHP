<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Services\Services;
use AppBundle\Model\UserRegistrationModel;
use AppBundle\Model\LoginDetails;
use AppBundle\Services\ViewService;
use AppBundle\Services\DeleteService;
use AppBundle\Model\EmployeeRegistration;
use AppBundle\Services\AddEmployeeService;

/**
 * Description of UserRegistrationController
 *
 * @author laxman
 */

/**
 * @Route("/userRegistration")
 */
class UserRegistrationController extends Controller {
    
    private $request;

    function __construct(){
        
        $this->request = Request::createFromGlobals();
		
    }
    
    /**
     * @Route("/register")
     */
    public function registerAction(){

        return $this->render('default/register.html.smarty');
        
    }
    
    /**
     * @Route("/submit")
     */
    public function submitUserDetailsAction(Services $services){
        
        $data = array(
            'name' => $this->request->request->get('uname'),				
            'password' => $this->request->request->get('psw'),
            'email' => $this->request->request->get('email')
	);
        
        $userDetails = new UserRegistrationModel($data);
        $services->registrationService($userDetails);
        
        return $this->redirect('log'); 
        
    }

     /**
     * @Route("/log")
     */
     public function logAction(){
        return $this->render('default/login.html.smarty');
    }
    
    /**
     * @Route("/login")
     */
    public function logVerificationAction(Services $services){
        
        $data = array(
            'user' => $this->request->request->get('uname'),
            'password' => $this->request->request->get('psw')
        );
        $loginDetails = new LoginDetails($data);
        $array = $services->loginService($loginDetails);
        
        $userId = $array[1];
        
//        $this->viewEmployeeAction($userId);
 
        $viewServices = new ViewService();
        $details = $viewServices->viewService($userId);
        
        return $this->render('default/welcome1.html.smarty',array('data' => $details));
        
//        return $this->redirect('welcome');
    }

     /**
     * @Route("/delete")
     */
    public function delete(DeleteService $delete){
        
        $employeeId = $this->request->request->get('ID');
        $status = $delete->deleteEmployee($employeeId);
        
        if($status == "Success"){
            return $this->redirect('welcome');
        }
        else {echo "alert";}
    }
    
    /**
     * @Route("/addEmployee")
     */
    public function addEmployee(AddEmployeeService $addEmployee){
//        session_start();
        $userId=$_SESSION['userId'];
        $data = array(
            'userid' => $userId,
            'name' => $this->request->request->get('name'),				
            'email' => $this->request->request->get('email'),
            'department' => $this->request->request->get('dep')
	);
        
        $employeeDetails = new EmployeeRegistration($data);
        $addEmployee->registrationService($employeeDetails);
        
        return $this->redirect('welcome'); 
    }
    
    /**
     * @Route("/welcome")
     */
    public function viewEmployeeAction(){
        $userId=$_SESSION['userId'];
        $viewServices = new ViewService();
        $details = $viewServices->viewService($userId);
        
        return $this->render('default/welcome1.html.smarty',array('data' => $details));
        
    }

    /**
     * @Route("/logout")
     */
    public function logout(){
        return $this->render('default/login.html.smarty');
    }
}
