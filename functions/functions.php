<?php

include 'mysqlconnect.php';

function getCategories(){

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

function userExists($username){
    $sql = "select * from Users where username='$username'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        if $row['username'] == $username return true;
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
