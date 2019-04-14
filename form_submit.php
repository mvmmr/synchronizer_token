<?php
include_once "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php include_once "header.php" ?>
</head>
<body>
    <?php
    if ($_SESSION["csrf"] && isset($_POST["submit"]) && isset($_POST["csrf"])) {
        $sessid = $_COOKIE[session_name()];
        $csrf_array = $_SESSION["csrf"];
        if ($csrf_array[$sessid] === $_POST["csrf"]) { ?>
            <p><b>MESSAGE:</b> <?= htmlspecialchars($_POST["msg"], ENT_COMPAT, 'UTF-8') ?></p>
            <p><b>TOKEN:</b> <?= $_POST["csrf"] ?></p>
            <p><b>SESSION:</b> <?= session_id() ?></p>
    <?php
        } else {
            echo "<h2>TOKEN INVALID</h2>";
        }
    }
    ?>
</body>
</html>
