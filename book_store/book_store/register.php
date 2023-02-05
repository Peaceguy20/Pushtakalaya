<?php
ini_set("display_errors","OFF");
$conn=mysqli_connect("localhost","root","","online_book");

$arr_hobby[]="Sport";

if(isset($_REQUEST['save']))
{

	$uname=$_REQUEST['uname'];

	$pass=$_REQUEST['pass'];
	$pass=md5($pass);
	
	$cpass=md5($_REQUEST['cpass']);

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
	$hobby= ( implode(",",$_REQUEST['hobby']));

	if($pass == $cpass)
	{
		move_uploaded_file($_FILES['user_logo']['tmp_name'],"assets/images/".$_FILES['user_logo']['name']);

		
		 $sql_insert = "INSERT INTO user(user_name,password,f_name,l_name,email,mobile,address,city,s_id,c_id,photo,gender,
		hobby)VALUES('$uname','$pass','$fname','$lname','$mail','$phone','$add','$city','$st_id','$ct_id','$logo','$gen','$hobby')"; 

            

		mysqli_query($conn,$sql_insert);
		echo "data save";
		//header("location:index.php?view=list_user.php"); 
	}
	else
	{
		echo '<script>alert("confirm password is wrong")</script>';
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
	<body>
	
	
	
	 <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo"><em> PUSTAKALAYA</em></a>
                        <!-- ***** Logo End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
	
	
<div class="container">
  <div class="py-5 text-center">
	<img class="d-block mx-auto mb-3" src="assets/images/features-first-icon.png" alt="" width="70" height="70">
    <h2>Registration Form</h2>
  </div>
</div>
<div class="container" >
  <div class="row">
    <div class="col-md-6">
	
     <form method="POST"  enctype="multipart/form-data" >
		<div class="form-group" >
			<label>Enter Name:</label>
				<input type="text" class="form-control" name="uname" style="border-color:black;" required>
		</div>
		
		<div class="form-group">
			<label>Enter Password:</label>
				<input type="password" class="form-control" name="pass" style="border-color:black;" required>
		</div>
		
		<div class="form-group">
			<label>Enter Confirm Password:</label>
				<input type="password" class="form-control" name="cpass" style="border-color:black;" required>
		</div>
		
		<div class="form-group">
			<label>First Name:</label>
				<input type="text" class="form-control" name="fname" style="border-color:black;" required>
		</div>
		
		<div class="form-group">
			<label>Last Name:</label>
				<input type="text" class="form-control" name="lname" style="border-color:black;" required>
		</div>
     
		<div class="form-group">
			<label>Email address:</label>
				<input type="email" name="mail" class="form-control"  placeholder=" ex; xyz@email.com" style="border-color:black;">
		<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		</div>
		
		<div class="form-group">
			<label>Contact No:</label>
				<input type="tel" name="phone" class="form-control" pattern="[0-9]{10}" placeholder="Enter contact" style="border-color:black;">
		</div>
  
		<div class="form-group">
			<label for="exampleInputPassword1">Address: </label>
				<input type="text" class="form-control" name="add" style="border-color:black;"  required>
				<small class="form-text text-muted">Street Address</small>
		</div>
		
		<div class="form-group">
				<label>City:</label>
				<input type="text" class="form-control" name="city" style="border-color:black;" placeholder="Enter city">
		</div>
		
		<div class="row" class="form-group">
		
          <div class="col-md-7">
            <label for="country">Country:</label>
			<select name="ct_id">
			<option value="">Select country</option>
            <?php 

						$ssql="select * from country";

						$sres=mysqli_query($conn,$ssql);

						while($srow=mysqli_fetch_array($sres)) { ?>

						<option value="<?=$srow['c_id'];?>" > 
						<?=$srow['c_name'];?>
							
						</option>

					<?php } ?>
					</select>
          </div>
		  
		  
          <div class="col-md-5 mb-3">
            <label for="state">State:</label>
            <select name="st_id">
			<option value="">Select State</option>
            <?php 

						$ssql="select * from state";

						$sres=mysqli_query($conn,$ssql);

						while($srow=mysqli_fetch_array($sres)) { ?>

						<option value="<?=$srow['s_id'];?>" > 
						<?=$srow['s_name'];?>
							
						</option>

					<?php } ?>
					</select>
		 </div>
		  
        </div>
		
		<div class="form-group">
				<label>Photo</label>
				<input type="file" name="user_logo"> <img src="assets/images/"  width="100" height="100" />
		</div>
		
		<div class="form-group">
				<label>Gender:</label>
				<input <?php if($row['gender']=="male"){echo "checked";}?> type="radio" name="gen" value="male">Male &nbsp;&nbsp; 
				<input <?php if($row['gender']=="female"){echo "checked";}?>type="radio" name="gen" value="female">Female  
		</div>
		
		
		<div class="form-group">
				<label>Hobby:</label>
				<input type="checkbox"  name="hobby[]" value="Sport" /> Sport 
				 
				 <input type="checkbox"  name="hobby[]" value="Reading"/> Reading 
				 
				 <input type="checkbox"  name="hobby[]" value="Exercise"/> Exercise
				 
				 <input type="checkbox"  name="hobby[]" value="Arts"/> Arts
		</div>
		
		
		<div class="form-group">
			<input type="submit" class="btn btn-primary" name="save" value="Register">
		</div>
		
		</form>
    
  </div>
  </div>
  </div>
	
		
	  <!-- ***** Footer Start ***** -->
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