<?php
	ob_start();
	session_start();
	require 'include/constants.php';
	require 'include/functions.php';
	require 'db/Db.class.php';
	//echo $_POST['fld_notiState'];die();
	if ($_SESSION['USER_ID'] == '' || $_SESSION['USER_ID'] == 0) { header('location:login.php'); }
	if ($_SESSION['LOGIN_ROLE'] == 1 ){}else if($_SESSION['LOGIN_ROLE'] == 2){}else{ header('location:admin.php'); exit(); }
	
	$token = $_SESSION['TOKEN'];
	unset($_SESSION['TOKEN']);
	session_write_close();
	if (!strstr($_SERVER['HTTP_REFERER'], DOMAIN_PATH)) { 
		header('location:notificationAdd.php?msg=11'); exit();
	}
    

	$table = '__notification';

	if(isset($_POST)) {		//print_r($_POST); die();
		if($_POST['hiddenId']!="" && $_POST['hiddenId']>0){
			$hiddenId = input_filter_data($_POST['hiddenId'],'integer'); 
			$IdURL = "&id=".MyEncoder($hiddenId);
		}else{
			$hiddenId = "";
			$IdURL = "";
		}
		$fld_notiState = input_filter_data($_POST['fld_notiState'],'string');
		
		if (alphanumeric_match($fld_notiState) == false) {
			header('location:notificationAdd.php?msg=2'.$IdURL); exit();
		}
        
		$fld_notiLang = input_filter_data($_POST['fld_notiLang'],'string');
        
		if (alphanumeric_match($fld_notiLang) == false) {
			header('location:notificationAdd.php?msg=3'.$IdURL); exit();
		}
        
        $fld_notiDesc = input_filter_data($_POST['fld_notiDesc'],'string');
        
		if (alphanumeric_match($fld_notiDesc) == false) {
			header('location:notificationAdd.php?msg=4'.$IdURL); exit();
		}

		
		if ($fld_notiState != '' ) {	
			
			if($table == "__notification"){
				if ($hiddenId == 0) {
					//echo 'navin';die();
                    $sql = "INSERT INTO ".$table." SET fld_notiState = '".$fld_notiState."', fld_notiLang = '".$fld_notiLang."', fld_notiDesc = '".$fld_notiDesc."',   ipAddress = '".get_ip_address()."'";//die();
					 $insert	= $db->query($sql);
					 $lastId = intval($insert);
					if ($lastId <= 0) {
						header('location:notificationAdd.php?msg=5');exit();
					} else {
						$rowCountryAdmin = $db->query("SELECT fld_phoneNo,fld_id FROM `__tgmUserData` where LOWER(fld_state) = '".strtolower($fld_notiState)."'");
						foreach($rowCountryAdmin as $key => $value){
							$uid = '72756e74696d6532303135';
							$pin = 'e7f01bb384c1e694b5e1d8720ec62505';
							$mobile = $value['fld_phoneNo'];
							$sender = 'RUNTST';
							$tempid = '9601';    
							$msg = urlencode('Your registration for ABCD Masterclass is successful. Click on the link below to scan the QR code at the venue. '.$nav);
							
							$messageId = file_get_contents('http://smsalertbox.com/api/sms.php?uid='.$uid.'&pin='.$pin.'&sender='.$sender.'&route=5&tempid='.$tempid.'&mobile='.$mobile.'&message='.$msg);
						}
						header('location:notificationAdd.php?msg=6');exit();
					}
					
					
				} else {		// Update
					$sql = "UPDATE ".$table." SET fld_notiState = '".$fld_notiState."', fld_notiLang = '".$fld_notiLang."', fld_notiDesc = '".$fld_notiDesc."',   ipAddress = '".get_ip_address()."' WHERE fld_id = '".$hiddenId."'";
					$upRow	= $db->query($sql);
					if ($upRow == -1) {
						header('location:notificationAdd.php?msg=7'.$IdURL);
					} else {
						header('location:notificationAdd.php?msg=8'.$IdURL);
					}
				}
			}else{
				//echo 'Invalid Input data';	
				header('location:notificationAdd.php.php?msg=9'.$IdURL);
			}//if($table == "tbl_dealer"){
						
			
		}else { echo 'Invalid Input data'; header('location:notificationAdd.php?msg=4'); exit(); }
			
	}else {
		header('location:notificationAdd.php?msg=12'); exit();
	}	
	
?>	