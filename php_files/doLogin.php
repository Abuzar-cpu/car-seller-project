<?php
session_start();
if($_SESSION['userlogin']) {
    header("Location: ../Profile.php");
}
if(isset($_POST['submit']))
{
    $con = mysqli_connect("localhost", "root", "12345678", "carseller");
    if(!$con) {
        header("Location: ../login.php?code=1");
    }
    $username = strtolower(mysqli_real_escape_string($con, $_POST['username']));
    $password = md5(mysqli_real_escape_string($con, $_POST['password']));

    $query = "SELECT id FROM `users` WHERE email = '{$username}' AND password = '{$password}' AND status='1';";
    $run = mysqli_query($con, $query);
    $rows_count = mysqli_num_rows($run);
    $get_row = mysqli_fetch_assoc($run);
    if($rows_count == 1)
    {
        $id = $get_row['id'];
        $_SESSION['userlogin'] = $id;
        header("Location: ../Profile.php?id=$id");
    } else {
        header("Location: ../login.php?code=2");
    }
}
?>