<?php
    session_start();
    include '../database/db_conn.php';

    $email = $_SESSION['email'];

    $pr_budget_officer = $_POST['pr_budget_officer'];
    $pr_fund_cluster = $_POST['pr_fund_cluster'];
    $pr_office_section = $_POST['pr_office_section'];
    $pr_responsibility_code = $_POST['pr_responsibility_code'];
    $pr_purpose = nl2br($_POST['pr_purpose']);
    $pr_date = $_POST['pr_date'];
    $requested_by = $_POST['requested_by'];
    $recommending_approval = $_POST['recommending_approval'];
    $approved_by = $_POST['approved_by'];
    $pr_total_estimated_cost = $_POST['pr_total_estimated_cost'];

    $_SESSION['bo_no'] = $_POST['pr_budget_officer'];
    $_SESSION['pr_fund_cluster'] = $_POST['pr_fund_cluster'];
    $_SESSION['pr_office_section'] = $_POST['pr_office_section'];
    $_SESSION['pr_responsibility_code'] = $_POST['pr_responsibility_code'];
    $_SESSION['pr_purpose'] = $_POST['pr_purpose'];
    $_SESSION['pr_date'] = $_POST['pr_date'];
    $_SESSION['requested_by'] = $_POST['requested_by'];
    $_SESSION['recommending_approval'] = $_POST['recommending_approval'];
    $_SESSION['approved_by'] = $_POST['approved_by'];

    if(empty($pr_budget_officer)){
        $_SESSION['txt_bo'] = '*** REQUIRED ***';
        header('Location:purchase_request_form.php#pr_form');
    }else{
        $_SESSION['txt_bo'] = '';
    }

    if(empty($pr_fund_cluster)){
        $_SESSION['txt_fc'] = '*** REQUIRED ***';
        header('Location:purchase_request_form.php#pr_form');
    }else{
        $_SESSION['txt_fc'] = '';
    }

    if(empty($pr_office_section)){
        $_SESSION['txt_os'] = '*** REQUIRED ***';
        header('Location:purchase_request_form.php#pr_form');
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
        header('Location:purchase_request_form.php#pr_form');
    }else{
        $_SESSION['txt_pu'] = '';
    }

    if($requested_by==0){
        $_SESSION['txt_rb'] = '*** REQUIRED ***';
        header('Location:purchase_request_form.php#pr_form');
    }else{
        $_SESSION['txt_rb'] = '';
    }

    if($recommending_approval==0){
        $_SESSION['txt_ra'] = '*** REQUIRED ***';
        header('Location:purchase_request_form.php#pr_form');
    }else{
        $_SESSION['txt_ra'] = '';
    }

    if($approved_by==0){
        $_SESSION['txt_ab'] = '*** REQUIRED ***';
        header('Location:purchase_request_form.php#pr_form');
    }else{
        $_SESSION['txt_ab'] = '';
    }

    $tbl_year = date('Y', strtotime($pr_date));

    if(($tbl_year < 2021) || ($tbl_year > 2025)){
        $_SESSION['txt_date'] = '*** REQUIRED (Valid: 2021 - 2025) ***';
        header('Location:purchase_request_form.php#pr_form');
    }else{
        $_SESSION['txt_date'] = '';
    }

    if($pr_total_estimated_cost==0){
        ?>
            <script>
                alert('Invalid Input: No Stock/Property Added!');
                window.location.href = "purchase_request_form.php";
            </script>
        <?php
    }

    if  (
            !empty($pr_budget_officer) && 
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

        $sql = "INSERT INTO tbl_purchase_request (
                    pr_responsibility_code, 
                    pr_budget_officer, 
                    pr_fund_cluster, 
                    pr_office_section, 
                    pr_purpose, 
                    pr_date, 
                    pr_total_estimated_cost, 
                    requested_by, 
                    recommending_approval, 
                    approved_by,
                    rb_position,
                    ra_position,
                    ab_position,
                    added_by,
                    tbl_year)
                VALUES (
                    '$pr_responsibility_code',
                    '$pr_budget_officer',
                    '$pr_fund_cluster',
                    '$pr_office_section',
                    '$pr_purpose',
                    '$pr_date',
                    '$pr_total_estimated_cost',
                    '$requested_by',
                    '$recommending_approval',
                    '$approved_by',
                    '$rb_position',
                    '$ra_position',
                    '$ab_position',
                    '$email',
                    '$tbl_year')";
        $res = mysqli_query($link,$sql);

        if($res==true)
        {
            $sql = "SELECT * FROM tbl_purchase_request WHERE pr_no = (SELECT MAX(pr_no) FROM tbl_purchase_request)";
            $res = mysqli_query($link,$sql);

            if(mysqli_num_rows($res)>0)
            {
                $row = mysqli_fetch_assoc($res);
                $pr_no = $row['pr_no'];

                $sql = "INSERT INTO tbl_$tbl_year (pr_no)
                        VALUE ('$pr_no')";
                $res = mysqli_query($link,$sql);

                $sql = "SELECT * FROM tbl_item_temp ORDER BY temp_item_no ASC";
                $res = mysqli_query($link,$sql);

                while($row=mysqli_fetch_assoc($res))
                {
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
                    $sql = "DELETE FROM tbl_item_temp";
                    $res = mysqli_query($link,$sql);
                
                    $_SESSION['pr_no'] = $pr_no;
                    echo    '<script>
                                alert("Success: Purchase request saved.");
                                window.location.href = "print_pr.php";
                             </script>';
                }
                else
                {
                    ?>
                        <script>
                            alert('Failed: Unable to add Stock/Property. Please try again!');
                            window.location.replace('purchase_request_form.php');
                        </script>
                    <?php
                }
            }     
        }
    }
    session_write_close();
    mysqli_close($link);
?>