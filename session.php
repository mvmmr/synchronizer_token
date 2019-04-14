<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION["logged_in"]) && isset($_COOKIE["sessid"]);
}
?>
