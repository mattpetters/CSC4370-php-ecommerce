<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logging in...</title>
</head>
<body>
<?php 
    include ("../functions/functions.php");
    //check if user exists
if (userExists($_POST["username"]){
    echo "User found...";
    if(passwordCorrect($_POST["username"], $_POST["password"])){
        echo "Password correct...";
        session_start();
        $_SESSION["username"] = $_POST["username"];
        header('Location: index.php');
        exit();  
    } else {
        echo "Credentials invalid.";
    } 
} else {
    echo "User not found.";
}
?>
</body>
</html>
