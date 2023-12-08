<?php 
    session_start();
    include '../database/db_conn.php';

    $_SESSION['pr_no'] = $_POST['pr_no'];
    $_SESSION['bo_no'] = $_POST['pr_budget_officer'];
    $_SESSION['pr_fund_cluster'] = $_POST['pr_fund_cluster'];
    $_SESSION['pr_office_section'] = $_POST['pr_office_section'];
    $_SESSION['pr_responsibility_code'] = $_POST['pr_responsibility_code'];
    $_SESSION['pr_date'] = $_POST['pr_date'];
    $_SESSION['pr_purpose'] = $_POST['pr_purpose'];
    $_SESSION['requested_by'] = $_POST['requested_by'];
    $_SESSION['recommending_approval'] = $_POST['recommending_approval'];
    $_SESSION['approved_by'] = $_POST['approved_by'];

    $sign_name = strtoupper($_POST['sign_name']);
    $sign_position = ucwords($_POST['sign_position']);

    if(
        empty($sign_name) ||
        empty($sign_position)
      )
    {
        ?>
        <script>
            alert('Failed: Some required input were not filled.');
            window.location.href = 'edit_pr.php#pr_form';
        </script>
        <?php
    }
    else
    {
        $sql = "SELECT * FROM tbl_signatories WHERE sign_name = '$sign_name' ";
        $res = mysqli_query($link,$sql);

        if(mysqli_num_rows($res)>0)
        {
            echo '<script> alert("Failed: This person is already added!"); </script>';
            echo '<script>window.location.href = "edit_pr.php#pr_form"; </script>';    
        }
        else
        {
            $sql = "INSERT INTO tbl_signatories (
                        sign_name,
                        sign_position)
                    VALUES (
                        '$sign_name',
                        '$sign_position')";
            $res = mysqli_query($link,$sql);

            if($res==true)
            {
                $sql = "SELECT * FROM tbl_signatories WHERE sign_id = (SELECT MAX(sign_id) FROM tbl_signatories)";
                $res = mysqli_query($link,$sql);
                if($res==true){
                    $row = mysqli_fetch_assoc($res);
                    $_SESSION['requested_by'] = $row['sign_id'];
                    $_SESSION['txt_rb'] = '';
                }
                header('Location:edit_pr.php#pr_form');  
            }
            else
            {
                echo '<script>alert("Something went wrong. Please try again!");</script>';
                echo '<script>window.location.href = "edit_pr.php#pr_form"; </script>';    
            }
        }
    }

    session_write_close();
    mysqli_close($link);
?>