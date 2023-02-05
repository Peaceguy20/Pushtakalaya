<?php
ini_set("display_errors","OFF");

$conn=mysqli_connect("localhost","root","","online_book");

session_start();

if(!isset($_SESSION['name']))
{
	header("location:main_page.php");
	
}


if($_REQUEST['subcat_id'])
{
	$subcat_id = $_REQUEST['subcat_id'];
			  
	$sql  = "Select * FROM subcategory WHERE subcat_id =".$subcat_id; 
		 
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($res);
}

if (isset($_REQUEST['save'])) 
{
	$name=$_REQUEST["name"];	
	$desc=$_REQUEST["desc"];
	$logo=$_FILES['subcat_logo']['name'];
	$cat_id=$_REQUEST['cat_id'];
	

	move_uploaded_file($_FILES['subcat_logo']['tmp_name'],"images/".$_FILES['subcat_logo']['name']);
	 $sql_insert ="INSERT INTO subcategory(subcat_name,subcat_desc,subcat_logo,cat_id) VALUES ('$name','$desc','$logo','$cat_id')";	
	mysqli_query($conn,$sql_insert);

	
	//header("location:index.php?view=list_subcategory.php"); 
	
	
	?>
	<script>
	 location.href="main_page.php?view=list_subcategory.php";
	
	</script>
	<?php 
	

}
if (isset($_REQUEST['edit'])) 
{
	$subcat_id=$_REQUEST["subcat_id"];
	$name=$_REQUEST["name"];	
	$desc=$_REQUEST["desc"];
	$logo=$_FILES['subcat_logo']['name'];
	$cat_id=$_REQUEST["cat_id"];

	if($logo=="")
	{
		   $sql_update="UPDATE subcategory SET subcat_name='$name',subcat_desc='$desc',cat_id='$cat_id' WHERE subcat_id=".$subcat_id;
	}else{
		
		move_uploaded_file($_FILES['subcat_logo']['tmp_name'],"images/".$_FILES['subcat_logo']['name']);
		$sql_update = "update category set subcat_name='$name',subcat_desc='$desc',subcat_logo='$logo',cat_id='$cat_id' where subcat_id=".$subcat_id;	
	}
	
	mysqli_query($conn,$sql_update);
	//header("location:index.php?view=list_subcategory.php"); 
	
	?>
	<script>
	 location.href="main_page.php?view=list_subcategory.php";
	
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
			<h3 class="card-title">Add Country</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					<i class="fas fa-minus"></i>
				</button>
				<a href="main_page.php?view=list_country.php" class= "btn btn-dark">Back </a>
			</div>
		</div>
	
	
  <div class="card-body">
<form method="POST"	action="" enctype="multipart/form-data">
<table border=1 align="center">
<tr><h2 align="center">Add Sub-Category<h2></tr>

<tr> <!--- <td>Sub-Category ID:</td> --->
<td><input type="hidden" name="subcat_id" value="<?=$row[0];?>" ></td>
</tr>

<tr><td>Sub-Category Name:</td>
<td><input type="text" name="name" value="<?=$row[1];?>"</td>
</tr>

<tr>
<td>Description:</td>
<td><textarea name="desc" cols=30 rows=5 ><?=$row[2];?></textarea>
</td>
</tr>


<tr>
<td>Category Logo:</td>
<td><input type="file" name="subcat_logo"> <img src="images/<?php echo $row[3];?>"  width="100" height="100" /></td>
</tr>

<tr><td>Category ID:</td> 
<td><select name="cat_id">
<option value="">Select category</option>

<?php 

$ssql="select * from category";

$sres=mysqli_query($conn,$ssql);

while($srow=mysqli_fetch_array($sres)) { ?>

<option value="<?=$srow['cat_id'];?>" <?php if($srow['cat_id']==$row['cat_id']) { echo"selected"; } ?>> <?=$srow['cat_name'];?></option>

<?php } ?>

</select>
</td>
</tr>

<tr>
<?php
if($_REQUEST['subcat_id'])
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
</form>
</div>

</div>
</body>
</html>
