<?php
	ob_start();
	session_start();
	
	require 'include/constants.php';
	require 'include/functions.php';
	require 'db/Db.class.php';
	if ($_SESSION['USER_ID'] == '' || $_SESSION['USER_ID'] == 0) { header('location:login.php'); }
	if ($_SESSION['LOGIN_ROLE'] == 1 ){}else if($_SESSION['LOGIN_ROLE'] == 2){}else{ header('location:admin.php'); exit(); }

	
	$token = md5(uniqid());
	$_SESSION['TOKEN'] = $token;
	session_write_close();
		
	//$db2File = 'dealer2db.php';$id = input_filter_data(MyDecoder($_GET['id']),'integer');
	$table = '__productMang';
	//echo $res = $_GET['id']; exit();
	if(isset($_GET['id'])){
    	$id = input_filter_data(MyDecoder($_GET['id']),'integer');
	}else{
		$id = 0;
	}
	if ($id == 0) {
		$op = 'Add';
	} else {
		$op = 'Edit';
		
		 $rowAdmin = $db->row('SELECT * FROM `__productMang`WHERE  fld_id = '.$id.'');
		 $i=1;
		 $z='';
		
		/*$arrRow['product_array_file_doc'] = $rowAdmin['product_array_file_doc'];
		$arrRow['product_name'] = $rowAdmin['product_name'];
		$arrRow['product_array_file_doc'] = $rowAdmin['product_array_file_doc2'];
		$arrRow['product_name'] = $rowAdmin['product_name2'];
		$arrRow['product_array_file_doc'] = $rowAdmin['product_array_file_doc3'];
		$arrRow['product_name'] = $rowAdmin['product_name3'];
		$arrRow['product_array_file_doc'] = $rowAdmin['product_array_file_doc4'];
		$arrRow['product_name'] = $rowAdmin['product_name4'];
		$arrRow['product_array_file_doc'] = $rowAdmin['product_array_file_doc5'];
		$arrRow['product_name'] = $rowAdmin['product_name5'];
		$arrRow['product_array_file_doc'] = $rowAdmin['product_array_file_doc6'];
		$arrRow['product_name'] = $rowAdmin['product_name6'];
		$arrRow['product_array_file_doc'] = $rowAdmin['product_array_file_doc7'];
		$arrRow['product_name'] = $rowAdmin['product_name7'];
		$arrRow['product_array_file_doc'] = $rowAdmin['product_array_file_doc8'];
		$arrRow['product_name'] = $rowAdmin['product_name8'];
		$arrRow['product_array_file_doc'] = $rowAdmin['product_array_file_doc9'];
		$arrRow['product_name'] = $rowAdmin['product_name9'];
		$arrRow['product_array_file_doc'] = $rowAdmin['product_array_file_doc10'];
		$arrRow['product_name'] = $rowAdmin['product_name10'];
		$arrRow['product_array_file_doc'] = $rowAdmin['product_array_file_doc11'];
		$arrRow['product_name'] = $rowAdmin['product_name11'];
		$arrRow['product_array_file_doc'] = $rowAdmin['product_array_file_doc12'];
		$arrRow['product_name'] = $rowAdmin['product_name12'];
		$arrRow['product_array_file_doc'] = $rowAdmin['product_array_file_doc13'];
		$arrRow['product_name'] = $rowAdmin['product_name13'];
		$arrRow['product_array_file_doc'] = $rowAdmin['product_array_file_doc14'];
		$arrRow['product_name'] = $rowAdmin['product_name14'];
		$arrRow['product_array_file_doc'] = $rowAdmin['product_array_file_doc15'];
		$arrRow['product_name'] = $rowAdmin['product_name15'];
		
		$arrRow['input_array_dec'] = $rowAdmin['input_array_dec1'];
		$arrRow['input_array_spec'] = $rowAdmin['input_array_spec1'];
		$arrRow['input_array_dec'] = $rowAdmin['input_array_dec2'];
		$arrRow['input_array_spec'] = $rowAdmin['input_array_spec2'];
		$arrRow['input_array_dec'] = $rowAdmin['input_array_dec3'];
		$arrRow['input_array_spec'] = $rowAdmin['input_array_spec3'];
		$arrRow['input_array_dec'] = $rowAdmin['input_array_dec4'];
		$arrRow['input_array_spec'] = $rowAdmin['input_array_spec4'];
		$arrRow['input_array_dec'] = $rowAdmin['input_array_dec5'];
		$arrRow['input_array_spec'] = $rowAdmin['input_array_spec5'];
		$arrRow['input_array_dec'] = $rowAdmin['input_array_dec6'];
		$arrRow['input_array_spec'] = $rowAdmin['input_array_spec6'];
		$arrRow['input_array_dec'] = $rowAdmin['input_array_dec7'];
		$arrRow['input_array_spec'] = $rowAdmin['input_array_spec7'];
		$arrRow['input_array_dec'] = $rowAdmin['input_array_dec8'];
		$arrRow['input_array_spec'] = $rowAdmin['input_array_spec8'];
		$arrRow['input_array_dec'] = $rowAdmin['input_array_dec9'];
		$arrRow['input_array_spec'] = $rowAdmin['input_array_spec9'];
		$arrRow['input_array_dec'] = $rowAdmin['input_array_dec10'];
		$arrRow['input_array_spec'] = $rowAdmin['input_array_spec10'];
		echo '<pre>';print_r($arrRow);*/
		 
		 if(count($rowAdmin) == 0){
			 echo 'Some error occured.'; exit();
		 }
	}
	
	// geting data from databse
	$fld_id = isset($rowAdmin['fld_id']) ? $rowAdmin['fld_id'] : "";
	$fld_productname = isset($rowAdmin['fld_productname']) ? $rowAdmin['fld_productname'] : ""; 
	$fld_categoryName = isset($rowAdmin['fld_categoryName']) ? $rowAdmin['fld_categoryName'] : ""; 
	$photo_doc = isset($rowAdmin['fld_productthumb']) ? $rowAdmin['fld_productthumb'] : ""; 
	$photo_big_doc = isset($rowAdmin['fld_productlogo']) ? $rowAdmin['fld_productlogo'] : ""; 
	
	if(isset($_GET['msg'])){
	   $msg = intval($_GET['msg']);
	}else{
		 $msg = '';
	}
	
	switch($msg) {
		case 1 : $msgText = 'Require valid input data method'; break;
		case 2 : $msgText = 'Product Code is not valid'; break;
		case 3 : $msgText = 'Product Name is not valid'; break;
		case 4 : $msgText = 'Product Code & App Name should be valid'; break;
		case 5 : $msgText = 'Product Addition Failed'; break;
		case 6 : $msgText = 'Product Added successfully'; break;
		case 7 : $msgText = 'Product Updation Failed'; break;
		case 8 : $msgText = 'Product Updated successfully'; break;
		case 9 : $msgText = 'Only Product module is allowed'; break;
		 default : $msgText = ''; break;
	}
	
	//if($region = ''){$region = $_SESSION['region'];}
    //if($country = ''){$country = $_SESSION['country'];}	
