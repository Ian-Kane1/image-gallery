<?php
// image_upload.php
session_start();
$pageTitle = 'Image Upload';
require_once 'inc/header.inc.php';
?>
<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-auto">
            <?php
            // File errors defined in array
            $upload_errors = [
                UPLOAD_ERR_OK                 => "No errors.",
                UPLOAD_ERR_INI_SIZE          => "Larger than upload_max_filesize.",
                UPLOAD_ERR_FORM_SIZE         => "Larger than form MAX_FILE_SIZE.",
                UPLOAD_ERR_PARTIAL             => "Partial upload.",
                UPLOAD_ERR_NO_FILE             => "No file.",
                UPLOAD_ERR_NO_TMP_DIR         => "No temporary directory.",
                UPLOAD_ERR_CANT_WRITE         => "Can't write to disk.",
                UPLOAD_ERR_EXTENSION         => "File upload stopped by extension."
            ];
            // check if user submitted form
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                // get file temp name
                $tmp_file = $_FILES['file_upload']['tmp_name'];
                // set target file name
                // basename gets just the file name
                $target_file = basename($_FILES['file_upload']['name']);
                // uploaded picture folder
                $folder = "gallery_images";
                // create main photo directory if it doesn't exist
                if (!is_dir($folder)) {
                    mkdir($folder);
                }
                // set upload folder name
                $upload_dir = $folder;
                // create sub photo directory if it doesn't exist
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir);
                }
                // check if user is logged in
                if (isset($_SESSION['first_name'])) {
                    // move the file to upload images folder
                    // set message text if successful
                    if (move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file)) {
                        $message = "File uploaded successfully";
                    } else {
                        // set error message if unsuccessful
                        $error = $_FILES['file_upload']['error'];
                        $message = $upload_errors[$error];
                    }
                } else {
                    $message = "Please register or log in to upload images to OneGallery";
                }
            }
            // set message text color
            if ($message = "File uploaded successfully") {
                $color = 'text-success';
            } else {
                $color = 'text-danger';
            }
            // check if message is set
            // display message if set
            if (!empty($message)) {
                echo "<p class=$color>{$message}</p>";
            }
            ?>
            <h1>Adding your images to <br class="d-md-none"><strong class="text-primary">One</strong>Gallery—<br>
                <small class="text-body-secondary mt-2">as easy as 1,2,3</small>
            </h1>
        </div>
    </div>
    <!-- image upload instruction cards -->
    <div class="row mt-5 justify-content-around text-center">
        <div class="col-auto mb-3 mb-lg-0">
            <div class="card shadow">
                <div class="card-body">
                    <p class="card-title h5">1</p>
                    <p class="card-text">Click the <strong>choose file</strong> button
                    <div>🔘</div>
                </div>
            </div>
        </div>
        <div class="col-auto mb-3 mb-lg-0">
            <div class="card shadow">
                <div class="card-body">
                    <p class="card-title h5">2</p>
                    <p class="card-text">Select <strong>which</strong> image to upload
                    <div>🖼️</div>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="card shadow">
                <div class="card-body">
                    <p class="card-title h5">3</p>
                    <p class="card-text">Click the <strong>upload</strong> button
                    <div>✅</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
        <!-- image upload form -->
        <div class="col-auto">
            <h2><label for="img-upload">Upload Here:</label></h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-group mt-5">
                    <input type="hidden" name="MAX_FILE_SIZE" value="100000000">
                    <input type="file" name="file_upload" class="form-control shadow rounded-start-2" id="img-upload">
                    <button type="submit" name="submit" value="Upload" class="btn btn-primary shadow">Upload</button>
                </div>
            </form>
        </div>
    </div>
    <!-- link to image gallery -->
    <div class="row mt-5 lead justify-content-center">
        <div class="col-auto">Explore what others have added to <br><strong class="text-primary">One</strong>Gallery <a href="image_gallery.php" title="link to image gallery page">🚀</a>
        </div>
    </div>
</div>
<?php require_once 'inc/footer.inc.php' ?>