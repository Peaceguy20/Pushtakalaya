<?php
ini_set("display_errors","OFF");

$conn=mysqli_connect("localhost","root","","online_book");

session_start();

if(!isset($_SESSION['name']))
{
	header("location:main_Page.php");
	
}

if($_REQUEST['auth_id'])
{
	$auth_id=$_REQUEST['auth_id'];
	
	$sql="select * from author where auth_id=".$auth_id;
	
	$res=mysqli_query($conn,$sql); 
	$row=mysqli_fetch_array($res);
}

if (isset($_REQUEST['save'])) 
{
	$name=$_REQUEST["name"];	
	$desc=$_REQUEST["desc"];
	
	$sql_insert ="INSERT INTO author(auth_name,auth_desc) VALUES ('$name','$desc')";
	
	mysqli_query($conn,$sql_insert);
	//header("location:index.php?view=list_author.php"); 
	
	?>
	<script>
	 location.href="main_page.php?view=list_author.php";
	
	</script>
	<?php 	
}

if (isset($_REQUEST['edit'])) 
{
	$auth_id=$_REQUEST["auth_id"];
	$name=$_REQUEST["name"];	
	$desc=$_REQUEST["desc"];
	
	$sql_update="UPDATE author SET auth_name='$name',auth_desc='$desc' WHERE auth_id=".$auth_id;
	
	mysqli_query($conn,$sql_update);
	//header("location:index.php?view=list_author.php"); 
	
	?>
	<script>
	 location.href="main_page.php?view=list_author.php";
	
	</script>
	<?php 	
	
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
			<h3 class="card-title">Add author</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					<i class="fas fa-minus"></i>
				</button>
				<a href="main_page.php?view=list_author.php" class= "btn btn-dark">Back </a>
			</div>
		</div>
	
	
  <div class="card-body">
<form method="POST"	action="" enctype="multipart/form-data">
<table border=1 align="center">


<tr> <!--- <td>Author ID:</td> --->
<td><input type="hidden" name="auth_id" value="<?=$row[0];?>" ></td>
</tr>

<tr><td>Author Name:</td>
<td><input type="text" name="name" value="<?=$row[1];?>"</td>
</tr>

<tr>
<td>Author Description:</td>
<td><textarea name="desc" cols=30 rows=5 ><?=$row[2];?></textarea>
</td>
</tr>

<tr>
<?php
if($_REQUEST['auth_id'])
{
?>

<td align ="center" colspan="2"><input type="submit" class="btn btn-primary" name="edit" value="EDIT">

<?php }else{ ?>

<td align ="center" colspan="2"><input type="submit" class="btn btn-primary" name="save" value="SAVE">

<?php
 } 
 ?>
</tr>



</table>
</form>
</div>
</div>
</body>
</html>