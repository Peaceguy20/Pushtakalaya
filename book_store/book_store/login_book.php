<?php
ini_set("display_errors","OFF");

session_start();

$conn=mysqli_connect("localhost","root","","online_book");

if(isset($_REQUEST['login'])) 
{
	$name=$_REQUEST['name'];
	$pass=$_REQUEST['pass'];
	$pass=md5($pass);
	
	
	$sql="select * from user where user_name='".$name."' AND password='".$pass."'";
	 
	$res=mysqli_query($conn,$sql); 
    $count = mysqli_num_rows($res); 

      $data=mysqli_fetch_array($res);  

      if($count>0) 
	{
		$_SESSION['user_name']=$data['user_name']; 
		$_SESSION['name']="$name"; 
		header("location:index.php");
	}
	else
	{
		echo " your username or password not matched or your account is Deactive ";
		
		exit();
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>PUSTAKALAYA</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

    </head>

<body class="hold-transition login-page">

<header class="header-sticky" style ="background-color:#cfc9b8; height:70px;">
        <div class="container" style ="border-style:solid;" >
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo"><strong style="font-size: 35px;color:black;"> </strong> <strong style="font-size: 35px; background-color:#cfc9b8;" > PUSTAKALAYA       </strong></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav"></ul>
						 </nav>
                </div>
            </div>
        </div>
    </header> 
	

<div class="login-box" align="center">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary" >
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Login</b></a>
    </div>
    <div class="card-body">

      <form method="POST"  class="form-group" >
        <div class="container">
    <div class="raw">
		<div class="col-md-4 col-md-offset-4" >
    		<div class="panel panel-default">
			  	<div class="panel-body">
			    	
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="User name" name="name" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="pass" type="password" value="">
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
			    	    	</label>
			    	    </div>
			    		<input type="submit" class="btn btn-lg btn-success btn-block" name="login" value="Login">
						
						 <div class="form-group">
									<div class="social-auth-links text-center mt-2 mb-3">
											<a href="#" class="btn btn-block btn-primary">
											  <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
											</a>
											<a href="#" class="btn btn-block btn-danger">
											  <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
											</a>
										  </div>
										  <!-- /.social-auth-links -->

										  <p class="mb-1">
											<a href="forgot-password.html">I forgot my password</a>
										  </p>
										  <p class="mb-0">
											<a href="register.php" class="text-center">Register a new membership</a>
										  </p>
						</div>
			    	</fieldset>
			      	
			    </div>
			</div>
		</div>
	</div>
</div>
 

      </form>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

 <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © 2023 PUSTAKALAYA</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

<!<!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
</html>
