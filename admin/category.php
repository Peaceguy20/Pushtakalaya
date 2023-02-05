<?php
ini_set("display_errors","OFF");
$conn=mysqli_connect("localhost","root","","online_book");

session_start();

if(!isset($_SESSION['name']))
{
	header("location:main_page.php");
	
}


if($_REQUEST['cat_id'])
{
	$cat_id = $_REQUEST['cat_id'];
			  
	$sql  = "Select * FROM category WHERE cat_id =".$cat_id;
		 
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($res);
	
}
if (isset($_REQUEST['save'])) 
{
	$name = $_REQUEST["name"];	
	$desc=$_REQUEST["desc"];
	$logo=$_FILES['cat_logo']['name'];

	move_uploaded_file($_FILES['cat_logo']['tmp_name'],"images/".$_FILES['cat_logo']['name']);
	
	$sql_insert ="INSERT INTO category(cat_name,cat_desc,cat_logo) VALUES ('$name','$desc','$logo')";	
	mysqli_query($conn,$sql_insert);

	//header("location:main_page.php?view=list_category.php"); 
	
	
	?>
	<script>
	 location.href="main_page.php?view=list_category.php";
	
	</script>
	<?php 
}


if (isset($_REQUEST['edit'])) 
{
	$cat_id=$_REQUEST["cat_id"];
	$name = $_REQUEST["name"];	
	$desc=$_REQUEST["desc"];
	$logo=$_FILES['cat_logo']['name'];

	if($logo=="")
	{
		   $sql_update="UPDATE category SET cat_name='$name',cat_desc='$desc' WHERE cat_id=".$cat_id;
	}else{
		
		move_uploaded_file($_FILES['cat_logo']['tmp_name'],"images/".$_FILES['cat_logo']['name']);
		$sql_update = "update category set cat_name='$name',cat_desc='$desc',cat_logo='$logo' where cat_id=".$cat_id;	
	}
	
	mysqli_query($conn,$sql_update);
	//header("location:main_page.php?view=list_category.php"); 
	
	
	?>
	<script>
	 location.href="main_page.php?view=list_category.php";
	
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
			<h3 class="card-title">Add Category</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					<i class="fas fa-minus"></i>
				</button>
				<a href="main_page.php?view=list_category.php" class= "btn btn-dark">Back </a>
			</div>
		</div>
	
	
  <div class="card-body">

<form method="POST" action="" enctype="multipart/form-data" >
<table border="1" align="center">


<tr><!--- <td>Category ID:</td> --->
<td><input type="hidden" name="cat_id" value="<?=$row[0];?>" ></td>
</tr>

<tr><td>Categoey Name:</td>
<td><input type="text" name="name" value="<?=$row[1];?>"</td>
</tr>

<tr>
<td>Category Description:</td>
<td><textarea name="desc" cols=30 rows=5 ><?=$row[2];?></textarea>
</td>
</tr>

<tr>
<td>Logo:</td>
<td><input type="file" name="cat_logo"> <img src="images/<?php echo $row[3];?>"  width="100" height="100" /></td>
</tr>

<tr>

<?php
if($_REQUEST['cat_id'])
{
?>

<td align ="center" colspan="2"><input type="submit" name="edit" value="EDIT">

<?php }else{ ?>

<td align ="center" colspan="2"><input type="submit" name="save" value="SAVE">

<?php
 } 
 ?>
</tr>

</table>
</div>
</div>
</form>

</body>
</html>
