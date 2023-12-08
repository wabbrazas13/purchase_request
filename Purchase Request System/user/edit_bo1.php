<?php
    include '../database/db_conn.php';

    $bo_no = $_POST['bo_no'];
    $bo_name = strtoupper($_POST['bo_name']);
    $bo_position = ucwords($_POST['bo_position']);

    $sql = "UPDATE tbl_budget_officer
            SET bo_name = '$bo_name',
                bo_position = '$bo_position'
            WHERE bo_no = '$bo_no' ";
    $res = mysqli_query($link,$sql);

    if($res==true)
    {
        echo    '<script>
                    alert("Person edited.");
                    window.location.href = "purchase_request_form.php#pr_form";
                 </script>';
    }
    else
    {
        echo    '<script>
                    alert("Unable to edit person. Please try again!");
                    window.location.href = "purchase_request_form.php#pr_form";
                 </script>';
    }

    mysqli_close($link);
?>