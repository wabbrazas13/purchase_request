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

    $temp_item_no = $_GET['temp_item_no'];

    $sql = "SELECT * FROM tbl_item_temp WHERE temp_item_no = '$temp_item_no' ";
    $res = mysqli_query($link,$sql);

    if($res==true)
    {
        $row=mysqli_fetch_assoc($res);
        $temp_item_unit = $row['temp_item_unit'];
        $temp_item_description = str_replace('<br />', '', $row['temp_item_description']);
        $temp_item_quantity = $row['temp_item_quantity'];
        $temp_item_unit_cost = $row['temp_item_unit_cost'];
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
    <link rel="stylesheet" href="edit_item.css" />
    <title>Edit Stock / Property</title>
    <link rel="icon" href="../images/rdo_logo.png">
</head>
<body>
    <form action="<?php echo htmlspecialchars('edit_item3.php'); ?>" method="POST">
        <div class="box1">
            <img src="../images/bpsu_rdo_header.png" alt="">
        </div>
        <div class="box2">
            <h1>Edit Stock / Property</h1>
        </div>
        <div class="box3">
            <br>
            <input type="hidden" name="temp_item_no" value="<?php echo $temp_item_no;?>">
            <div class="box3a">
                <label>Unit <b style="color: red;">*</b></label><br>
            </div>
            <br>
            <div class="box3b">
                <input type="text" name="temp_item_unit" value="<?php echo $temp_item_unit;?>" required><br>
            </div>
        </div>
        <div class="box4">
            <br>
            <div class="box4a">
                <label>Item Description <b style="color: red;">*</b></label><br>
            </div>
            <br>
            <div class="box4b">
                <textarea name="temp_item_description" cols="52" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' required><?php echo $temp_item_description;?></textarea><br>
            </div>
        </div>
        <div class="box5">
            <br>
            <div class="box5a">
                <label>Quantity <b style="color: red;">*</b></label><br>
            </div>
            <br>
            <div class="box5b">
                <input type="number" name="temp_item_quantity" value="<?php echo $temp_item_quantity;?>" required><br>
            </div>
        </div>
        <div class="box6">
            <br>
            <div class="box6a">
                <label>Unit Cost <b style="color: red;">*</b></label><br>
            </div>
            <br>
            <div class="box6b">
                <input type="number" name="temp_item_unit_cost" value="<?php echo $temp_item_unit_cost;?>" required><br>
            </div>
        </div>
        <div class="btn">
            <div style="display: inline-block;">
                <a href="edit_pr.php">
                    <button type="button" class="btn-back">Back</button>
                </a>
            </div>
            <button type="submit" name="submit" class="btn-update">Update</button>
        </div>
    </form>
</body>
</html>

<?php
    session_write_close();
    mysqli_close($link);
?>