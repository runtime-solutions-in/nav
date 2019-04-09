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
		header('location:videoAdd.php?msg=11'); exit();
	}
    

	$table = '__videos';

	if(isset($_POST)) {		//print_r($_POST); die();
		if($_POST['hiddenId']!="" && $_POST['hiddenId']>0){
			$hiddenId = input_filter_data($_POST['hiddenId'],'integer'); 
			$IdURL = "&id=".MyEncoder($hiddenId);
		}else{
			$hiddenId = "";
			$IdURL = "";
		}
		$fld_videoType = input_filter_data($_POST['fld_videoType'],'string');
		
		if (alphanumeric_match($fld_videoType) == false) {
			header('location:videoAdd.php?msg=2'.$IdURL); exit();
		}
        
		$fld_videoTitle = input_filter_data($_POST['fld_videoTitle'],'string');
        
		if (alphanumeric_match($fld_videoTitle) == false) {
			header('location:videoAdd.php?msg=3'.$IdURL); exit();
		}
        
        $fld_download = input_filter_data($_POST['fld_download'],'string');
        
		if (alphanumeric_match($fld_download) == false) {
			header('location:videoAdd.php?msg=3'.$IdURL); exit();
		}
        
        //print_r($_POST);die();
		if($_POST['photo_doc']==''){die('Thumbnail is not uploded');}
		if($_POST['photo_big_doc']==''){die('Big Photo is not uploded');}
        
		$photo_doc = $_POST['photo_doc'];
		$photo_big_doc = $_POST['photo_big_doc'];

		
		if ($fld_videoType != '' ) {	
			
			if($table == "__videos"){
				if ($hiddenId == 0) {
					//echo 'navin';die();
                    $sql = "INSERT INTO ".$table." SET fld_videoType = '".$fld_videoType."', fld_videoTitle = '".$fld_videoTitle."', fld_videoThumb = '".$photo_doc."', fld_videoFile = '".$photo_big_doc."', fld_download = '".$fld_download."', ipAddress = '".get_ip_address()."'";//die();
                    
					$insert	= $db->query($sql);
					 $lastId = intval($insert);
					if ($lastId <= 0) {
						header('location:videoAdd.php?msg=5');exit();
					} else {
						header('location:videoAdd.php?msg=6');exit();
					}
					
					
					
				} else {		// Update
					$sql = "UPDATE ".$table." SET fld_videoType = '".$fld_videoType."', fld_videoTitle = '".$fld_videoTitle."', fld_videoThumb = '".$photo_doc."', fld_videoFile = '".$photo_big_doc."', fld_download = '".$fld_download."', ipAddress = '".get_ip_address()."'";
                    
					$upRow	= $db->query($sql);
					if ($upRow == -1) {
						header('location:videoAdd.php?msg=7'.$IdURL);
					} else {
						header('location:videoAdd.php?msg=8'.$IdURL);
					}
				}
			}else{
				//echo 'Invalid Input data';	
				header('location:videoAdd.php.php?msg=9'.$IdURL);
			}//if($table == "tbl_dealer"){
						
			
		}else { echo 'Invalid Input data'; header('location:videoAdd.php?msg=4'); exit(); }
			
	}else {
		header('location:videoAdd.php?msg=12'); exit();
	}	
	
?>	