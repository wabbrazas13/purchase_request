<?php
    include '../database/db_conn.php';

    $sign_id = $_POST['sign_id'];
    $sign_name = strtoupper($_POST['sign_name']);
    $sign_position = ucwords($_POST['sign_position']);

    $sql = "UPDATE tbl_signatories
            SET sign_name = '$sign_name',
                sign_position = '$sign_position'
            WHERE sign_id = '$sign_id' ";
    $res = mysqli_query($link,$sql);

    if($res==true)
    {
        echo    '<script>
                    alert("Person details updated.");
                    window.location.href = "edit_pr.php#pr_form";
                 </script>';
    }
    else
    {
        echo    '<script>
                    alert("Unable to edit person. Please try again!");
                    window.location.href = "edit_pr.php#pr_form";
                 </script>';
    }

    mysqli_close($link);
?>