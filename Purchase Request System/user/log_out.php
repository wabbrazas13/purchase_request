<?php
    session_start();
    include '../database/db_conn.php';

    $email = $_SESSION['email'];

    $sql = "UPDATE tbl_admin
            SET status = 'offline' 
            WHERE email =  '$email' ";
    $res = mysqli_query($link,$sql);

    mysqli_close($link);
    session_destroy();
    ?>
        <script>
            alert('You have been log out!');
            window.location.replace('../index.php');
        </script>
    <?php
?>