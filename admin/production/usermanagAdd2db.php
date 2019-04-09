<?php
	ob_start();
	session_start();
	require 'include/constants.php';
	require 'include/functions.php';
	require 'db/Db.class.php';
	/*echo '<pre>';
	print_r($_POST);die();*/
	if ($_SESSION['USER_ID'] == '' || $_SESSION['USER_ID'] == 0) { header('location:login.php'); }
	if ($_SESSION['LOGIN_ROLE'] == 1 ){}else if($_SESSION['LOGIN_ROLE'] == 2){}else{ header('location:admin.php'); exit(); }
	
	$token = $_SESSION['TOKEN'];
	unset($_SESSION['TOKEN']);
	session_write_close();
	if (!strstr($_SERVER['HTTP_REFERER'], DOMAIN_PATH)) { 
		header('location:usermanagAdd.php?msg=11'); exit();
	}

	$table = '__userdetail';
	if(isset($_POST)) {		//print_r($_POST); die();
		if($_POST['hiddenId']!="" && $_POST['hiddenId']>0){
			$hiddenId = input_filter_data($_POST['hiddenId'],'integer'); 
			$IdURL = "&id=".MyEncoder($hiddenId);
		}else{
			$hiddenId = "";
			$IdURL = "";
		}
		
		$fld_fname = input_filter_data(strtolower($_POST['fld_fname']),'string');
		$fld_lname = input_filter_data(strtolower($_POST['fld_lname']),'string');
		$fld_email = input_filter_data(strtolower($_POST['fld_email']),'string');
		$fld_phonenumber = $_POST['fld_phonenumber'];
		
		$fld_dob = date('Y-m-d',strtotime($_POST['fld_dob']));
		$fld_anniversary = date('Y-m-d',strtotime($_POST['fld_anniversary']));
		
		$fld_office = input_filter_data(strtolower($_POST['fld_office']),'string');
		$fld_city = input_filter_data(strtolower($_POST['fld_city']),'string');
		$fld_state = input_filter_data(strtolower($_POST['fld_state']),'string');
		
		$fld_country = input_filter_data(strtolower($_POST['fld_country']),'string');
		$fld_pin = input_filter_data(strtolower($_POST['fld_pin']),'string');
		
		if ($fld_phonenumber != '' ) {	
			
			if($table == "__userdetail"){
				if ($hiddenId == 0) {
					//echo 'navin';die();
					$sql = "INSERT INTO ".$table." SET fld_fname = '".$fld_fname."', fld_lname = '".$fld_lname."', fld_email = '".$fld_email."', fld_phonenumber = '".$fld_phonenumber."',
					fld_dob = '".$fld_dob."', fld_anniversary = '".$fld_anniversary."', fld_office = '".$fld_office."', fld_city = '".$fld_city."', fld_state = '".$fld_state."', fld_country = '".$fld_country."', fld_pin = '".$fld_pin."', ipAddress = '".get_ip_address()."'";//die();
					$insert	= $db->query($sql);
					 $lastId = intval($insert);
					if ($lastId <= 0) {
						header('location:usermanagAdd.php?msg=5');exit();
					} else {
						header('location:usermanagAdd.php?msg=6');exit();
					}
					
					
				} else {		// Update
					$sql = "UPDATE ".$table." SET fld_fname = '".$fld_fname."', fld_lname = '".$fld_lname."', fld_email = '".$fld_email."', fld_phonenumber = '".$fld_phonenumber."',
					fld_dob = '".$fld_dob."', fld_anniversary = '".$fld_anniversary."', fld_office = '".$fld_office."', fld_city = '".$fld_city."', fld_state = '".$fld_state."', fld_country = '".$fld_country."', fld_pin = '".$fld_pin."',  ipAddress = '".get_ip_address()."' WHERE fld_id = '".$hiddenId."'";
					$upRow	= $db->query($sql);
					if ($upRow == -1) {
						header('location:usermanagAdd.php?msg=7'.$IdURL);
					} else {
						header('location:usermanagAdd.php?msg=8'.$IdURL);
					}
				}
			}else{
				//echo 'Invalid Input data';	
				header('location:usermanagAdd.php.php?msg=9'.$IdURL);
			}//if($table == "tbl_dealer"){
						
			
		}else { echo 'Invalid Input data'; header('location:usermanagAdd.php?msg=4'); exit(); }
			
	}else {
		header('location:usermanagAdd.php?msg=12'); exit();
	}	
	
?>	