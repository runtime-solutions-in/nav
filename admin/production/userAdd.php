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

	$table = 'loginMaster_tbl';

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

		 $rowAdmin = $db->row('SELECT * FROM `loginMaster_tbl`WHERE  fld_id = '.$id.'');

		 //print_r($rowAdmin);

		 if(count($rowAdmin) == 0){

			 echo 'Some error occured.'; exit();

		 }

	}

	

	// geting data from databse

	

//echo 	$id = isset($rowAdmin['fld_id']) ? $rowAdmin['fld_id'] : ""; exit();

	$fld_id = isset($rowAdmin['fld_id']) ? $rowAdmin['fld_id'] : "";

	$fld_name = isset($rowAdmin['fld_name']) ? $rowAdmin['fld_name'] : ""; 

	$fld_userName = isset($rowAdmin['fld_userName']) ? $rowAdmin['fld_userName'] : ""; 

	$fld_mobileNo = isset($rowAdmin['fld_mobileNo']) ? $rowAdmin['fld_mobileNo'] : ""; 

	$country = isset($rowAdmin['fld_countryId']) ? $rowAdmin['fld_countryId'] : $_SESSION['country'];  

	$userType = isset($rowAdmin['userType']) ? $rowAdmin['userType'] : ""; 

	$fld_password = isset($rowAdmin['fld_password']) ? $rowAdmin['fld_password'] : "";

	$fld_raw_password = isset($rowAdmin['fld_raw_password']) ? $rowAdmin['fld_raw_password'] : "";

	

	

	/*$rights = isset($rowAdmin['rights']) ? $rowAdmin['rights'] : ""; 

	$status = isset($rowAdmin['status']) ? $rowAdmin['status'] : ""; 

	$fld_password = isset($rowAdmin['fld_password']) ? $rowAdmin['fld_password'] : ""; */

	//print_r(explode(',',$rights));

			

	if(isset($_GET['msg'])){

	   $msg = intval($_GET['msg']);

	}else{

		 $msg = '';

	}

	

	switch($msg) {

		case 1 : $msgText = 'Require valid input data method'; break;

		case 2 : $msgText = 'App user Code is not valid'; break;

		case 3 : $msgText = 'App user Name is not valid'; break;

		case 4 : $msgText = 'App user Code & App Name should be valid'; break;

		case 5 : $msgText = 'App user Addition Failed'; break;

		case 6 : $msgText = 'App user Added successfully'; break;

		case 7 : $msgText = 'App user Updation Failed'; break;

		case 8 : $msgText = 'App user Updated successfully'; break;

		case 9 : $msgText = 'Only App user module is allowed'; break;

		 default : $msgText = ''; break;

	}

	

	//if($region = ''){$region = $_SESSION['region'];}

    //if($country = ''){$country = $_SESSION['country'];}	

?>	

<!DOCTYPE html>

