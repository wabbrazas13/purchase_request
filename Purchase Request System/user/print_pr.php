<?php
    session_start();
    include '../database/db_conn.php';

    if(isset($_GET['pr_no']))
    {
        $pr_no = $_GET['pr_no'];
    }
    else
    {
        if(isset($_SESSION['pr_no']))
        {
            $pr_no = $_SESSION['pr_no'];
        }
    }

    $sql = "SELECT * FROM tbl_purchase_request WHERE pr_no = '$pr_no' ";
    $res = mysqli_query($link,$sql);
    
    if($res==true)
    {
        $row = mysqli_fetch_assoc($res);
        $pr_responsibility_code = $row['pr_responsibility_code'];
        $bo_no = $row['pr_budget_officer'];
        $pr_fund_cluster = $row['pr_fund_cluster'];
        $pr_office_section = $row['pr_office_section'];
        $pr_purpose = $row['pr_purpose'];
        $pr_date = $row['pr_date'];
        $pr_total_estimated_cost = $row['pr_total_estimated_cost'];
        $requested_by = $row['requested_by'];
        $recommending_approval = $row['recommending_approval'];
        $approved_by = $row['approved_by'];
        $rb_position = $row['rb_position'];
        $ra_position = $row['ra_position'];
        $ab_position = $row['ab_position'];

        $sql = "SELECT * FROM tbl_signatories WHERE sign_id = '$requested_by' ";
        $res = mysqli_query($link,$sql);

        if($res==true)
        {
            $row=mysqli_fetch_assoc($res);
            $rb_name = $row['sign_name'];

            $sql = "SELECT * FROM tbl_signatories WHERE sign_id = '$recommending_approval' ";
            $res = mysqli_query($link,$sql);

            if($res==true)
            {
                $row=mysqli_fetch_assoc($res);
                $ra_name = $row['sign_name'];

                $sql = "SELECT * FROM tbl_signatories WHERE sign_id = '$approved_by' ";
                $res = mysqli_query($link,$sql);

                if($res==true)
                {
                    $row=mysqli_fetch_assoc($res);
                    $ab_name = $row['sign_name'];

                    $sql = "SELECT * FROM tbl_budget_officer WHERE bo_no = '$bo_no' ";
                    $res = mysqli_query($link,$sql);

                    if($res==true)
                    {
                        $row=mysqli_fetch_assoc($res);
                        $bo_name = $row['bo_name'];
                        $bo_position = $row['bo_position'];
                    }
                }
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
    <title>PRINT</title>
    <link rel="stylesheet" href="print.css" media="print">
    <link rel="icon" href="../images/rdo_logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="print_pr.css">

    <style>
        html{
            zoom: 0.45;
        }
    </style>
</head>
<body style="background-color: white;">
    <div style="margin-left: auto; margin-right: auto; width: fit-content;" id="btn-print">
        <div style="display: inline-block;">
            <a href="purchase_request_list.php">
                <button style="height: 70px; width: 848px; font-size: 40px; font-weight: bold; border-radius: 5px;" class="btn btn-primary">
                    <i class="fa-solid fa-backward-step"></i> BACK
                </button>
            </a>
        </div>
        <div style="display: inline-block;">
            <button style="height: 70px; width: 848px; font-size: 40px; font-weight: bold; border-radius: 5px;" onclick="window.print();" class="btn btn-info">
                <i class="fa-solid fa-print"></i> PRINT
            </button>
        </div>
    </div>

    <div class="po">
        <div class="box1">
            <div id="bo_name">
                <p><?php echo strtoupper($bo_name);?></p>
            </div>
            <div id="bo_lbl">
                <p><?php echo $bo_position;?></p>
            </div>
        </div>

        <div class="box2">
            <div id="fc">
                <p><?php echo $pr_fund_cluster;?></p>
            </div>
        </div>

        <div class="box3">
            <div id="os">
                <p><?php echo $pr_office_section;?></p>
            </div>
            <div id="d">
                <p><?php echo date('F d, Y', strtotime($pr_date));?></p>
            </div>
        </div>

        <div class="box4" id="box4">
            <table>
                <?php
                    $sql = "SELECT * FROM tbl_item WHERE pr_no = '$pr_no' ORDER BY item_no ASC";
                    $res = mysqli_query($link,$sql);
                    $no = 1;

                    while($row=mysqli_fetch_assoc($res))
                    {
                        $item_unit = $row['item_unit'];
                        $item_description = $row['item_description'];
                        $item_quantity = $row['item_quantity'];
                        $item_unit_cost = $row['item_unit_cost'];
                        $item_total_cost = $row['item_total_cost'];

                        ?>
                            <tr>
                                <td id="col1"><?php echo $no;?></td>
                                <td id="col2"><?php echo $item_unit;?></td>
                                <td id="col3"><?php echo $item_description;?></td>
                                <td id="col4"><?php echo $item_quantity;?></td>
                                <td id="col5"><?php echo number_format($item_unit_cost).'.00';?></td>
                                <td id="col6"><?php echo number_format($item_total_cost).'.00';?></td>
                            </tr>
                        <?php

                        $no += 1;
                    }
                ?>
            </table>
        </div>

        <div class="box5">
            <p><?php echo '₱ '.number_format($pr_total_estimated_cost).'.00';?></p>
        </div>

        <div class="box6">
            <p><?php echo $pr_purpose;?></p>
        </div>

        <div class="box7">
            <div id="rb">
                <p><?php echo strtoupper($rb_name);?></p>
            </div>
            <div id="ra">
                <p><?php echo strtoupper($ra_name);?></p>
            </div>
            <div id="ab">
                <p><?php echo strtoupper($ab_name);?></p>
            </div>
        </div>

        <div class="box8">
            <div id="rb">
                <p><?php echo $rb_position;?></p>
            </div>
            <div id="ra">
                <p><?php echo $ra_position;?></p>
            </div>
            <div id="ab">
                <p><?php echo $ab_position;?></p>
            </div>
        </div>

        <div class="box9">
            <p><?php echo 'PR No. '.$pr_no;?></p>
        </div>
    </div>
</body>
</html>

<?php
    mysqli_close($link);
?>