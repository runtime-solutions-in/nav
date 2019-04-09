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
	$table = '__masterproduct'; 
	$requestData = $_REQUEST;
	$rowProdData = $db->row('SELECT fld_productname,fld_id,fld_categoryName,fld_productthumb,fld_productlogo FROM '.$table.' WHERE fld_id = '.$requestData['product'].' ');
	
	$fld_id = isset($rowProdData['fld_id']) ? $rowProdData['fld_id'] : "";
	$fld_productname = isset($rowProdData['fld_productname']) ? $rowProdData['fld_productname'] : ""; 
	$fld_categoryName = isset($rowProdData['fld_categoryName']) ? $rowProdData['fld_categoryName'] : "";// die();
	$photo_doc = isset($rowProdData['fld_productthumb']) ? $rowProdData['fld_productthumb'] : ""; 
	$photo_big_doc = isset($rowProdData['fld_productlogo']) ? $rowProdData['fld_productlogo'] : ""; 
	if(count($rowProdData)!='0'){
?>
		
        <div class="form-group">
            <label class="text-info">Category</label>
            <input type="text" value="<?php echo $fld_categoryName; ?>" class="form-control" disabled/>    
            </div>
       
        

        <div class="form-group">
            <label class="text-info">Product Thumbnail.</label>
            <div class=" input-group-sm">
               <img src="../../upload/photo/<?php echo $photo_doc; ?>" alt="product" width="80">
            </div>
        </div>
        <div class="form-group">
            <label class="text-info">Product Logo</label>
            <div class=" input-group-sm">
                <img src="../../upload/photo_big/<?php echo $photo_big_doc; ?>" alt="product" width="80">
            </div>
        </div>
        
<?php		
	}
	//print_r($rowProdData);die();
?>