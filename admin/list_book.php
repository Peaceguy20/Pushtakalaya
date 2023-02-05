<?php

ini_set("display_errors","OFF");

$conn=mysqli_connect("localhost","root","","online_book");

$sql="select * from book
			inner join author on book.auth_id=author.auth_id  
			inner join publication on book.pub_id=publication.pub_id ";
$res=mysqli_query($conn,$sql);


session_start();

if(!isset($_SESSION['name']))
{
	header("location:main_page.php");
	
}


if($_REQUEST['delete'])
{
	$id=implode(",",$_REQUEST['chk']);
	$delete="DELETE FROM book WHERE book_id in ($id)";
	
	$res=mysqli_query($conn,$delete);
	//header("location:index.php?view=list_book.php");

	
	?>
	<script>
	 location.href="main_page.php?view=list_book.php";
	
	</script>
	<?php 


}
?>



<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- CSS only -->
	<link href="ramlal.css" rel="stylesheet" >
	<!-- JavaScript Bundle with Popper -->
	<script src="ramlal.js"></script>
</head>

<body>

<div class="card card-primary">
	<div class="card-header">
          <h3 class="card-title">Book detail list</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
	</div>
   <div class="card-body">

<form method="POST" enctype="multipart/form-data" action="">
	
	<table border=4 style="overflow: scroll;" align="center" class="table table-dark">
	
	
	<tr>
		<th>Book id</th>
		<th>Book name</th>
		<th>Price</th>
		<th>Sort Description</th>
		<th>Description</th>
		<th>ISBN</th>
		<th>Author id</th>
		<th>Publication id</th>
		<th>Logo</th>
		<th>Edit</th>
		<th>Delete</th>

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
		<td><?php echo $row[5]; ?></td>
		<td><?php echo $row['auth_name']; ?></td>
		<td><?php echo $row['pub_name']; ?></td>
		<td><img src="images/<?php echo $row[8];?>" width="100" height="100"></td>
		<td><a href="main_page.php?view=book.php&book_id=<?php echo $row['book_id'];?>">EDIT</a></td>
		<td><input type="checkbox" name="chk[]" value="<?php echo $row[0];?>"></td>

	</tr>
	<?php } ?>

	<td colspan=9 align="right"><a href="main_page.php?view=book.php" class="btn btn-primary">Add User</a></td>
	<td colspan=7 align="right"><input type="submit" name="delete" class="btn btn-danger" value="delete"></td>


	</table>
</form>
</div>
</div>

</body>
</html>