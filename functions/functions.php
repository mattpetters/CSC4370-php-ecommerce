<?php

include 'mysqlconnect.php';


function cart() {
	include 'mysqlconnect.php';
	//I'm tracking users by ip address but this should probably be by username?
	$userIdentity = getIP();
	
	if(isset($_GET["add_cart"])){
		$product_id = $_GET["add_cart"];
		$productPrice = $_GET["price"];
		$sql = "SELECT * FROM Cart where ip_address='$userIdentity' AND product_id='$product_id'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			echo "";
		}
		else {
			
			$sql = "INSERT INTO Cart (product_id, ip_address,total_price) VALUES ($product_id,'$userIdentity',$productPrice)";
			$result = $conn->query($sql);			
			echo "<script>window.open('index.php','_self');</script>";
		}
	}
}

function total_items(){
	
	
		include 'mysqlconnect.php';
		$ip = getIP();
		
		$sql = "select * from Cart where ip_address='$ip'";
		$result = $conn->query($sql);
		
		$itemCount = $result->num_rows;
		echo $itemCount;
	
}

function total_price() {
	include 'mysqlconnect.php';
	
	$ip=getIP();
	$sql = "select SUM(total_price) as 'total' from Cart where ip_address='$ip'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$total = $row["total"];
	echo $total;
	
}

function fillCart(){
	include 'mysqlconnect.php';
	$ip = getIP();
	$sql = "select Cart.product_id as 'productId', ip_address, total_price, product_title, product_image from Cart join Products on Cart.product_id = Products.product_id where ip_address='$ip'";
	$result = $conn->query($sql);
	
	while($row = $result->fetch_assoc()){
		$product_title = $row["product_title"];
		$product_price = $row["total_price"];
		$product_image = $row["product_image"];
		$product_id = $row["productId"];
		 echo "<tr>";
		 echo "<td><input type='checkbox' name='remove[]' value='$product_id'></td>";
		 echo "<td>$product_title<br><img src='images/$product_image' width='50px' height='50px'></td>";
		 echo "<td>$$product_price</td>";
		 echo "</tr>";
		   
	}
	
}

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
						<a href='index.php?add_cart=$productId&price=$productPrice'><button style='float:right'>Add To Cart</button></a>
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
						<a href='index.php?product_id=$productId&price=$product_price'><button style='float:right'>Add To Cart</button></a>
					</p>
				</div>
							
			";
		}
	}
}

function passwordCorrect($username, $password) {
    include "mysqlconnect.php";
    $sql = "select * from Users where username='$username'";
    $result = $conn->query($sql);
	if($result->num_rows <= 0){
        return false;
    } else {
        while($row = $result->fetch_assoc()){
            if ($row['password'] == $password && $row['username'] == $username) return true;
        }
    }
    return false;
    
}

function userExists($username){
    include 'mysqlconnect.php';
    $sql = "select * from Users where username='$username'";
    $result = $conn->query($sql);

    if ($result -> num_rows <= 0) {
        return false; 
    } else {
        while($row = $result->fetch_assoc()){
            if ($row['username'] == $username) return true;
        }
    }
    return false;
}

function createUser($username, $password){
    include 'mysqlconnect.php';
    if (userExists($username)) {
        return false;
    } else {
        echo "Inserting into DB";
        $sql = "INSERT INTO Users (username, password) VALUES ('$username', '$password')";
        $result = $conn->query($sql);
        return true;
    }

}


function getIP()
{
	//courtesy of http://itman.in/en/how-to-get-client-ip-address-in-php/
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}







?>
