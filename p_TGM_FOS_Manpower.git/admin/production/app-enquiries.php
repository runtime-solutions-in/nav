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

    <!-- Popup CSS -->
    <link href="../assets/vendor_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">

    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="css/bootstrap-extend.css">
    
    <!--alerts CSS -->
    <link href="../assets/vendor_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

    <!-- theme style -->
    <link rel="stylesheet" href="css/master_style.css">

    <!-- NEEV MITRA skins -->
    <link rel="stylesheet" href="css/skins/_all-skins.css">
    
    <!-- daterange picker -->
    <link rel="stylesheet" href="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.0.46/css/materialdesignicons.css"/>
    <!-- Morris charts -->
    <link rel="stylesheet" href="../assets/vendor_components/morris.js/morris.css">

    <!-- Data Table-->
    <link rel="stylesheet" type="text/css" href="../assets/vendor_components/datatable/datatables.min.css" />


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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Application Enquiries</h3>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Manage Application Enquiries</h4>
                                <h6 class="box-subtitle">List of Application Enquiries created by NEEV MITRA</h6>
                                <span class="box-controls pull-right">
                                    <a href="index.html" class="btn btn-md btn-nblue btn-block my-10">
                                        <i class="ti-arrow-left"></i> Back to dashboard
                                    </a>
                                </span>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="productorder" class="table table-hover no-wrap product-order" data-page-size="10">
                                        <thead>
                                            <tr class="bg-secondary">
                                                <th>Business Opportunity ID</th>
                                                <th>Business Opportunity Name</th>
                                                <th>Voice Recorded</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#121</td>
                                                <td>Application title</td>
                                                <td>0:25:20</td>
                                                <td>
                                                    <audio src="http://heartcode.co/draft9/sound/sound.mp3" controls>    
                                                    </audio>
                                                </td>
                                            </tr>
                                        </tbody>
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

    <!-- NEEV MITRA App -->
    <script src="js/template.js"></script>
    
    <!-- Sweet-Alert  -->
    <script src="../assets/vendor_components/sweetalert/sweetalert.min.js"></script>
    <script src="../assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js"></script>

    <!-- NEEV MITRA dashboard demo (This is only for demo purposes) -->
    <script src="js/pages/dashboard.js"></script>

    <!-- NEEV MITRA for demo purposes -->
    <script src="js/demo.js"></script>

    <!-- Data Table -->
    <script src="js/pages/data-table.js"></script>
</body>
</html>