<?php
// login.php
session_start();
$pageTitle = 'Login';
require_once 'inc/header.inc.php';
require_once 'inc/db_connect.inc.php';
?>
<div class="container">
    <!-- login page text -->
    <div class="row mt-5 justify-content-center">
        <div class="col-auto">
            <h1>Come on in—<br>
                <small class="text-body-secondary mt-2"><strong class="text-primary">One</strong>Gallery awaits</small>
            </h1>
            <h2 class="mt-5">Sign in here</h2>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
        <div class="col-auto">
            <?php
            // check if user is logged in 
            if (isset($_SESSION['first_name'])) {
                // send user to image gallery page if logged in
                header("Location: image_gallery.php");
            }
            // check if login form was submitted
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // set sql query string
                $email = $db->real_escape_string($_POST['email']);
                $password = hash('sha512', $db->real_escape_string($_POST['password']));
                $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
                // query database with set sql query
                $result = $db->query($sql);
                // check if query returned a single row
                if ($result->num_rows == 1) {
                    // set user session variables with returned user data
                    $_SESSION['loggedin'] = 1;
                    $_SESSION['email'] = $email;
                    $row = $result->fetch_assoc();
                    $_SESSION['first_name'] = $row['first_name'];
                    // send user to home page
                    header('location: home.php');
                } else {
                    // display error message if login failed
                    echo '<p class="text-danger">Login failed. Please re-enter your <strong>email</strong> and <strong>password</strong>.</p>';
                }
            }
            ?>
            <!-- login form -->
            <form action="login.php" method="POST" class="border border-3 shadow p-3 rounded-1">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label><br>
                    <input type="email" name="email" id="email" required class="form-control" placeholder="Email">
                </div>
                <div>
                    <label for="password" class="form-label">Password</label>
                    <span id="showPassword" onclick="showPassword();">Show Password</span><br>
                    <input type="password" name="password" id="password" required class="form-control" placeholder="Password"><br>
                </div>
                <div class="mb-3">
                    <button type="submit" value="Login" class="btn btn-primary">Login</button>
                </div>
                <p>Don't have an account yet? <br class="d-md-none"><a href="register.php" title="link to register page"><strong>Sign up here</strong></a></p>
            </form>
        </div>
    </div>
</div>
<?php require_once 'inc/footer.inc.php'; ?>