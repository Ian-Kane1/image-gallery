<?php
// register.php
session_start();
$pageTitle = "Register";
require_once 'inc/header.inc.php';
require_once 'inc/db_connect.inc.php';
?>
<div class="container">
    <!-- register page text -->
    <div class="row mt-5 justify-content-center">
        <div class="col-auto">
            <h1>Become a part of <br class="d-md-none"><strong class="text-primary">One</strong>Gallery—<br>
                <small class="text-body-secondary">greatness is waiting</small>
            </h1>
            <h2 class="mt-5">Sign up here</h2>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
        <div class="col-8 col-lg-6">
            <?php
            // check if registration form was submitted
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // set sql query string
                $email = $db->real_escape_string($_POST['email']);
                $first_name = $db->real_escape_string($_POST['first_name']);
                $last_name = $db->real_escape_string($_POST['last_name']);
                $password = hash('sha512', $db->real_escape_string($_POST['password']));
                $sql = "INSERT INTO user (email,first_name,last_name,password) 
                    VALUES('$email','$first_name','$last_name','$password')";
                // query database with set sql query
                $result = $db->query($sql);
                // check if sql query was successful
                if (!$result) {
                    // display error message if registration failed
                    echo "<div class='text-danger'>There was a problem registering your account. Please re-enter your <strong>account information</strong> in the registration form <strong>below</strong>.</div>";
                } else {
                    // display success message if registration successful
                    // display login page link
                    echo "<div class='text-success'>You are now ready to go!</div>";
                    echo '<a href="login.php" title="Login Page">Login</a>';
                }
            }
            ?>
            <!-- registration form -->
            <form action="register.php" method="POST" class="border border-3 shadow p-3 rounded-1">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" required name="email" class="form-control" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" required name="password" class="form-control" placeholder="Password">
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" id="first_name" required name="first_name" class="form-control" placeholder="First Name">
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" id="last_name" required name="last_name" class="form-control" placeholder="Last Name">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
                <p class="mt-3">Already have an account? <br class="d-md-none"><a href="login.php" title="link to login page"><strong>Login here</strong></a></p>
                <p class="mt-3">Already logged in? <br class="d-md-none"><a href="image_gallery.php" title="link to image gallery page"><strong>Go to OneGallery</strong></a></p>
            </form>
        </div>
    </div>
</div>
<?php require_once 'inc/footer.inc.php'; ?>