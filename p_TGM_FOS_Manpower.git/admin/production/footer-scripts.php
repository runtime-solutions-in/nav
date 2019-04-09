    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
	 <!-- validator -->
    <script src="../vendors/validator/validator.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    
     <!-- Custom sweetalert Scripts -->
       <script src="../vendors/sweetalert/sweetalert.min.js"></script>
      
	
	<!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });
    </script>
    <!-- /validator -->
	
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