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
	
	
	$check="SELECT * from country where c_name='$name'";
	
	$cres=mysqli_query($conn,$check);
	$crow=mysqli_num_rows($cres);
	
	if($crow>0)
	{
		echo"<script>alert('this country already exist')</script>";
	}
	else{
	
	$insert="INSERT INTO country (c_name)VALUES('$name')";
	
	mysqli_query($conn,$insert);

	//header("location:main_page.php?view=list_country.php"); 
	
	?>
	<script>
	 location.href="main_page.php?view=list_country.php";
	
	</script>
	<?php 
	
		
	
	}
}
if(isset($_REQUEST['edit']))
{
	$id = $_REQUEST['id'];	
	$name = $_REQUEST['name'];	
	
	$sql_update="UPDATE country SET c_name='$name' WHERE c_id=".$id;
	 
	mysqli_query($conn,$sql_update);
	
	
	
	
	//header("location:main_page.php?view=list_country.php");
	
	?>
	<script>
	 location.href="main_page.php?view=list_country.php";
	
	</script>
	<?php 
	

	
}

if($_REQUEST['id'])
{
	$id = $_REQUEST['id'];
			  
	$sql = "SELECT * FROM country WHERE c_id=".$id;
		 
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_row($res);
	
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


<table border=2 class="table" width='600px' align="center">

	

<tr>

<td><input type="hidden" name="id" value="<?=$row[0];?>">
</td>
<tr>


<tr>
<td>Country name:</td>
<td><input type ="text" name="name" value="<?=$row[1];?>">
</tr>

<tr>
<?php  
if($_REQUEST['id']){ ?>

<td align ="center" colspan="2"> <input type="submit" class="btn btn-primary"name="edit" value="Edit"></td>

<?php }else{ ?>
<td align ="center" colspan="2"><input type="submit" class="btn btn-primary" name="save" value="Save"></td>

<?php } ?>


</tr> 	
</table>
</form>
</div>

</div>
</body>
</html>
