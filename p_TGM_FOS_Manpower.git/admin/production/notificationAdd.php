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
	$table = '__notification';
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
		 $rowAdmin = $db->row('SELECT * FROM `__notification`WHERE  fld_id = '.$id.'');
		 //print_r($rowAdmin);
		 if(count($rowAdmin) == 0){
			 echo 'Some error occured.'; exit();
		 }
	}
	
	// geting data from databse
	
//echo 	$id = isset($rowAdmin['fld_id']) ? $rowAdmin['fld_id'] : ""; exit();
	$fld_id = isset($rowAdmin['fld_id']) ? $rowAdmin['fld_id'] : "";
	$fld_notiState = isset($rowAdmin['fld_notiState']) ? $rowAdmin['fld_notiState'] : ""; 
	$fld_notiLang = isset($rowAdmin['fld_notiLang']) ? $rowAdmin['fld_notiLang'] : ""; 
	$fld_notiDesc = isset($rowAdmin['fld_notiDesc']) ? $rowAdmin['fld_notiDesc'] : ""; 
	
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
    <?php  include_once('inc/headerScript.php'); ?>

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
                        <h3 class="page-title">Notifications</h3>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <?php
				if ($msg != 0) {
					if ($msg == 6 || $msg == 8) {
			?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Success!</strong> <?php echo $msgText; ?>
                            </div>
                        </div>
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
                                <h4 class="box-title">Add Notifications</h4>
                                <span class="box-controls pull-right" style="top:0.5rem">
                                    <a href="notification_list.php" class="btn btn-md btn-nblue btn-sm btn-block my-10">
                                        <!--<i class="ti-plus"></i>--> Back
                                    </a>
                                </span>
                            </div>
                            <div class="box-body">
                                <form action="notificationAdd2db.php" class="form-element" method="post" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-12">
                                                 <?php 
														$rowStateAdmin = $db->query('SELECT fld_state,fld_id FROM `__state` ');
													?>
                                                <div class="form-group">
                                                    <label class="text-info">State</label>
                                                   <select class="form-control select2" name="fld_notiState" id="selectlang" required="" aria-invalid="false">
															<option value="">Select State</option>
															<?php 
																foreach($rowStateAdmin as $key => $value){
															  ?>
																	<option value="<?=$value['fld_state'];?>" <?php if($fld_notiState == $value['fld_state']){echo 'selected';}?>><?=$value['fld_state'];?></option>
															  <?php
																}
															  ?>
														</select>
                                                </div>
                                                <?php 
														$rowCountryAdmin = $db->query('SELECT fld_languageName,fld_id FROM `__language` ');
													?>
                                                <div class="form-group">
                                                    <label class="text-info">Select Language</label>
                                                    <select class="form-control select2" name="fld_notiLang" id="selectlang" required="" aria-invalid="false">
															<option value="">Select Language</option>
															<?php 
																foreach($rowCountryAdmin as $key => $value){
															  ?>
																	<option value="<?=$value['fld_languageName'];?>" <?php if($fld_notiLang == $value['fld_languageName']){echo 'selected';}?>><?=$value['fld_languageName'];?></option>
															  <?php
																}
															  ?>
														</select>

                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="text-info">Description<span class="text-danger">*</span>
                                                   
                                                    </label>
                                                    <div class="input-group input-group-sm">
                                                        <textarea rows="7" class="form-control" name="fld_notiDesc" placeholder="Add Description"><?php echo $fld_notiDesc;?></textarea>
                                                    
                                                   
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

    <?php  include_once('inc/footerScript.php'); ?>

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

	__initUploaders('photo-doc', 'jpg', 'JPEG', '2048kb', 'photo', users_id);
	__initUploaders('photo_big-doc', 'jpg', 'JPEG', '2048kb', 'photo_big', users_id);

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

			$('#'+handle).val('Processing....');

			$('#'+fileName).html('Processing.....');

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