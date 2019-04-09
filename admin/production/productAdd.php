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
	$table = '__masterproduct';
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
		 $rowAdmin = $db->row('SELECT * FROM `__masterproduct`WHERE  fld_id = '.$id.'');
		 //print_r($rowAdmin);
		 if(count($rowAdmin) == 0){
			 echo 'Some error occured.'; exit();
		 }
	}
	
	// geting data from databse
	
//echo 	$id = isset($rowAdmin['fld_id']) ? $rowAdmin['fld_id'] : ""; exit();
	$fld_id = isset($rowAdmin['fld_id']) ? $rowAdmin['fld_id'] : "";
	$fld_productname = isset($rowAdmin['fld_productname']) ? $rowAdmin['fld_productname'] : ""; 
	$fld_categoryName = isset($rowAdmin['fld_categoryName']) ? $rowAdmin['fld_categoryName'] : ""; 
	$photo_doc = isset($rowAdmin['fld_productthumb']) ? $rowAdmin['fld_productthumb'] : ""; 
	//$country = isset($rowAdmin['fld_countryId']) ? $rowAdmin['fld_countryId'] : $_SESSION['country'];  
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
                        <h3 class="page-title">Master Product Management</h3>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <?php
				if ($msg != 0) {
					if ($msg == 6 || $msg == 8) {
			?>
					<div class="alert alert-success alert-dismissible">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Success!</strong> <?php echo $msgText; ?>
					</div>
			<?php	} else { ?>
					<div class="alert alert-danger alert-dismissible">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Failure!</strong> <?php echo $msgText; ?>
					</div>
			<?php	
					}
				}
			?>
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">About Product</h4>
                                <span class="box-controls pull-right" style="top:0.5rem">
                                    <a href="product_list.php" class="btn btn-md btn-nblue btn-sm btn-block my-10">
                                        <!--<i class="ti-plus"></i>--> Back
                                    </a>
                                </span>
                            </div>
                            <div class="box-body">
                                <form action="productAdd2db.php" class="form-element" method="post" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="text-info">Product Name</label>
                                                    <input type="text" class="form-control" placeholder="Product Name" name="fld_productname" required value="<?=$fld_productname?>">
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-info">Select Category</label>
                                                    <select class="form-control" data-placeholder="Choose a Category" tabindex="1" name="fld_categoryName" required>

                                                        <option value="Cargo" <?php if(strtolower($fld_categoryName)=='cargo'){ echo 'selected'; }?>>Cargo</option>
                                                        <option value="Passenger" <?php if(strtolower($fld_categoryName)=='passenger'){ echo 'selected'; }?>>Passenger</option>

                                                    </select>

                                                </div>
                                                <div class="form-group">
                                                    <label class="text-info">Product Thumbnail.<span class="text-danger">*</span>
                                                    <span class="help-block text-danger">Maximum file size is 20MB.</span>
                                                    </label>
                                                    <div class="input-group input-group-sm">
                                                        <!--<input type="file" class="form-control">-->
                                                        <input type="file" name="photo" id="upload-photo-doc" accept="application/pdf" class="form-control hidden pick-file-target">
                                                    
                                                    <input type="hidden" id="photo-doc" name="photo_doc" class="form-control pick-file" placeholder="Pick a File"  value="<?php echo $photo_doc;?>"  required="required"  onKeyPress="return false;"><span class="uploader-button"></span>
<!--
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-default fa fa-upload">
                                                                Upload</button>
                                                        </span>
-->
                                                    </div>
                                                    
                                                    <p id="photo"><?php if($photo_doc!=''){ 
													echo '<a href="../../upload/photo/'.$photo_doc.'?'.time().'" target="_blank" class="btn btn-primary btnfont">View Uploaded File</a>';}?></p>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-info">Product Logo<span class="text-danger">*</span>
                                                    <span class="help-block text-danger">Maximum file size is 20MB.</span>
                                                    </label>
                                                    <div class="input-group input-group-sm">
                                                        <input type="file" name="photo_big" id="upload-photo_big-doc" accept="application/pdf" class="form-control hidden pick-file-target" >
                                                    
                                                    <input type="hidden" id="photo_big-doc" name="photo_big_doc" class="form-control pick-file" placeholder="Pick a File"  value="<?php echo $photo_big_doc;?>"  required="required"  onKeyPress="return false;"><span class="uploader-button"></span>
<!--
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-default fa fa-upload">
                                                                Upload</button>
                                                        </span>
-->
                                                    </div>
                                                    <p id="photo_big"><?php if($photo_big_doc!=''){ 
													echo '<a href="../../upload/photo_big/'.$photo_big_doc.'?'.time().'" target="_blank" class="btn btn-primary btnfont">View Uploaded File</a>';}?></p>
                                                </div>


                                            </div>
                                            <!-- /span -->
                                        </div>
                                        <!-- /row -->

                                        <hr />
                                        

                                        <div class="form-actions m-10">
                                            <button type="submit" class="btn btn-outline btn-info mr-10">
                                                <i class="fa fa-check"></i> Submit
                                            </button>
                                            <!--<button type="button" class="btn btn-outline btn-danger">
                                                <i class="fa fa-close"></i> Cancel
                                            </button>-->
                                        </div>

                                    </div>
                                    <input type="hidden" name="hiddenId" id="hiddenId" value="<?php echo $id; ?>">
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

    <script language="javascript">
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

<script>

$('.error').hide();

var users_id = $('#fld_productname').val();

$(window).on('load', loadOps);

function loadOps(){

	//$('.pick-file').on('focus click', function(){

	$('.pick-file').on('click', function(){

		var $t = $(this),

			$target = $t.parent().find('.pick-file-target');

		$target.trigger('click').on('change', function(){

			if($(this).val() !== ''){

				$t.attr('placeholder', 'Uploading in progress');

			}

		})

	})

	__initUploaders('photo-doc', 'jpg', 'JPEG', '20480kb', 'photo', users_id);
	__initUploaders('photo_big-doc', 'jpg', 'JPEG', '20480kb', 'photo_big', users_id);

}

function __initUploaders(handle, mimeExt, mimeName, maxSize, fileName, users_id){

var uploaderId = 'upload-'+handle;

var posterUploader = new plupload.Uploader({

	runtimes: 'html5,silverlight,html4,flash',

	browse_button: 'upload-'+handle, // you can pass an id...

	url: '../upload-file.php?imagePath='+fileName+'&userId='+users_id,

	flash_swf_url: '../plupload/js/Moxie.swf',

	silverlight_xap_url: '../plupload/js/Moxie.xap',



	multi_selection: false,

	unique_names: true,

	chunk_size: '2048kb',

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

			$('#'+fileName).html('<div id="myProgress"><div id="myBar" style=" position: absolute;width: '+ file.percent +'%;height: 100%;background-color: green;">'+ file.percent +'</div></div>');

		},



		UploadComplete: function (up, files) {

			$('[type="submit"]:disabled').removeAttr('disabled');

			//$('#'+handle).val(files[0]['target_name']);

			var str = files[0]['target_name'];

			var res = str.split(".");

			//console.log(str+'==='+res[0]);return false;

			$('#'+handle).val(str);

			var newFileName = str+'.'+res[1];

			$('#'+fileName).html('<a href="../../upload/'+fileName+'/'+str+'?<?php echo time();?>" target="_blank" class="btn btn-primary btnfont">View Uploaded File</a>');

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

</body>

</html>