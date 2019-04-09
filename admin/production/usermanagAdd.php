<?php
	ob_start();
	session_start();
	
	//require 'include/connection.php';
	require 'include/constants.php';
	require 'include/functions.php';
	require 'db/Db.class.php';
	//echo $_SERVER['HTTP_REFERER'];
	//echo $_SESSION['LOGIN_ROLE'];
	if ($_SESSION['USER_ID'] == '' || $_SESSION['USER_ID'] == 0) { header('location:login.php'); }
	if ($_SESSION['LOGIN_ROLE'] == 1 ){}else if($_SESSION['LOGIN_ROLE'] == 2){}else{ header('location:admin.php'); exit(); }
//	echo '<pre>';
	//print_r($_SESSION);
	/*if(in_array('2',$cookieRightsArr)){}else{ header('location:../index.php'); exit(); }
     $moduleArrkey = array_keys($moduleArr);*/
	
	$token = md5(uniqid());
	$_SESSION['TOKEN'] = $token;
	session_write_close();
		
	//$db2File = 'dealer2db.php';$id = input_filter_data(MyDecoder($_GET['id']),'integer');
	$table = '__userdetail';
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
		
		/* $rowAdmin = $db->row('SELECT fld_id,fld_name,fld_UserName,fld_UserPass,fld_countryId,fld_mobile,fld_status,userType FROM '.$table.' WHERE fld_id = :id AND `fld_status` != :status LIMIT 1', array('id' => $id, 'status'=>'-1' ));*/
		 $rowAdmin = $db->row('SELECT * FROM `__userdetail`WHERE  fld_id = '.$id.'');
		 //print_r($rowAdmin);
		 if(count($rowAdmin) == 0){
			 echo 'Some error occured.'; exit();
		 }
	}
	
	// geting data from databse
	
