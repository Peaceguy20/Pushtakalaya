<?php
ini_set("display_errors","OFF");
$conn=mysqli_connect("localhost","root","","online_book");

session_start();

$arr_hobby[]="Sport";




if (isset($_REQUEST['edit'])) 
{
	$user_id=$_REQUEST['user_id'];
	$uname=$_REQUEST['uname'];

	$pass=$_REQUEST['pass'];
	$pass=md5($pass);

	$fname=$_REQUEST['fname'];
	$lname=$_REQUEST['lname'];
	$mail=$_REQUEST['mail'];
	$phone=$_REQUEST['phone'];
	$add=$_REQUEST['add'];
	$city=$_REQUEST['city'];

	$logo=$_FILES['user_logo']['name'];
	$st_id=$_REQUEST['st_id'];
	$ct_id=$_REQUEST['ct_id'];
	$gen=$_REQUEST['gen'];

	$hobby= implode("-",$_REQUEST['hobby']);

	if($logo=="")
	{
		   $sql_update="UPDATE user SET user_name='$uname',password='$pass',f_name='$fname',
		   l_name='$lname',email='$mail',mobile='$phone',address='$add',city='$city',s_id='$st_id',c_id='$ct_id',gender='$gen',hobby='$hobby' WHERE user_id=".$user_id;
		   
	}else{
		
		move_uploaded_file($_FILES['user_logo']['tmp_name'],"assets/images/".$_FILES['user_logo']['name']);
		$sql_update="UPDATE user SET user_name='$uname',password='$pass',f_name='$fname',
		l_name='$lname',email='$mail',mobile='$phone',address='$add',city='$city',user_logo='$logo',s_id='$st_id',c_id='$ct_id',gender='$gen',hobby='$hobby' WHERE user_id=".$user_id;	
	}
	
	mysqli_query($conn,$sql_update); 
	echo '<script>alert("your account is update")</script>';
}  

 if($_SESSION['user_name'])
 {
	

	$uname=$_SESSION["user_name"]; 

			  
	 $sql= "Select * FROM user WHERE user_name ='".$uname."'"; 
	

		 
	$res=mysqli_query($conn,$sql); 
	
	$row=mysqli_fetch_array($res); 
	
	

	//$arr_hobby = explode("-",$row['hobby']);
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

    <title>PHPJabbers.com | Online Book Store Website Template</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

    </head>
	<body>
	
	
	
	 <header class="header-area header-sticky" style ="background-color:#cfc9b8;height:70px;position:sticky;top:0;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">On-line Book Store <em> Website</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php" class="active">Home</a></li>
                            <li><a href="products.html">Products</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                              
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="about.html">About Us</a>
                                    <a class="dropdown-item" href="blog.html">Blog</a>
                                    <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                                    <a class="dropdown-item" href="terms.html">Terms</a>
                                </div>
                            </li>
                            <li><a href="contact.html">Contact</a></li> 
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>

	
	<div class="container">
		<div class="main-body">
		<div class="row gutters-sm">
		
		<div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
				 <form method="POST"  enctype="multipart/form-data" >
				
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">User Id</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
						<input type="hide" class="form-control" name="user_id" value="<?=$row[0];?>" style="border-color:black;">
                    </div>
                  </div>
				  
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">User name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="uname" value="<?=$row[1];?>" style="border-color:black;" readonly>
                    </div>
                  </div>
				  
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                       <input type="password" class="form-control" name="pass" value="<?=$row[2];?>" style="border-color:black;">
                    </div>
                  </div>
				  
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">First name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
						 <input type="text" class="form-control" name="fname" value="<?=$row[3];?>" style="border-color:black;">
                    </div>
                  </div>
				  
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">"Last name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" class="form-control" name="lname" value="<?=$row[4];?>" style="border-color:black;">
                    </div>
                  </div>
				  
				  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">E-mail</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="email" class="form-control" name="mail" value="<?=$row[5];?>" style="border-color:black;">
                    </div>
                  </div>
				  
				  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Conatact</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="tel" class="form-control" name="phone" value="<?=$row[6];?>" style="border-color:black;">
                    </div>
                  </div>
				  
				  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" class="form-control" name="add" value="<?=$row[7];?>" style="border-color:black;">
                    </div>
                  </div>
				  
				   <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">City</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" class="form-control" name="city" value="<?=$row[8];?>" style="border-color:black;">
                    </div>
                  </div>
				  
				   <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Country</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
					
                    <select name="ct_id"  class="form-control">
					<option value="">Select country</option>
					<?php 

						$ssql="select * from country";

						$sres=mysqli_query($conn,$ssql);

						while($srow=mysqli_fetch_array($sres)) { ?>

						<option value="<?=$srow['c_id'];?>" <?php if($srow['c_id']==$row['c_id']) { echo"selected"; } ?>> 
						<?=$srow['c_name'];?>
							
						</option>

					<?php } ?>
						
					</select>
                  </div>
                  </div>
				 
				  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">State</h6>
                    </div>
					<div class="col-sm-9 text-secondary">
					
                    <select name="st_id"  class="form-control">
					<option value="">Select state</option>
					<?php 

						$ssql="select * from state";

						$sres=mysqli_query($conn,$ssql);

						while($srow=mysqli_fetch_array($sres)) { ?>

						<option value="<?=$srow['s_id'];?>" <?php if($srow['s_id']==$row['s_id']) { echo"selected"; } ?>> 
						<?=$srow['s_name'];?>
							
						</option>

					<?php } ?>
						
					</select>
                  </div>
				  </div>
				  
				   <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" >
                     <input <?php if($row['gender']=="male"){echo "checked";}?> type="radio" name="gen" value="male">Male 
						<input <?php if($row['gender']=="female"){echo "checked";}?> type="radio" name="gen" value="female">Female  
                    </div>
                  </div>
				  
				  
				  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Hobby</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
					
                     Sport <input type="checkbox"  name="hobby[]" value="Sport" 
					<?php if(in_array("Sport",$arr_hobby)){  print "checked";}  ?>  >

					Reading <input type="checkbox"  name="hobby[]" value="Reading" 
					<?php if(in_array("Reading",$arr_hobby)){  print "checked";}  ?>>

					Exercise<input type="checkbox"  name="hobby[]" value="Exercise"
					 <?php if(in_array("Exercise",$arr_hobby)){  print "checked";}  ?> >

					Arts<input type="checkbox" name="hobby[]" value="Arts" 
					 <?php if(in_array("Arts",$arr_hobby)){  print "checked";}  ?> >
                  </div>
				  
				  <div class="form-group">
					<input type="submit" class="btn btn-primary" name="edit" value="update" align="ceneter">
				  </div>
				  
				  
				  </form>
                </div>
              </div>
			</div>
		
		</div>
		</div>
	</div>
	
	
	
	
	
	 <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © 2020 Company Name
                        - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
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

  </body>
</html>