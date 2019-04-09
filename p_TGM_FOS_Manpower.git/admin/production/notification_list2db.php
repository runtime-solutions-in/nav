<?php
	ob_start();
	session_start();

	//require 'include/connection.php';
	require 'include/constants.php';
	require 'include/functions.php';
	require 'db/Db.class.php'; 

	if ($_SESSION['USER_ID'] == '' || $_SESSION['USER_ID'] == 0) {
		header('location:login.php'); exit();
	}
    
	if ($_SESSION['LOGIN_ROLE'] == 1 ){}else if($_SESSION['LOGIN_ROLE'] == 2){}else{ header('location:admin.php'); exit(); }

   

	$table = '__notification'; 

	$requestData = $_REQUEST;

	
	// datatable column index  => database column name
	$columns = array(
		0 =>'fld_id',
		1 =>'fld_notiState',
		2 =>'fld_notiLang',
		3 =>'fld_notiDesc',
        4 =>'fld_postdate',
		5=> 'fld_status'
		);
		

	$columns_text = implode(', ',$columns);

   if($_SESSION['LOGIN_ROLE'] == 1){
	// getting total number records without any search
	   $totalData = $db->single('SELECT COUNT(fld_id) AS cnt FROM '.$table.' WHERE `fld_status` != "-1"');
   }else{
	   $totalData = $db->single('SELECT COUNT(fld_id) AS cnt FROM '.$table.' WHERE `fld_status` != "-1"');
   }
	if ($totalData == 0) {	
		//echo 'Error';
	}
		
	if( empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
		if($_SESSION['LOGIN_ROLE'] == 1){
			$sql = "SELECT ".$columns_text." FROM ".$table."  WHERE `fld_status` != '-1'";
		}else{
			$sql = "SELECT ".$columns_text." FROM ".$table."  WHERE `fld_status` != '-1'";
		}
		$resadminUser = $db->query($sql);
	} else {
		if($_SESSION['LOGIN_ROLE'] == 1){
		  $sql = "SELECT ".$columns_text." FROM ".$table."  WHERE fld_status != '-1'";
		}else{
		  $sql = "SELECT ".$columns_text." FROM ".$table."  WHERE fld_status != '-1'";
		}
		$resadminUser = $db->query($sql);
	}
	//echo $sql; exit(); 
	//print_r($resadminUser);
	if (count($resadminUser) == 0) {
			
		// No Records found - Show error message & exit	
			
		$json_data = array(
		"draw"            => 0,   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
		"recordsTotal"    => intval( $totalData ),  // total number of records
		"recordsFiltered" => 0, // total number of records after searching, if there is no searching then totalFiltered = totalData
		"data"            => array()   // total data array
		);
		echo json_encode($json_data);  // send data as json format
		exit();
		
	} else {
		$totalFiltered = count($resadminUser);	//echo 'totalFiltered = '.$totalFiltered;
	}
	// Add order & limit parameter	
	$sql .= " ORDER BY ".$columns[$requestData['order'][0]['column']].' '.$requestData['order'][0]['dir']." LIMIT ".$requestData['start'].",".$requestData['length']."";
	
	if( empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			//$resadminUser = $db->query($sql, array('ST'=>$requestData['start'],'ED'=>$requestData['length']));	
			$resadminUser = $db->query($sql);	
				
	} else {
		//$resadminUser = $db->query($sql, array('title_en' =>$requestData['search']['value'].'%', 'ST'=>$requestData['start'],'ED'=>$requestData['length']));	
		$resadminUser = $db->query($sql);	
	}
	
	if (count($resadminUser) == 0) {	
		//echo 'Error';
	} else {
		$data = array();

		//while($rowadminUser = $resadminUser->fetch_assoc()){
		foreach($resadminUser as $rowadminUser ){		
			$nestedData = array();
			
			 if(intval($rowadminUser['fld_status']) == 1){
				 $status = '<a href="javascript:;" class="toggle-status" data-id="'.MyEncoder($rowadminUser['fld_id']).'" data-table="'. MyEncoder($table).'" data-fld="'.MyEncoder('id').'"  data-action="0"><i class="fa fa-2x fa-check-circle text-success"></i></a>';
			 }else{
				  $status = '<a href="javascript:;" class="toggle-status" data-id="'.MyEncoder($rowadminUser['fld_id']).'" data-table="'. MyEncoder($table).'" data-fld="'.MyEncoder('id').'"  data-action="1">  <i class="fa fa-2x fa-times-circle text-danger"></i></a>';
			 }
			
			$action = '<a href="notificationAdd.php?id='.MyEncoder($rowadminUser['fld_id']).'" class="btn btn-icon-circle btn-nblue"><i class="fa fa-pencil"></i></a>';
		
			//$action .= '&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="btn btn-icon-circle btn-danger delete" data-id="'.MyEncoder($rowadminUser['fld_id']).'" data-table="'.MyEncoder($table).'"  data-fld="'.MyEncoder('id').'" data-status="-1"  data-statusfld= "'.MyEncoder("fld_status").'" ><i class="fa fa-share-square-o" aria-hidden="true"></i></a>'; 
            
            $action .= '&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="btn btn-icon-circle btn-success" ><i class="fa fa-share-square-o" aria-hidden="true"></i></a>'; 
			
			//$thumbImage = "<img src='http://45.114.245.106/neevNav/upload/photo/".$rowadminUser['fld_productthumb']."'";
			$nestedData[] = $rowadminUser['fld_id'];
			$nestedData[] = $rowadminUser['fld_notiState'];
			$nestedData[] = $rowadminUser['fld_notiLang'];
			$nestedData[] = $rowadminUser['fld_notiDesc'];
			$nestedData[] = $rowadminUser['fld_postdate'];
			$nestedData[] = $status;
			$nestedData[] = $action;
					
			$data[] = $nestedData;
			//print_r($data);die();
		}//while
	}//else
	
	$json_data = array(
				"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
				"recordsTotal"    => intval( $totalData ),  // total number of records
				"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
				"data"            => $data   // total data array
				);

	echo json_encode($json_data);  // send data as json format

?>
