<!DOCTYPE html>
<?php

include("functions/functions.php");

?>

<html>
<head>
<title>Project 3 Ecommerce Site</title>

<link rel="stylesheet" href="styles/style.css" media="all" />
</head>
<body>


    <div class="main_wrapper">


        <div class="header_wrapper">Header
			<!--consider adding images here-->
			
		</div>
		<div class="menubar">
		
			<ul id="menu">
				<li><a href="#">Home</a></li>
				<li><a href="#">All Products</a></li>
				<li><a href="#">My Account</a></li>
				<li><a href="./auth/sign_up.php">Sign Up</a></li>
				<li><a href="./auth/login.php">Log In</a></li>
				<li><a href="#">Shopping Cart</a></li>
				<li><a href="#">Contact Us</a></li>
			</ul>
			
			<div id="form">
				<form method="get" action = "results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search for a product...">
					<input type="submit" name="search" value="Search">
				</form>
			
			</div>
		
		</div>

		<div class="content_wrapper">
			<div id="sidebar">
			
				<div id="sidebar_title">Categories</div>
				
				<ul id="categories">
				
					<?php getCategories(); ?>
				</ul>
			
			</div>

			<div id="content_area">Content</div>

			<div id="footer">Footer</div>
		</div>




    </div>




</body>
</html>
