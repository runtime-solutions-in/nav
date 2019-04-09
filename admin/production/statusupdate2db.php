<?php
	ob_start();
	session_start();
	
//	require 'include/connection.php';
	require 'include/constants.php';
	require 'include/functions.php';
	require 'db/Db.class.php'; 
	
	if ($_SESSION['USER_ID'] == '' || $_SESSION['USER_ID'] == 0) { header('location:login.php'); }
	
	//if(in_array('3',$cookieRightsArr)){}else{ header('location:../index.php'); exit(); }
	
	if (!strstr($_SERVER['HTTP_REFERER'], DOMAIN_PATH)) { 
		echo 0; exit();
	}
		
	if(isset($_POST)) {		
			
		$tbl = MyDecoder($_POST['table']);
	    $fld = MyDecoder($_POST['fld']);
		$val = input_filter_data(MyDecoder($_POST['val']),'integer');
		$status = input_filter_data($_POST['status'],'string');
		if ($tbl != '' && $fld != '' && $val != 0 && $status != '') {
						
			//$upRow = $db->update($tbl, array('status'=>$status), array('%d'), array('id'=>$val), array('%d'));
			 //$upRow = $db->update($tbl, array('status'=>$status), array('%d'), array('id'=>$val), array('%d'));  
			// $upRow	= $db->query("UPDATE ".$table." SET status = :status  WHERE id = :id ", array('status'=>$status,'id'=>$val)); 
			
			 	$update		=  $db->query("UPDATE ".$tbl." SET fld_status = :fld_status WHERE fld_id = :fld_id",array("fld_status"=>$status,"fld_id"=>$val));  
				
				// log table Update
				if($status = '1'){$action = 'active';}else{$action = 'deactive';}	
			   /* $logs	= $db->query(" INSERT INTO  ultra_logs_tbl SET action = '".$action."' ,action_taken_by = ".$_SESSION['USER_ID'].",action_taken_to = :action_taken_to,ipAddress = '".get_ip_address()."'", array("action_taken_to"=>$val));  
			*/
			
			//var_dump($upRow);
			if ($update == -1) {
				return false;
			} else {
				return true;
			}
			
		} else {
			return false;
		}
	}else{
		return false;
	}
	
?>	