<?php
    session_start();
    if(!$_SESSION["userlogin"]) {
        header("Location: ./login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body>
    <h1>Welcome</h1>
    <a href="./php_files/logout.php">Log Out</a>
</body>
</html>