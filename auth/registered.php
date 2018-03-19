<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
    include ("../functions/functions.php");
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $userCreated = createUser($username, $pass);

    if($userCreated){
        echo "User created successfully!";
        header("Location: index.php");
        exit();
    } else {
        echo "An error occurred";
    }
    
?>
    
</body>
</html>
