<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
</head>
<body>
<form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username">
        <br>
        <label for="password">Password</label>
        <input type="text" name="password">
        <br>
        <input type="submit">
</form>
<?php
    $username = $_POST['username'];
    $pass = $_POST['password'];

    createNewUser($username, $pass);
    
?>
    
</body>
</html>
