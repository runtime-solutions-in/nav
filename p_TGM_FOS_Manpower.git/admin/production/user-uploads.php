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



    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="../../assets/vendor_components/bootstrap/dist/css/bootstrap.min.html">

    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="../css/bootstrap-extend.html">

    <!-- gallery -->
    <link rel="stylesheet" type="text/css" href="../../assets/vendor_components/gallery/css/animated-masonry-gallery.html" />
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.0.46/css/materialdesignicons.css"/>
    <!-- fancybox -->
    <link rel="stylesheet" type="text/css" href="../../assets/vendor_components/lightbox-master/dist/ekko-lightbox.html" />

    <!-- Theme style -->
    <link rel="stylesheet" href="../css/master_style.html">

    <!-- NEEV MITRA skins -->
    <link rel="stylesheet" href="../css/skins/_all-skins.html">

    <!-- Data Table-->
    <link rel="stylesheet" type="text/css" href="../assets/vendor_components/datatable/datatables.min.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../assets/vendor_plugins/iCheck/all.css">

    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../assets/vendor_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">

    <!-- gallery -->
    <link rel="stylesheet" type="text/css" href="../assets/vendor_components/gallery/css/animated-masonry-gallery.css" />

    <!-- fancybox -->
    <link rel="stylesheet" type="text/css" href="../assets/vendor_components/lightbox-master/dist/ekko-lightbox.css" />



    <!-- Bootstrap tagsinput -->
    <link rel="stylesheet" href="../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

    <!-- Bootstrap touchspin -->
    <link rel="stylesheet" href="../assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css">



    <!-- Theme style -->
    <link rel="stylesheet" href="../css/master_style.html">

    <!-- NEEV MITRA skins -->
    <link rel="stylesheet" href="../css/skins/_all-skins.html">

    <!-- Bootstrap 4.0 -->
    <link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.css" />

    <!-- Popup CSS -->
    <link href="../assets/vendor_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet" />

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
                        <h3 class="page-title">User uploads</h3>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header">

                                <div class="row">

                                    <div class="col-md-6 col-12">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                          <label class="text-info">Select TGM</label>
                                          <select multiple="" class="form-control">
                                            <option>TGM option 1</option>
                                            <option>TGM option 2</option>
                                            <option>TGM option 3</option>
                                            <option>TGM option 4</option>
                                            <option>TGM option 5</option>
                                          </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6 col-12">
                                        <div class="form-group pull-right">
                                            <label class="text-info">Search</label>
                                            <div class="form-group lookup">
                                                <div>
                                                    <input type="text" data-provide="media-search">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>

                            </div>
                            <div class="box-body">
                                <div class="form-body neev-inner-content-div">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#imagegallery" role="tab"><span><i
                                                        class="fa fa-image"></i> Images</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#videos" role="tab"><span><i
                                                        class="fa fa-file-video-o"></i> Videos</span></a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#docs" role="tab"><span><i
                                                        class="fa  fa-file-o"></i> Documents</span></a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content tabcontent-border">

                                        <div class="tab-pane active show" id="imagegallery" role="tabpanel">
                                            <div class="pad">
                                                <!-- table -->
                                                <div class="table-responsive">
                                                    <table id="productorder" class="table table-hover no-wrap product-order"
                                                        data-page-size="50">
                                                        <thead>
                                                            <tr class="bg-secondary">
                                                                <th>TGM ID</th>
                                                                <th>File Description</th>
                                                                <th>Uploaded by</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>#1240</td>
                                                                <td><a class="image-popup-vertical-fit" href="../images/product/product-1.png"><img
                                                                            src="../images/product/product-1.png" alt="product"
                                                                            width="80"></a></td>
                                                                <td>
                                                                    <span>Mohammad Ragib</span>
                                                                </td>
                                                                <td>24-01-2018</td>
                                                                <td><span class="label label-success">published</span></td>
                                                                <td><a href="javascript:void(0)" class="btn btn-icon-circle btn-nblue"
                                                                        data-toggle="tooltip" data-original-title="Edit">
                                                                        <i class="ti-marker-alt"></i>
                                                                    </a>
                                                                    <a href="javascript:void(0)" class="btn btn-icon-circle btn-danger"
                                                                        data-original-title="Delete" data-toggle="tooltip">
                                                                        <i class="ti-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>#1241</td>
                                                                <td><a class="image-popup-vertical-fit" href="../images/product/product-1.png"><img
                                                                            src="../images/product/product-1.png" alt="product"
                                                                            width="80"></a></td>
                                                                <td>
                                                                    <span>Mohammad Ragib</span>
                                                                </td>
                                                                <td>24-01-2018</td>
                                                                <td><span class="label label-success">published</span></td>
                                                                <td><a href="javascript:void(0)" class="btn btn-icon-circle btn-nblue"
                                                                        data-toggle="tooltip" data-original-title="Edit">
                                                                        <i class="ti-marker-alt"></i>
                                                                    </a>
                                                                    <a href="javascript:void(0)" class="btn btn-icon-circle btn-danger"
                                                                        data-original-title="Delete" data-toggle="tooltip">
                                                                        <i class="ti-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>#1242</td>
                                                                <td><a class="image-popup-vertical-fit" href="../images/product/product-1.png"><img
                                                                            src="../images/product/product-1.png" alt="product"
                                                                            width="80"></a></td>
                                                                <td>
                                                                    <span>Mohammad Ragib</span>
                                                                </td>
                                                                <td>24-01-2018</td>
                                                                <td><span class="label label-success">published</span></td>
                                                                <td><a href="javascript:void(0)" class="btn btn-icon-circle btn-nblue"
                                                                        data-toggle="tooltip" data-original-title="Edit">
                                                                        <i class="ti-marker-alt"></i>
                                                                    </a>
                                                                    <a href="javascript:void(0)" class="btn btn-icon-circle btn-danger"
                                                                        data-original-title="Delete" data-toggle="tooltip">
                                                                        <i class="ti-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- table -->
                                            </div>

                                        </div>
                                        <div class="tab-pane show" id="videos" role="tabpanel">
                                            <div class="pad">
                                                <!-- table -->
                                                <div class="table-responsive">
                                                    <table id="tabvideos" class="table table-hover no-wrap product-order"
                                                        data-page-size="50">
                                                        <thead>
                                                            <tr class="bg-secondary">
                                                                <th>TGM ID</th>
                                                                <th>File Description</th>
                                                                <th>Uploaded by</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>#1241</td>
                                                                <td><a class="image-popup-vertical-fit" href="../images/product/product-1.png"><img
                                                                            src="../images/product/product-1.png" alt="product"
                                                                            width="80"></a></td>
                                                                <td>
                                                                    <span>Mohammad Ragib</span>
                                                                </td>
                                                                <td>24-01-2018</td>
                                                                <td><span class="label label-success">published</span></td>
                                                                <td><a href="javascript:void(0)" class="btn btn-icon-circle btn-nblue"
                                                                        data-toggle="tooltip" data-original-title="Edit">
                                                                        <i class="ti-marker-alt"></i>
                                                                    </a>
                                                                    <a href="javascript:void(0)" class="btn btn-icon-circle btn-danger"
                                                                        data-original-title="Delete" data-toggle="tooltip">
                                                                        <i class="ti-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- table -->

                                            </div>
                                        </div>
                                        <div class="tab-pane show" id="docs" role="tabpanel">
                                            <div class="pad">
                                                <!-- table -->
                                                <div class="table-responsive">
                                                    <table id="tabdocs" class="table table-hover no-wrap product-order"
                                                        data-page-size="50">
                                                        <thead>
                                                            <tr class="bg-secondary">
                                                                <th>TGM ID</th>
                                                                <th>File Description</th>
                                                                <th>Uploaded by</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>#1241</td>
                                                                <td><a class="image-popup-vertical-fit" href="../images/product/product-1.png"><img
                                                                            src="../images/product/product-1.png" alt="product"
                                                                            width="80"></a></td>
                                                                <td>
                                                                    <span>Mohammad Ragib</span>
                                                                </td>
                                                                <td>24-01-2018</td>
                                                                <td><span class="label label-success">published</span></td>
                                                                <td><a href="javascript:void(0)" class="btn btn-icon-circle btn-nblue"
                                                                        data-toggle="tooltip" data-original-title="Edit">
                                                                        <i class="ti-marker-alt"></i>
                                                                    </a>
                                                                    <a href="javascript:void(0)" class="btn btn-icon-circle btn-danger"
                                                                        data-original-title="Delete" data-toggle="tooltip">
                                                                        <i class="ti-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- table -->
                                            </div>
                                        </div>
                                    </div>



                                </div>

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

    <!-- Select2 -->
    <script src="../assets/vendor_components/select2/dist/js/select2.full.js"></script>

    <!-- NEEV MITRA for advanced form element -->
    <script src="js/pages/advanced-form-element.js"></script>


    <!-- NEEV MITRA App -->
    <script src="js/template.js"></script>

    <!-- NEEV MITRA dashboard demo (This is only for demo purposes) -->
    <script src="js/pages/dashboard.js"></script>

    <!-- NEEV MITRA for demo purposes -->
    <script src="js/demo.js"></script>

    <!-- gallery -->
    <script type="text/javascript" src="../assets/vendor_components/gallery/js/animated-masonry-gallery.js"></script>
    <script type="text/javascript" src="../assets/vendor_components/gallery/js/jquery.isotope.min.js"></script>

    <!-- fancybox -->
    <script type="text/javascript" src="../assets/vendor_components/lightbox-master/dist/ekko-lightbox.js"></script>
    <script src="js/pages/gallery.js"></script>

    <!-- Sweet-Alert  -->
    <script src="../assets/vendor_components/sweetalert/sweetalert.min.js"></script>
    <script src="../assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js"></script>

    <!-- CK Editor -->
    <script src="../assets/vendor_components/ckeditor/ckeditor.js"></script>

    <!-- NEEV MITRA for editor -->
    <script src="js/pages/editor.js"></script>

    <!-- Data Table -->
    <script src="js/pages/data-table.js"></script>

</body>
</html>