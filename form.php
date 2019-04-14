<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script>
        'use strict';
        function getToken() {
            var xhr = new XMLHttpRequest();
            xhr.onload = function(data) {
                var el;
                var resp = xhr.responseText;
                console.log(resp);

                if (this.status == 200) {
                    el = document.createElement("input");
                    el.name = "csrf";
                    el.type = "text";
                    el.hidden = true;
                    el.value = resp;
                } else {
                    el = document.createElement("p");
                    el.className = "error-msg";
                    el.innerText = "Server Error: " + resp;
                }
                document.getElementById("testForm").appendChild(el);
            }
            xhr.open("POST", "get_csrf_token.php", true);
            xhr.send();
        }

        document.addEventListener("DOMContentLoaded", function() {
            getToken();
        });
    </script>
</head>
<body>
    <?php include "header.php"; ?>
    <h1>Check CSRF</h1>
    <form action="form_submit.php" method="POST" id="testForm">
        <input type="text" placeholder="Message" name="msg">
        <input type="submit" value="Send" name="submit">
    </form>
</body>
</html>
