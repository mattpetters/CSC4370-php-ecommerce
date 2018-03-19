<?php


//getting the categories
function getCategories(){
	
	include 'mysqlconnect.php';

	$sql = "SELECT * FROM Categories";
	$result = $conn->query($sql);
	
	
	if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()){
		   echo "\n\t\t\t";
		   echo '<li><a href="#">' . $row["category_title"] . '</a></li>';
		   
	   }
	}
	
	$conn->close();
}









?>