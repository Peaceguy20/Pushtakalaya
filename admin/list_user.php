<?php 
ini_set("display_errors","off");
$conn=mysqli_connect("localhost","root","","online_book");
$sql="select * from user
			inner join country on user.c_id=country.c_id  
			inner join state on user.s_id=state.s_id ";
$res=mysqli_query($conn,$sql);

session_start();

if(!isset($_SESSION['name']))
{
	header("location:main_page.php");
	
}

if($_REQUEST['delete'])
{
	$id=implode(",",$_REQUEST['chk']);
	$delete="DELETE FROM user WHERE user_id in ($id)";
	
	$res=mysqli_query($conn,$delete);
	//header("location:index.php?view=list_user.php"); 
	
	?>
	<script>
	 location.href="main_page.php?view=list_user.php";
	
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

<div class="card card-primary">
	<div class="card-header">
          <h3 class="card-title">User list</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
	</div>
   <div class="card-body">
<section>

<table align="center" border=4 style="overflow: scroll;" class="table-dark" ">

<tr>

<th>User ID</th>
<th>User Name</th>
<th>First Name</th>
<th>Last name</th>
<th>E-mail</th>
<th>Mobile</th>
<th>Address</th>
<th>City</th>
<th>State_id</th>
<th>Country_id</th>
<th>Photo</th>
<th>Gender</th>
<th>Hobby</th>
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
<td><?php echo $row[3]; ?></td>
<td><?php echo $row[4]; ?></td>
<td><?php echo $row[5]; ?></td>
<td><?php echo $row[6]; ?></td>
<td><?php echo $row[7]; ?></td>
<td><?php echo $row[8]; ?></td>
<td><?php echo $row['s_name']; ?></td>
<td><?php echo $row['c_name']; ?></td>
<td><img src="images/<?php echo $row[11]; ?> " width="100" height="100"></td>
<td><?php echo $row[12]; ?></td>
<td><?php echo $row[13]; ?></td>
<td><a href="main_page.php?view=user.php&user_id=<?php echo $row['user_id'];?>">Edit</a></td>
<td><input type="checkbox" name="chk[]" value="<?php echo $row[0];?>"></td> 
</td> 

</tr>

<?php
	}
?>


<td colspan=12 align="right"><a href="main_page.php?view=user.php" class="btn btn-primary">Add User</a></td>
<td colspan=9 align="right"><input type="submit" name="delete" class="btn btn-danger" value="delete"></td>

</table>
</section>
</form>
</div>
</div>
</body>


</html>