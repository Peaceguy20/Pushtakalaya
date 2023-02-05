<?php
ini_set("display_errors","OFF");
$conn=mysqli_connect("localhost","root","","online_book");

session_start();

if(!isset($_SESSION['name']))
{
	header("location:main_page.php");
	
}


$arr_hobby[]="Sport";

if(isset($_REQUEST['save']))
{

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
	$hobby= ( implode(",",$_REQUEST['hobby']));

	
	move_uploaded_file($_FILES['user_logo']['tmp_name'],"images/".$_FILES['user_logo']['name']);

	
	 $sql_insert = "INSERT INTO user(user_name,password,f_name,l_name,email,mobile,address,city,s_id,c_id,photo,gender,hobby)VALUES('$uname','$pass','$fname','$lname','$mail','$phone','$add','$city','$st_id','$ct_id','$logo','$gen','$hobby')"; 

	mysqli_query($conn,$sql_insert);
	print "data save";
	//header("location:main_page.php?view=list_user.php"); 
	
	
	?>
	<script>
	 location.href="main_page.php?view=list_user.php";
	
	</script>
	<?php 
	

	
}
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
	$hobby=implode("-",$_REQUEST['hobby']);

	if($logo=="")
	{
		   $sql_update="UPDATE user SET user_name='$uname',password='$pass',f_name='$fname',
		   l_name='$lname',email='$mail',mobile='$phone',address='$add',city='$city',s_id='$st_id',c_id='$ct_id',gender='$gen',hobby='$hobby' WHERE user_id=".$user_id;
		   
	}else{
		
		move_uploaded_file($_FILES['user_logo']['tmp_name'],"images/".$_FILES['user_logo']['name']);
		
		 $sql_update="UPDATE user SET user_name='$uname',password='$pass',f_name='$fname',
		l_name='$lname',email='$mail',mobile='$phone',address='$add',city='$city',photo='$logo',s_id='$st_id',c_id='$ct_id',gender='$gen',hobby='$hobby' WHERE user_id=".$user_id;
	}
	
	mysqli_query($conn,$sql_update); 
	//header("location:main_page.php?view=list_user.php"); 
	
	?>
	<script>
	 location.href="main_page.php?view=list_user.php";
	
	</script>
	<?php 
}  

if($_REQUEST['user_id'])
{
	$user_id = $_REQUEST['user_id'];
			  
	$sql  = "Select * FROM user WHERE user_id =".$user_id; 
		 
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($res);

	$arr_hobby = explode("-",$row['hobby']);

    // print_r($arr_hobby);


	//$hobby=$row['hobby'];

	//$hobby=explode(",",$hobby);


}

?>

<!DOCTYPE html>
<html>
<head>
	
<!-- CSS only -->
<link href="ramlal.css" rel="stylesheet" >
<!-- JavaScript Bundle with Popper -->
<script src="ramlal.js"></script>
<link rel ="stylesheet" type="text/css" href="">


</head>
<body>


<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">User sign-up form</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					<i class="fas fa-minus"></i>
				</button>
				<a href="main_page.php?view=list_user.php" class= "btn btn-dark">Back </a>
			</div>
		</div>
	
	
  <div class="card-body">

	<form method="POST" enctype="multipart/form-data">
		<table border=1 align="center">
		

			<tr>
				
			</tr>
				<!--- <td>User id:</td> --->
				<td><input type="hidden" name="user_id" value="<?=$row[0];?>" placeholder="Enter user name">	</td>

			<tr>
				<td>User Name:</td>
				<td><input type="text" name="uname" value="<?=$row[1];?>" placeholder="Enter user name">	</td>
			</tr>

			<tr>
				<td>Password:</td>
				<td><input type="password" name="pass" value="<?=$row[2];?>" placeholder="Enter password"></td>
			</tr>

			<tr>
				<td>First name:</td>
				<td><input type="text" name="fname" value="<?=$row[3];?>" placeholder="Enter first name"></td>
			</tr>

			<tr>
				<td>Last Name:</td>
				<td><input type="text" name="lname" value="<?=$row[4];?>" placeholder="Enter last name"></td>
			</tr>


			<tr>
				<td>E-mail</td>
				<td><input type="email" name="mail" value="<?=$row[5];?>" placeholder="Enter email"></td>
			</tr>

			<tr>
				<td>Mobile</td>
				<td><input type="tel" name="phone" pattern="[0-9]{10}" value="<?=$row[6];?>" placeholder="Enter contact"></td>
			</tr>

			<tr>
				<td>Address:</td>
				<td><textarea name="add" value="" cols=50 rows=3 placeholder="Enter Address"><?=$row[7];?></textarea></td>
			</tr>

			<tr>
				<td>City:</td>
				<td><input type="text" name="city" value="<?=$row[8];?>" placeholder="Enter city"></td></td>
			</tr>

		
				
			<tr>
				<td>State:</td>
				<td><select name="st_id">
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
				</td>
			</tr>

			<tr>
				<td>Country:</td>
				<td><select name="ct_id">
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
				</td>
			</tr>

			<tr>
				<td>Front photo: </td>
				<td><input type="file" name="user_logo"> <img src="images/<?php echo $row[11];?>"  width="100" height="100" /></td>
			</tr>

			<tr>
				<td>Gender: </td>
				<td><input <?php if($row['gender']=="male"){echo "checked";}?> type="radio" name="gen" value="male">Male &nbsp;&nbsp; 
					<input <?php if($row['gender']=="female"){echo "checked";}?>type="radio" name="gen" value="female">Female  
				</td>
			</tr>

			<tr>
				<td>Hobby:</td>
				<td>Sport <input type="checkbox"  name="hobby[]" value="Sport" 
				 <?php if(in_array("Sport",$arr_hobby)){  print "checked";}  ?>  >

				Reading <input type="checkbox"  name="hobby[]" value="Reading" 
				 <?php if(in_array("Reading",$arr_hobby)){  print "checked";}  ?>>

					Exercise<input type="checkbox"  name="hobby[]" value="Exercise"
					 <?php if(in_array("Exercise",$arr_hobby)){  print "checked";}  ?> >

					Arts<input type="checkbox" name="hobby[]" value="Arts" 
					 <?php if(in_array("Arts",$arr_hobby)){  print "checked";}  ?> >
					 
					 </td>
			</tr>




			<tr>
			<?php
				if($_REQUEST['user_id'])
				{
			?>
			<td align ="center" colspan="2"><input type="submit" name="edit" value="EDIT" class="btn btn-primary"></td>
			<?php }else{ ?>

			<td align ="center" colspan="2"><input type="submit" name="save" value="SAVE" class="btn btn-primary"></td>

			<?php } ?>

		</tr>

			<!---<tr>
				<td align ="center" colspan="2"><input type="submit" name="save" value="Save" class="btn btn-primary"></td>
			</tr> --->

		</table>
</form>




</body>
</html>