<?php
// image_gallery.php
session_start();
$pageTitle = 'Image Gallery';
require_once 'inc/header.inc.php';
?>
<div class="container">
    <div class="row mt-5 justify-content-center">
        <!-- gallery page info -->
        <div class="col-auto">
            <h1>Welcome to <strong class="text-primary">One</strong>Gallery</h1>
        </div>
    </div>
    <div class="row mt-5 justify-content-around align-items-center">
        <!-- text to send users to gallery images below -->
        <div class="col-auto mb-5 mb-md-auto lead">Explore what others have added to <br><strong class="text-primary">One</strong>Gallery <strong>below</strong> ⬇️
        </div>
        <div class="col-auto lead">Add something of your <strong>own</strong>
            <!-- check is user is logged in -->
            <!-- display image upload page link if user is logged in -->
            <!-- display register and login page links if user is not logged in -->
            <?= isset($_SESSION['first_name']) ? '<a href="image_upload.php" title="link to image upload page">➕</a>' : '<a href="register.php" title="link to register page">📋</a><a href="login.php"  title="link to login page">👤</a>' ?>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 d-flex justify-content-around flex-wrap gap-3">
            <?php
            // delete button logic
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if (isset($_GET['del'])) {
                    if (file_exists($_GET['del'])) {
                        // check if user is logged in
                        if (isset($_SESSION['first_name'])) {
                            // delete file if user logged in
                            unlink($_GET['del']);
                        }
                    }
                }
            }
            // display images uploaded to gallery
            $dir = "gallery_images";
            if (is_dir($dir)) {
                $dir_array = scandir($dir);
                if (count($dir_array) > 2) {
                    foreach ($dir_array as $file) {
                        if (strpos($file, '.') > 0) {
                            echo "<div class='d-flex flex-column align-items-center'><img src='{$dir}/{$file}' alt='' class='img-fluid photo border-2 rounded-1 shadow'>";
                            // check if user is logged in
                            if (isset($_SESSION['first_name'])) {
                                // display delete button if user logged in
                                echo "<a class='align-self-end mt-2' href='image_gallery.php?del={$dir}/{$file}'>🗑️</a></div>";
                            } else {
                                echo "</div>";
                            }
                        }
                    }
                } else {
                    echo "<p class='text-danger'>No images to display</p>";
                }
            }
            ?>
        </div>
    </div>
</div>
<?php require_once 'inc/footer.inc.php' ?>