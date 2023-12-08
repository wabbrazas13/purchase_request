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
    $pr_no = $_POST['pr_no'];

    $sql = "SELECT * FROM tbl_purchase_request WHERE pr_no = '$pr_no' ";
    $res = mysqli_query($link,$sql);

    $row=mysqli_fetch_assoc($res);
    $rb_position = $row['rb_position'];
    $ra_position = $row['ra_position'];
    $ab_position = $row['ab_position'];

    if(isset($_POST['btn_rb'])){
        $sign_id = $_POST['requested_by'];
        $sign_position = $rb_position;

        if($sign_id == 0){
            $_SESSION['txt_bo'] = '';
            $_SESSION['txt_fc'] = '';
            $_SESSION['txt_os'] = '';
            $_SESSION['txt_pu'] = '';
            $_SESSION['txt_ra'] = '';
            $_SESSION['txt_ab'] = '';
            $_SESSION['txt_rb'] = '*** REQUIRED ***';
            header('Location:edit_pr.php#pr_form');
        }else{
            $_SESSION['txt_rb'] = '';
        }
    }

    if(isset($_POST['btn_ra'])){
        $sign_id = $_POST['recommending_approval'];
        $sign_position = $ra_position;

        if($sign_id == 0){
            $_SESSION['txt_bo'] = '';
            $_SESSION['txt_fc'] = '';
            $_SESSION['txt_os'] = '';
            $_SESSION['txt_pu'] = '';
            $_SESSION['txt_rb'] = '';
            $_SESSION['txt_ab'] = '';
            $_SESSION['txt_ra'] = '*** REQUIRED ***';
            header('Location:edit_pr.php#pr_form');
        }else{
            $_SESSION['txt_ra'] = '';
        }
    }

    if(isset($_POST['btn_ab'])){
        $sign_id = $_POST['approved_by'];
        $sign_position = $ab_position;
        
        if($sign_id == 0){
            $_SESSION['txt_bo'] = '';
            $_SESSION['txt_fc'] = '';
            $_SESSION['txt_os'] = '';
            $_SESSION['txt_pu'] = '';
            $_SESSION['txt_rb'] = '';
            $_SESSION['txt_ra'] = '';
            $_SESSION['txt_ab'] = '*** REQUIRED ***';
            header('Location:edit_pr.php#pr_form');
        }else{
            $_SESSION['txt_ab'] = '';
        }
    }

    if(!($sign_id==0)){
        $sql = "SELECT * FROM tbl_signatories WHERE sign_id = '$sign_id' ";
        $res = mysqli_query($link,$sql);

        if(mysqli_num_rows($res)==1)
        {
            $row=mysqli_fetch_assoc($res);
            $sign_name = $row['sign_name'];
            $sign_p = $row['sign_position'];

            if(!($sign_p == $sign_position)){
                $sign_position = $sign_p;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="edit_person.css" />
    <title>Edit Person</title>
    <link rel="icon" href="../images/rdo_logo.png">
</head>
<body>
    <form action="<?php echo htmlspecialchars('edit_person2.php');?>" method="POST">
        <div class="box1">
            <img src="../images/bpsu_rdo_header.png" alt="">
        </div>
        <div class="box2">
            <h1>Edit Person</h1>
        </div>
        <div class="box3">
            <br>
            <div class="box3a">
                <label>Full Name <b style="color: red;">*</b></label><br>
            </div>
            <br>
            <div class="box3b">
                <input type="hidden" name="sign_id" value="<?php echo $sign_id;?>">
                <input type="text" name="sign_name" value="<?php echo $sign_name;?>" required>
            </div>
        </div>
        <div class="box3 mb">
            <br>
            <div class="box3a">
                <label>Position <b style="color: red;">*</b></label><br>
            </div>
            <br>
            <div class="box3b">
                <input type="text" name="sign_position" value="<?php echo $sign_position;?>" required>
            </div>
        </div>
        <div class="btn">
            <div style="display: inline-block;">
                <a href="edit_pr.php#pr_form">
                    <button type="button" class="btn-back">Back</button>
                </a>
            </div>
            <button type="submit" name="update" class="btn-update">Update</button>
        </div>
    </form>
</body>
</html>

<?php
    session_write_close();
    mysqli_close($link);
?>