<?php
	ob_start();
	session_start();
		
	$token = md5(uniqid());
	$_SESSION['TOKEN'] = $token;
	//session_write_close();
?>	
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TATA ACE</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="css/core.css" rel="stylesheet" />
    <link href="css/bootstrap-3-2.css" rel="stylesheet" />
    <link href="css/basic.css" rel="stylesheet" />
    <link href="css/material-dashboard.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="css/custom.css" rel="stylesheet" />

    <!-- FONTAWESOME STYLES-->
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.0.46/css/materialdesignicons.css"/>
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<style>
.myhead{
margin-top:0px;
margin-bottom:0px;
text-align:center;
}

</style>
<script type="application/javascript">
    <?php if(intval($_GET['err']) == 2){ ?>
	    alert('Username & Password pair doesn\'t match');
	<?php } echo intval($_GET['err']); ?>

	</script>
</head>   
<body >
<!--<div class="bannerImg"></div>-->
    <div class="container">
         <div class="row ">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                  <img src="../images/tataBlue.png" alt="TATA" class="img-responsive center-block" style="position:absolute; top:12%;left:37%">
                      <div class="card main-box mb-pink" style="background-color:#ffffff;margin-top:45%;position:relative">
                         <div class="card-header" data-background-color="ligBlue">
                            <h4 class="title">Login</h4>
                            <p class="category">Enter username and password to login</p>
                         </div>
                         <div class="panel-body">
                             <form role="form" method="post" action="login2db.php" id="formLogin" name="formLogin" autocomplete="off">
                                 <input type="text" class="form-control" placeholder="Username" required="" name="userName_disp" id="userName_disp" value="vinod@runtime-solutions.com" autocomplete="off" maxlength="60" style="width:80%;margin:0 auto;"/><br>
                              <div>
                                <input type="password" class="form-control" placeholder="Password" required="" name="password_disp" id="password_disp" value="123456" autocomplete="off" maxlength="60" style="width:80%;margin:0 auto;" /><br>
                              </div>
                              <div style="width:30%;margin:0 auto;">
                                <a class="btn btn-default submit" href="javascript:void(0);" onClick="javascript:checkLogin();" >LOGIN</a>
                                <!--<button class="btn btn-default submit" type= "submit" name="login" onClick="javascript:checkLogin();">Login Now</button>-->
                              </div>
                              <div class="clearfix"></div>

                                <input id="userName" type="hidden" name="userName" autocomplete="off" value=""/>
                                <input id="password" type="hidden" name="password" autocomplete="off" value=""/>
                                <input type="hidden" name="token" value="<?php echo $token; ?>">
                             </form>	
                         </div>
                    </div>
            </div>
        </div>   
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.2.3/jquery.js"></script>
<script type="text/javascript" language="javascript">
function checkLogin() {
	var userName_disp = document.getElementById('userName_disp').value;
	var password_disp = document.getElementById('password_disp').value;
	
	if (userName_disp == '') { alert('Please enter username');	document.getElementById('userName_disp').focus(); return false; 	}
	if (password_disp == '') { alert('Please enter password');	document.getElementById('password_disp').focus(); return false; 	}
	
	$.ajax({  
	  type: "POST",  
	  url: "getEncrypt.php",  
	  data: 'val='+userName_disp,  
	  success: function(data) {  	//alert(data);
		document.getElementById("userName").value = data;
	  }  
	});
	$.ajax({  
	  type: "POST",  
	  url: "getEncrypt.php",  
	  data: 'val='+password_disp,  
	  success: function(data) {  	//alert(data);
		document.getElementById("password").value = data;
		$("#formLogin").submit();
	  }  
	});
	
	//document.getElementById("userName").value = document.getElementById("userName_disp").value;
    //document.getElementById("password").value = document.getElementById("password_disp").value;
    
	//document.formLogin.submit();
	//document.getElementById("formLogin").submit();
	//$("#formLogin").submit();
}
</script> 
  </body>
</html>