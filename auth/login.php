<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
</head>
<body>
    <form action="log_me_in.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username">
        <label for="password">Password</label>
        <input type="password" name="password">
        <input type="submit">
    </form> 
</body>
</html>