//echo 	$id = isset($rowAdmin['fld_id']) ? $rowAdmin['fld_id'] : ""; exit();
	$fld_id = isset($rowAdmin['fld_id']) ? $rowAdmin['fld_id'] : "";
	$fld_fname = isset($rowAdmin['fld_fname']) ? $rowAdmin['fld_fname'] : ""; 
	$fld_lname = isset($rowAdmin['fld_lname']) ? $rowAdmin['fld_lname'] : ""; 
	$fld_email = isset($rowAdmin['fld_email']) ? $rowAdmin['fld_email'] : ""; 
	$fld_phonenumber = isset($rowAdmin['fld_phonenumber']) ? $rowAdmin['fld_phonenumber'] : '';  
	
	$fld_dob = isset($rowAdmin['fld_dob']) ? $rowAdmin['fld_dob'] : ""; 
	$fld_dob = date('d-m-Y',strtotime($rowAdmin['fld_dob']));
		
	$fld_anniversary = isset($rowAdmin['fld_anniversary']) ? $rowAdmin['fld_anniversary'] : "";
	$fld_anniversary = date('d-m-Y',$rowAdmin['fld_anniversary']);
	
	$fld_office = isset($rowAdmin['fld_office']) ? $rowAdmin['fld_office'] : ""; 
	$fld_city = isset($rowAdmin['fld_city']) ? $rowAdmin['fld_city'] : ""; 
	$fld_state = isset($rowAdmin['fld_state']) ? $rowAdmin['fld_state'] : ""; 
	$fld_country = isset($rowAdmin['fld_country']) ? $rowAdmin['fld_country'] : '';  
	$fld_pin = isset($rowAdmin['fld_dob']) ? $rowAdmin['fld_pin'] : ""; 
	$fld_status = isset($rowAdmin['fld_status']) ? $rowAdmin['fld_status'] : ""; 
	
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon-180x180.png">

    <title>Tata Motors: Neev Mitra Admin Panel</title>

    <!-- Bootstrap 4.0 -->
    <link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.css" />

    <!-- Popup CSS -->
    <link href="../assets/vendor_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet" />

    <!-- Bootstrap extend -->
    <link rel="stylesheet" href="css/bootstrap-extend.css" />
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.0.46/css/materialdesignicons.css"/>
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
                        <h3 class="page-title">Users</h3>
                    </div>

                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <!-- Validation wizard -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add User</h4>
                    </div>
                    <!-- /.box-header -->
                     <form action="usermanagAdd2db.php" class="form-element" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Personal Info</h4>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="First Name" name="fld_fname" value="<?=$fld_fname ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name" name="fld_lname" value="<?=$fld_lname ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="text" class="form-control" placeholder="E-mail" name="fld_email" value="<?=$fld_email ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input type="text" class="form-control" placeholder="Phone" name="fld_phonenumber" value="<?=$fld_phonenumber ?>" id="fld_phonenumber">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask="" name="fld_dob" value="<?=$fld_dob ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Anniversary</label>
                                        <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask="" name="fld_anniversary" value="<?=$fld_anniversary ?>">
                                    </div>
                                </div>

                            </div>
                            <h4 class="box-title text-info"><i class="ti-location-pin mr-15"></i> Address</h4>
                            <hr class="my-15">
                            <div class="form-group">
                                <label>Office</label>
                                <textarea rows="5" class="form-control" placeholder="Correspondance / Permanent Address" name="fld_office"><?=$fld_office ?></textarea>
                            </div>
							
                            <?php 
								$rowStateAdmin = $db->query('SELECT fld_state_name,fld_id FROM `stateMaster_tbl` ');
								$rowCityAdmin = $db->query('SELECT fld_id,fld_state_id,fld_city_name FROM `cityMaster_tbl` ');
							?>
                            
                            <div class="row">
                            	<div class="col-md-6" id="stateList">
                                    <div class="form-group">
                                        <label>State</label>
                                        <select class="form-control" name="fld_state" id="fld_state">
                                            <option value="">Select State</option>
                                            <?php 
												foreach($rowStateAdmin as $key => $value){
											  ?>
													<option value="<?=$value['fld_id'];?>"><?=$value['fld_state_name'];?></option>
											  <?php
												}
											  ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="cityList">
                                        <label>City</label>
                                        <select class="form-control" name="fld_city">
                                            <option value="">Select City</option>
                                            <?php 
												foreach($rowCityAdmin as $key => $value){
											  ?>
													<option value="<?=$value['fld_id'];?>"><?=$value['fld_city_name'];?></option>
											  <?php
												}
											  ?>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control" name="fld_country">
                                            <option value="India" selected> India</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pin</label>
                                        <input type="text" class="form-control" placeholder="PIN" value="<?=$fld_pin ?>" name="fld_pin">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-nblue btn-outline mr-1">
                                    <i class="ti-save-alt"></i> 
									<?php
                                    	if(intval($id)!==0){
										echo 'update';	
										}else{
											echo 'Save'	;
										}
									?>
									
                                </button>
                                <!--<button type="button" class="btn btn-danger btn-outline">
                                    <i class="ti-trash"></i> Cancel
                                </button>-->

                            </div>

                        </div>
                    </form>

                    <!-- /.box -->

                </div>

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

    <!-- Bootstrap Select -->
    <script src="../assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>

    <!-- Bootstrap tagsinput -->
    <script src="../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>

    <!-- Bootstrap touchspin -->
    <script src="../assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>

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
    

    <!-- CK Editor -->
    <script src="../assets/vendor_components/ckeditor/ckeditor.js"></script>

    <!-- NEEV MITRA for editor -->
    <script src="js/pages/editor.js"></script>

    <!-- steps  -->
    <script src="../assets/vendor_components/jquery-steps-master/build/jquery.steps.js"></script>

    <!-- validate  -->
    <script src="../assets/vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
    
    <!-- Sweet-Alert  -->
    <script src="../assets/vendor_components/sweetalert/sweetalert.min.js"></script>
    <script src="../assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js"></script>

    <!-- wizard  -->
    <script src="js/pages/steps.js"></script>
    <!-- NEEV MITRA for advanced form element -->
    <script src="js/pages/advanced-form-element.js"></script>

    <script language="javascript">
	
	$('#fld_phonenumber').blur(function() {
		var $valid = this.value
		if($valid==''){return false;}
			$.ajax({ 
			type: "POST",
			url: "ajax/validate.php",
			data : {'valid':$valid},//,rememberMe:rememberMe
			success: function(data){ //alert(data);return false;
				if(data==1){
					alert('This phone number is already register');
					$('#fld_phonenumber').val('');
					$('#fld_phonenumber').focus();
					return false;
				}
			}
	
		 });

	});
	$('#fld_state').on('change', function() {
		
		var $valid = this.value
		//console.log($valid);return false;
			$.ajax({ 
			type: "POST",
			url: "ajax/cityList.php",
			data : {'valid':$valid},//,rememberMe:rememberMe
			success: function(data){ //alert(data);return false;
				$("#cityList").html( data );
			}
	
		 });

	});
	function chkFrmval()
	{
		
	  var mobileNo =  $("#mobileNo").val();
	  if(mobileNo != '' ){
		 if(mobileNo == 0){
			 alert('Please enter valid mobile number.'); return false;
			 $("#mobileNo").focus();
		 }
	  }
		
	}//function chkFrmval(){
	</script>
    <script type="text/javascript" src="../plupload/js/plupload.full.min.js"></script>



</body>

</html>