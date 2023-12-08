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

    $bo_name = strtoupper($_POST['bo_name']);
    $bo_position = ucwords($_POST['bo_position']);

    if(
        empty($bo_name) ||
        empty($bo_position)
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
        $sql = "SELECT * FROM tbl_budget_officer WHERE bo_name = '$bo_name' AND bo_position = '$bo_position' ";
        $res = mysqli_query($link,$sql);

        if(mysqli_num_rows($res)>0)
        {
            echo '<script> alert("Failed: This person is already added!"); </script>';
            echo '<script>window.location.href = "edit_pr.php#pr_form"; </script>';    
        }
        else
        {
            $sql = "INSERT INTO tbl_budget_officer (
                        bo_name, 
                        bo_position)
                    VALUES (
                        '$bo_name', 
                        '$bo_position')";
            $res = mysqli_query($link,$sql);

            if($res==true)
            {
                $sql = "SELECT * FROM tbl_budget_officer WHERE bo_no = (SELECT MAX(bo_no) FROM tbl_budget_officer)";
                $res = mysqli_query($link,$sql);
                if($res==true){
                    $row = mysqli_fetch_assoc($res);
                    $_SESSION['bo_no'] = $row['bo_no'];
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