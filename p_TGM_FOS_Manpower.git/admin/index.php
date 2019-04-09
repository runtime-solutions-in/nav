<?php
	ob_start();
	session_start();
	header('Location:production/login.php');
	die();
	$token = md5(uniqid());
	$_SESSION['TOKEN'] = $token;
	//session_write_close();
?>	
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tata Motors</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <style>
		.login_form{
		width: 100%;
		/*font-family: 'Roboto', sans-serif;*/
		/*background-color: #ffffff;
		  border: 1px ridge #FFF;
		  
		margin: 8px auto 0px;
		background: rgba(0, 0, 0, 0.05);*/
		}
	</style>
  </head>

  <body class="login" >
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper" style="max-width: 800px;">
        <div class="animate form login_form" style="top: 300px;">
          
		  
			
            <center>
                <a href="production/login.php" class="btn btn-default submit" style="background-color: transparent; border-color: transparent;"><img src="production/images/Button_1.png" style="width:200px"></a>
                <a class="btn btn-default submit" href="javascript:void(0);"  style="background-color: transparent; border-color: transparent;"><img src="production/images/Button_2.png" style="width:200px"></a>
                <a class="btn btn-default submit" href="javascript:void(0);"  style="background-color: transparent; border-color: transparent;"><img src="production/images/Button_3.png" style="width:200px"></a>
                
              </div>
             </center>
       </div>

        
      </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.2.3/jquery.js"></script>
  </body>
</html>