<?php

error_reporting(E_ALL);
ini_set('display_error',1);

session_start();

include("database.php");
include("Dao/RunQuery.php");
require_once('lib/smtemplate.php');

/**
 * Description of Login
 *
 * @author laxman
 */
class Login {
    
    var $user_name,$user_pass,$dao;
    
    function loginDetails() {
        
        if(isset($_POST['login'])){
            
            $this->user_name = mysql_real_escape_string($_POST['uname']);
            $this->user_pass = mysql_real_escape_string($_POST['psw']);
            
            $this->dao = new RunQuery();
            $this->dao->loginVer($this->user_name, $this->user_pass);
            
            header('Location: http://myproject.dev/Ems/Welcome.php');
            
        }
        else{
            
            $tpl = new SMTemplate();
            $tpl->render('login');
            
        }
        
    }
}

$login = new Login();
$login->loginDetails();

