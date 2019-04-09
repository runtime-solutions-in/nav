<?php
	ob_start();
	session_start();
	
	//require 'include/connection.php';
	require '../include/constants.php';
	require '../include/functions.php';
	require '../db/Db.class.php'; 
	
	if ($_SESSION['USER_ID'] == '' || $_SESSION['USER_ID'] == 0) {
		header('location:login.php'); exit();
	}
	if ($_SESSION['LOGIN_ROLE'] == 1 ){}else if($_SESSION['LOGIN_ROLE'] == 2){}else{ header('location:admin.php'); exit(); }
	$table = 'cityMaster_tbl'; 
	$requestData = $_REQUEST;
	$rowProdData = $db->query('SELECT fld_state_id,fld_id,fld_city_name FROM '.$table.' WHERE fld_state_id = '.$requestData['valid'].' ');
	
	if(count($rowProdData)!='0'){
?>
		
        <div class="form-group" id="cityList">
            <label>City</label>
            <select class="form-control" name="fld_city" aria-invalid="false">
                <option value="">Select City</option>
                <?php 
                    foreach($rowProdData as $key => $value){
                  ?>
                        <option value="<?=$value['fld_id'];?>"><?=$value['fld_city_name'];?></option>
                  <?php
                    }
                  ?>
            </select>
        </div>
        
<?php		
	}
	//print_r($rowProdData);die();
?>