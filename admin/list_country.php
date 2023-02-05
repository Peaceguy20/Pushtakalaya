<?php
ini_set("display_errors","off");
$conn = mysqli_connect("localhost","root","","online_book");
$sql="SELECT * FROM country";
$res=mysqli_query($conn,$sql);

session_start();

if(!isset($_SESSION['name']))
{
	header("location:main_page.php");
	
}



if($_REQUEST['delete'])
{
	$id=implode(",",$_REQUEST['chk']);
	
	$delete="DELETE FROM country WHERE c_id in ($id)";
	
	$res=mysqli_query($conn,$delete);
	//header("location:main_page.php?view=list_country.php"); 
	
	?>
	<script>
	 location.href="main_page.php?view=list_country.php";
	
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
          <h3 class="card-title">Country List</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
	</div>
   <div class="card-body">
  <table align="center" class="table table-dark "   border=2 style="overflow: scroll;" class="table">
  
<tr>
	<th>ID</th>
	<th>Country Name</th>
	<th>Edit</th>
	<th>Delete</th>
</tr>

<?php
	while($rows=mysqli_fetch_array($res))
	{                                                                                                                   
?>

<tr>
	<td><?php echo $rows[0]; ?></td>
	<td><?php echo $rows[1]; ?></td>
	<td><a href="main_page.php?view=country.php&id=<?php echo $rows['c_id'];?>">Edit </a></td>
	<td><input type="checkbox" name="chk[]" value="<?php echo $rows[0];?>"></td>  
</tr>

<?php
	}
?>
<td colspan=3 align="right"><a href="main_page.php?view=country.php" class="btn btn-primary">Add Country</a></td>
<td colspan=4 align="left"><input type="submit" name="delete" class="btn btn-danger" value="delete"></td>



</table>
</div>
</div>
</section>
</form>




</body>
</html>
