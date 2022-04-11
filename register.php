<?php
$code = $_GET["code"];
$msg = "";

switch ($code) {
    case 1: // Password and confirm password do not match
        $msg = "Passwords do not match";
        break;
    case 2: // email already exists
        $msg = "Email already exists";
        break;
    case 4: // one or more fields are empty
        $msg = "One or more fields are empty";
        break;
    default:
        break;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--Bootstrap icons CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" integrity="sha384-ejwKkLla8gPP8t2u0eQyL0Q/4ItcnyveF505U0NIobD/SMsNyXrLti6CWaD0L52l" crossorigin="anonymous">

    <!--JQuery CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--Font Awesome CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">

    <!--Custom CSS-->
    <link rel="stylesheet" href="css/index.css" />

    <style>
        label {
            color: #4883ff;
        }
    </style>

    <title>
        Register
    </title>
</head>

<body>
<header class="">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand ms-5" href="#"><img src="./assets/images/logo.png" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto me-5 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./index.html">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./Cars.html">Cars</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./About.html">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./Contact.html">Contact</a>
                    </li>

                    <li class="nav-item d-flex border border-primary">
                        <a class="nav-link" href="login.php">Login</a>
                        <a class="nav-link active" href="register.php">Register</a>
                    </li>

                    <li class="nav-item">

                    </li>

                </ul>
                <!-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>
</header>

<div class="container-fluid d-flex justify-content-center align-items-center my-auto" id="log-in-page-main">
    <div class="w-50 text-center">
        <form action="./php_files/doRegister.php" method="post">
            <div class="form-floating mb-3 d-flex  justify-content-center">
                <input type="text" class="form-control " id="username" name="username" placeholder="Username">
                <label for="username">Username</label>
            </div>

            <div class="form-floating mb-3 d-flex  justify-content-center">
                <input type="email" class="form-control " id="email" name="email" placeholder="name@example.com">
                <label for="email">Email address</label>
            </div>

            <div class="form-floating mb-3 d-flex  justify-content-center">
                <input type="password" class="form-control " id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
            </div>

            <div class="form-floating mb-3 d-flex  justify-content-center">
                <input type="password" class="form-control " id="confirm_password" name="confirm_password" placeholder="Confirm password">
                <label for="confirm_password">Confirm Password</label>
            </div>

            <input id="register-button" type="submit" name="submit" value="Register" class="mt-3 w-50 btn btn-primary"/>
            <div><h5 class="p-3 mt-3" id="register-notification" style="color: white; background-color: red"><?php echo $msg ?></h5></div>
        </form>
    </div>
</div>

<footer class="text-center my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-12 mt-4 container">
                <hr />
                <div><img src="./assets/images/footer_logo.png" class="w-50"/></div>
                <div class="my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio eaque quaerat vero sed, eligendi officia facilis fuga unde quam magni.</div>

                <div class="d-flex justify-content-center">
                    <h1><i class="mx-4 bi bi-facebook"></i></h1>
                    <h1><i class="mx-4 bi bi-twitter"></i></h1>
                    <h1><i class="mx-4 bi bi-linkedin"></i></h1>
                </div>
            </div>

            <div class="col-md-4 col-12 mt-4 container">
                <hr />
                <div><h3>Useful Links</h3></div>
                <div class="d-flex justify-content-around useful-links mt-4">
                    <ul>
                        <li>Home</li>
                        <li>About</li>
                        <li>Team</li>
                        <li>Contact Us</li>
                    </ul>

                    <ul>
                        <li>FAQ</li>
                        <li>Testimonals</li>
                        <li>Blog</li>
                        <li>Terms</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 col-12 mt-4 conatiner p-0">
                <hr />
                <div>Contact Information</div>
                <div class="mt-3"><i class="bi bi-geo-alt-fill me-4"></i>Baku Engineering University</div>
                <div class="mt-3"><i class="bi bi-telephone-fill"></i> <a class="ms-4" href="tel:+9940515515151">+994 051 551 51 51</a></div>
                <div class="mt-3"><i class="bi bi-envelope-fill"></i> <a class="ms-4" href="mailto:cars.seller@gmail.com">Our mail</a></div>
            </div>
        </div>
    </div>
</footer>

<script>
    const notification = document.getElementById("register-notification");
    if(notification.innerText === "") {
        notification.style.visibility = 'hidden';
    } else if (notification.innerText === "Successfully registered. Please login") {
        notification.style.visibility = "visible";
        notification.style.backgroundColor = "green";
    } else {
        notification.style.visibility = "visible";
        notification.style.backgroundColor = "red";
    }
</script>
</body>

</html>
