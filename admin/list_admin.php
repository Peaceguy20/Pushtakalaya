<?php 
ini_set("display_errors","off");
$conn=mysqli_connect("localhost","root","","online_book");
$sql="select * from admin";
$res=mysqli_query($conn,$sql);

session_start();

if(!isset($_SESSION['name']))
{
	header("location:main_page.php");
	
}



if($_REQUEST['delete'])
{
	$id=implode(",",$_REQUEST['chk']);
	
	$delete="DELETE FROM admin WHERE admin_id in ($id)";
	
	$res=mysqli_query($conn,$delete);
	//header("location:index.php?view=list_admin.php"); 
	
	?>
	<script>
	 location.href="main_page.php?view=list_admin.php";
	
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


<form method="POST" class="form-group" action="">
<section>
<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Add Country</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					<i class="fas fa-minus"></i>
				</button>
			</div>
		</div>
	
	
  <div class="card-body">

<table align="center" class="table table-dark" border=2 style="overflow: scroll;">

<tr>

<th>Admin ID</th>
<th>User Name</th>
<th>Password</th>
<th>Type</th>
<th>Status</th>
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
<td><?php echo $row[3]; ?></td>
<td><?php echo $row[4]; ?></td>
<td><a href="main_page.php?view=admin.php&admin_id=<?php echo $row['admin_id'];?>">Edit</a></td>
<td><input type="checkbox" name="chk[]" value="<?php echo $row[0];?>"></td> 

</tr>

<?php
	}
?>


<td colspan=5 align="right"><a href="main_page.php?view=admin.php" class="btn btn-primary">Add Admin</a></td>
<td colspan=6 align="left"><input type="submit" name="delete" class="btn btn-danger" value="delete"></td>

</table>
</div>
</div>
</section>
</form>

</body>


</html>