<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Accept only POST requests
    http_response_code(405);
    echo "Invalid request";
    exit();
}

session_start();

if (isset($_SESSION["csrf"])) {
    // check if session cookie is set
    $csrf_array = $_SESSION["csrf"];
    $session_id = $_COOKIE[session_name()];

    if (isset($csrf_array[$session_id])) {
        // cookie found and is in array
        http_response_code(200);
        echo $csrf_array[$session_id];
    } else {
        // Session cookie does not match
        http_response_code(400);
        echo "Session mismatch";
    }
} else {
    // Not logged in!
    // Forbidden error
    echo "Not logged in";
    http_response_code(403);
}

?>
