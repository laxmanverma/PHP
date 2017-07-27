<?php

error_reporting(E_ALL);
ini_set('display_error',1);

@session_start();

/**
 * Description of AddEmp
 *
 * @author laxman
 */

include("Dao/RunQuery.php");
require_once('lib/smtemplate.php');

class AddEmp {
    
    var $emp_name,$emp_dep,$emp_email;
    var $dao;
    
    function setter(){
        
        $this->emp_name= $_POST['name'];
        $this->emp_email= $_POST['email'];
        $this->emp_dep= $_POST['dep'];
        
        if(isset($_POST['submit'])){
            
            $this->dao = new RunQuery();
            $this->dao->addEmp($this->emp_name, $this->emp_email, $this->emp_dep);
            header('Location: http://myproject.dev/Ems/Welcome.php');
            
        }
        
        echo "<script>alert(added successfully)";
        
//        $tpl = new SMTemplate();
//        $tpl->render('welcome');
        
    }
}

$add = new AddEmp();
$add->setter();