?>	
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="../images/favicon-180x180.png" />

    <title>Tata Motors: Neev Mitra Admin Panel</title>

    <!-- Bootstrap 4.0 -->
    <link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.css" />

    <!-- Popup CSS -->
    <link href="../assets/vendor_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet" />
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.0.46/css/materialdesignicons.css"/>
    <!-- Bootstrap extend -->
    <link rel="stylesheet" href="css/bootstrap-extend.css" />
    
    <!-- Bootstrap select -->
	<link rel="stylesheet" href="../assets/vendor_components/bootstrap-select/dist/css/bootstrap-select.css">
	
	<!-- Select2 -->
	<link rel="stylesheet" href="../assets/vendor_components/select2/dist/css/select2.min.css">

    <!--alerts CSS -->
    <link href="../assets/vendor_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

    <!-- theme style -->
    <link rel="stylesheet" href="css/master_style.css" />

    <!-- NEEV MITRA skins -->
    <link rel="stylesheet" href="css/skins/_all-skins.css" />

    <!-- InputMask -->
    <script src="../assets/vendor_plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js"></script>

    <!-- daterange picker -->
    <link rel="stylesheet" href="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css" />

    <!-- Morris charts -->
    <link rel="stylesheet" href="../assets/vendor_components/morris.js/morris.css" />

    <!-- Data Table -->
    <link rel="stylesheet" type="text/css" href="../assets/vendor_components/datatable/datatables.min.css" />

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css" />
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../assets/vendor_plugins/timepicker/bootstrap-timepicker.min.css">

    <!--
      HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
    -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
	#myProgress {
    position: relative;
    width: 100%;
    height: 30px;
    background-color: grey;
}
[type=checkbox]:checked, [type=checkbox]:not(:checked) {
    position: absolute !important;
    left: 4% !important;
    opacity: 1 !important;
    z-index: 999;
}
[type=checkbox]+label:before, [type=checkbox]:not(.filled-in)+label:after{
	border: none !important;
	}


	</style>

</head>

