<?php
	ob_start();
	session_start();
	
	//require 'include/connection.php';
	require 'include/constants.php';
	require 'include/functions.php';
	require 'db/Db.class.php'; 
	
	if ($_SESSION['USER_ID'] == '' || $_SESSION['USER_ID'] == 0) { header('location:login.php'); }
	
	//if(in_array('3',$cookieRightsArr)){}else{ header('location:../index.php'); exit(); }
	
	if (!strstr($_SERVER['HTTP_REFERER'], DOMAIN_PATH)) { 
		echo 0; exit();
	}
		
	if(isset($_POST)) {		
			
		/*echo '<br>tbl=='.$tbl = MyDecoder($_POST['tbl']);
		echo '<br>fld=='.$fld = input_filter_data(MyDecoder($_POST['fld']),'string');
		echo '<br>val=='.$val = input_filter_data(MyDecoder($_POST['val']),'integer'); 
		
		echo '<br>fldUpdate=='.$fldUpdate = input_filter_data(MyDecoder($_POST['fldUpdate']),'string');
		echo '<br>valUpdate=='.$valUpdate = input_filter_data($_POST['valUpdate'],'integer');  */
		///exit();
		//if ($tbl == 'tbl_dealer' || $tbl == 'tbl_event') {
			
		$tbl = MyDecoder($_POST['tbl']);
		$fld = input_filter_data(MyDecoder($_POST['fld']),'string');
		$val = input_filter_data(MyDecoder($_POST['val']),'integer'); 
		$fldUpdate = input_filter_data(MyDecoder($_POST['fldUpdate']),'string');
		$valUpdate = input_filter_data($_POST['valUpdate'],'string'); 	
			
			if ($tbl != '' && $fld != '' && $val != 0 && $fldUpdate != '' && $valUpdate != 0) {
							
				//$upRow = $db->update($tbl, array($fldUpdate=>$valUpdate), array('%d'), array($fld=>$val), array('%d'));
				//print_r(array("status"=>$status,"id"=>$val)); exit();
				//$update		=  $db->query("UPDATE ".$tbl." SET status = :status WHERE id = :id",array("status"=>$valUpdate,"id"=>$val));  
				$update		=  $db->query("UPDATE ".$tbl." SET fld_status = :fld_status WHERE fld_id = :fld_id",array("fld_status"=>$status,"fld_id"=>$val));  
				 
				
				if ($update == -1) {
					echo 0;
				} else {
					echo 1;
					// log table Update
				//  $logs	= $db->query("INSERT INTO  ultra_logs_tbl SET action = 'delete' ,action_taken_by = ".$_SESSION['USER_ID'].",action_taken_to = :action_taken_to,ipAddress = '".get_ip_address()."'", array("action_taken_to"=>$val)); 
				}
			} else {
				echo 0;
			}
		}
		
	/*} else {
		echo 0;
	}*/
	
?>	