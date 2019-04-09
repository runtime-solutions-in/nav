<?php
	ob_start();
	session_start();
	require 'include/constants.php';
	require 'include/functions.php';
	require 'db/Db.class.php';
	
	if ($_SESSION['USER_ID'] == '' || $_SESSION['USER_ID'] == 0) { header('location:login.php'); }
	if ($_SESSION['LOGIN_ROLE'] == 1 ){}else if($_SESSION['LOGIN_ROLE'] == 2){}else{ header('location:admin.php'); exit(); }
	
	$token = $_SESSION['TOKEN'];
	unset($_SESSION['TOKEN']);
	session_write_close();
	if (!strstr($_SERVER['HTTP_REFERER'], DOMAIN_PATH)) { 
		header('location:noticeAdd.php?msg=11'); exit();
	}
    

	$table = '__notice';

	if(isset($_POST)) {		//print_r($_POST); die();
		if($_POST['hiddenId']!="" && $_POST['hiddenId']>0){
			$hiddenId = input_filter_data($_POST['hiddenId'],'integer'); 
			$IdURL = "&id=".MyEncoder($hiddenId);
		}else{
			$hiddenId = "";
			$IdURL = "";
		}
		$fld_nState = input_filter_data($_POST['fld_nState'],'string');
		
		if (alphanumeric_match($fld_nState) == false) {
			header('location:noticeAdd.php?msg=2'.$IdURL); exit();
		}
        
		$fld_nName = input_filter_data($_POST['fld_nName'],'string');
        
		if (alphanumeric_match($fld_nName) == false) {
			header('location:noticeAdd.php?msg=3'.$IdURL); exit();
		}
        
        $fld_ndesc = input_filter_data($_POST['fld_ndesc'],'string');
        
		if (alphanumeric_match($fld_ndesc) == false) {
			header('location:noticeAdd.php?msg=3'.$IdURL); exit();
		}
        
        //print_r($_POST);die();
		if($_POST['photo_doc']==''){die('Thumbnail is not uploded');}
		//if($_POST['photo_big_doc']==''){die('Big Photo is not uploded');}
		$photo_doc = $_POST['photo_doc'];
		
		//$photo_big_doc = $_POST['photo_big_doc'];

		
		if ($fld_nState != '' ) {	
			
			if($table == "__notice"){
				if ($hiddenId == 0) {
					//echo 'navin';die();
                    $sql = "INSERT INTO ".$table." SET fld_nState = '".$fld_nState."', fld_nName = '".$fld_nName."', fld_nThumb = '".$photo_doc."', fld_ndesc = '".$fld_ndesc."', ipAddress = '".get_ip_address()."'";//die();
                    
					$insert	= $db->query($sql);
					 $lastId = intval($insert);
					if ($lastId <= 0) {
						header('location:noticeAdd.php?msg=5');exit();
					} else {
						$rowCountryAdmin = $db->query("SELECT fld_phoneNo,fld_id FROM `__tgmUserData` where LOWER(fld_state) = '".strtolower($fld_nState)."'");
						foreach($rowCountryAdmin as $key => $value){
							$uid = '72756e74696d6532303135';
							$pin = 'e7f01bb384c1e694b5e1d8720ec62505';
							$mobile = $value['fld_phoneNo'];
							$sender = 'RUNTST';
							$tempid = '9601';    
							$msg = urlencode('Your registration for ABCD Masterclass is successful. Click on the link below to scan the QR code at the venue. '.$nav);
							
							$messageId = file_get_contents('http://smsalertbox.com/api/sms.php?uid='.$uid.'&pin='.$pin.'&sender='.$sender.'&route=5&tempid='.$tempid.'&mobile='.$mobile.'&message='.$msg);
						}
						header('location:noticeAdd.php?msg=6');exit();
					}
					
					
				} else {		// Update
					$sql = "UPDATE ".$table." SET fld_nState = '".$fld_nState."', fld_nName = '".$fld_nName."', fld_nThumb = '".$photo_doc."', fld_ndesc = '".$fld_ndesc."', ipAddress = '".get_ip_address()."'";
                    
					$upRow	= $db->query($sql);
					if ($upRow == -1) {
						header('location:noticeAdd.php?msg=7'.$IdURL);
					} else {
						header('location:noticeAdd.php?msg=8'.$IdURL);
					}
				}
			}else{
				//echo 'Invalid Input data';	
				header('location:noticeAdd.php.php?msg=9'.$IdURL);
			}//if($table == "tbl_dealer"){
						
			
		}else { echo 'Invalid Input data'; header('location:noticeAdd.php?msg=4'); exit(); }
			
	}else {
		header('location:noticeAdd.php?msg=12'); exit();
	}	
	
?>	