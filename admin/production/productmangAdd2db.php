<?php
	ob_start();
	session_start();
	require 'include/constants.php';
	require 'include/functions.php';
	require 'db/Db.class.php';
	//echo '<pre>';
	//print_r($_POST);die();
	if ($_SESSION['USER_ID'] == '' || $_SESSION['USER_ID'] == 0) { header('location:login.php'); }
	if ($_SESSION['LOGIN_ROLE'] == 1 ){}else if($_SESSION['LOGIN_ROLE'] == 2){}else{ header('location:admin.php'); exit(); }
	
	$token = $_SESSION['TOKEN'];
	unset($_SESSION['TOKEN']);
	session_write_close();
	if (!strstr($_SERVER['HTTP_REFERER'], DOMAIN_PATH)) { 
		header('location:productmangAdd.php?msg=11'); exit();
	}

	$table = '__productMang';
	if(isset($_POST)) {		//print_r($_POST); die();
		if($_POST['hiddenId']!="" && $_POST['hiddenId']>0){
			$hiddenId = input_filter_data($_POST['hiddenId'],'integer'); 
			$IdURL = "&id=".MyEncoder($hiddenId);
		}else{
			$hiddenId = "";
			$IdURL = "";
		}
		$notification = $_POST['notification'];
		$selectlang = $_POST['selectlang'];//notification
		$productid = $_POST['productid'];
		$gallery = serialize($_POST['gallery']);
		$gallerytitle = $_POST['gallerytitle'];
		
		$brochuretitle = $_POST['brochuretitle'];
		$brochure_doc = $_POST['brochure_doc'];
		
		$videotitle = input_filter_data($_POST['videotitle'],'string');
		$vediolink = input_filter_data($_POST['vediolink'],'string');
		$video_doc = input_filter_data($_POST['video_doc'],'string');
		
		$input_array_spec1 = $_POST['input_array_spec1'];
		$input_array_dec1 = $_POST['input_array_dec1'];
		$input_array_spec2 = $_POST['input_array_spec2'];
		$input_array_dec2 = $_POST['input_array_dec2'];
		$input_array_spec3 = $_POST['input_array_spec3'];
		$input_array_dec3 = $_POST['input_array_dec3'];
		$input_array_spec4 = $_POST['input_array_spec4'];
		$input_array_dec4 = $_POST['input_array_dec4'];
		$input_array_spec5 = $_POST['input_array_spec5'];
		$input_array_dec5 = $_POST['input_array_dec5'];
		$input_array_spec6 = $_POST['input_array_spec6'];
		$input_array_dec6 = $_POST['input_array_dec6'];
		$input_array_spec7 = $_POST['input_array_spec7'];
		$input_array_dec7 = $_POST['input_array_dec7'];
		$input_array_spec8 = $_POST['input_array_spec8'];
		$input_array_dec8 = $_POST['input_array_dec8'];
		$input_array_spec9 = $_POST['input_array_spec9'];
		$input_array_dec9 = $_POST['input_array_dec9'];
		$input_array_spec10 = $_POST['input_array_spec10'];
		$input_array_dec10 = $_POST['input_array_dec10'];
		
		$strS = '';
		$strS .= "input_array_spec1 = '".$input_array_spec1."', input_array_dec1 = '".$input_array_dec1."',";
		$strS .= "input_array_spec2 = '".$input_array_spec2."', input_array_dec2 = '".$input_array_dec2."',";
		$strS .= "input_array_spec3 = '".$input_array_spec3."', input_array_dec3 = '".$input_array_dec3."',";
		$strS .= "input_array_spec4 = '".$input_array_spec4."', input_array_dec4 = '".$input_array_dec4."',";
		$strS .= "input_array_spec5 = '".$input_array_spec5."', input_array_dec5 = '".$input_array_dec5."',";
		$strS .= "input_array_spec6 = '".$input_array_spec6."', input_array_dec6 = '".$input_array_dec6."',";
		$strS .= "input_array_spec7 = '".$input_array_spec7."', input_array_dec7 = '".$input_array_dec7."',";
		$strS .= "input_array_spec8 = '".$input_array_spec8."', input_array_dec8 = '".$input_array_dec8."',";
		$strS .= "input_array_spec9 = '".$input_array_spec9."', input_array_dec9 = '".$input_array_dec9."',";
		$strS .= "input_array_spec10 = '".$input_array_spec10."', input_array_dec10 = '".$input_array_dec10."',";
		
		
		$product_array_file_doc = input_filter_data($_POST['product_array_file_doc'],'string');
		$product_name = input_filter_data($_POST['product_name'],'string');
		$product_array_file_doc2 = input_filter_data($_POST['product_array_file_doc2'],'string');
		$product_name2 = input_filter_data($_POST['product_name2'],'string');
		$product_array_file_doc3 = input_filter_data($_POST['product_array_file_doc3'],'string');
		$product_name3 = input_filter_data($_POST['product_name3'],'string');
		$product_array_file_doc4 = input_filter_data($_POST['product_array_file_doc4'],'string');
		$product_name4 = input_filter_data($_POST['product_name4'],'string');
		$product_array_file_doc5 = input_filter_data($_POST['product_array_file_doc5'],'string');
		$product_name5 = input_filter_data($_POST['product_name5'],'string');
		$product_array_file_doc6 = input_filter_data($_POST['product_array_file_doc6'],'string');
		$product_name6 = input_filter_data($_POST['product_name6'],'string');
		$product_array_file_doc7 = input_filter_data($_POST['product_array_file_doc7'],'string');
		$product_name7 = input_filter_data($_POST['product_name7'],'string');
		$product_array_file_doc8 = input_filter_data($_POST['product_array_file_doc8'],'string');
		$product_name8 = input_filter_data($_POST['product_name8'],'string');
		$product_array_file_doc9 = input_filter_data($_POST['product_array_file_doc9'],'string');
		$product_name9 = input_filter_data($_POST['product_name9'],'string');
		$product_array_file_doc10 = input_filter_data($_POST['product_array_file_doc10'],'string');
		$product_name10 = input_filter_data($_POST['product_name10'],'string');
		$product_array_file_doc11 = input_filter_data($_POST['product_array_file_doc11'],'string');
		$product_name11 = input_filter_data($_POST['product_name11'],'string');
		$product_array_file_doc12 = input_filter_data($_POST['product_array_file_doc12'],'string');
		$product_name12 = input_filter_data($_POST['product_name12'],'string');
		$product_array_file_doc13 = input_filter_data($_POST['product_array_file_doc13'],'string');
		$product_name13 = input_filter_data($_POST['product_name13'],'string');
		$product_array_file_doc14 = input_filter_data($_POST['product_array_file_doc14'],'string');
		$product_name14 = input_filter_data($_POST['product_name14'],'string');
		$product_array_file_doc15 = input_filter_data($_POST['product_array_file_doc15'],'string');
		$product_name15 = input_filter_data($_POST['product_name15'],'string');
		$str = ',';
		$str .= "product_array_file_doc = '".$product_array_file_doc."', product_name = '".$product_name."',";
		$str .= "product_array_file_doc2 = '".$product_array_file_doc2."', product_name2 = '".$product_name2."',";
		$str .= "product_array_file_doc3 = '".$product_array_file_doc3."', product_name3 = '".$product_name3."',";
		$str .= "product_array_file_doc4 = '".$product_array_file_doc4."', product_name4 = '".$product_name4."',";
		$str .= "product_array_file_doc5 = '".$product_array_file_doc5."', product_name5 = '".$product_name5."',";
		$str .= "product_array_file_doc6 = '".$product_array_file_doc6."', product_name6 = '".$product_name6."',";
		$str .= "product_array_file_doc7 = '".$product_array_file_doc7."', product_name7 = '".$product_name7."',";
		$str .= "product_array_file_doc8 = '".$product_array_file_doc8."', product_name8 = '".$product_name8."',";
		$str .= "product_array_file_doc9 = '".$product_array_file_doc9."', product_name9 = '".$product_name9."',";
		$str .= "product_array_file_doc10 = '".$product_array_file_doc10."', product_name10 = '".$product_name10."',";
		$str .= "product_array_file_doc11 = '".$product_array_file_doc11."', product_name11 = '".$product_name11."',";
		$str .= "product_array_file_doc12 = '".$product_array_file_doc12."', product_name12 = '".$product_name12."',";
		$str .= "product_array_file_doc13 = '".$product_array_file_doc13."', product_name13 = '".$product_name13."',";
		$str .= "product_array_file_doc14 = '".$product_array_file_doc14."', product_name14 = '".$product_name14."',";
		$str .= "product_array_file_doc15 = '".$product_array_file_doc15."', product_name15 = '".$product_name15."',";
		//$strTrm = rtrim($str,',');
		if ($hiddenId == 0) {
			if(isset($notification) ){
				if($notification=='on'){
					$notify = ", description = 'A new product hass been added', ";
					$sqlq = "INSERT INTO __notificationProduct SET selectlang = '".$selectlang."', productid = '".$productid."' $notify ipAddress = '".get_ip_address()."'";//die();
					$insertq = $db->query($sqlq);
				}else{
					$notify = '';
					$insertq = '0';
				}
			}else{
				$insertq = '0';	
			}
		}
		
		
		if ($table != '' ) {	
			
			if($table == "__productMang"){
				if ($hiddenId == 0) {
					//echo 'navin';die();
					$sql = "INSERT INTO ".$table." SET $strS gallery = '".$gallery."', selectlang = '".$selectlang."', productid = '".$productid."', videotitle = '".$videotitle."', vediolink = '".$vediolink."', video_doc = '".$video_doc."',  brochuretitle = '".$brochuretitle."', brochure_doc = '".$brochure_doc."', notification = '".$insertq."' ".$str."  ipAddress = '".get_ip_address()."'";//die();
					$insert	= $db->query($sql);
					 $lastId = intval($insert);
					if ($lastId <= 0) {
						header('location:productmangAdd.php?msg=5');exit();
					} else {
						header('location:productmangAdd.php?msg=6');exit();
					}
					
					
				} else {		// Update
					$sql = "UPDATE ".$table." SET $strS gallerytitle = '".$gallerytitle."', gallery = '".$gallery."', selectlang = '".$selectlang."', productid = '".$productid."', videotitle = '".$videotitle."', vediolink = '".$vediolink."', video_doc = '".$video_doc."',  brochuretitle = '".$brochuretitle."', brochure_doc = '".$brochure_doc."', notification = '".$insertq."' $str ipAddress = '".get_ip_address()."' WHERE fld_id = '".$hiddenId."'";//die();
					$upRow	= $db->query($sql);
					if ($upRow == -1) {
						header('location:productmangAdd.php?msg=7'.$IdURL);
					} else {
						header('location:productmangAdd.php?msg=8'.$IdURL);
					}
				}
			}else{
				//echo 'Invalid Input data';	
				header('location:productmangAdd.php.php?msg=9'.$IdURL);
			}//if($table == "tbl_dealer"){
						
			
		}else { echo 'Invalid Input data'; header('location:productmangAdd.php?msg=4'); exit(); }
			
	}else {
		header('location:productmangAdd.php?msg=12'); exit();
	}	
	
?>	