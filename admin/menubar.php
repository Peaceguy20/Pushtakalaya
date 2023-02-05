
<?php
ini_set("display_errors","0FF");
session_start();


//print_r($_SESSION);


?>

<html>
<head>

</head>

<body>

  <div class="vertical-menu">
  <ul>
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
		
          <a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a>
        </div>
      </div>

      
	  <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
		  <li class="nav-item">
            <a href="main_page.php?view=list_country.php" class="nav-link">
              <i class=""></i>
              <p>
                Country
              </p>
            </a>
          </li>
		  
		   <li class="nav-item">
            <a href="main_page.php?view=list_state.php" class="nav-link">
              <i class=""></i>
              <p>
                State
              </p>
            </a>
          </li>
		  
		   <li class="nav-item">
            <a href="main_page.php?view=list_category.php" class="nav-link">
              <i class=""></i>
              <p>
                Category
              </p>
            </a>
          </li>
		  
		  
		   <li class="nav-item">
            <a href="main_page.php?view=list_subcategory.php" class="nav-link">
              <i class=""></i>
              <p>
                Subcategory
              </p>
            </a>
          </li>
		  
		  <li class="nav-item">
            <a href="main_page.php?view=list_author.php" class="nav-link">
              <i class=""></i>
              <p>
                Author
              </p>
            </a>
          </li>
		  
		  <li class="nav-item">
            <a href="main_page.php?view=list_publication.php" class="nav-link">
              <i class=""></i>
              <p>
                Publication
              </p>
            </a>
          </li>
		  
		   <li class="nav-item">
            <a href="main_page.php?view=change_password.php" class="nav-link">
              <i class=""></i>
              <p>
                Change password
              </p>
            </a>
          </li>
		  
		  <li class="nav-item">
            <a href="main_page.php?view=list_user.php" class="nav-link">
              <i class=""></i>
              <p>
                User
              </p>
            </a>
          </li>
		  
		  <li class="nav-item">
            <a href="main_page.php?view=list_book.php" class="nav-link">
              <i class=""></i>
              <p>
                Book
              </p>
            </a>
          </li>
		  
		 
		  
		  	  
   <?php  if($_SESSION['type']=='superAdmin'){?>
   
   
		   <li class="nav-item">
            <a href="main_page.php?view=list_admin.php" class="nav-link">
              <i class=""></i>
              <p>
                Admin list
              </p>
            </a>
          </li>
		  
   
  
	<?php  }   ?>
	
	 <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class=""></i>
              <p>
                Logout
              </p>
            </a>
          </li>
	
    
	  </li>
	</ul>
 </div>


</body>
</html>


