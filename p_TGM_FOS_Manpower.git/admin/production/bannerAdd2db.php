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
		header('location:bannerAdd.php?msg=11'); exit();
	}
    

	$table = '__banner';

	if(isset($_POST)) {		//print_r($_POST); die();
		if($_POST['hiddenId']!="" && $_POST['hiddenId']>0){
			$hiddenId = input_filter_data($_POST['hiddenId'],'integer'); 
			$IdURL = "&id=".MyEncoder($hiddenId);
		}else{
			$hiddenId = "";
			$IdURL = "";
		}
        
		$fld_bannerState = input_filter_data($_POST['fld_bannerState'],'string');
		
		if (alphanumeric_match($fld_bannerState) == false) {
			header('location:bannerAdd.php?msg=2'.$IdURL); exit();
		}
        
		$fld_bannerCaption = input_filter_data($_POST['fld_bannerCaption'],'string');
        
		if (alphanumeric_match($fld_bannerCaption) == false) {
			header('location:bannerAdd.php?msg=3'.$IdURL); exit();
		}
        
        $fld_bannerType = input_filter_data($_POST['fld_bannerType'],'string');
        
		if (alphanumeric_match($fld_bannerType) == false) {
			header('location:bannerAdd.php?msg=4'.$IdURL); exit();
		}
        
         $fld_bannerId = input_filter_data($_POST['fld_bannerId'],'string');
        
		if (alphanumeric_match($fld_bannerId) == false) {
			header('location:bannerAdd.php?msg=45'.$IdURL); exit();
		}
        
        //print_r($_POST);die();
		if($_POST['photo_doc']==''){die('Thumbnail is not uploded');}
		//if($_POST['photo_big_doc']==''){die('Big Photo is not uploded');}
		$photo_doc = $_POST['photo_doc'];
		
		//$photo_big_doc = $_POST['photo_big_doc'];

		
		if ($fld_bannerState != '' ) {	
			
			if($table == "__banner"){
				if ($hiddenId == 0) {
					//echo 'navin';die();
                    $sql = "INSERT INTO ".$table." SET fld_bannerState = '".$fld_bannerState."', fld_bannerImage = '".$photo_doc."', fld_bannerCaption = '".$fld_bannerCaption."', fld_bannerType = '".$fld_bannerType."', fld_bannerId = '".$fld_bannerId."', ipAddress = '".get_ip_address()."'";//die();
                    
                    $insert	= $db->query($sql);
					 $lastId = intval($insert);
					if ($lastId <= 0) {
						header('location:bannerAdd.php?msg=5');exit();
					} else {
						header('location:bannerAdd.php?msg=6');exit();
					}
					
					
				} else {		// Update
					$sql = "UPDATE ".$table." SET fld_bannerState = '".$fld_bannerState."', fld_bannerImage = '".$photo_doc."', fld_bannerCaption = '".$fld_bannerCaption."', fld_bannerType = '".$fld_bannerType."', fld_bannerId = '".$fld_bannerId."', ipAddress = '".get_ip_address()."'";
                    
					$upRow	= $db->query($sql);
					if ($upRow == -1) {
						header('location:bannerAdd.php?msg=7'.$IdURL);
					} else {
						header('location:bannerAdd.php?msg=8'.$IdURL);
					}
				}
			}else{
				//echo 'Invalid Input data';	
				header('location:bannerAdd.php.php?msg=9'.$IdURL);
			}//if($table == "tbl_dealer"){
						
			
		}else { echo 'Invalid Input data'; header('location:bannerAdd.php?msg=4'); exit(); }
			
	}else {
		header('location:bannerAdd.php?msg=12'); exit();
	}	
	
?>	