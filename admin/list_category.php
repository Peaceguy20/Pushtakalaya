<?php 
ini_set("display_errors","off");
$conn=mysqli_connect("localhost","root","","online_book");
$sql="select * from category";
$res=mysqli_query($conn,$sql);


session_start();




if($_REQUEST['delete'])
{
	$id=implode(",",$_REQUEST['chk']);
	
	$delete="DELETE FROM category WHERE cat_id in ($id)";
	
	$res=mysqli_query($conn,$delete);
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
          <h3 class="card-title">Category List</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
	</div>
   <div class="card-body">
<form method="POST" action="" class="form-group">
<section>


<table align="center"  border=2 style="overflow:scroll;" class="table table-dark">

<tr>

<th>Category_id</th>
<th>Category Name</th>
<th>Category description</th>
<th>Logo</th>
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
<td><a href="main_page.php?view=category.php&cat_id=<?php echo $row['cat_id'];?>">Edit</a></td>
<td><input type="checkbox" name="chk[]" value="<?php echo $row[0];?>"></td> 

</tr>

<?php
	}
?>
<td colspan=5 align="right"><a href="main_page.php?view=category.php" class="btn btn-primary">Add Category</a></td>
<td colspan=6 align="left"><input type="submit" name="delete" class="btn btn-danger" value="delete"></td>


</table>

</section>
</form>
</div>
</div>
</body>


</html>