<?php 
ini_set("display_errors","off");
$conn=mysqli_connect("localhost","root","","online_book");
$sql="select * from publication";
$res=mysqli_query($conn,$sql);


session_start();

if(!isset($_SESSION['name']))
{
	header("location:main_page.php");
	
}

if($_REQUEST['delete'])
{
	$id=implode(",",$_REQUEST['chk']);
	
	$delete="DELETE FROM publication WHERE pub_id in ($id)";
	
	$res=mysqli_query($conn,$delete);
	//header("location:index.php?view=list_publication.php"); 

?>
	<script>
	 location.href="main_page.php?view=list_publication.php";
	
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
			<h3 class="card-title">Publication List</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					<i class="fas fa-minus"></i>
				</button>
			
			</div>
		</div>
	
	
  <div class="card-body">
<form method="POST" class="form-group" action="">
<section>

<table align="center" class="table table-dark" border=4 style="overflow: scroll;">

<tr>

<th>Publication ID</th>
<th>Publication Name</th>
<th>Description</th>
<th>Publication logo</th>
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
<td><a href="main_page.php?view=publication.php&pub_id=<?php echo $row['pub_id'];?>">Edit</a></td>
<td><input type="checkbox" name="chk[]" value="<?php echo $row[0];?>"></td> 

</tr>

<?php
	}
?>


<td colspan=5 align="right"><a href="main_page.php?view=publication.php" class="btn btn-primary">Add Publication</a></td>
<td colspan=6 align="left"><input type="submit" name="delete" class="btn btn-danger" value="delete"></td>

</table>
</section>
</form>
</div>
</div>

</body>


</html>