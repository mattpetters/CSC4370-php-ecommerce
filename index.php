<!DOCTYPE html>
<?php

include("./functions/functions.php");

?>

<html>
<head>
<title>Project 3 Ecommerce Site</title>

<link rel="stylesheet" href="./styles/style.css" media="all" />
</head>
<body>


    <div class="main_wrapper">


        <div class="header_wrapper">Header
			<!--consider adding images here-->
			
		</div>
		<div class="menubar">
		
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="index.php?category=all">All Products</a></li>
				<li><a href="#">My Account</a></li>
				<li><a href="./auth/sign_up.php">Sign Up</a></li>
				<li><a href="./auth/login.php">Log In</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="#">Contact Us</a></li>
			</ul>
			
			<div id="form">
				<form method="get" action = "index.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search for a product...">
					<input type="submit" name="search" value="Search">
				</form>
			
			</div>
		
		</div>

		<div class="content_wrapper">
			<div id="sidebar">
			
				<div id="sidebar_title">Subjects</div>
				
				<ul id="categories">
				
					<?php getCategories(); ?>
				</ul>
			
			</div>

			<div id="content_area">
				<?php cart();?>
				<div id="shopping_cart">
					<span style="float:right; font-size:18px; padding:5px; line-height:40px;" >
					
						Welcome, Guest! <b style="color:yellow">Shopping Cart - </b> Total Items: <?php total_items() ?> Total Price: $<?php total_price() ?> <a href="cart.php" style="color:yellow;">Go to Cart</a>
					</span>
				</div>
			
				<div id="products_box">
					<?php getProducts();?>
				</div>
			
			
			</div>

			<div id="footer">Footer</div>
		</div>
    </div>
</body>
</html>
