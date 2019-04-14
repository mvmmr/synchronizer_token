<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php include_once "header.php" ?>
</head>
<body>
    <?php
    if (isset($_SESSION["csrf"]) && !empty($_POST) && isset($_POST["csrf"])) {
        $sessid = $_COOKIE[session_name()];
        $csrf_array = $_SESSION["csrf"];

        // check if session's csrf token matches token in the request
        if ($csrf_array[$sessid] === $_POST["csrf"]) {
    ?>
            <p><b>MESSAGE:</b> <?= htmlspecialchars($_POST["msg"], ENT_COMPAT, 'UTF-8') ?></p>
            <p><b>TOKEN:</b> <?= $_POST["csrf"] ?></p>
            <p><b>SESSION:</b> <?= session_id() ?></p>
    <?php
        } else {
            echo "<h2 style='color:red'>TOKEN INVALID</h2>";
        }
    } else {
        echo "<h2 style='color:red'>ERROR</h2>";
    }
    ?>
    <hr>
    <a href="form.php">Back</a>
</body>
</html>
