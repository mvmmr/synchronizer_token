<?php
session_start();

if (isset($_SESSION["logged_in"])) {
    header("Location: index.php");
}

$error_msg = "";

if (isset($_POST["submit"])) {
    if (empty($_POST["un"]) || empty($_POST["pw"])) {
        $error_msg = "Please enter the username and password!";
    } else {
        $un = $_POST["un"];
        $pw = $_POST["pw"];

        if ($un === "admin" && $pw === "admin") {
            $csrf_token = base64_encode(random_bytes(32));
            $_SESSION["logged_in"] = $un;
            $_SESSION["csrf"] = array(session_id() => $csrf_token);

            header("Location: index.php");
        } else {
            $error_msg = "Wrong username or password!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php include "header.php"; ?>

    <form action="login.php" method="POST">
        <h1>Login</h1>
        <div class="login-row">
            <input type="text" name="un" placeholder="Username">
        </div>
        <div class="login-row">
            <input type="password" name="pw" placeholder="Password">
        </div>
        <?php
        if ($error_msg !== "") {
            echo "<div class='login-row error-msg'>".$error_msg."</div>";
        }
        ?>
        <div class="login-row">
            <input class="btn" type="submit" name="submit" value="Login">
        </div>
    </form>
</body>
</html>
