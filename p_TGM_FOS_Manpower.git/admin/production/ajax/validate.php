<?php
	ob_start();
	session_start();
	
	//require 'include/connection.php';
	require '../include/constants.php';
	require '../include/functions.php';
	require '../db/Db.class.php'; 
	
	if ($_SESSION['USER_ID'] == '' || $_SESSION['USER_ID'] == 0) {
		header('location:login.php'); exit();
	}
	if ($_SESSION['LOGIN_ROLE'] == 1 ){}else if($_SESSION['LOGIN_ROLE'] == 2){}else{ header('location:admin.php'); exit(); }
	$table = '__userdetail'; 
	$requestData = $_REQUEST;
	
	$rowProdData = $db->query('SELECT fld_id FROM '.$table.' WHERE fld_phonenumber = '.$requestData['valid'].' ');
	
	if(count($rowProdData)!='0'){
		echo '1';	
	}else{
		echo '2';
	}
	//print_r($rowProdData);die();
?>