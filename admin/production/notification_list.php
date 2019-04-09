<?php
	ob_start();
	session_start();
	
	session_regenerate_id();
	
	//require 'include/connection.php';
	require 'include/constants.php';
	require 'include/functions.php';
	//echo 'Juned'.$_SESSION['LOGIN_ROLE']; exit();
	
	if ($_SESSION['USER_ID'] == '' || intval($_SESSION['USER_ID']) == 0) { header('location:login.php'); exit();}
	if ($_SESSION['LOGIN_ROLE'] == 1 ){}else if($_SESSION['LOGIN_ROLE'] == 2){}else{ header('location:admin.php'); exit(); }
	
	$db2File = 'notification_list2db.php';
	$table = '__notification';
	//echo '<pre>';
	//print_r($_SESSION);
?>	
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from heartcode.co/draft9/main/products.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Mar 2019 08:20:33 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon-180x180.png">

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
            <section class="content">

                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Manage Notifications</h4>
                                <h6 class="box-subtitle">List of products uploaded by NEEV</h6>
                                <span class="box-controls pull-right">
                                    <a href="notificationAdd.php" class="btn btn-md btn-nblue btn-block my-10">
                                        <i class="ti-plus"></i> Add New Notification
                                    </a>
                                </span>
                            </div>
                            <div class="box-body">
<!--
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ml-15">
                                            <label class="text-info">Select Products</label>
                                            <div class="controls">
                                                <select name="select" style="width:13%;" id="region-list" required="" class="form-control" aria-invalid="false" onchange="getval(this);">
                                                    <option value="">Select Products</option>
                                                    <option value="cargo">Cargo</option>
                                                    <option value="passenger">Passenger</option>

                                                </select>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
-->
                                <div class="table-responsive">
                                    <table id="datatable-responsive" class="table table-hover no-wrap no-padding product-order" data-page-size="10">
                                        <thead>
                                            <tr class="bg-secondary">
                                                <th>ID</th>
                                                <th>Sate</th>
                                                <th>Language</th>
                                                <th>Notification</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr class="bg-secondary">
                                                <th>ID</th>
                                                <th>Sate</th>
                                                <th>Language</th>
                                                <th>Notification</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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

    <!-- Magnific popup JavaScript -->
    <script src="../assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="../assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>

    <!-- popper -->
    <script src="../assets/vendor_components/popper/dist/popper.min.js"></script>

    <!-- date-range-picker -->
    <script src="../assets/vendor_components/moment/min/moment.min.js"></script>
    <script src="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Bootstrap 4.0-->
    <script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>

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
    
    <!-- Sweet-Alert  -->
    <script src="../assets/vendor_components/sweetalert/sweetalert.min.js"></script>
    <script src="../assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js"></script>

    <!-- NEEV MITRA App -->
    <script src="js/template.js"></script>

    <!-- NEEV MITRA dashboard demo (This is only for demo purposes) -->
    <script src="js/pages/dashboard.js"></script>

    <!-- NEEV MITRA for demo purposes -->
    <script src="js/demo.js"></script>

    <!-- Data Table -->
    <script src="js/pages/data-table.js"></script>
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