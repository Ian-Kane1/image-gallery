<?php
// home.php
session_start();
// check is user is logged in
if (isset($_SESSION['first_name'])) {
    // send user to image gallery page if logged in
    header("Location: image_gallery.php");
}
$pageTitle = 'Home';
require_once 'inc/header.inc.php';
?>
<div class="container">
    <!-- homepage info -->
    <div class="row mt-5 justify-content-center">
        <div class="col-auto">
            <h1><strong class="text-primary">One</strong>Gallery for all</h1>
            <div id="message" class="text-success"></div>
        </div>
    </div>
    <!-- homepage cards -->
    <div class="row mt-5 justify-content-around">
        <div class="col-auto mb-3 mb-lg-0">
            <div class="card text-bg-success shadow">
                <div class="card-body">
                    <p class="card-title h5">Join the wonderland</p>
                    <p class="card-text">Create an account today—and become a part of the amazing world of <strong>One</strong>Gallery</p>
                </div>
            </div>
        </div>
        <div class="col-auto mb-3 mb-lg-0">
            <div class="card text-bg-danger shadow">
                <div class="card-body">
                    <p class="card-title h5">Explore and discover</p>
                    <p class="card-text">Look through <strong>One</strong>Gallery—and discover amazing images added by fellow users.</p>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="card text-bg-primary shadow">
                <div class="card-body">
                    <p class="card-title h5">Add your own spice</p>
                    <p class="card-text">Upload images to <strong>One</strong>Gallery—and add your own unique voice and style.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
        <div class="col-auto">
            <h2>Don't wait—<br>
                <small class="text-body-secondary mt-2">Join <strong class="text-primary">One</strong>Gallery <em>today</em>!</small>
            </h2>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
        <div class="col-auto">
            <div class="card shadow">
                <div class="card-body">
                    <!-- link to login page -->
                    <p class="mt-3">Already have an account?<br><a href="login.php" title="link to login page"><strong>Login here</strong></a></p>
                    <!-- link to image gallery page -->
                    <p class="mt-3">Already logged in?<br><a href="image_gallery.php" title="link to image gallery page"><strong>Go to OneGallery</strong></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'inc/footer.inc.php' ?>