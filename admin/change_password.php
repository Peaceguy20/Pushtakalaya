<?php

ini_set("display_errors","OFF");

//$sql="select * from publication";
//$res=mysqli_query($conn,$sql);
session_start();

$conn=mysqli_connect("localhost","root","","online_book");

if(isset($_POST['chpass'])) 
{

if(isset($_SESSION['name'])) 
{	
	$username = $_SESSION['name'];
	$password = md5($_POST['opass']);
	$npass =md5($_POST['npass']);
	$cpass =md5($_POST['cpass']);


 
        $res = mysqli_query($conn,"SELECT * FROM admin WHERE user_name='$username'");


		
		$row=mysqli_fetch_row($res); 
		$pass = $row[2]; 
		$id = $row[0];
		
        if($password == $pass)
        {
        	if($npass == $cpass)
        	{
        		$sql=mysqli_query($conn, "UPDATE admin SET password='$npass' where user_name='$username'");
				$reset=mysqli_fetch_row($sql);
				if($reset)
				{
					echo"<script>alert('new password change succesfully')</script>";
				}
				else
				{
					echo"<script>alert('password changing failed')</script>";
				}
			}
			else 
        	{
				echo"<script>alert('new password and confirm password is not match')</script>";
			}	
        }
        else 
        {
			echo"<script>alert('current password is wrong')</script>";
		}	
	}
	else
	{
		header("location:login.php");

	}	
}
?>

<html>
<head>
<!-- CSS only -->
<link href="ramlal.css" rel="stylesheet">
<!-- JavaScript Bundle with Popper -->
<script src="ramlal.js"></script>



</head>
<body>

<div class="card card-primary">
	<div class="card-header">
          <h3 class="card-title">Change Password</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
	</div>
   <div class="card-body">

<form method="POST" action="" enctype="multipart/form-data" >

<table border=3 class="table" align="center" style="width:700px;border-color:black;background-color:#c1cee6">


<tr>
<td>User Name:</td>
<td><input type="text" name="uname"  value="<?php  print $_SESSION['name']; ?>" class="form-control" ></td>
</tr>

<tr>
<td>Old passwrod:</td>
<td><input type="password" name="opass" class="form-control" ></td>
</tr>

<tr>
<td>New Password:</td>
<td><input type="password" name="npass" class="form-control" ></td>
</tr>

<tr>
<td>Confirm Password:</td>
<td><input type="password" name="cpass" class="form-control"  ></td>
</tr>

<tr>



<td colspan=2 align="center"><input type="submit" name="chpass" class="btn btn-primary" value="Change Password"></td>


</tr>


</table>
</form>
 </div>
 </div>

</body>
</html>
