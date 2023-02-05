<?php
ini_set("display_errors","OFF");
$conn=mysqli_connect("localhost","root","","online_book");

session_start();

if(!isset($_SESSION['name']))
{
	header("location:main_page.php");
	
}


if(isset($_REQUEST['save']))
{
  $bname=$_REQUEST['bname'];
  $price=$_REQUEST['price'];
  $sdesc=$_REQUEST['sdesc'];
  $desc=$_REQUEST['desc'];
  $isbn=$_REQUEST['isbn'];
  $auth_id=$_REQUEST['auth_id'];
  $pub_id=$_REQUEST['pub_id'];
  $book_logo=$_FILES['book_logo']['name']; 

  move_uploaded_file($_FILES['book_logo']['tmp_name'],"images/".$_FILES['book_logo']['name']);


  $sql_insert="INSERT INTO book(book_name,price,book_sdesc,book_desc,isbn,auth_id,pub_id,logo) VALUES ('$bname','$price',' $sdesc','$desc','$isbn','$auth_id','$pub_id','$book_logo')";


 
 mysqli_query($conn,$sql_insert);

 print "data save";
// header("location:index.php?view=list_book.php");
 
 
	?>
	<script>
	 location.href="main_page.php?view=list_book.php";
	
	</script>
	<?php 

}



if(isset($_REQUEST['edit']))
{
  $book_id=$_REQUEST['book_id'];
  $bname=$_REQUEST['bname'];
  $price=$_REQUEST['price'];
  $sdesc=$_REQUEST['sdesc'];
  $desc=$_REQUEST['desc'];
  $isbn=$_REQUEST['isbn'];
  $auth_id=$_REQUEST['auth_id'];
  $pub_id=$_REQUEST['pub_id'];
  $book_logo=$_FILES['book_logo']['name']; 

  if($book_logo=="")
	{
		   $sql_update="UPDATE book SET book_name='$bname',price='$price',book_sdesc='$sdesc',
		  book_desc='$desc',isbn='$isbn',auth_id ='$auth_id',pub_id='$pub_id' WHERE book_id=".$book_id;
		   
	}else{
		
		move_uploaded_file($_FILES['book_logo']['tmp_name'],"images/".$_FILES['book_logo']['name']);

		$sql_update="UPDATE book SET book_name='$bname',price='$price',book_sdesc='$sdesc',book_desc='$desc',isbn='$isbn',auth_id='$auth_id',pub_id='$pub_id',logo='$book_logo' WHERE book_id=".$book_id;
		
	}
	
	mysqli_query($conn,$sql_update); 
	//header("location:index.php?view=list_book.php"); 
	
	
	?>
	<script>
	 location.href="main_page.php?view=list_book.php";
	
	</script>
	<?php 

}

if($_REQUEST['book_id'])
{
	$book_id = $_REQUEST['book_id'];
			  
	$sql  = "Select * FROM book WHERE book_id =".$book_id; 

	
		 
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($res);


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
          <h3 class="card-title">Add book</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
			
            </button>
			  <a href="main_page.php?view=list_book.php" class= "btn btn-dark">Back </a>
          </div>
	</div>
   <div class="card-body">


	<form method="POST" enctype="multipart/form-data">
		<table border=1 align="center">

			<tr><h2 align="center">Book Detail</h2></tr>

			<tr>
				<!--- <td>Book id</td> --->
				<td><input type="hidden" value="<?=$row[0];?>" name="book_id" placeholder="" ></td>
			</tr>

			<tr>
				<td>Book name:</td>
				<td><input type="text" value="<?=$row[1];?>" name="bname" placeholder="Enter book name" ></td>
			</tr>

			<tr>
				<td>Price:</td>
				<td><input type="text" value="<?=$row[2];?>" name="price" placeholder="Enter book price" ></td>
			</tr>

			<tr>
				<td>Book Sort Detail:</td>
				<td><textarea name="sdesc" cols=50 rows=3 placeholder="Enter sort description"><?=$row[3];?></textarea></td>
			</tr>

			<tr>
				<td>Book Detail:</td>
				<td><textarea name="desc" value=""cols=60 rows=6 placeholder="Enter description"><?=$row[4];?></textarea></td>
			</tr>				

			<tr>
				<td>ISBN :</td>
				<td><input type="text" value="<?=$row[5];?>" name="isbn" placeholder="Enter ISBN number" ></td>
			</tr>

			<tr>
				<td>Author:</td>
				<td><select name="auth_id">
					<option value="">Select author</option>
					<?php 

						$ssql="select * from author";
						$sres=mysqli_query($conn,$ssql);

						while($srow=mysqli_fetch_array($sres)) { ?>

						<option value="<?=$srow['auth_id'];?>" <?php if($srow['auth_id']==$row['auth_id']) { echo"selected"; } ?>> 
						<?=$srow['auth_name'];?>
						</option>

					<?php } ?>
						
					</select>
				</td>
			</tr>

			<tr>
				<td>Publication:</td>
				<td><select name="pub_id">
					<option value="">Select Publication</option>
					<?php 

						$ssql="select * from publication";
						$sres=mysqli_query($conn,$ssql);

						while($srow=mysqli_fetch_array($sres)) { ?>

						<option value="<?=$srow['pub_id'];?>" <?php if($srow['pub_id']==$row['pub_id']) { echo"selected"; } ?>> 
						<?=$srow['pub_name'];?>
						</option>

					<?php } ?>
						
					</select>
				</td>
			</tr>

			<tr>
				<td>LOGO:</td>
				<td><input type="file" name="book_logo"> <img src="images/<?php echo $row[8];?>"  width="100" height="100" /></td>
			</tr>

			
			<tr>
			<?php
				if($_REQUEST['book_id'])
				{
			?>
			<td align ="center" colspan="2"><input type="submit" name="edit" value="EDIT" class="btn btn-primary"></td>
			<?php }else{ ?>

			<td align ="center" colspan="2"><input type="submit" name="save" value="SAVE" class="btn btn-primary"></td>

			<?php } ?>

		</tr>
		</table>
	</form>

</div>
</div>
</body>
</html>