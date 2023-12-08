<?php
    include '../database/db_conn.php';

    $sql = "DELETE FROM tbl_item_temp";
    $res = mysqli_query($link,$sql);
    header('Location:purchase_request_list.php');

    mysqli_close($link);
?>