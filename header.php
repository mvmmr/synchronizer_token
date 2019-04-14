<link rel="stylesheet" href="style.css">
<header>
    <a href="index.php">Home</a>
    |
    <small><?php
    if (isset($_SESSION["logged_in"]))  { ?>
        Logged in as <b><?= $_SESSION["logged_in"] ?></b>
        |
        <a href="logout.php">Logout</a>
    <?php
    } else { ?>
        <a href='login.php'>Login</a>
    <?php } ?></small>
</header>
<hr>
