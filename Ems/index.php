<?php
error_reporting(E_ALL);
ini_set('display_error',1);

require_once('lib/smtemplate.php');
 
$tpl = new SMTemplate();
$tpl->render('register');

