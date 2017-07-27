<?php

error_reporting(E_ALL);
ini_set('display_error',1);

include("Dao/RunQuery.php");
require_once('lib/smtemplate.php');

/**
 * Description of Delete
 *
 * @author laxman
 */
class Delete {
    
    var $dao;

    function del(){
        
        $id = $_POST['ID'];
        $this->dao = new RunQuery();
        $this->dao->deleteEmp($id);
        
        header('Location: http://myproject.dev/Ems/Welcome.php');
//        $tpl = new SMTemplate();
//        $tpl->render('welcome');
        
    }
    
}

$delete = new Delete();
$delete->del();
