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

    <!-- Bootstrap extend -->
    <link rel="stylesheet" href="css/bootstrap-extend.css" />

    <!--alerts CSS -->
    <link href="../assets/vendor_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

    <!-- theme style -->
    <link rel="stylesheet" href="css/master_style.css" />

    <!-- NEEV MITRA skins -->
    <link rel="stylesheet" href="css/skins/_all-skins.css" />

    <!-- daterange picker -->
    <link rel="stylesheet" href="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css" />
    
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.0.46/css/materialdesignicons.css"/>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.0/css/ionicons.min.css"/>

   
    <!-- Morris charts -->
    <link rel="stylesheet" href="../assets/vendor_components/morris.js/morris.css" />

    <!-- Data Table -->
    <link rel="stylesheet" type="text/css" href="../assets/vendor_components/datatable/datatables.min.css" />

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
        
        <!-- Left side column. contains the logo and sidebar -->
        

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Dashboard</h3>
                        <div class="pull-right">
                         <ul class=" pull-left" style="margin-top:7px;">
                            <div class="dropdown d-none d-sm-block">
                                <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"
                                    href="#" aria-expanded="false">Sort by State</button>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; top: 0px; left: 0px; will-change: transform; transform: translate3d(0px, 30px, 0px);">
                                    <a class="dropdown-item" href="#">Date</a>
                                    <a class="dropdown-item" href="#">Dealer</a>
                                    <a class="dropdown-item" href="#">TSM</a>
                                </div>
                            </div>
                            <!-- <li><a class="box-btn-close" href="#"></a></li>
                                <li><a class="box-btn-slide" href="#"></a></li>
                                <li><a class="box-btn-fullscreen" href="#"></a></li> -->
                        </ul>
                        <button class="pull-right btn btn-default btn-sm" style="margin-top:7px;margin-left:10px">Download</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="mdi mdi-account"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-number">+150</span>
                                <span class="info-box-text">Total Users</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-xl-4 col-md-6 col">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="mdi mdi-video"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-number">+200</span>
                                <span class="info-box-text">Total Video Uploads</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-xl-4 col-md-6 col">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="mdi mdi-apps"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-number">+1200</span>
                                <span class="info-box-text">Application Queries</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">TGM's</h4>
                                <h6 class="box-subtitle">TGM's Active Hours</h6>
                            </div>

                            <div class="box-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="description-block">
                                            <span class="description-text">Number of User Logins</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">TSM's</h4>
                                <h6 class="box-subtitle">TSM's Active Hours</h6>
                            </div>

                            <div class="box-body">


                                <div class="row">
                                    <div class="col">
                                        <div class="description-block">
                                            <span class="description-text">Number of User Logins</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-12">
                        <!-- Default box -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Events / Notices</h4>
                            </div>
                            <div class="box-body p-0">

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>

                    <div class="col-12 col-lg-8">
                        <!-- AREA CHART -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">App Usage</h4>

                                <ul class="box-controls pull-right">
                                    <div class="dropdown d-none d-sm-block">
                                        <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"
                                            href="#" aria-expanded="false">Sort by</button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; top: 0px; left: 0px; will-change: transform; transform: translate3d(0px, 30px, 0px);">
                                            <a class="dropdown-item" href="#">Date</a>
                                            <a class="dropdown-item" href="#">Dealer</a>
                                            <a class="dropdown-item" href="#">TSM</a>
                                        </div>
                                    </div>
                                    <!-- <li><a class="box-btn-close" href="#"></a></li>
                                        <li><a class="box-btn-slide" href="#"></a></li>
                                        <li><a class="box-btn-fullscreen" href="#"></a></li> -->
                                </ul>
                            </div>

                        </div>
                        <!-- /.box -->
                    </div>

                    <div class="col-12 col-lg-5">
                        <!-- AREA CHART -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Usage Analytics</h4>
                            </div>

                        </div>
                        <!-- /.box -->
                    </div>

                    <div class="col-lg-7 col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Product List</h4>
                            </div>
                        </div>
                        <!-- /. box -->
                    </div>
                </div>
                <!-- /.row -->
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

    <!-- popper -->
    <script src="../assets/vendor_components/popper/dist/popper.min.js"></script>

    <!-- date-range-picker -->
    <script src="../assets/vendor_components/moment/min/moment.min.js"></script>
    <script src="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Bootstrap 4.0 -->
    <script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>

    <!-- ChartJS -->
    <script src="../assets/vendor_components/chart.js-master/Chart.min.js"></script>

    <!-- echarts -->
    <script src="../assets/vendor_components/echarts/dist/echarts-en.min.js"></script>
    <script src="../assets/vendor_components/echarts/echarts-liquidfill.min.js"></script>

    <!-- Sparkline -->
    <script src="../assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

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

    <!-- NEEV MITRA dashboard demo -->
    <!-- <script src="js/pages/dashboard7.js"></script> -->

    <!-- NEEV MITRA dashboard demo -->
    <script src="js/pages/dashboard8.js"></script>

    <!-- NEEV MITRA for demo purposes -->
    <script src="js/demo.js"></script>
</body>

</html>