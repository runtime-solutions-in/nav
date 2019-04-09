<?php
	ob_start();
	session_start();
	session_regenerate_id();
	
	require 'include/constants.php';
	require 'include/functions.php';
	require 'db/Db.class.php'; 
	
		
	if (isset($_POST)) {	
		
		if ($_POST['token'] == $_SESSION['TOKEN']) {
		  unset($_SESSION['TOKEN']);
		} else {
			//echo 'ELSE'; 	//exit();
			header('location:login.php'); exit();
		}
		

		
		$userName = input_filter_data(MyDecoder($_POST['userName']),'string');	
	    $password = input_filter_data(MyDecoder($_POST['password']),'string'); 
	//print_r( array('emailId' => $userName, 'password'=>md5($password))); //exit();
	//echo "SELECT fld_id,fld_userName,fld_countryId,userType,fld_name FROM loginMaster_tbl WHERE fld_userName = '".$userName."' AND `fld_password` = '".md5($password)."' AND userType != 3 AND fld_status = 1 LIMIT 1"; exit();
	
	$resLogin = $db->row('SELECT fld_id,fld_userName,fld_countryId,userType,fld_name FROM loginMaster_tbl WHERE fld_userName = :emailId AND `fld_password` = :password AND userType != 3 AND fld_status = "1" LIMIT 1', array('emailId' => $userName, 'password'=>md5($password)));  
	/*var_dump($resLogin); 
	echo 'count==='.count($resLogin);
	exit();*/
		 if($resLogin == false){
			header('location:login.php?err=2'); exit();
		} else {
				//echo 'Else';
			$_SESSION['USER_ID'] = $resLogin['fld_id'];
			$_SESSION['USER_NAME'] = $resLogin['fld_userName'];
		    $_SESSION['emailId'] = $resLogin['fld_userName']; 
			$_SESSION['fld_name'] =  $resLogin['fld_name']; 
		  //  $_SESSION['mobileNo'] = $resLogin['mobileNo']; 
			$_SESSION['country'] = $resLogin['fld_countryId']; 
			$_SESSION['LOGIN_ROLE'] = $resLogin['userType']; 
		
			session_regenerate_id();
			header('location:admin.php'); 
		}
	} else {
		header('location:login.php?123');
	}
	
?>