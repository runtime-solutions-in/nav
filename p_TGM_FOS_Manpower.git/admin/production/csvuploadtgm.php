<?php
	ob_start();
	session_start();
	require 'include/constants.php';
	require 'include/functions.php';
	require 'db/Db.class.php';
	$table = '__tgmUserData';
		
	$handle = fopen('/var/www/html/neevNav/tgmdata.csv', "r");
	
	$i=0;
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		
		$i++;
		if($i==1){ continue; }
		//echo '<pre>';print_r($data);
		$fld_delearregion = $data['0']; 
		$fld_deleararea = $data['1']; 
		$fld_assDealer = $data['2']; 
		$fld_assDealerCode = $data['3']; 
		$fld_accuntType = $data['4'];
		$fld_accountStatus = $data['5']; 
		$fld_accountCode = $data['6']; 
		$fld_accountName = $data['7']; 
		$fld_phoneNo = $data['8']; 
		$fld_district = $data['9']; 
		$fld_taluka = $data['10'];
		$fld_state = $data['11']; 
		$fld_tsmid = $data['12'];  

		$sql = "select * from ".$table." where fld_phoneNo='".$fld_phoneNo."'";//die();
		$res = $db->query($sql);			
		$cnt = count($res);//die();
		if($cnt==0){ 
			$lastId = $db->query("insert into ".$table." SET 
									  fld_delearregion = '".$fld_delearregion."',
									  fld_deleararea = '".$fld_deleararea."',
									  fld_assDealer = '".$fld_assDealer."',
									  fld_assDealerCode = '".$fld_assDealerCode."',
									  fld_accuntType = '".$fld_accuntType."',
									  fld_accountStatus = '".$fld_accountStatus."',
									  fld_accountCode = '".$fld_accountCode."',
									  fld_accountName = '".$fld_accountName."',
									  fld_phoneNo = '".$fld_phoneNo."',
									  fld_district = '".$fld_district."',
									  fld_taluka = '".$fld_taluka."',
									  fld_state = '".$fld_state."',
									  fld_tsmid = '".$fld_tsmid."'"
									  );  
			if($lastId>0){
			$uid = '72756e74696d6532303135';
			$nav = $fld_phoneNo;
			$pin = 'e7f01bb384c1e694b5e1d8720ec62505';
			$mobile = $fld_phoneNo;
			$sender = 'TERLEW';
			
			$tempid = '103063';    
			$msg = urlencode('Your registration for ABCD Masterclass is successful. Click on the link below to scan the QR code at the venue. '.$nav);
			
			$messageId = file_get_contents('http://smsalertbox.com/api/sms.php?uid='.$uid.'&pin='.$pin.'&sender='.$sender.'&route=5&tempid='.$tempid.'&mobile='.$mobile.'&message='.$msg);		
			$qry = $db->query("UPDATE ".$table." SET 
									  fld_otpflag = '1'
									  WHERE fld_id='".$lastId."'"
								);  		
			}

		}else{
				$qry = $db->query("UPDATE ".$table." SET 
									  fld_delearregion = '".$fld_delearregion."',
									  fld_deleararea = '".$fld_deleararea."',
									  fld_assDealer = '".$fld_assDealer."',
									  fld_assDealerCode = '".$fld_assDealerCode."',
									  fld_accuntType = '".$fld_accuntType."',
									  fld_accountStatus = '".$fld_accountStatus."',
									  fld_accountCode = '".$fld_accountCode."',
									  fld_accountName = '".$fld_accountName."',
									  fld_phoneNo = '".$fld_phoneNo."',
									  fld_district = '".$fld_district."',
									  fld_taluka = '".$fld_taluka."',
									  fld_state = '".$fld_state."',
									  fld_tsmid = '".$fld_tsmid."'
									  WHERE fld_phoneNo='".$fld_phoneNo."'"
									  );  
		}

			

	}
	
	
?>	