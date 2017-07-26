<?php
error_reporting(E_ALL);
ini_set('display_error',1);

session_start();
session_destroy();

require_once('lib/smtemplate.php');

echo "<script>alert(You are Successfully Logout)</script>";

$tpl = new SMTemplate();
$tpl->render(login);
/**
 * Description of Logout
 *
 * @author laxman
 */
//class Logout {
//    //put your code here
//}
