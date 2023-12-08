<?php 

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "pr_db";

    $link = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$link) {
        die("<script>alert('Database Connection Failed! Please check the database server if it is running properly!')</script>");
    }
?>