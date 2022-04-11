<?php
    $conn = mysqli_connect("localhost", "root", "12345678", "carseller");
    if(isset($_POST["submit"]))
    {
        $username = ($_POST["username"]);
        $email = ($_POST["email"]);
        $password = ($_POST["password"]);
        $confirm = ($_POST["confirm_password"]);

        if(isset($username) && isset($email) && isset($password) && isset($confirm) && $username !== "" && $email !== "" && $password !== "")
        {
            $username = mysqli_real_escape_string($conn, $username);
            $email = mysqli_real_escape_string($conn, $email);
            $password = mysqli_real_escape_string($conn, $password);
            $confirm = mysqli_real_escape_string($conn, $confirm);

            if($confirm !== $password) {
                header("Location: ../register.php?code=1"); // Password and confirm password do not match
            } else {
                $sql = "SELECT * FROM users WHERE email='$email'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0) {
                    header("Location: ../register.php?code=2"); // username already exists
                } else {
                    $password = md5($password);
                    $email = strtolower($email);
                    $sql = "INSERT INTO users (fullname, email, password, status) VALUES ('$username', '$email', '$password', 1)";
                    // status = 1 means user is active
                    mysqli_query($conn, $sql);
                    header("Location: ../login.php?code=3"); // Successfully registered
                }
            }
        } else {
            header("Location: ../register.php?code=4"); // one or more fields are empty
        }
    }