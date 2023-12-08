<?php
    session_start();
    include '../database/db_conn.php';

    $_SESSION['pr_no'] = $_POST['pr_no'];
    $_SESSION['bo_no'] = $_POST['pr_budget_officer'];
    $_SESSION['pr_fund_cluster'] = $_POST['pr_fund_cluster'];
    $_SESSION['pr_office_section'] = $_POST['pr_office_section'];
    $_SESSION['pr_responsibility_code'] = $_POST['pr_responsibility_code'];
    $_SESSION['pr_purpose'] = $_POST['pr_purpose'];
    $_SESSION['pr_date'] = $_POST['pr_date'];
    $_SESSION['requested_by'] = $_POST['requested_by'];
    $_SESSION['recommending_approval'] = $_POST['recommending_approval'];
    $_SESSION['approved_by'] = $_POST['approved_by'];

    $pr_no = $_POST['pr_no'];
    $bo_no = $_POST['pr_budget_officer'];
    $pr_fund_cluster = $_POST['pr_fund_cluster'];
    $pr_office_section = $_POST['pr_office_section'];
    $pr_responsibility_code = $_POST['pr_responsibility_code'];
    $pr_purpose = nl2br($_POST['pr_purpose']);
    $pr_date = $_POST['pr_date'];
    $requested_by = $_POST['requested_by'];
    $recommending_approval = $_POST['recommending_approval'];
    $approved_by = $_POST['approved_by'];
    $pr_total_estimated_cost = $_POST['pr_total_estimated_cost'];

    if(empty($bo_no)){
        $_SESSION['txt_bo'] = '*** REQUIRED ***';
        header('Location:edit_pr.php#pr_form');
    }else{
        $_SESSION['txt_bo'] = '';
    }

    if(empty($pr_fund_cluster)){
        $_SESSION['txt_fc'] = '*** REQUIRED ***';
        header('Location:edit_pr.php#pr_form');
    }else{
        $_SESSION['txt_fc'] = '';
    }

    if(empty($pr_office_section)){
        $_SESSION['txt_os'] = '*** REQUIRED ***';
        header('Location:edit_pr.php#pr_form');
    }else{
        $_SESSION['txt_os'] = '';
    }

    if(empty($pr_date)){
        $month = date('m');
        $day = date('d');
        $year = date('Y');
        $pr_date = $year.'-'.$month.'-'.$day;
    }

    if(empty($pr_purpose)){
        $_SESSION['txt_pu'] = '*** REQUIRED ***';
        header('Location:edit_pr.php#pr_form');
    }else{
        $_SESSION['txt_pu'] = '';
    }

    if($requested_by==0){
        $_SESSION['txt_rb'] = '*** REQUIRED ***';
        header('Location:edit_pr.php#pr_form');
    }else{
        $_SESSION['txt_rb'] = '';
    }

    if($recommending_approval==0){
        $_SESSION['txt_ra'] = '*** REQUIRED ***';
        header('Location:edit_pr.php#pr_form');
    }else{
        $_SESSION['txt_ra'] = '';
    }

    if($approved_by==0){
        $_SESSION['txt_ab'] = '*** REQUIRED ***';
        header('Location:edit_pr.php#pr_form');
    }else{
        $_SESSION['txt_ab'] = '';
    }

    if($pr_total_estimated_cost==0){
        ?>
            <script>
                alert('Invalid Input: No Stock/Property Added!');
                window.location.href = "edit_pr.php";
            </script>
        <?php
    }

    if  (
            !empty($pr_no) &&
            !empty($bo_no) && 
            !empty($pr_fund_cluster) && 
            !empty($pr_office_section) &&
            !empty($pr_date) &&
            !empty($pr_purpose) &&
            !($requested_by==0) &&
            !($recommending_approval==0) &&
            !($approved_by==0) &&
            !($pr_total_estimated_cost==0)
        )
    {
        $sql = "SELECT * FROM tbl_signatories WHERE sign_id = '$requested_by' ";
        $res = mysqli_query($link,$sql);

        if(mysqli_num_rows($res)==1){
            $row = mysqli_fetch_assoc($res);
            $rb_position = $row['sign_position'];
        }

        $sql = "SELECT * FROM tbl_signatories WHERE sign_id = '$recommending_approval' ";
        $res = mysqli_query($link,$sql);

        if(mysqli_num_rows($res)==1){
            $row = mysqli_fetch_assoc($res);
            $ra_position = $row['sign_position'];
        }

        $sql = "SELECT * FROM tbl_signatories WHERE sign_id = '$approved_by' ";
        $res = mysqli_query($link,$sql);

        if(mysqli_num_rows($res)==1){
            $row = mysqli_fetch_assoc($res);
            $ab_position = $row['sign_position'];
        }

        $sql = "DELETE FROM tbl_item WHERE pr_no = '$pr_no' ";
        $res = mysqli_query($link,$sql);

        if($res==true){
            $sql = "SELECT * FROM tbl_item_temp ORDER BY temp_item_no ASC";
            $res = mysqli_query($link,$sql);

            while($row=mysqli_fetch_assoc($res)){
                $temp_item_unit = $row['temp_item_unit'];
                $temp_item_description = $row['temp_item_description'];
                $temp_item_quantity = $row['temp_item_quantity'];
                $temp_item_unit_cost = $row['temp_item_unit_cost'];
                $temp_item_total_cost = $row['temp_item_total_cost'];

                $sql1 = "INSERT INTO tbl_item (
                            item_unit, 
                            item_description, 
                            item_quantity, 
                            item_unit_cost, 
                            item_total_cost, 
                            pr_no)
                        VALUES (
                            '$temp_item_unit', 
                            '$temp_item_description', 
                            '$temp_item_quantity', 
                            '$temp_item_unit_cost', 
                            '$temp_item_total_cost', 
                            '$pr_no')";
                $res1 = mysqli_query($link,$sql1);
            }

            if($res1==true)
            {
                $sql = "UPDATE tbl_purchase_request
                        SET pr_total_estimated_cost = '$pr_total_estimated_cost', 
                            pr_budget_officer = '$bo_no', 
                            pr_fund_cluster = '$pr_fund_cluster', 
                            pr_office_section = '$pr_office_section', 
                            pr_responsibility_code = '$pr_responsibility_code', 
                            pr_date = '$pr_date',
                            pr_purpose = '$pr_purpose', 
                            requested_by = '$requested_by', 
                            recommending_approval = '$recommending_approval', 
                            approved_by = '$approved_by',
                            rb_position = '$rb_position',
                            ra_position = '$ra_position',
                            ab_position = '$ab_position'
                        WHERE pr_no = '$pr_no' ";
                $res = mysqli_query($link,$sql);

                if($res == true){
                    $sql = "DELETE FROM tbl_item_temp";
                    $res = mysqli_query($link,$sql);

                    ?>
                        <script>
                            alert('Success: Purchase request updated.');
                            window.location.href="print_pr.php";
                        </script>
                    <?php
                }else{
                    ?>
                        <script>
                            alert('Failed: Something went wrong. Please try again!');
                            window.location.href="purchase_request_list.php";
                        </script>
                    <?php
                }
            }
        }
    }

    mysqli_close($link);
?>