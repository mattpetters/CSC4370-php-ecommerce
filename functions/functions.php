<?php

include 'mysqlconnect.php';

function getCategories(){
	include 'mysqlconnect.php';
	$sql = "SELECT * FROM Categories";
	$result = $conn->query($sql);
	
	
	if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()){
		   $categoryId = $row["category_id"];
		   echo "\n\t\t\t";
		   echo '<li><a href="index.php?category=' . $categoryId . '">' . $row["category_title"] . '</a></li>';
		   
	   }
	}
	
	$conn->close();
}

function getProducts(){
	include 'mysqlconnect.php';
	
	$selectedCategory = $_GET["category"];
	
	if(isset($_GET['search'])){
		$search_query = $_GET["user_query"];
		$sql = "SELECT * FROM Products where product_keywords like '%$search_query%'";
	}	
	else if(!isset($selectedCategory)){
		$sql = "SELECT * FROM Products order by RAND() LIMIT 0,6";
	}
	else {
		if($selectedCategory == "all"){
			$sql = "SELECT * FROM Products";
		}
		else {
			$sql = "SELECT * FROM Products where product_category='$selectedCategory'";
		}
	}
		
	//$sql = "SELECT * FROM Products order by RAND() LIMIT 0,6";
	$result = $conn->query($sql);
	
	if($result->num_rows >0) {
		while($row = $result->fetch_assoc()){
			$productId = $row["product_id"];
			$productTitle = $row["product_title"];
			$productCategory = $row["product_category"];
			$productPrice = $row["product_price"];
			$productDescription = $row["product_description"];
			$productImage = $row["product_image"];
			$productKeywords = $row["product_keywords"];
			$productId = $row["product_id"];
			
			echo "
				
				<div id='single_product'>
				
					<div id='prodTitle'>$productTitle</div>
					<img src='images/$productImage' width='100px' height='100px'>
					<p><b>$$productPrice</b></p>
					<div id='detailandcart'>
						<a href='details.php?product_id=$productId' style='float:left;'>Details</a>
						<a href='index.php?product_id=$productId'><button style='float:right'>Add To Cart</button></a>
					</div>
				</div>
							
			";
		}
	}
	else {

		if(isset($_GET['search'])){
			echo "No Results Found";
		}
		else{
			$sql = "SELECT * FROM Categories where category_id=$selectedCategory";		
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$category_name = $row["category_title"];
			
			echo "<h2>We don't have any $category_name books yet</h2>";
		}
	}
		

}

function getDetails(){
	include 'mysqlconnect.php';
	$product_id;
	
	if(isset($_GET['product_id'])){
		$product_id = $_GET['product_id'];
	}
	
	$sql = "SELECT * FROM Products where product_id='$product_id'";
	$result = $conn->query($sql);
	
	if($result->num_rows >0) {
		while($row = $result->fetch_assoc()){
			$productId = $row["product_id"];
			$productTitle = $row["product_title"];			
			$productPrice = $row["product_price"];
			$productDescription = $row["product_description"];
			$productImage = $row["product_image"];
			
			echo "
				
				<div id='single_product'>
				
					<div id='prodTitle'>$productTitle</div>
					<img src='images/$productImage' width='50%' height='50%'>
					<p><b>$$productPrice</b></p>
					<p>$productDescription</p>
					<p>
						<a href='index.php' style='float:left;'>Go Back</a>
						<a href='index.php?product_id=$productId'><button style='float:right'>Add To Cart</button></a>
					</p>
				</div>
							
			";
		}
	}
}

function userExists($username){
    $sql = "select * from Users where username='$username'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        if ($row['username'] == $username) return true;
    }

    return false;

    $conn->close();
}

function createUser($username, $password){

    if (userExists($username)) {
        // error out
    } else {
        $sql = "INSERT INTO Users (username, password) VALUES ($username, $password)";
        $result = $conn->query($sql);
    }

    $conn->close();
}









?>
