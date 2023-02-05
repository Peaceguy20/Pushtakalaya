<?php 
ini_set("display_errors","off");
$conn=mysqli_connect("localhost","root","","online_book");
$sql="select * from author";
$res=mysqli_query($conn,$sql);

session_start();

if(!isset($_SESSION['name']))
{
	header("location:index.php");
	
}


if($_REQUEST['delete'])
{
	$id=implode(",",$_REQUEST['chk']);
	
	$delete="DELETE FROM author WHERE auth_id in ($id)";
	
	$res=mysqli_query($conn,$delete);
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
			<h3 class="card-title">Author list</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					<i class="fas fa-minus"></i>
				</button>
			
			</div>
		</div>
	
	
  <div class="card-body">
<form method="POST" action="" class="form-group">
<section>
<table align="center" border=2 style="overflow: scroll;" class="table table-dark ">

<tr>

<th>Author ID</th>
<th>Author Name</th>
<th>Description</th>
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
<td><a href="main_page.php?view=author.php&auth_id=<?php echo $row['auth_id'];?>">Edit</a></td>
<td><input type="checkbox" name="chk[]" value="<?php echo $row[0];?>"></td> 

</tr>

<?php
	}
?>
<td colspan=4 align="right"><a href="main_page.php?view=author.php" class="btn btn-primary">Add Author</a></td>
<td colspan=5 align="left"><input type="submit" name="delete" class="btn btn-danger" value="delete"></td>


</table>
</section>
</form>
</div>
</div>

</body>


</html>