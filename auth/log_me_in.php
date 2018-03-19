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
    $user = $_POST["login_username"];
    echo $user;
    $userFound = userExists($user); 
    echo $userFound;
    if ($userFound){
        echo "User found...";
        if(passwordCorrect($_POST["login_username"], $_POST["login_password"])){
            echo "Password correct...";
            session_start();
            $_SESSION["username"] = $_POST["login_username"];
            header('Location: ../index.php');
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
