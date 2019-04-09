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
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.0.46/css/materialdesignicons.css"/>
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

    <!-- Morris charts -->
    <link rel="stylesheet" href="../assets/vendor_components/morris.js/morris.css">

    <!-- Data Table-->
    <link rel="stylesheet" type="text/css" href="../assets/vendor_components/datatable/datatables.min.css" />

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">

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
                        <h3 class="page-title">FAQ's</h3>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">

                <div class="row">

                    <div class="col-12">
                        <div class="box">
                            
                            <div class="box-body">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="general" class="tab-pane active">
                                        <!-- Categroy 1 -->
                                        <div class="tab-pane animation-fade active" id="category-1" role="tabpanel">
                                            <div class="panel-group panel-group-simple panel-group-continuous" id="accordion2" aria-multiselectable="true" role="tablist">
                                                <!-- Question 1 -->
                                                <div class="panel">
                                                    <div class="flexbox align-items-center panel-heading" id="question-1" role="tab">
                                                        <div><a class="panel-title font-weight-bold d-inline-block align-items-center" aria-controls="answer-1" aria-expanded="true" data-toggle="collapse" href="#answer-1" data-parent="#accordion2">
                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit?
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="font-size-18 text-gray hover-info pr-10" href="#"><i class="fa fa-edit"></i></a>
                                                            <a class="font-size-18 text-gray hover-info pr-20 model_del sa-del"  alt="alert" href="#"><i class="fa fa-trash"></i></a>

                                                        </div>



                                                    </div>
                                                    <div class="panel-collapse collapse show" id="answer-1" aria-labelledby="question-1" role="tabpanel">
                                                        <div class="panel-body">
                                                            I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Question 1 -->
                                                <!-- Question 2 -->
                                                <div class="panel">
                                                    <div class="flexbox align-items-center panel-heading" id="question-2" role="tab">
                                                        <div><a class="panel-title font-weight-bold d-inline-block align-items-center" aria-controls="answer-2" aria-expanded="false" data-toggle="collapse" href="#answer-2" data-parent="#accordion2">
                                                                Nulla nec libero sit amet ligula tincidunt imperdiet vitae sit amet lectus?
                                                            </a></div>
                                                        <div>

                                                            <a class="font-size-18 text-gray hover-info pr-10" href="#"><i class="fa fa-edit"></i></a>
                                                            <a class="font-size-18 text-gray hover-info pr-20 model_del sa-del"  alt="alert" href="#"><i class="fa fa-trash"></i></a>
                                                        </div>


                                                    </div>
                                                    <div class="panel-collapse collapse" id="answer-2" aria-labelledby="question-2" role="tabpanel">
                                                        <div class="panel-body">
                                                            I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Question 2 -->
                                                <!-- Question 3 -->
                                                <div class="panel">
                                                    <div class="flexbox align-items-center panel-heading" id="question-3" role="tab">
                                                        <div><a class="panel-title font-weight-bold d-inline-block align-items-center" aria-controls="answer-3" aria-expanded="false" data-toggle="collapse" href="#answer-3" data-parent="#accordion2">
                                                                Morbi quis dui at justo posuere aliquam?
                                                            </a></div>
                                                        <div><a class="font-size-18 text-gray hover-info pr-10" href="#"><i class="fa fa-edit"></i></a>
                                                            <a  class="font-size-18 text-gray hover-info pr-20 model_del sa-del"  alt="alert" href="#"><i class="fa fa-trash"></i></a></div>

                                                    </div>
                                                    <div class="panel-collapse collapse" id="answer-3" aria-labelledby="question-3" role="tabpanel">
                                                        <div class="panel-body">
                                                            I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Question 3 -->
                                                <!-- Question 4 -->
                                                <div class="panel">
                                                    <div class="flexbox align-items-center panel-heading" id="question-4" role="tab">
                                                        <div><a class="panel-title font-weight-bold d-inline-block align-items-center" aria-controls="answer-4" aria-expanded="false" data-toggle="collapse" href="#answer-4" data-parent="#accordion2">
                                                                Vivamus dictum turpis at nisi mattis congue?
                                                            </a></div>
                                                        <div><a class="font-size-18 text-gray hover-info pr-10" href="#"><i class="fa fa-edit"></i></a>
                                                            <a  class="font-size-18 text-gray hover-info pr-20 model_del sa-del"  alt="alert" href="#"><i class="fa fa-trash"></i></a></div>


                                                    </div>
                                                    <div class="panel-collapse collapse" id="answer-4" aria-labelledby="question-4" role="tabpanel">
                                                        <div class="panel-body">
                                                            I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Question 4 -->
                                            </div>
                                        </div>
                                        <!-- End Categroy 1 -->
                                    </div>
                                    <div id="services" class="tab-pane">
                                        <!-- Categroy 2 -->
                                        <div class="tab-pane animation-fade" id="category-2" role="tabpanel">
                                            <div class="panel-group panel-group-simple panel-group-continuous" id="accordion" aria-multiselectable="true" role="tablist">
                                                <!-- Question 5 -->
                                                <div class="panel">
                                                    <div class="flexbox align-items-center panel-heading" id="question-5" role="tab">
                                                        <div> <a class="panel-title font-weight-bold d-inline-block align-items-center" aria-controls="answer-5" aria-expanded="true" data-toggle="collapse" href="#answer-5" data-parent="#accordion">
                                                                Nunc porttitor lectus non aliquam semper?
                                                            </a></div>
                                                        <div> <a class="font-size-18 text-gray hover-info pr-10" href="#"><i class="fa fa-edit"></i></a>
                                                            <a  class="font-size-18 text-gray hover-info pr-20 model_del sa-del"  alt="alert" href="#"><i class="fa fa-trash"></i></a></div>

                                                    </div>
                                                    <div class="panel-collapse collapse show" id="answer-5" aria-labelledby="question-5" role="tabpanel">
                                                        <div class="panel-body">
                                                            I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Question 5 -->
                                                <!-- Question 6 -->
                                                <div class="panel">
                                                    <div class="flexbox align-items-center panel-heading" id="question-6" role="tab">
                                                        <div><a class="panel-title font-weight-bold d-inline-block align-items-center" aria-controls="answer-6" aria-expanded="false" data-toggle="collapse" href="#answer-6" data-parent="#accordion">
                                                                Aliquam a lacus et mi convallis pellentesque?
                                                            </a></div>
                                                        <div><a class="font-size-18 text-gray hover-info pr-10" href="#"><i class="fa fa-edit"></i></a>
                                                            <a  class="font-size-18 text-gray hover-info pr-20 model_del sa-del"  alt="alert" href="#"><i class="fa fa-trash"></i></a></div>

                                                    </div>
                                                    <div class="panel-collapse collapse" id="answer-6" aria-labelledby="question-6" role="tabpanel">
                                                        <div class="panel-body">
                                                            I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Question 6 -->
                                                <!-- Question 7 -->
                                                <div class="panel">
                                                    <div class="flexbox align-items-center panel-heading" id="question-7" role="tab">
                                                        <div> <a class="panel-title font-weight-bold d-inline-block align-items-center" aria-controls="answer-7" aria-expanded="false" data-toggle="collapse" href="#answer-7" data-parent="#accordion">
                                                                Praesent at felis feugiat, malesuada nibh vitae, accumsan erat?
                                                            </a></div>
                                                        <div><a class="font-size-18 text-gray hover-info pr-10" href="#"><i class="fa fa-edit"></i></a>
                                                            <a  class="font-size-18 text-gray hover-info pr-20 model_del sa-del"  alt="alert" href="#"><i class="fa fa-trash"></i></a></div>
                                                    </div>
                                                    <div class="panel-collapse collapse" id="answer-7" aria-labelledby="question-7" role="tabpanel">
                                                        <div class="panel-body">
                                                            I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Question 7 -->
                                            </div>
                                        </div>
                                        <!-- End Categroy 2 -->
                                    </div>
                                    <div id="products" class="tab-pane">
                                        <!-- Categroy 3 -->
                                        <div class="tab-pane animation-fade" id="category-3" role="tabpanel">
                                            <div class="panel-group panel-group-simple panel-group-continuous" id="accordion1" aria-multiselectable="true" role="tablist">
                                                <!-- Question 8 -->
                                                <div class="panel">
                                                    <div class="flexbox align-items-center panel-heading" id="question-8" role="tab">
                                                        <div><a class="panel-title font-weight-bold d-inline-block align-items-center" aria-controls="answer-8" aria-expanded="true" data-toggle="collapse" href="#answer-8" data-parent="#accordion1">
                                                                Proin ac velit non neque efficitur pretium a a nunc?
                                                            </a></div>
                                                        <div> <a class="font-size-18 text-gray hover-info pr-10" href="#"><i class="fa fa-edit"></i></a>
                                                            <a  class="font-size-18 text-gray hover-info pr-20 model_del sa-del"  alt="alert" href="#"><i class="fa fa-trash"></i></a></div>

                                                    </div>
                                                    <div class="panel-collapse collapse show" id="answer-8" aria-labelledby="question-8" role="tabpanel">
                                                        <div class="panel-body">
                                                            I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Question 8 -->
                                                <!-- Question 9 -->
                                                <div class="panel">
                                                    <div class="flexbox align-items-center panel-heading" id="question-9" role="tab">
                                                        <div> <a class="panel-title font-weight-bold d-inline-block align-items-center" aria-controls="answer-9" aria-expanded="false" data-toggle="collapse" href="#answer-9" data-parent="#accordion1">
                                                                Nam egestas massa vitae magna interdum volutpat?
                                                            </a></div>
                                                        <div><a class="font-size-18 text-gray hover-info pr-10" href="#"><i class="fa fa-edit"></i></a>
                                                            <a  class="font-size-18 text-gray hover-info pr-20 model_del sa-del"  alt="alert" href="#"><i class="fa fa-trash"></i></a></div>

                                                    </div>
                                                    <div class="panel-collapse collapse" id="answer-9" aria-labelledby="question-9" role="tabpanel">
                                                        <div class="panel-body">
                                                            I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Question 9 -->
                                                <!-- Question 10 -->
                                                <div class="panel">
                                                    <div class="flexbox align-items-center panel-heading" id="question-10" role="tab">
                                                        <div><a class="panel-title font-weight-bold d-inline-block align-items-center" aria-controls="answer-10" aria-expanded="false" data-toggle="collapse" href="#answer-10" data-parent="#accordion1">
                                                                Praesent pretium leo sed turpis vehicula semper?
                                                            </a></div>
                                                        <div><a class="font-size-18 text-gray hover-info pr-10" href="#"><i class="fa fa-edit"></i></a>
                                                            <a  class="font-size-18 text-gray hover-info pr-20 model_del sa-del"  alt="alert" href="#"><i class="fa fa-trash"></i></a></div>

                                                    </div>
                                                    <div class="panel-collapse collapse" id="answer-10" aria-labelledby="question-10" role="tabpanel">
                                                        <div class="panel-body">
                                                            I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Question 10 -->
                                            </div>
                                        </div>
                                        <!-- End Categroy 3 -->
                                    </div>
                                    <div id="privacy" class="tab-pane">
                                        <!-- Categroy 4 -->
                                        <div class="tab-pane animation-fade" id="category-4" role="tabpanel">
                                            <div class="panel-group panel-group-simple panel-group-continuous" id="accordion3" aria-multiselectable="true" role="tablist">
                                                <!-- Question 11 -->
                                                <div class="panel">
                                                    <div class="flexbox align-items-center panel-heading" id="question-11" role="tab">
                                                        <div> <a class="panel-title font-weight-bold d-inline-block align-items-center" aria-controls="answer-11" aria-expanded="true" data-toggle="collapse" href="#answer-11" data-parent="#accordion3">
                                                                Sed quis nunc bibendum, luctus nulla non, luctus odio?
                                                            </a></div>
                                                        <div><a class="font-size-18 text-gray hover-info pr-10" href="#"><i class="fa fa-edit"></i></a>
                                                            <a  class="font-size-18 text-gray hover-info pr-20 model_del sa-del"  alt="alert" href="#"><i class="fa fa-trash"></i></a></div>

                                                    </div>
                                                    <div class="panel-collapse collapse show" id="answer-11" aria-labelledby="question-11" role="tabpanel">
                                                        <div class="panel-body">
                                                            I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Question 11 -->
                                                <!-- Question 12 -->
                                                <div class="panel">
                                                    <div class="flexbox align-items-center panel-heading" id="question-12" role="tab">
                                                        <div> <a class="panel-title font-weight-bold d-inline-block align-items-center" aria-controls="answer-12" aria-expanded="false" data-toggle="collapse" href="#answer-12" data-parent="#accordion3">
                                                                Mauris sit amet justo pharetra, venenatis purus eu, efficitur nunc?
                                                            </a></div>
                                                        <div><a class="font-size-18 text-gray hover-info pr-10" href="#"><i class="fa fa-edit"></i></a>
                                                            <a  class="font-size-18 text-gray hover-info pr-20 model_del sa-del"  alt="alert" href="#"><i class="fa fa-trash"></i></a></div>

                                                    </div>
                                                    <div class="panel-collapse collapse" id="answer-12" aria-labelledby="question-12" role="tabpanel">
                                                        <div class="panel-body">
                                                            I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Question 12 -->
                                                <!-- Question 13 -->
                                                <div class="panel">
                                                    <div class="flexbox align-items-center panel-heading" id="question-13" role="tab">
                                                        <div><a class="panel-title font-weight-bold d-inline-block align-items-center" aria-controls="answer-13" aria-expanded="false" data-toggle="collapse" href="#answer-13" data-parent="#accordion3">
                                                                Cras venenatis lectus sit amet purus rutrum, non facilisis ligula aliquet?
                                                            </a></div>
                                                        <div><a class="font-size-18 text-gray hover-info pr-10" href="#"><i class="fa fa-edit"></i></a>
                                                            <a  class="font-size-18 text-gray hover-info pr-20 model_del sa-del"  alt="alert" href="#"><i class="fa fa-trash"></i></a></div>
                                                    </div>
                                                    <div class="panel-collapse collapse" id="answer-13" aria-labelledby="question-13" role="tabpanel">
                                                        <div class="panel-body">
                                                            I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Question 13 -->
                                            </div>
                                        </div>
                                        <!-- End Categroy 4 -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">

                                <a class="popup-with-form btn btn-nblue" href="#faq-form"><i class="fa fa-plus"></i> Add FAQ</a>

                                <!-- form itself -->
                                <form id="faq-form" class="mfp-hide white-popup-block">
                                    <h1>Add FAQ</h1>
                                    <fieldset style="border:0;">

                                        <div class="form-group">
                                            <h5>Question <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="text" class="form-control" required="" data-validation-required-message="This field is required" placeholder="Type ? here...">
                                                <div class="help-block"></div>
                                            </div>
                                            <div class="form-control-feedback"><small>Question <code>required</code> attribute to field for required validation.</small></div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Answer <span class="text-danger">*</span></h5>
                                            <form>
                                               <textarea name="ans" rows="3" cols="0" required="" class="form-control">Answer here ...</textarea> 
                                            </form>
                                        </div>
                                        
                                        <button type="button" class="btn btn-bold btn-pure btn-secondary">Back</button>
                                        <button type="button" class="btn btn-bold btn-pure btn-nblue float-right">Save</button>
                                    </fieldset>
                                </form>
                            </div>
                            <!-- /.box footer -->
                        </div>


                        <!-- /.box -->

                    </div>
                </div>
                <!-- /.row -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Modal -->
        <!--
        
        <div class="modal modal-fill fade" data-backdrop="false" id="modal-faq" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add FAQ</h5>
                        <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
              </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
							<h5>Question <span class="text-danger">*</span></h5>
							<div class="controls">
								<input type="text" name="text" class="form-control" required="" data-validation-required-message="This field is required" placeholder="Type ? here..."> <div class="help-block"></div></div>
							<div class="form-control-feedback"><small>Question <code>required</code> attribute to field for required validation.</small></div>
						</div>
                    <div class="form-group">
							<h5>Answer <span class="text-danger">*</span></h5>
                            <form>
                                    <textarea id="editor#" name="editor1" rows="10" cols="80" required="">
                                            Answer here ...
                                    </textarea>
                            </form>
						</div>
                        <br><br><br><br><br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Back</button>
                        <button type="button" class="btn btn-bold btn-pure btn-nblue float-right">Save</button>
                    </div>
                </div>
            </div>
        </div>
        
-->
        <!-- /.modal -->
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
</body>

</html>