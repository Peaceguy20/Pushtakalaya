<?php 

ini_set("display_errors","OFF");
$conn=mysqli_connect("localhost","root","","online_book");

session_start();

if(!isset($_SESSION['name']))
{
	header("location:main_page.php");
	
}


if(isset($_REQUEST['Save']))
{
	$uname=$_REQUEST['uname'];
	$pass=$_REQUEST['pass'];
	$pass=md5($pass);
	$atype=$_REQUEST['atype'];
	$astatus=$_REQUEST['astatus'];
	
	$sql_insert ="INSERT INTO admin(user_name,password,admin_type,status)VALUES('$uname','$pass','$atype','$astatus')";

	mysqli_query($conn,$sql_insert);
	//header("location:index.php?view=list_admin.php"); 
	
	?>
	<script>
	 location.href="main_page.php?view=list_admin.php";
	
	</script>
	<?php 
}

if (isset($_REQUEST['Edit'])) 
{
	$admin_id=$_REQUEST['admin_id'];
	$uname=$_REQUEST['uname'];
	$pass=md5($_REQUEST['pass']);
	$atype=$_REQUEST['atype'];
	$astatus=$_REQUEST['astatus'];
	
	$sql_update="UPDATE admin SET user_name='$uname',password='$pass',admin_type='$atype',status='$astatus' WHERE admin_id=".$admin_id; 
	
	mysqli_query($conn,$sql_update);
	//header("location:index.php?view=list_admin.php"); 
	
	?>
	<script>
	 location.href="main_page.php?view=list_admin.php";
	
	</script>
	<?php
}

if($_REQUEST['admin_id'])
{
	$admin_id = $_REQUEST['admin_id'];
			  
	$sql  = "Select * FROM admin WHERE admin_id =".$admin_id; 
		 
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($res);
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
			<h3 class="card-title">Add admin</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					<i class="fas fa-minus"></i>
				</button>
				<a href="main_page.php?view=list_admin.php" class= "btn btn-dark">Back </a>
			</div>
		</div>
	
	
  <div class="card-body">

<form method="POST" action="" enctype="multipart/form-data" class="form-group" >

<table border=3 class="table" align="center">


<tr>
<!--- <td>Publication ID:</td> --->
<input type="hidden" name="admin_id" value="<?=$row[0];?>">
</tr>

<tr>
<td>User Name:</td>
<td><input type="text" name="uname" value="<?=$row[1];?>"></td>
</tr>

<tr>
<td>Password:</td>
<td><input type="password" name="pass" value="<?=$row[2];?>"></td>
</tr>

<tr>
<td>Admin Type:</td>
<td><select name="atype" >
<option value="" >-Type-</option>
<option value="admin" <?php if($row['admin_type']=='admin'){echo "selected";}?>>admin</option>
<option value="superAdmin" <?php if($row['admin_type']=='superAdmin'){echo "selected";}?>>superAdmin</option>
</select> </td>
</tr>

<tr>
<td>Status:</td>
<td><input <?php if($row['status']=="Activate"){echo "checked";}?>  type="radio" name="astatus" value="Activate" >Activate
<input <?php if($row['status']=="Deactivate"){echo "checked";}?>  type="radio" name="astatus" value="Deactivate">Deactivate</td>
</tr>

<tr>
<td colspan=2 align="center">
<?php

if($_REQUEST['admin_id'])
{
?>

<input type="Submit" name="Edit" value="Edit Admin" class="btn btn-primary">


<?php }else{ ?>


<input type="Submit" name="Save" value="Add Admin" class="btn btn-primary">

<?php
 } 
 ?>
 </td>
</tr>



</table>

</form>
</body>



</html>
