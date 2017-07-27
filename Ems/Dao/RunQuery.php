<?php

error_reporting(E_ALL);
ini_set('display_error',1);

include("database.php");
require_once('lib/smtemplate.php');

/**
 * Description of RunQuery
 *
 * @author laxman
 */
class RunQuery {
    
//    var $user_name,$user_email,$user_pass;
    
    function register($user_name, $user_pass, $user_email){
        
        $user_pass_enc = md5($user_pass);
        $insert_details = "insert into user (user_name,user_pass,user_email) values ('$user_name','$user_pass_enc','$user_email')";
        mysql_query($insert_details);
        
        echo '<script>alert("insertion successful")</script>';
        
    }
    
    function loginVer($user_name, $user_pass){
        
        $user_pass_enc = md5($user_pass);
        $select_user = "select * from user where user_name='$user_name' and user_pass='$user_pass_enc'";
        $run_user = mysql_query($select_user);
        
        if(mysql_num_rows($run_user)>0){
            
            $user_id = mysql_fetch_array($run_user);
            $_SESSION['userid'] = $user_id['user_id'];
            
            
        }
        else{
            echo "<script>alert('username/password incorrect')</script>";
        }
    }
    
    function addEmp($emp_name, $emp_email, $emp_dep){
        
        $user_id = $_SESSION['userid'];
        
        try{
            $insert_emp = "insert into employee (user_id,emp_name,emp_email,emp_dep) values ('$user_id','$emp_name','$emp_email','$emp_dep')";
            mysql_query($insert_emp);
        }
        catch (Exception $e){
            echo '<script>alert("exception")</script>';
        }
        echo '<script>alert("insertion successful")</script>';
        
    }
    
    function viewEmp(){
        
        $user_id = $_SESSION['userid'];
        
        $select_emp = "select * from employee where user_id ='$user_id'";
        $run_emp = mysql_query($select_emp);

        if(mysql_num_rows($run_emp)>0){
            
            
            
            while ($row_emp = mysql_fetch_array($run_emp)) {
                
                $id = $row_emp['emp_id'];
                $emp_name = $row_emp['emp_name'];
                $emp_email = $row_emp['emp_email'];
                $emp_dep = $row_emp['emp_dep'];
                
                $data[] = array(
                    'ID' => $id,
                    'empname' => $emp_name,
                    'empemail' => $emp_email,
                    'department' => $emp_dep,
                    'delete' => $id,
                );

            }
        }
        return $data;

    }
    
    function deleteEmp($id){
        
        $delete_emp = "delete from employee where emp_id='$id'";
        mysql_query($delete_emp);
        
    }
    
}
