<?php 
ini_set("display_errors","off");
$conn=mysqli_connect("localhost","root","","online_book");
$sql="select * from (subcategory
			inner join category on subcategory.cat_id=category.cat_id )";
$res=mysqli_query($conn,$sql);



session_start();

if(!isset($_SESSION['name']))
{
	header("location:main_page.php");
	
}

if($_REQUEST['delete'])
{
	$id=implode(",",$_REQUEST['chk']);
	
	
	$delete="DELETE FROM subcategory WHERE subcat_id in ($id)";
	
	$res=mysqli_query($conn,$delete);
	//header("location:main_page.php?view=list_subcategory.php");
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
<form method="POST" action="" class="form-group">
<section>
	<div class="card card-primary">
	<div class="card-header">
          <h3 class="card-title">Sub-Category List</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
	</div>
   <div class="card-body">
<form method="POST" action="" class="form-group">
<section>

<table align="center"  border=4 style="overflow: scroll;" class="table table-dark">
<tr>

<th>Sub-Category ID</th>
<th>sub-Category Name</th>
<th>Description</th>
<th>Sub-Category Logo</th>
<th>Category_id</th>
<th>EDIT</th>
<th>DELETE</th>

</tr>

<?php 
	while($row=mysqli_fetch_array($res))
	{
?>

<tr>

<td><?php echo $row[0]; ?></td>
<td><?php echo $row[1]; ?></td>
<td><?php echo $row[2]; ?></td>
<td><img src="images/<?php echo $row[3]; ?> " width="100" height="100"></td>
<td><?php echo $row['cat_name']; ?></td>
<td><a href="main_page.php?view=subcategory.php&subcat_id=<?php echo $row['subcat_id'];?>">Edit</a></td>
<td><input type="checkbox" name="chk[]" value="<?php echo $row[0];?>"></td> 
</td> 

</tr>


<?php
	}
?>

<tr>

<td colspan=6 align="right"><a href="main_page.php?view=subcategory.php" class="btn btn-primary">Add Sub-Category</a></td>
<td colspan=5 align="right"><input type="submit" name="delete" class="btn btn-danger" value="delete"></td>
<tr>
</table>
</section>
</form>
</div>
</div>
</body>


</html>