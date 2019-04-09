<?php
	ob_start();
	session_start();
	require 'include/constants.php';
	require 'include/functions.php';
	require 'db/Db.class.php';
	$table = '__tsmUserData';
		
	$handle = fopen('/var/www/html/neevNav/tsmdata.csv', "r");
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
									  fld_tsmid = '".$fld_tsmid."'
									  "
									  );  
			if($lastId>0){
			$uid = '72756e74696d6532303135';
			$pin = 'e7f01bb384c1e694b5e1d8720ec62505';
			$mobile = $fld_phoneNo;
			$sender = 'NEEVOD';
			$tempid = '102544';    
			$msg = urlencode('You have been registered with NEEV Application with mobile number #VAL# Your User ID is - #VAL# Your Password if - #VAL# Download App and start using for access and information- (#VAL#) You will receive this information on registered Email ID with NEEV');
			
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