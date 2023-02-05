<?php 
ini_set("display_errors","off");
$conn=mysqli_connect("localhost","root","","online_book");
$sql="select * from (state
	inner join country on state.c_id=country.c_id)";

$res=mysqli_query($conn,$sql);


session_start();

if(!isset($_SESSION['name']))
{
	header("location:main_page.php");
	
}


if($_REQUEST['delete'])
{
	$id=implode(",",$_REQUEST['chk']);
	
	$delete="DELETE FROM state WHERE s_id in ($id)";
	
	$res=mysqli_query($conn,$delete);
	//header("location:main_page.php?view=list_state.php");

	?>
	<script>
	 location.href="main_page.php?view=list_state.php";
	
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
          <h3 class="card-title">State List</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
	</div>
   <div class="card-body">

<h1 align="center">State List<h1>
<table align="center"  border=2 style="overflow: scroll;" class="table table-dark ">

<tr>
<th>State ID</th>
<th>State  Name</th>
<th>Description</th>
<th>Country ID</th>
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
<td><?php echo $row['c_name']; ?></td>
<td><a href="main_page.php?view=state.php&s_id=<?php echo $row['s_id'];?>">Edit</a></td>
<td><input type="checkbox" name="chk[]" value="<?php echo $row[0];?>"></td>  

</tr>

<?php
	}
?>
<td colspan=5 align="right"><a href="main_page.php?view=state.php" class="btn btn-primary">Add State</a></td>

<td colspan=6 align="left"><input type="submit" name="delete" class="btn btn-danger" value="delete"></td>


</table>
</section>
</form>

</body>


</html>