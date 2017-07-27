<?php

error_reporting(E_ALL);
ini_set('display_error',1);

@session_start();

if(!isset($_SESSION['userid'])){
  echo "<script>alert('you are not authorize')</script>";
  header('Location: http://myproject.dev/Ems/Login.php');

}

else{


    /**
     * Description of Welcome
     *
     * @author laxman
     */

    require_once('lib/smtemplate.php');
    include("Dao/RunQuery.php");

    class Welcome {
        
        var $dao;

        function fetchInfo(){
            
            $this->dao = new RunQuery();
            $data = $this->dao->viewEmp();
            
            $tpl = new SMTemplate();
            $tpl->render('welcome', $data);

        }
    }

    $fetch = new Welcome();
    $fetch->fetchInfo();

}