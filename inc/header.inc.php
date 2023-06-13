<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title><?= $pageTitle ?></title>
</head>

<?php
function echoActiveClassIfRequestMatches($requestUri)
{
    // set current file name
    $current_file_name = basename($_SERVER["REQUEST_URI"], ".php");
    // check if current file name is equal to request URI/current page user is on
    if ($current_file_name == $requestUri)
        // send file status of active
        echo 'active';
}
?>

<body>
    <!-- image gallery site navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand text-dark bg-light rounded px-2 my-2" href="home.php"><strong class="text-primary">One</strong>Gallery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <!-- Display active if link is current user page -->
                        <a class="nav-link <?= echoActiveClassIfRequestMatches("image_gallery") ?> ms-3" id="gallery" aria-current="page" href="image_gallery.php">Explore</a>
                    </li>
                    <!-- set link left margin if user logged in -->
                    <li class="nav-item <?= isset($_SESSION['first_name']) ? "ms-3" : "" ?>">
                        <!-- Display active if link is current user page -->
                        <a class="nav-link <?= echoActiveClassIfRequestMatches("image_upload") ?>" id="upload" aria-current="page" href="image_upload.php">Upload</a>
                    </li>
                    <li class="nav-item ms-3">
                        <!-- Display active if link is current user page -->
                        <a href="register.php" class="nav-link <?= echoActiveClassIfRequestMatches("register") ?>">Register</a>
                    </li>
                    <!-- set link left margin if user logged out -->
                    <li class="nav-item <?= !(isset($_SESSION['first_name'])) ? "ms-3" : "" ?>">
                        <!-- Display active if link is current user page -->
                        <a href="login.php" id="login" class="nav-link <?= echoActiveClassIfRequestMatches("login") ?>">Login</a>
                    </li>
                    <!-- set link left margin if user logged in -->
                    <li class="nav-item <?= isset($_SESSION['first_name']) ? "ms-3" : "" ?>">
                        <!-- Display active if link is current user page -->
                        <a href="home.php" id="logout" class="nav-link <?= echoActiveClassIfRequestMatches("logout") ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
