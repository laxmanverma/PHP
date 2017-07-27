<?php

error_reporting(E_ALL);
ini_set('display_error',1);

//include("database.php");
include("Dao/RunQuery.php");
require_once('lib/smtemplate.php');

class Register{
    
    var $user_name,$user_email,$user_pass;
    var $dao;
    
    function setter(){
        
        $this->user_name = $_POST['uname'];
        $this->user_pass = $_POST['psw'];
        $this->user_email = $_POST['email'];
//        echo $this->user_name;
        if(isset($_POST['submit'])){
            
            $this->dao = new RunQuery();
            $this->dao->register($this->user_name, $this->user_pass, $this->user_email);
            
        }
        
        $tpl = new SMTemplate();
        $tpl->render('register');

    }
    
}

$register = new Register();
$register->setter();