<html lang="en">

  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title><?php echo DOMAIN_NAME; ?> - App User Detail</title>



    <!-- Bootstrap -->

    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->

    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- NProgress -->

    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- iCheck -->

    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Datatables -->

    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">

    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">

    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">

    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

	<!-- Select2 -->

    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">



    <!-- Custom Theme Style -->

    <link href="../build/css/custom.min.css" rel="stylesheet">

    

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

  </head>



  <body class="nav-md">

    <div class="container body">

      <div class="main_container">

        <div class="col-md-3 left_col">

          <?php require 'lhs.php'; ?>

        </div>



        <?php require 'top.php'; ?>



        <!-- page content -->

        <div class="right_col" role="main">

          <div class="">

            <div class="page-title">

              <div class="title_left">

                <h3><?php echo $op; ?> App User</h3>

              </div>

           

              

            </div>



            <div class="clearfix"></div>



            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                   <div class="x_content">

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

                    <form class="form-horizontal form-label-left" novalidate method="POST" action="userAdd2db.php" autocomplete="off"> 

						<input type="hidden" name="token" value="<?php echo $token; ?>">

                        <div class="item form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Full Name">Full Name <span class="required">*</span>

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input type="text" id="fName" name="fName" onkeyup="checkInput2(fName.value);"  data-validate-length-range="1" class="form-control col-md-7 col-xs-12" value="<?php echo $fld_name; ?>" maxlength="50" autocomplete="off" placeholder="" data-msg="Please enter your full name" required >

                        </div>

                      </div>

					 

                        <div class="item form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="User Email"> Email <span class="required">*</span>

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input type="email" id="emailId" name="emailId" data-validate-length-range="1" class="form-control col-md-7 col-xs-12" value="<?php echo $fld_userName; ?>" maxlength="100" autocomplete="off" required>

                        </div>

                      </div>

                      

                      <div class="item form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="User mobile No">Mobile No <span class="required">*</span>

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input type="text" id="mobileNo" name="mobileNo" onkeyup="checkInput(mobileNo.value);" data-validate-length-range="1" class="form-control col-md-7 col-xs-12" value="<?php echo $fld_mobileNo; ?>" maxlength="20" autocomplete="off" required>

                        </div>

                      </div>

                      

                       

                      

                       <div class="item form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Country <span class="required">*</span>

                        </label><?php  //echo $sql = "SELECT fld_countryName,fld_id FROM `countryMaster_tbl` WHERE `fld_status` = '1'  AND  fld_id=".$country." ORDER BY fld_countryName ASC";  //echo 'LOGIN_ROLE=='.$_SESSION['LOGIN_ROLE']; ?>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                                               

                           <select id="country" name="country"  class="form-control col-md-7 col-xs-12" required>

                            

                           <?php  

						   

						    if($_SESSION['LOGIN_ROLE'] != 1){ 

							    

								 $CountryList = $db->query("SELECT fld_countryName,fld_id FROM `countryMaster_tbl` WHERE `fld_status` = '1'  AND  fld_id=:id ORDER BY fld_countryName ASC",array('id' =>$country));

							  }else{

								    echo ' <option value="">Select Country</option>';

								    $CountryList = $db->query("SELECT fld_countryName,fld_id FROM `countryMaster_tbl` WHERE `fld_status` = '1' ORDER BY fld_countryName ASC");

							  }

						    

	                         

							  foreach($CountryList as $countryName){

					      ?>

                               <option value="<?php echo $countryName['fld_id'] ?>" <?php if($country == $countryName['fld_id']){ echo 'selected';} ?>><?php echo strtoupper($countryName['fld_countryName']); ?></option>

                          <?php

							  }

							?> 

                            </select> 

                        </div>

                      </div>

                      

                        

                      

                       <div class="item form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address"> Type <span class="required">*</span>

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                        <select id="userType" name="userType"  class="form-control col-md-7 col-xs-12"  required>

                        

                       <?php if($_SESSION['LOGIN_ROLE'] == 1){ ?>

                         <option value="">Select User Type </option>

                         <option value="1" <?php if($userType == '1'){ echo 'selected';} ?>>Super Admin</option>

                         <option value="2" <?php if($userType == '2'){ echo 'selected';} ?>>Admin</option>

                       <?php }elseif($_SESSION['LOGIN_ROLE'] == 2){ ?> 

                     <?php /*?>   <option value="">Select user Type</option><?php */?>

                        <?php /*?> <option value="2" <?php if($userType == '2'){ echo 'selected';} ?>>Admin</option><?php */?>

                       <?php } ?>

                         <option value="3" <?php if($userType == '3'){ echo 'selected';} ?>>Dealer</option>

                        </select>

                        </div>

                      </div>

                      

                      

                      

                      <?php if(intval($id) !='' ){ ?>

                        <div class="item form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dealerName">Password <span class="required">*</span>

                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input type="text" id="password" name="password" data-validate-length-range="1" class="form-control col-md-7 col-xs-12" value="<?php echo $fld_raw_password;?>" maxlength="100" autocomplete="off" required>

                        </div>

                      </div>

                      <?php } ?> 

                      

                       

                     

                      <div class="form-group">

                        <div class="col-md-6 col-md-offset-3">

                          <button type="button" class="btn btn-danger" onclick="javascript:window.location='user_list.php';">Cancel</button>

                          <button id="send" type="submit" class="btn btn-success" onClick="return chkFrmval();">Submit</button>

                          <div id="ErrorDisp" style="color:#F00; display:none;"></div>

                        </div>

                      </div>

					  

					  <input type="hidden" name="hiddenId" id="hiddenId" value="<?php echo $id; ?>">

					  

                    </form>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

        <!-- /page content -->



        <?php require 'footer.php'; ?>

      </div>

    </div>





	

	<?php require 'footer-scripts.php'; ?>

	<!-- bootstrap-daterangepicker -->

    <script src="js/moment/moment.min.js"></script>

	<script src="js/datepicker/daterangepicker.js"></script>

	<!-- Select2 -->

    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>

    <script>

	<?php  if($_SESSION['LOGIN_ROLE'] == 1){ ?>

		 $( "#region" ).change(function() {

			 var regionId = $(this).val();

			

			 $.post( "ajax_region.php",{ regionId: regionId, time: "2pm" },function(result){  $("select#country").html(result);});

		 });

	 <?php }  if(intval($id) == 0){?>

	 

	 $('#emailId').blur(function(){  

	   var emailId = $(this).val();

	    $.post( "ajax_email.php",{ emailId: emailId, time: "2pm" },function(result){ if(result == 1){alert('This email id already exixts.');  $('#send').prop('disabled', true); return false;}else{ $('#send').removeAttr("disabled");; return true;}});

	 })

	 <?php } ?>

	 

	 function checkInput(num) {//alert(id+'='+num);

		 var regexNum = /^[0-9]+$/;

		if(!regexNum.test(num)){ 

			var value = ($("#mobileNo").val()).replace(num, '');

			$('#mobileNo').val(value);

		}

     }//checkInput()

	 function checkInput2(num) {//alert(id+'='+num);

		 var regexNum = /^[a-zA-Z ]*$/;

		if(!regexNum.test(num)){ 

			var value = ($("#fName").val()).replace(num, '');

			$('#fName').val(value);

		}

	  }

	 </script>

  </body>

</html>