<?php
// is_logged_in.php
session_start();
//check if user is logged in
if (isset($_SESSION['first_name'])) {
    // send user status of logged in
    echo json_encode(["status" => 'yes']);
} else {
    // send user status of not logged in
    echo json_encode(["status" => 'no']);
}
