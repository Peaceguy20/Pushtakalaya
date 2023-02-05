<?php
ini_set("display_errors","OFF");
$conn=mysqli_connect("localhost","root","","online_book");

session_start();
if(!isset($_SESSION['name']))
{
	header("location:main_page.php");
	
}
if(isset($_REQUEST['save']))
{
	$name=$_REQUEST['name'];
	$desc=$_REQUEST['desc'];
	$c_id=$_REQUEST['c_id'];
	
	$insert="INSERT INTO state (s_name,s_desc,c_id)VALUES('$name','$desc','$c_id')";
	
	mysqli_query($conn,$insert);

	//header("location:main_page.php?view=list_state.php"); 
	
	?>
	<script>
	 location.href="main_page.php?view=list_state.php";
	
	</script>
	<?php 
}
if(isset($_REQUEST['edit']))
{
	$s_id=$_REQUEST['s_id'];	
	$name=$_REQUEST['name'];
	$desc=$_REQUEST['desc'];
	$c_id=$_REQUEST['c_id'];	
	
	$sql_update="UPDATE state SET s_name='$name',s_desc='$desc',c_id='$c_id' WHERE s_id=".$s_id;
	 
	mysqli_query($conn,$sql_update);
	
	//header("location:main_page.php?view=list_state.php");
	
	?>
	<script>
	 location.href="main_page.php?view=list_state.php";
	
	</script>
	<?php 
}

if($_REQUEST['s_id'])
{
	$s_id = $_REQUEST['s_id'];
			  
	$sql = "SELECT * FROM state WHERE s_id=".$s_id;
		 
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($res);
	
}
?>

<html>
<head>

<!-- CSS only -->
<link href="ramlal.css" rel="stylesheet" >
<!-- JavaScript Bundle with Popper -->
<script src="ramlal.js"></script>

</head>
<body>

<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Add Country</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					<i class="fas fa-minus"></i>
				</button>
				<a href="main_page.php?view=list_country.php" class= "btn btn-dark">Back </a>
			</div>
		</div>
	
	
  <div class="card-body">

<form method="post" action="" enctype="multipart/form-data">

<table border='1' width='600px' align="center">

<tr>
<!--- <td>State ID:</td> --->
<td><input type="hidden" name="s_id" value="<?=$row[0];?>"></td>
</tr>


<tr>
<td>State Name:</td>
<td><input type ="text" name="name" value="<?=$row[1];?>"></td>
</tr>

<tr>
<td>State Description:</td>
<td><textarea name="desc" rows=3 cols=35> <?=$row[2];?> </textarea></td>
</tr>

<tr>
<td>Country</td>
<td><select name="c_id">
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
<?php  
if($_REQUEST['s_id']){ ?>

<td align ="center" colspan="2"> <input type="submit" name="edit" value="Edit"></td>

<?php }else{ ?>
<td align ="center" colspan="2"><input type="submit" name="save" value="Save"></td>

<?php } ?>


</tr> 	



</table>
</div>

</div>
</form>
</body>
</html>