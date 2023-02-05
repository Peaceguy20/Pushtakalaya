<?php
ini_set("display_errors","OFF");

$conn=mysqli_connect("localhost","root","","online_book");

session_start();

if(!isset($_SESSION['name']))
{
	header("location:index.php");
	
}


if($_REQUEST['pub_id'])
{
	$pub_id = $_REQUEST['pub_id'];
			  
	$sql  = "Select * FROM publication WHERE pub_id =".$pub_id; 
		 
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($res);
}

if (isset($_REQUEST['save'])) 
{
	$name=$_REQUEST["name"];	
	$desc=$_REQUEST["desc"];
	$logo=$_FILES['pub_logo']['name'];
	
	move_uploaded_file($_FILES['pub_logo']['tmp_name'],"images/".$_FILES['pub_logo']['name']);
	
	$sql_insert ="INSERT INTO publication(pub_name,pub_desc,pub_logo) VALUES ('$name','$desc','$logo')";
	
	mysqli_query($conn,$sql_insert);
	//header("location:index.php?view=list_publication.php"); 
	?>
	<script>
	 location.href="main_page.php?view=list_publication.php";
	
	</script>
	<?php 
}

if (isset($_REQUEST['edit'])) 
{
	$pub_id=$_REQUEST["pub_id"];
	$name=$_REQUEST["name"];	
	$desc=$_REQUEST["desc"];
	$logo=$_FILES['pub_logo']['name'];


	if($logo=="")
	{
		 $sql_update="UPDATE publication SET pub_name='$name',pub_desc='$desc' WHERE pub_id=".$pub_id; 
	}else{
		
		move_uploaded_file($_FILES['pub_logo']['tmp_name'],"images/".$_FILES['pub_logo']['name']);
		$sql_update = "update publication set pub_name='$name',pub_desc='$desc',pub_logo='$logo' where pub_id=".$pub_id;	
	}
	
	mysqli_query($conn,$sql_update);
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
			<h3 class="card-title">Add publication</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					<i class="fas fa-minus"></i>
				</button>
					<a href="main_page.php?view=list_publication.php" class= "btn btn-dark">Back </a>
			</div>
		</div>
	
	
  <div class="card-body">
<form method="POST" action="" enctype="multipart/form-data" class="form-group" >

<table border=3 class="table" align="center">

<tr><h2 align="center">Publication </h2></tr>

<tr>
<!--- <td>Publication ID:</td> --->
<input type="hidden" name="pub_id" value="<?=$row[0];?>">
</tr>


<tr>
<td>Publication Name:</td>
<td><input type="text" name="name" class="form-control" value="<?=$row[1];?>"></td>
</tr>

<tr>
<td>Description:</td>
<td><textarea name="desc" class="form-control" rows=5 cols=30><?=$row[2];?></textarea></td>
</tr>

<tr>
<td>Publication_logo</td>
<td><input type="file" class="form-control" name="pub_logo"><img src="images/<?php echo $row[3];?>" height=100 width=100></td>
</tr>


<tr>
<?php
if($_REQUEST['pub_id'])
{
?>
	<td align ="center" colspan="2"><input type="submit" class="btn btn-primary" name="edit" value="EDIT">

<?php }else{ ?>

	<td align ="center" colspan="2"><input type="submit" class="btn btn-primary" name="save" value="SAVE">

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