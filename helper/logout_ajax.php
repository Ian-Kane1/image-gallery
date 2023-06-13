<?php
// logout_ajax.php
session_start();
// destroy user session
session_destroy();
// send user session destruction status of success
echo json_encode(['status' => 'success']);
