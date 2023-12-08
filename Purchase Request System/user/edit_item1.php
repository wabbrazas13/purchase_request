<?php
    include '../database/db_conn.php';

    $temp_item_no = $_POST['temp_item_no'];
    $temp_item_unit = $_POST['temp_item_unit'];
    $temp_item_description = nl2br($_POST['temp_item_description']);
    $temp_item_quantity = $_POST['temp_item_quantity'];
    $temp_item_unit_cost = $_POST['temp_item_unit_cost'];
    $temp_item_total_cost = $temp_item_quantity * $temp_item_unit_cost;

    $sql = "UPDATE tbl_item_temp
            SET temp_item_unit = '$temp_item_unit',
                temp_item_description = '$temp_item_description',
                temp_item_quantity = '$temp_item_quantity',
                temp_item_unit_cost = '$temp_item_unit_cost',
                temp_item_total_cost = '$temp_item_total_cost'
            WHERE temp_item_no = '$temp_item_no' ";
    $res = mysqli_query($link,$sql);

    if($res==true)
    {
        header('Location: purchase_request_form.php');
    }

    mysqli_close($link);
?>