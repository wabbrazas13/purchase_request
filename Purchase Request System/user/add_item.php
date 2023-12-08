<?php 
    session_start();
    include '../database/db_conn.php';

    $_SESSION['bo_no'] = $_POST['pr_budget_officer'];
    $_SESSION['pr_fund_cluster'] = $_POST['pr_fund_cluster'];
    $_SESSION['pr_office_section'] = $_POST['pr_office_section'];
    $_SESSION['pr_responsibility_code'] = $_POST['pr_responsibility_code'];
    $_SESSION['pr_date'] = $_POST['pr_date'];
    $_SESSION['pr_purpose'] = $_POST['pr_purpose'];
    $_SESSION['requested_by'] = $_POST['requested_by'];
    $_SESSION['recommending_approval'] = $_POST['recommending_approval'];
    $_SESSION['approved_by'] = $_POST['approved_by'];

    $temp_item_unit = $_POST['item_unit'];
    $temp_item_description = nl2br($_POST['item_description']);
    $temp_item_quantity = $_POST['item_quantity'];
    $temp_item_unit_cost = $_POST['item_unit_cost'];

    if(empty($temp_item_quantity)){
        $temp_item_quantity = 1;
    }

    if(
        empty($temp_item_unit) ||
        empty($temp_item_description) ||
        empty($temp_item_unit_cost)
      )
    {
        ?>
        <script>
            alert('Invalid Input: Please try again!');
            window.location.href='purchase_request_form.php';
        </script>
        <?php
    }
    else
    {
        $temp_item_total_cost = $temp_item_quantity * $temp_item_unit_cost;
    
        $sql = "INSERT INTO tbl_item_temp (
                    temp_item_unit, 
                    temp_item_description, 
                    temp_item_quantity, 
                    temp_item_unit_cost, 
                    temp_item_total_cost)
                VALUES (
                    '$temp_item_unit', 
                    '$temp_item_description', 
                    '$temp_item_quantity', 
                    '$temp_item_unit_cost', 
                    '$temp_item_total_cost')";
        $res = mysqli_query($link,$sql);

        if(!$res==true)
        {
            echo '<script>alert("Failed: Something went wrong. Please try again!");</script>';
        }
        header("Location:purchase_request_form.php");
    }

    session_write_close();
    mysqli_close($link);
?>