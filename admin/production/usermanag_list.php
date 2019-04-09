<?php
	ob_start();
	session_start();
	
	session_regenerate_id();
	
	//require 'include/connection.php';
	require 'include/constants.php';
	require 'include/functions.php';
	require 'db/Db.class.php'; 
	//echo 'Juned'.$_SESSION['LOGIN_ROLE']; exit();
	
	if ($_SESSION['USER_ID'] == '' || intval($_SESSION['USER_ID']) == 0) { header('location:login.php'); exit();}
	if ($_SESSION['LOGIN_ROLE'] == 1 ){}else if($_SESSION['LOGIN_ROLE'] == 2){}else{ header('location:admin.php'); exit(); }
	
	$db2File = 'usermanag_list2db.php';
	$table = '__tsmUserData';
	//echo '<pre>';
	//print_r($_SESSION);
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

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="../assets/vendor_plugins/iCheck/flat/blue.css">

    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="css/bootstrap-extend.css">
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.0.46/css/materialdesignicons.css"/>
    <!--alerts CSS -->
    <link href="../assets/vendor_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

    <!-- theme style -->
    <link rel="stylesheet" href="css/master_style.css">

    <!-- NEEV MITRA skins -->
    <link rel="stylesheet" href="css/skins/_all-skins.css">

    <!-- daterange picker -->
    <link rel="stylesheet" href="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">

    <!-- Morris charts -->
    <link rel="stylesheet" href="../assets/vendor_components/morris.js/morris.css">
    
    <!-- Data Table-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor_components/datatable/datatables.min.css"/>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
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
        <?php
			$rowTsmData = $db->query('SELECT fld_id FROM __tsmUserData');
			$rowTgmData = $db->query('SELECT fld_id FROM __tgmUserData');
			
		?>
        <div class="content-wrapper">
            <!-- left content -->
            <section class="left-block content fixed-left-block box-transparent">
                <a class="mdi mdi-close mdi-menu btn btn-success open-left-block d-block d-md-none" href="javascript:void(0)"></a>
                <div class="scrollable" style="height: 100%;">
                    <div class="left-content-area">

                        <div class="box box-outline-secondary no-shadow">
                            <div class="box-body">
                                <div class="contact-page-aside">
                                    <ul class="list-style-none font-size-16">
                                        <li class="box-label"><a href="javascript:void(0)">All Users <span><?php echo count($rowTsmData) +  count($rowTgmData);?></span></a></li>
                                        <li class="divider"></li>
                                        <li><a class="text-info" href="javascript:void(0)">TSM <span class="text-info"><?php echo count($rowTsmData);?></span></a></li>
                                        <li><a class="text-info" href="javascript:void(0)">TGM <span class="text-info"><?php echo count($rowTsmData);?></span></a></li>
                                        <!--<li class="box-label"><a href="user-add.php" class="btn btn-nblue text-white mt-10">+ New User</a></li>
                                        <li class="box-label"><a href="javascript:void(0)" class="btn btn-light mt-10"><i class=" ti-import"> </i> Import CSV</a></li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /. box -->

                    </div>
                </div>
            </section>
            <!-- /.left content -->




            <!-- right content -->
            <section class="right-block content">
               <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">View Users</h3>
              <h6 class="box-subtitle">You can export data to Copy, CSV, Excel, PDF & Print</h6>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<div class="table-responsive">
				  <table id="datatable-responsive" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
					<thead>
						<tr>
							<th>Full Name</th>
							<th>Role</th>
                            <th>Map to</th>
							<th>Contact No</th>
							<th>State</th>
							<th>Actions</th>
						</tr>
                        <!--<tr>
							<th>Full Name</th>
                            <th>Email</th>
							<th>Phone Number</th>
							<th>Date of birth</th>
                            <th>Status</th>
							<th>Actions</th>
						</tr>-->
					</thead>
					<tbody>
						
                        </tbody>
				</table>
				</div>              
            </div>
            <!-- /.box-body -->
          </div>
            <!-- /. box -->
            </section>
            <!-- /.right content -->
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

    <!-- popper -->
    <script src="../assets/vendor_components/popper/dist/popper.min.js"></script>

    <!-- date-range-picker -->
    <script src="../assets/vendor_components/moment/min/moment.min.js"></script>
    <script src="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Bootstrap 4.0-->
    <script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>

    <!-- ChartJS -->
    <script src="../assets/vendor_components/chart.js-master/Chart.min.js"></script>


    <!-- FastClick -->
    <script src="../assets/vendor_components/fastclick/lib/fastclick.js"></script>

    <!-- Morris.js charts -->
    <script src="../assets/vendor_components/raphael/raphael.min.js"></script>
    <script src="../assets/vendor_components/morris.js/morris.min.js"></script>

    <!-- This is data table -->
    <script src="../assets/vendor_components/datatable/datatables.min.js"></script>

    <!-- Sweet-Alert  -->
    <script src="../assets/vendor_components/sweetalert/sweetalert.min.js"></script>
    <script src="../assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js"></script>

    <!-- NEEV MITRA App -->
    <script src="js/template.js"></script>

    <!-- NEEV MITRA dashboard demo (This is only for demo purposes) -->
    <script src="js/pages/dashboard.js"></script>

    <!-- NEEV MITRA for demo purposes -->
    <script src="js/demo.js"></script>

    <!-- SlimScroll -->
    <script src="../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../assets/vendor_components/perfect-scrollbar-master/perfect-scrollbar.jquery.min.js"></script>


    <!-- iCheck -->
    <script src="../assets/vendor_plugins/iCheck/icheck.js"></script>
    
	<!-- This is data table -->
    <script src="../assets/vendor_components/datatable/datatables.min.js"></script>
	
	<!-- NEEV MITRA for Data Table -->
    <script src="js/pages/data-table.js"></script>

    <!-- NEEV MITRA for demo purposes -->
    <script src="js/pages/app-contact.js"></script>

     <!-- Datatables -->
    <script>
      $(document).ready(function() {
		
		  
		$("#datatable-responsive").DataTable({
			
			"processing": true,
			"serverSide": true,
			"ajax": "<?php echo $db2File; ?>",				
			
			"order": [[ 0, 'desc' ]],
		 
		  responsive: true,
		  keys: true
		});
      });
	  
	  function deleteRecord(tbl,fld,val,fldUpdate,valUpdate,divname) {
		 // alert(divname); return false;
		  //var t = confirm('Are you sure to delete this record?');
		  
		  swal({
			  title: "Are you sure?",
			  text: "",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, delete it!",
			  cancelButtonText: "No, cancel plz!",
			  closeOnConfirm: true,
			  closeOnCancel: false
			},
			
			function(isConfirm){
			  if (isConfirm) {
				//swal("Deleted!", "Your imaginary file has been deleted.", "success");
				 $.ajax({  
				  type: "POST",  
				  url: "delete2db.php",  
				  data: 'tbl='+tbl+'&fld='+fld+'&val='+val+'&fldUpdate='+fldUpdate+'&valUpdate='+valUpdate,  
				  success: function(data) {  	//alert('#'+'idRow_'+divname);
					if(data == 1){ 
					if(divname.prev('tr.parent').html() !== undefined){
						divname.prev('tr.parent').hide();
					}
					 divname.hide('fast');	/*$('#'+'idRow_'+divname).hide('fast');*/	
					// divname.hide('table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child');
					}else{ alert('some Error occured Please try again.')}
				  }  
				});
				
			  } else {
				swal("Cancelled", "Your Record is safe :)", "error");
			  }
			  //swal("Deleted!"+isConfirm+"" ,"success");
			});
		
		 
	  }
	  

		attachListEvents()
		$(document).ajaxComplete(attachListEvents);
		
		$(document).ajaxComplete(function(){
			$('table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child').on('click', function(){
				setTimeout(function(){ attachListEvents(); }, 10)
			});
		})
		
	  function attachListEvents(){//console.log('init');
		  $('.delete').off('click').on('click', function(e){	  
			  var $t = $(this);
			   var table = $t.data('table');
			   var fld =  $t.data('fld');
			   var id = $t.data('id');
			   var valUpdate = $t.data('status'); //Columan to be updated
			   var fldUpdate =  $t.data('statusfld'); // Columan value to be updated 
			   var divname = $t.data('id');
			   var divname =  $t.closest("tr");
			  //  var divname =  $(this).find("tr");
			 // var divname =  $t.data('id').closest("tr").parent();
			  // console.log(divname); return false;
			   deleteRecord(table,fld,id,fldUpdate,valUpdate,divname);
			 
			  
		  });
		  
		   $('.toggle-status').off('click').on('click', function(){
			 
			  var $t = $(this);
				var $icon = $t.find('i');
				var table = $t.data('table');
				var fld =  $t.data('fld');
				var id = $t.data('id');
				var status = $t.data('action');
				 $.ajax({  
					  type: "POST",  
					  url: "statusupdate2db.php",  
					  data: 'table='+table+'&fld='+fld+'&val='+id+'&status='+status,  
					  success: function(data) {  	//alert(data);
							$t.data('action', (status == '0') ? '1' : '0');
							if(status == '0'){
								$icon.removeClass('fa-check-circle text-success').addClass('fa-times-circle text-danger');
							}else{
								$icon.removeClass('fa-times-circle text-danger').addClass('fa-check-circle text-success');
						   }
					  }  
					});
			   // .error(function(h, s, t){ console.log("error:" + h+s+t); })
				//.complete(function(){})*/
			})
		 }
    </script>
    <!-- /Datatables -->
</body>


<!-- Mirrored from heartcode.co/draft9/main/products.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Mar 2019 08:20:35 GMT -->
</html>
  </body>
</html>