<body class="hold-transition skin-black-light sidebar-mini">
    <div class="wrapper">
        <?php  include_once('inc/header.php'); ?>
         <?php  include_once('inc/side-bar.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Product Management</h3>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">About Product</h4>
                            </div>
                            <div class="box-body">
                                <form action="productmangAdd2db.php" class="form-element" method="post"  enctype="multipart/form-data" id="image_form">
                                    <div class="form-body">
                                    
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                	<?php 
														$rowCountryAdmin = $db->query('SELECT fld_languageName,fld_id FROM `__language`');
													?>
													<div class="form-group">
														<label class="text-info">Language</label>
														<select class="form-control select2" name="selectlang" id="selectlang" required="" aria-invalid="false">
															<option value="">Select Language</option>
															<?php 
																foreach($rowCountryAdmin as $key => $value){
															  ?>
																	<option value="<?=$value['fld_id'];?>" <?php if($rowAdmin['selectlang']==$value['fld_id']){ echo 'selected';} ?>><?=$value['fld_languageName'];?></option>
															  <?php
																}
															  ?>
														</select>
													  </div>

													<?php 
                                                        $rowProdAdmin = $db->query('SELECT fld_productname,fld_id FROM `__masterproduct` WHERE fld_status = "1"');
                                                    ?>
                                                        
                                                    <label class="text-info">Product Name</label>
                                                    <select class="form-control select2" style="width: 100%;" onChange="getData(this.value)" required="" name="productid">
                                                      <option selected="">Select Product</option>
                                                      <?php 
													  	foreach($rowProdAdmin as $key => $value){
													  ?>
                                                      		<option value="<?=$value['fld_id'];?>" <?php if($rowAdmin['productid']==$value['fld_id']){ echo 'selected';} ?>><?=$value['fld_productname'];?></option>
                                                      <?php
														}
													  ?>
                                                     
                                                    </select>
                                                 </div>
                                                <div id="productData">
                                                
												</div>

                                            </div>
                                            <!-- /span -->
                                            
                                        </div>
                                        <!-- /row -->

                                        <hr />
                                        <h4 class="box-title mb-15">Product Description</h4>
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#description" role="tab" onClick="loOpp();"><span><i
                                                            class="fa  fa-file-text"></i> Features</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#gallery" role="tab" onClick="loOpp2();"><span><i
                                                            class="fa fa-file-image-o"></i> Gallery</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#videos" role="tab" onClick="loOpp();"><span><i
                                                            class="fa fa-file-video-o"></i> Videos</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#specification" role="tab" onClick="loOpp();"><span><i
                                                            class="fa fa-file-code-o"></i>
                                                        Specification</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#brochure1" role="tab" onClick="loOpp();"><span><i
                                                            class="fa  fa-file-pdf-o"></i> Brochure</span></a>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content tabcontent-border">
                                            <div class="tab-pane active show" id="description" role="tabpanel">
                                                <div class="pad">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="box">
                                                                <div class="box-header with-border">
                                                                    <h4 class="box-title">Product Details<span class="text-danger">*</span></h4>
                                                                </div>
                                                                <div class="box-body pb-0">
                                                                    
                                                                        <div class="add_wrapper">
                                                                        <?php
																		if(intval($id)!=0){
																			$r =1;
																			
																			for($i=0;$i<16;$i++){
																				if($i==0){$k = 'product_array_file_doc';}else{$k = 'product_array_file_doc'.$i;}
																				if($i==0){$z = 'product_name';}else{$z = 'product_name'.$i;}
																				
																				//echo $k;
																				
																				if($rowAdmin[$k]!=''){
																					$r++;
																		?>
                                                                        <div class="form-body">
                                                                            <!-- /row -->
                                                                            <div class="form-group">
                                                                                <label class="text-info">Featured Image<span
                                                                                        class="text-danger">*</span>
                                                                                    <span class="help-block text-danger">Maximum file size is 20MB.</span></label>
                                                                                <div class="input-group input-group-sm">
                                                                                    <!--<input type="file" class="form-control"  name="product_array_file[]">-->
                                                                                    <?php
																						if(intval($i)==0){
																					?>
                                                                                    <input type="file" name="product_array_file" id="upload-product_array_file-doc" accept="application/pdf" class="form-control hidden pick-file-target">
                                                                                    
                                                                                    <input type="hidden" id="product_array_file-doc" name="product_array_file_doc" class="form-control pick-file" placeholder="Pick a File"  value="<?php echo $rowAdmin[$k];?>"  required="required"  onKeyPress="return false;"><span class="uploader-button"></span>
                                                                                    <?php
																						}else{
																					?>
                                                                                    	<input type="file" name="product_array_file<?=$i ?>" id="upload-product_array_file-doc<?=$i ?>" accept="application/pdf" class="form-control hidden pick-file-target">
                                                                                    
                                                                                    <input type="hidden" id="product_array_file-doc<?=$i ?>" name="product_array_file_doc<?=$i ?>" class="form-control pick-file" placeholder="Pick a File"  value="<?php echo $rowAdmin[$k];?>"  required="required"  onKeyPress="return false;"><span class="uploader-button"></span>
                                                                                    <?php
																						}
																					?>
                                                                                    <!--<span class="input-group-btn">
                                                                                        <button type="button" class="btn btn-default fa fa-plus">
                                                                                            Add</button>
                                                                                    </span>-->
                                                                                </div>
                                                                            </div>
                                                                            <?php
																				if(intval($i)==0){
																			?>
                                                                            <p id="features"><?php if($rowAdmin[$k]!=''){ 
													echo '<a href="../../upload/features/'.$rowAdmin[$k].'?'.time().'" target="_blank" class="btn btn-primary btnfont">View Uploaded File</a>';}?></p>
                                                    						<?php
																				}else{
																			?>
																					<p id="features<?=$i ?>"><?php if($rowAdmin[$k]!=''){ 
													echo '<a href="../../upload/features/'.$rowAdmin[$k].'?'.time().'" target="_blank" class="btn btn-primary btnfont">View Uploaded File</a>';}?></p>
																			<?php
																				}
																			?>
                                                                            <div class="form-group" id="">
                                                                                <label class="text-info"> Title</label>
                                                                                <input type="text" class="form-control" placeholder="Title"  name="<?=$z?>" value="<?=$rowAdmin[$z];?>"/>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                    
                                                                    <p><button class="add_fields pull-right btn btn-outline btn-info btn-sm" style="margin-bottom:20px;">Add More</button></p>				
                                                                    	<?php
																				}
																		}
																		}else{
																		?>
                                                                        <div class="form-body">
                                                                            <!-- /row -->
                                                                            <div class="form-group">
                                                                                <label class="text-info">Featured Image<span
                                                                                        class="text-danger">*</span>
                                                                                    <span class="help-block text-danger">Maximum file size is 20MB.</span></label>
                                                                                <div class="input-group input-group-sm">
                                                                                    <!--<input type="file" class="form-control"  name="product_array_file[]">-->
                                                                                    <input type="file" name="product_array_file" id="upload-product_array_file-doc" accept="application/pdf" class="form-control hidden pick-file-target">
                                                                                    
                                                                                    <input type="hidden" id="product_array_file-doc" name="product_array_file_doc" class="form-control pick-file" placeholder="Pick a File" required="required"  onKeyPress="return false;"><span class="uploader-button"></span>
                                                                                    <!--<span class="input-group-btn">
                                                                                        <button type="button" class="btn btn-default fa fa-plus">
                                                                                            Add</button>
                                                                                    </span>-->
                                                                                </div>
                                                                            </div>
                                                                            <p id="features"></p>
                                                                            <div class="form-group" id="">
                                                                                <label class="text-info"> Title</label>
                                                                                <input type="text" class="form-control" placeholder="Title"  name="product_name" />
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                    
                                                                    <p><button class="add_fields pull-right btn btn-outline btn-info btn-sm" style="margin-bottom:20px;">Add More</button></p>				
                                                                        <?php
																		}
																		?>
                                                                      </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane show" id="gallery" role="tabpanel">
                                                <div class="pad">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="box">
                                                                <div class="box-header with-border">
                                                                    <h4 class="box-title">Upload Images<span class="text-danger">*</span></h4>
                                                                </div>
                                                                <div class="box-body">
                                                                    
                                                                        <div class="form-body">
                                                                            <!-- /row -->
                                                                            <div class="form-group">
                                                                                <label class="text-info">Product 
                                                                                    Gallery Title</label>
                                                                                <input type="text" class="form-control" placeholder="Product Name" name="gallerytitle" value="<?php echo $rowAdmin['gallerytitle'];?>"/>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="text-info">Product
                                                                                    Images.<span class="text-danger">*</span><span class="help-block text-danger">Maximum file size is 20MB.</span></label>
                                                                                <div class="input-group input-group-sm">
                                                                                    <input type="file" name="product_gall_file" id="upload-product_gall_file-doc" accept="application/pdf" class="form-control hidden pick-file-target" multiple>
                                                                                    
                                                                                    <input type="hidden" id="product_gall_file-doc" name="product_gall_file_doc" class="form-control pick-file2" placeholder="Pick a File"  value="<?php echo $rowAdmin['video_doc'];?>"  required="required"  onKeyPress="return false;"><span class="uploader-button"></span>
                                                                                    <!--<input type="button" name="insert" id="insert" value="Insert" class="btn btn-info" />-->
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            <!--<p id="product_gall_file"><?php if($rowAdmin['video_doc']!=''){ 
													echo '<a href="../../upload/gallery/'.$rowAdmin['gallery'].'?'.time().'" target="_blank" class="btn btn-primary btnfont">View Uploaded File</a>';}?></p>-->
                                                                            
                                                                            
                                                                        </div>
                                                                    
                                                                    <div class="row fx-element-overlay">
                                                                        <div id="image_data">
                                                                        
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="media">
                                                                                <div class="">
                                                                                    <div class="" id="gallynew">
                                                                                    
                                                                                        <?php
																						if(intval($id)!=0){
																						$galleryS = unserialize($rowAdmin['gallery']);
																						//print_r($rowAdmin['gallery']);
																						foreach($galleryS as $key=>$value){
																					?>
                                                                                    	<div class="test">
                                                                                    	<input type="hidden" value="<?php echo $value; ?>" name="gallery[]">
                                                                                        <img class="align-self-start w-160"
                                                                                            src="../../upload/gallery/<?php echo $value; ?>"
                                                                                            alt="user">
                                                                                            <!--<button type="button" class="close"  aria-hidden="true">Delete</button>-->
                                                                                            <button type="submit" class="btn btn-outline btn-info mr-10 close"><i class="fa fa-check"></i> Delete</button>
                                                                                            </div>
                                                                                        <!--<div class="fx-overlay">
                                                                                            <ul class="fx-info">
                                                                                                <li><a class="btn default btn-outline"
                                                                                                        href="#"><i
                                                                                                            class="ion-image"></i></a></li>
                                                                                            </ul>
                                                                                        </div>-->
                                                                                    <?php } }else { ?>
                                                                                    		
                                                                                    <?php
																					}
																					?>
                                                                                    </div>
                                                                                </div>
                                                                                <!--<div class="media-body">

                                                                                    <button type="button" class="btn btn-default mb-5" name="insert" id="insert" ><i
                                                                                            class="fa fa-upload"></i>
                                                                                        upload</button>
                                                                                </div>-->
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane show" id="videos" role="tabpanel">
                                                <div class="pad">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="box">
                                                                <div class="box-header with-border">
                                                                    <h4 class="box-title">Upload videos<span class="text-danger">*</span></h4>
                                                                </div>
                                                                <div class="box-body">
                                                                    <div class="form-body">
                                                                        <!-- /row -->
                                                                        <div class="form-group">
                                                                            <label class="text-info">Product Video
                                                                                Title</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Product Video Title" name="videotitle"  required="" value="<?=$rowAdmin['videotitle']?>"/>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="text-info">Product Video Link</label>
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" name="vediolink"  value="<?=$rowAdmin['vediolink']?>">
                                                                                <!--<span class="input-group-btn">
                                                                                    <button type="button" class="btn btn-default fa fa-plus">
                                                                                        Add</button>
                                                                                </span>-->
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="text-info">Product Video<span
                                                                                    class="text-danger">*</span> <span class="help-block text-danger">Maximum file size is 20MB.</span></label>
                                                                            <div class="input-group input-group-sm">
                                                                               <!-- <input type="file" class="form-control">-->
                                                                               <input type="file" name="video" id="upload-video-doc" accept="application/pdf" class="form-control hidden pick-file-filevideo">
                                                                                    
                                                                                    <input type="hidden" id="video-doc" name="video_doc" class="form-control pick-file" placeholder="Pick a File"  value="<?php echo $rowAdmin['video_doc'];?>"  required="required"  onKeyPress="return false;"><span class="uploader-button"></span>
                                                                                <span class="input-group-btn">
                                                                                    <button type="button" class="btn btn-default fa fa-plus">
                                                                                        Add</button>
                                                                                </span>
                                                                            </div>
                                                                            <!--<p id="video"><?php if($rowAdmin['video_doc']!=''){ 
													echo '<a href="../../upload/video/'.$rowAdmin['video_doc'].'?'.time().'" target="_blank" class="btn btn-primary btnfont">View Uploaded File</a>';}?></p>-->
                                                                        </div>
                                                                    </div>
                                                                    <div class="row fx-element-overlay">
                                                                        <div class="form-group">
                                                                            <div class="media">
                                                                                <div class="fx-card-item pb-0">
                                                                                    <div class="fx-card-avatar fx-overlay-1 mb-0" id="video">
                                                                                    <?php if($rowAdmin['video_doc']!=''){ ?>
                                                                                       <!-- <img class="align-self-start w-160"
                                                                                            src="../images/music/a-1.jpg"
                                                                                            alt="user">
                                                                                        <div class="fx-overlay">
                                                                                            <ul class="fx-info">
                                                                                                <li><a class="popup-youtube btn default btn-outline"
                                                                                                        href="www.youtube.com/watch7d1c.html?v=sK7riqg2mr4"><i
                                                                                                            class="ion-play"></i></a></li>
                                                                                            </ul>
                                                                                        </div>-->
                                                                                        <video width="320" height="240" controls class="align-self-start w-160"><source src="../../upload/video/<?php echo $rowAdmin['video_doc'];?>" type="video/mp4"></video>
                                                                                        
                                                                                       <?php
																						}
																					   ?>
                                                                                    </div>
                                                                                </div>
                                                                                <!--<div class="media-body">

                                                                                    <button type="button" class="btn btn-default mb-5"><i
                                                                                            class="fa fa-upload"></i>
                                                                                        upload</button>
                                                                                </div>-->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="tab-pane show" id="brochure1" role="tabpanel">
                                                <div class="pad">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="box-body">
                                                                
                                                                    <div class="form-body">
                                                                        <!-- /row -->
                                                                        <div class="form-group">
                                                                            <label class="text-info">Brochure Title</label>
                                                                            <input type="text" class="form-control" placeholder="Brochure Name" name="brochuretitle" value="<?=$rowAdmin['brochuretitle']?>"/>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="text-info">Document File.<span
                                                                                    class="text-danger">*</span> <span class="help-block text-danger">Maximum file size is 20MB.</span></label>
                                                                            <div class="input-group input-group-sm">
                                                                                <!--<input type="file" class="form-control">-->
                                                                                <input type="file" name="brochure" id="upload-brochure-doc" accept="application/pdf" class="form-control hidden pick-file-filevideo">
                                                                                    
                                                                                    <input type="hidden" id="brochure-doc" name="brochure_doc" class="form-control pick-file" placeholder="Pick a File"  value="<?php echo $rowAdmin['brochure_doc'];?>"  required="required"  onKeyPress="return false;"><span class="uploader-button"></span>
                                                                                
                                                                            </div>
                                                                             
                                                                        </div>
                                                                        


                                                                    </div>
                                                                
                                                                <div class="row fx-element-overlay">
                                                                <p id="brochure"><?php if($rowAdmin['brochure_doc']!=''){ 
													echo '<a href="../../upload/brochure/'.$rowAdmin['brochure_doc'].'?'.time().'" target="_blank" class="btn btn-primary btnfont">View Uploaded File</a>';}?></p>
                                                                    <div class="form-group">
                                                                        <div class="media">
                                                                            <!--<div class="fx-card-item pb-0">
                                                                                <div class="fx-card-avatar fx-overlay-1 mb-0">
                                                                                    <img class="align-self-start w-160"
                                                                                        src="../images/music/a-1.jpg"
                                                                                        alt="user">
                                                                                    <div class="fx-overlay">
                                                                                        <ul class="fx-info">
                                                                                            <li><a class="btn default btn-outline"
                                                                                                    href="#"><i class="fa fa-file-pdf-o"></i></a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>-->
                                                                            <div class="media-body">

                                                                                <!--<button type="button" class="btn btn-default mb-5"><i
                                                                                        class="fa fa-upload"></i>
                                                                                    upload</button>-->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane show" id="specification" role="tabpanel">
                                                <div class="pad">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="box">
                                                                 <div class="box-header with-border">
                                                                    <h4 class="box-title">Product Specification</h4>
                                                                </div>
                                                                 <div class="box-body pb-0">
                                                                 
                                                                    <div class="add_spec_wrapper">
                                                                       <?php
																	   		if(intval($id)!=0){
																			$sp =1;
																			for($i=1;$i<11;$i++){
																				//if($i==0){$k = 'product_array_file_doc';}else{$k = 'product_array_file_doc'.$i;}
																				$k = 'input_array_spec'.$i;
																				
																				
																				if($rowAdmin[$k]!=''){
																					$sp++;
																		?>
                                                                        <div class="form-body">
                                                                            
                                                                                <div class="form-group">
                                                                                    <label class="text-info">Specification Name</label>
                                                                                    <input type="text" class="form-control" placeholder="Specification Name" name="input_array_spec<?=$i ?>"  required="" value="<?php echo $rowAdmin[$k];?>"/>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="text-info">Description</label>
                                                            <textarea rows="4" cols="12" name="input_array_dec<?=$i ?>" class="form-control"  required=""><?php echo $rowAdmin[$k];?></textarea>
                                                                                </div>
                                                                           

                                                                        </div>
                                                                        <?php
																				}
																		}
																			}else{
																		?>
                                                                        		<div class="form-body">
                                                                            
                                                                                <div class="form-group">
                                                                                    <label class="text-info">Specification Name</label>
                                                                                    <input type="text" class="form-control" placeholder="Specification Name" name="input_array_spec1"  required="" value=""/>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="text-info">Description</label>
                                                            <textarea rows="4" cols="12" name="input_array_dec1" class="form-control"  required=""></textarea>
                                                                                </div>
                                                                           

                                                                        </div>
                                                                        <?php
																			}
																		?>
                                                                    </div>
                                                               
                                                                <p><button class="add_spec pull-right btn btn-outline btn-info btn-sm" style="margin-bottom:20px;">Add More</button></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										<div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="notification" name="notification">
                                            <label class="form-check-label" for="exampleCheck1">Send Notification</label>
                                          </div>
                                        <div class="form-actions m-10">
                                            <button type="submit" class="btn btn-outline btn-info mr-10">
                                                <i class="fa fa-check"></i> Submit
                                            </button>
                                            <!--<button type="button" class="btn btn-outline btn-danger">
                                                <i class="fa fa-close"></i> Cancel
                                            </button>-->
                                        </div>
                                        <input type="hidden" name="hiddenId" id="hiddenId" value="<?php echo $id; ?>">
									
                                    </div>
                                    </form>
                                
                            </div>
                        </div>


                    </div>
                </div>
                <!-- Default box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

      <?php  include_once('inc/footer.php'); ?>

        <!-- Control Sidebar Here -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="../assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>
    <script>
	$( ".close" ).click(function() {
	  	$(this).parents('.test').html('');
	});
	<?php
		if(intval($id)!=0){
	?>
	
			getData(<?php echo $rowAdmin['productid']; ?>);
	<?php
		}
	?>
	function getData(e){
		//console.log(e);return false;
		$.ajax({ 
			type: "POST",
			url: "ajax/productdata.php",
			data : {'product':e},//,rememberMe:rememberMe
			success: function(data){ //alert(data);return false;
				$("#productData").html( data );
			}

		 });

	}
	
    //Add Input Fields
    $(document).ready(function() {
        var max_fields = 10; //Maximum allowed input fields 
        var wrapper    = $(".add_wrapper"); //Input fields wrapper
        var add_spec_wrapper    = $(".add_spec_wrapper"); //Input fields wrapper
        var add_button = $(".add_fields"); //Add button class or ID
        var add_spec = $(".add_spec");
        var x = <?php if($id!=''){echo $r;}else{?> 1 <?php }?>; //Initial input field is set to 1
		var z = <?php if($id!=''){echo $r;}else{?> 1 <?php }?>; ;
		var n =<?php if($id!=''){echo $sp-1;}else{?> 1 <?php }?>;
        //When user click on add input button
        $(add_button).click(function(e){
            e.preventDefault();
            //Check maximum allowed input fields
            if(x < max_fields){ 
				z++
                x++; //input field increment
                 //add input field
                $(wrapper).append('<div class="form-body"><div class="form-group"><label class="text-info">Featured Image<span class="text-danger">*</span><span class="help-block text-danger">Maximum file size is 20MB.</span></label><div class="input-group input-group-sm"><input type="file" name="product_array_file'+z+'" id="upload-product_array_file-doc'+z+'" accept="application/pdf" class="form-control hidden pick-file-target"><input type="hidden" id="product_array_file-doc'+z+'" name="product_array_file_doc'+z+'" class="form-control pick-file" placeholder="Pick a File"  required="required"  onKeyPress="return false;"><span class="uploader-button"></span></div></div><p id="features'+z+'"></p><div class="form-group" ><label class="text-info"> Title</label><input type="text" class="form-control" placeholder="Title"  name="product_name'+z+'"/></div><a href="javascript:void(0);" style="margin-bottom:10px" class="remove_field btn btn-outline btn-danger btn-sm">Remove</a></div>');
            }
			loadOps();
        });
         $(wrapper).on("click",".remove_field", function(e){ 
            if (!confirm("Do you want to delete")){
              return false;
            }
            e.preventDefault();
            $(this).parent('div').remove(); //remove inout field
            x--; //inout field decrement
			loadOps();
        })
         
        $(add_spec).click(function(e){
            e.preventDefault();
            //Check maximum allowed input fields
            if(n < max_fields){ 
                n++; //input field increment
                 //add input field
                $(add_spec_wrapper).append('<div class="form-body" style="border-top:2px dotted #214098;padding-top:20px;"><div class="form-group"><label class="text-info">Specification Name</label><input type="text" class="form-control" placeholder="Specification Name" name="input_array_spec'+n+'"/></div><div class="form-group"><label class="text-info">Description</label><textarea rows="4" cols="12" class="form-control" name="input_array_dec'+n+'" placeholder="Add Description Here"></textarea></div><a href="javascript:void(0);" style="margin-bottom:10px" class="remove_spec_field btn btn-outline btn-danger btn-sm">Remove</a></div>');
            }
        });

        //when user click on remove button
        $(add_spec_wrapper).on("click",".remove_spec_field", function(e){ 
            if (!confirm("Do you want to delete")){
              return false;
            }
            e.preventDefault();
            $(this).parent('div').remove(); //remove inout field
            n--; //inout field decrement
        })
    });
    </script>

<script>
function loOpp(){
	//init();
}
function loOpp2(){
	//init();
}
$('.error').hide();

var users_id = $('#fld_productname').val();

$(window).on('load', loadOps);
$(window).on('load', loadOps2);
$(window).on('load', loadOpsvideo);
function init() {
	function mpl() { // measure, pick, load
		if (self.view_mode !== 'thumbs') {
			return;
		}
		measure();
		pickThumbsToLoad();
		lazyLoad();
	}

	if ($.fn.resizable) {
		onLast(self.container, 'resize', mpl);
	}

	onLast(self.window, 'resize', mpl);
	onLast(self.content, 'scroll',  mpl);

	self.element.on('viewchanged selected', mpl);

	mpl();
}
function loadOps(){

	//$('.pick-file').on('focus click', function(){

	$('.pick-file').on('click', function(){
		
		var $t = $(this),

		$target = $t.parent().find('.pick-file-target');

		$target.trigger('click').on('click', function(){

			if($(this).val() !== ''){

				$t.attr('placeholder', 'Uploading in progress');

			}

		})

	})

	__initUploaders('product_array_file-doc', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features');
	__initUploaders('product_array_file-doc1', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features1');
	__initUploaders('product_array_file-doc2', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features2');
	__initUploaders('product_array_file-doc3', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features3');
	__initUploaders('product_array_file-doc4', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features4');
	__initUploaders('product_array_file-doc5', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features5');
	__initUploaders('product_array_file-doc6', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features6');
	__initUploaders('product_array_file-doc7', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features7');
	__initUploaders('product_array_file-doc8', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features8');
	__initUploaders('product_array_file-doc9', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features9');
	__initUploaders('product_array_file-doc10', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features10');
	__initUploaders('product_array_file-doc11', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features11');
	__initUploaders('product_array_file-doc12', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features12');
	__initUploaders('product_array_file-doc13', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features13');
	__initUploaders('product_array_file-doc14', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features14');
	__initUploaders('product_array_file-doc15', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features15');
	__initUploaders('product_array_file-doc16', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features16');
	__initUploaders('product_array_file-doc17', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features17');
	__initUploaders('product_array_file-doc18', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features18');
	__initUploaders('product_array_file-doc19', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features19');
	__initUploaders('product_array_file-doc20', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features20');
	__initUploaders('product_array_file-doc21', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features21');
	__initUploaders('product_array_file-doc22', 'jpg', 'JPEG', '20480kb', 'features', users_id, 'features22');
	

}
function ObjectLength( object ) {
    var length = 0;
    for( var key in object ) {
        if( object.hasOwnProperty(key) ) {
            ++length;
        }
    }
    return length;
};
function __initUploaders(handle, mimeExt, mimeName, maxSize, fileName, users_id, att){

var uploaderId = 'upload-'+handle;

var posterUploader = new plupload.Uploader({

	runtimes: 'html5,silverlight,html4,flash',

	browse_button: 'upload-'+handle, // you can pass an id...

	url: '../upload-file.php?imagePath='+fileName+'&userId='+users_id,

	flash_swf_url: '../plupload/js/Moxie.swf',

	silverlight_xap_url: '../plupload/js/Moxie.xap',



	multi_selection: false,

	unique_names: true,

	chunk_size: '2048000kb',

	filters: {

		prevent_duplicates: true,

		/*min_file_size: '50kb',*/

		max_file_size: maxSize,

		mime_types: [

			{

				title: mimeName,

				extensions: mimeExt

			}

		]

	},

	multipart_params: {

		fileInpName: $('#'+handle).prop('name')

	},



	init: {

		PostInit: function () {

			$('.filelist-poster').html('');

		},



		FilesAdded: function (up, files) {

			plupload.each(files, function (file) {

				$('#'+uploaderId).parents('.form-group').find('.filelist-poster').append('<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>');

			});



			$('[type="submit"]').attr('disabled', 'disabled');

			$('.file-upl-error-msg').remove();

			up.start();

		},



		UploadProgress: function (up, file) {

			$('#'+file.id).find('b').html('<span>' + file.percent + "%</span>");

			$('#'+handle).val('<div id="myProgress"><div id="myBar" style=" position: absolute;width: '+ file.percent +'%;height: 100%;background-color: green;">'+ file.percent +'</div></div>');

			$('#'+att).html('<div id="myProgress"><div id="myBar" style=" position: absolute;width: '+ file.percent +'%;height: 100%;background-color: green;">'+ file.percent +'</div></div>');

		},



		UploadComplete: function (up, files) {

			$('[type="submit"]:disabled').removeAttr('disabled');

			//$('#'+handle).val(files[0]['target_name']);

			var str = files[0]['target_name'];

			var res = str.split(".");
			var coun = ObjectLength(files);
			//console.log( ObjectLength(files) );return false;
			//console.log(str+'==='+files[0]['target_name']+'==='+files[1]['target_name']+count(files));return false;

			$('#'+handle).val(str);

			var newFileName = str+'.'+res[1];
			//for(var $i=1;$i>coun;$i++){
				if(fileName=='video'){
					$('#'+att).html('<video width="320" height="240" controls class="align-self-start w-160"><source src="../../upload/video/'+str+'" type="video/mp4"></video>');
				
				}else{
					$('#'+att).html('<a href="../../upload/'+fileName+'/'+str+'?<?php echo time();?>" target="_blank" class="btn btn-primary btnfont">View Uploaded File</a>');
				}
			//}
			

			$('.filelist-poster').html('');
			
			

		},



		Error: function (up, err) {console.log(err);

			var errMsg = $('<span class="file-upl-error-msg text-danger"/>');

			if(err.code == "-599"){

			  // $(errMsg).html('Minimum allowed filesize is 50KB.');

			   swal({title:"Error!",text:"Minimum allowed filesize is "+maxSize+".",type: "error",confirmButtonText: "Ok"});

			}

			if(err.code == "-600"){

			   //$(errMsg).html('Maximum allowed filesize is 100KB.')

			   swal({title:"Error!",text:"Maximum allowed filesize is "+maxSize+".",type: "error",confirmButtonText: "Ok"});

			}

			if(err.code == "-601"){

			   //$(errMsg).html('Only PDF file formats supported.')

			   swal({title:"Error!",text:"Only "+mimeName+" file formats supported.",type: "error",confirmButtonText: "Ok"});

			}

			$('.filelist-poster').html('');

			$('#'+uploaderId).parents('.form-group').find('.filelist-poster').append(errMsg);

		}

	}

});



posterUploader.init();

}

function loadOpsvideo(){

	//$('.pick-file').on('focus click', function(){

	$('.pick-filevideo').on('click', function(){
		
		var $t = $(this),

		$target = $t.parent().find('.pick-file-target');

		$target.trigger('click').on('change', function(){

			if($(this).val() !== ''){

				$t.attr('placeholder', 'Uploading in progress');

			}

		})

	})
	__initUploadersvideo('video-doc', 'mp4', 'MP4', '102400kb', 'video', users_id, 'video');
	__initUploadersvideo('brochure-doc', 'pdf', 'PDF', '20480kb', 'brochure', users_id, 'brochure');

}
function ObjectLength( object ) {
    var length = 0;
    for( var key in object ) {
        if( object.hasOwnProperty(key) ) {
            ++length;
        }
    }
    return length;
};
function __initUploadersvideo(handle, mimeExt, mimeName, maxSize, fileName, users_id, att){

var uploaderId = 'upload-'+handle;

var posterUploader = new plupload.Uploader({

	runtimes: 'html5,silverlight,html4,flash',

	browse_button: 'upload-'+handle, // you can pass an id...

	url: '../upload-file.php?imagePath='+fileName+'&userId='+users_id,

	flash_swf_url: '../plupload/js/Moxie.swf',

	silverlight_xap_url: '../plupload/js/Moxie.xap',



	multi_selection: false,

	unique_names: true,

	chunk_size: '2048000kb',

	filters: {

		prevent_duplicates: true,

		/*min_file_size: '50kb',*/

		max_file_size: maxSize,

		mime_types: [

			{

				title: mimeName,

				extensions: mimeExt

			}

		]

	},

	multipart_params: {

		fileInpName: $('#'+handle).prop('name')

	},



	init: {

		PostInit: function () {

			$('.filelist-poster').html('');

		},



		FilesAdded: function (up, files) {

			plupload.each(files, function (file) {

				$('#'+uploaderId).parents('.form-group').find('.filelist-poster').append('<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>');

			});



			$('[type="submit"]').attr('disabled', 'disabled');

			$('.file-upl-error-msg').remove();

			up.start();

		},



		UploadProgress: function (up, file) {

			$('#'+file.id).find('b').html('<span>' + file.percent + "%</span>");

			$('#'+handle).val('<div id="myProgress"><div id="myBar" style=" position: absolute;width: '+ file.percent +'%;height: 100%;background-color: green;">'+ file.percent +'</div></div>');

			$('#'+att).html('<div id="myProgress"><div id="myBar" style=" position: absolute;width: '+ file.percent +'%;height: 100%;background-color: green;">'+ file.percent +'</div></div>');

		},



		UploadComplete: function (up, files) {

			$('[type="submit"]:disabled').removeAttr('disabled');

			//$('#'+handle).val(files[0]['target_name']);

			var str = files[0]['target_name'];

			var res = str.split(".");
			var coun = ObjectLength(files);
			//console.log( ObjectLength(files) );return false;
			//console.log(str+'==='+files[0]['target_name']+'==='+files[1]['target_name']+count(files));return false;

			$('#'+handle).val(str);

			var newFileName = str+'.'+res[1];
			//for(var $i=1;$i>coun;$i++){
				if(fileName=='video'){
					$('#'+att).html('<video width="320" height="240" controls class="align-self-start w-160"><source src="../../upload/video/'+str+'" type="video/mp4"></video>');
				
				}else{
					$('#'+att).html('<a href="../../upload/'+fileName+'/'+str+'?<?php echo time();?>" target="_blank" class="btn btn-primary btnfont">View Uploaded File</a>');
				}
			//}
			

			$('.filelist-poster').html('');
			
			

		},



		Error: function (up, err) {console.log(err);

			var errMsg = $('<span class="file-upl-error-msg text-danger"/>');

			if(err.code == "-599"){

			  // $(errMsg).html('Minimum allowed filesize is 50KB.');

			   swal({title:"Error!",text:"Minimum allowed filesize is "+maxSize+".",type: "error",confirmButtonText: "Ok"});

			}

			if(err.code == "-600"){

			   //$(errMsg).html('Maximum allowed filesize is 100KB.')

			   swal({title:"Error!",text:"Maximum allowed filesize is "+maxSize+".",type: "error",confirmButtonText: "Ok"});

			}

			if(err.code == "-601"){

			   //$(errMsg).html('Only PDF file formats supported.')

			   swal({title:"Error!",text:"Only "+mimeName+" file formats supported.",type: "error",confirmButtonText: "Ok"});

			}

			$('.filelist-poster').html('');

			$('#'+uploaderId).parents('.form-group').find('.filelist-poster').append(errMsg);

		}

	}

});



posterUploader.init();

}

function loadOps2(){
	

	//$('.pick-file').on('focus click', function(){

	$('.pick-file2').on('click', function(){
		
		var $t = $(this),

		$target = $t.parent().find('.pick-file-target');

		$target.trigger('click').on('change', function(){

			if($(this).val() !== ''){

				$t.attr('placeholder', 'Uploading in progress');

			}

		})

	})

	__initUploadersnew('product_gall_file-doc', 'jpg', 'JPEG', '20480kb', 'gallery', users_id, 'gallery123');


}
function ObjectLength( object ) {
    var length = 0;
    for( var key in object ) {
        if( object.hasOwnProperty(key) ) {
            ++length;
        }
    }
    return length;
};
var $agl = 0;
function __initUploadersnew(handle, mimeExt, mimeName, maxSize, fileName, users_id, att){

var uploaderId = 'upload-'+handle;
$agl++;
var posterUploader = new plupload.Uploader({
	
	runtimes: 'html5,silverlight,html4,flash',

	browse_button: 'upload-'+handle, // you can pass an id...

	url: '../upload-file.php?imagePath='+fileName+'&userId='+users_id,

	flash_swf_url: '../plupload/js/Moxie.swf',

	silverlight_xap_url: '../plupload/js/Moxie.xap',



	multi_selection: true,

	unique_names: true,

	chunk_size: '20480kb',

	filters: {

		prevent_duplicates: true,

		/*min_file_size: '50kb',*/

		max_file_size: maxSize,

		mime_types: [

			{

				title: mimeName,

				extensions: mimeExt

			}

		]

	},

	multipart_params: {

		fileInpName: $('#'+handle).prop('name')

	},



	init: {

		PostInit: function () {

			$('.filelist-poster').html('');
			
		},



		FilesAdded: function (up, files) {

			plupload.each(files, function (file) {

				$('#'+uploaderId).parents('.form-group').find('.filelist-poster').append('<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>');

			});



			$('[type="submit"]').attr('disabled', 'disabled');

			$('.file-upl-error-msg').remove();

			up.start();

		},



		UploadProgress: function (up, file) {

			$('#'+file.id).find('b').html('<span>' + file.percent + "%</span>");

			$('#'+handle).val('<div id="myProgress"><div id="myBar" style=" position: absolute;width: '+ file.percent +'%;height: 100%;background-color: green;">'+ file.percent +'</div></div>');

			$('#'+att).html('<div id="myProgress"><div id="myBar" style=" position: absolute;width: '+ file.percent +'%;height: 100%;background-color: green;">'+ file.percent +'</div></div>');

		},



		UploadComplete: function (up, files) {

			$('[type="submit"]:disabled').removeAttr('disabled');
			var $htm = $('#gallynew').html();
			$('#gallynew').html('');
			//$('#'+handle).val(files[0]['target_name']);
			var coun = ObjectLength(files);
			//console.log(coun);
			
			for(var $i=0;$i<coun;$i++){
				//$('#gallynew').html('');
				var str = files[$i]['target_name'];
				

				$('#gallynew').html($htm+'<div class="test"><img class="align-self-start w-160" src="../../upload/'+fileName+'/'+str+'" alt="user">  <input type="hidden" value="'+str+'" name="gallery[]"><button type="submit" class="btn btn-outline btn-info mr-10 close"><i class="fa fa-check"></i> Delete</button></div>');
				
				/*var appendToResult = '<img class="align-self-start w-160" src="../../upload/'+fileName+'/'+str+'" alt="user">  <input type="hidden" value="'+str+'" name="gallery[]">';
				appendToResult = appendToResult.concat($('#gallynew').html());*/
				
				console.log(str);
			}
			var res = str.split(".");
			
			
			//console.log( ObjectLength(files) );return false;
			//console.log(str+'==='+files[0]['target_name']+'==='+files[1]['target_name']+count(files));return false;

			$('#'+handle).val(str);

			var newFileName = str+'.'+res[1];
			//for(var $i=1;$i>coun;$i++){
				$('#'+att).html('<a href="../../upload/'+fileName+'/'+str+'?<?php echo time();?>" target="_blank" class="btn btn-primary btnfont">View Uploaded File</a>');
			//}
			

			$('.filelist-poster').html('');

		},



		Error: function (up, err) {console.log(err);

			var errMsg = $('<span class="file-upl-error-msg text-danger"/>');

			if(err.code == "-599"){

			  // $(errMsg).html('Minimum allowed filesize is 50KB.');

			   swal({title:"Error!",text:"Minimum allowed filesize is "+maxSize+".",type: "error",confirmButtonText: "Ok"});

			}

			if(err.code == "-600"){

			   //$(errMsg).html('Maximum allowed filesize is 100KB.')

			   swal({title:"Error!",text:"Maximum allowed filesize is "+maxSize+".",type: "error",confirmButtonText: "Ok"});

			}

			if(err.code == "-601"){

			   //$(errMsg).html('Only PDF file formats supported.')

			   swal({title:"Error!",text:"Only "+mimeName+" file formats supported.",type: "error",confirmButtonText: "Ok"});

			}

			$('.filelist-poster').html('');

			$('#'+uploaderId).parents('.form-group').find('.filelist-poster').append(errMsg);

		}

	}

});



posterUploader.init();

}

</script>

    
    <!-- jQuery UI 1.11.4 -->
    <script src="../assets/vendor_components/jquery-ui/jquery-ui.js"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

    <!-- jQuery 3 -->
    <script src="../assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>

    <!-- popper -->
    <script src="../assets/vendor_components/popper/dist/popper.min.js"></script>

    <!-- Bootstrap 4.1-->
    <script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Bootstrap tagsinput -->
    <script src="../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>

    <!-- Bootstrap touchspin -->
    <script src="../assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Bootstrap Select -->
	<script src="../assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
    <!-- Select2 -->
	<script src="../assets/vendor_components/select2/dist/js/select2.full.js"></script>
    <!-- InputMask -->
    <script src="../assets/vendor_plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js"></script>

    <!-- date-range-picker -->
    <script src="../assets/vendor_components/moment/min/moment.min.js"></script>
    <script src="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- bootstrap datepicker -->
    <script src="../assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <!-- bootstrap color picker -->
    <script src="../assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

    <!-- bootstrap time picker -->
    <script src="../assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>

    <!-- SlimScroll -->
    <script src="../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

    <!-- iCheck 1.0.1 -->
    <script src="../assets/vendor_plugins/iCheck/icheck.min.js"></script>

    <!-- FastClick -->
    <script src="../assets/vendor_components/fastclick/lib/fastclick.js"></script>


    <!-- Magnific popup JavaScript -->
    <script src="../assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="../assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>

    <!-- iCheck 1.0.1 -->
    <script src="../assets/vendor_plugins/iCheck/icheck.min.js"></script>

    <!-- ChartJS -->
    <script src="../assets/vendor_components/chart.js-master/Chart.min.js"></script>

    <!-- Slimscroll -->
    <script src="../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- FastClick -->
    <script src="../assets/vendor_components/fastclick/lib/fastclick.js"></script>

    <!-- Morris.js charts -->
    <script src="../assets/vendor_components/raphael/raphael.min.js"></script>
    <script src="../assets/vendor_components/morris.js/morris.min.js"></script>

    <!-- This is data table -->
    <script src="../assets/vendor_components/datatable/datatables.min.js"></script>



    <!-- NEEV MITRA for advanced form element -->
    <script src="js/pages/advanced-form-element.js"></script>


    <!-- NEEV MITRA App -->
    <script src="js/template.js"></script>

    <!-- NEEV MITRA dashboard demo (This is only for demo purposes) -->
    <script src="js/pages/dashboard.js"></script>

    <!-- NEEV MITRA for demo purposes -->
    <script src="js/demo.js"></script>

    <!-- Sweet-Alert  -->
    <script src="../assets/vendor_components/sweetalert/sweetalert.min.js"></script>
    <script src="../assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js"></script>

    <!-- CK Editor -->
    <script src="../assets/vendor_components/ckeditor/ckeditor.js"></script>

    <!-- NEEV MITRA for editor -->
    <script src="js/pages/editor.js"></script>

    <script type="text/javascript" src="../plupload/js/plupload.full.min.js"></script>

</body>

</html>