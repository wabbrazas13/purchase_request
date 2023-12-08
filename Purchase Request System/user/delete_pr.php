<?php 
    include '../database/db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete | Purchase Request</title>
    <link rel="icon" href="../images/rdo_logo.png">

    <style>
        .wrapper
        {
            margin: 20px auto 0px auto;
            border: 1px solid black;
            width: fit-content;
            height: fit-content;
        }
        .box1
        {
            border-bottom: 1px solid black;
            height: 30px;
            padding: 10px;
            background-color: whitesmoke;
        }
        .box1 h1
        {
            margin: 0;
            color: #d71717;
            font-size: 25px;
        }
        .box2
        {
            display: flex;
            align-items: center;
            margin-top: 30px;
            margin-bottom: 20px;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }
        .box2a
        {
            border: 1px solid grey;
            height: 35px;
            width: 70px;
            display: flex;
            align-items: center;
            background-color: whitesmoke;
        }
        .box2a a
        {
            margin: auto;
            text-decoration: none;
        }
        .box2b
        {
            border: 1px solid grey;
            height: 35px;
            width: 70px;
            display: flex;
            align-items: center;
            margin-left: 20px;
            background-color: whitesmoke;
        }
        .box2b button
        {
            outline: none;
            border: none;
            background-color: transparent;
            margin: auto;
        }
        .box2a:hover, .box2a a:hover
        {
            background-color: grey;
            color: white;
        }
        .box2b:hover, .box2b button:hover
        {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="box1">
            <h1>Continue to delete purchase request?</h1>
        </div>
        <form action="" method="post">
            <div class="box2">
                <input type="hidden" name="pr_no" value="<?php echo $pr_no;?>">
                <div class="box2a">
                    <a href="purchase_request_list.php">Cancel</a>
                </div>
                <div class="box2b">
                    <button type="submit" name="btn_proceed">Proceed</button>
                </div>
            </div>
        </form>
    </div>

    <?php
        if(isset($_POST['btn_proceed']))
        {
            if(isset($_GET['pr_no']))
        {
            $pr_no = $_GET['pr_no'];

            $sql = "DELETE FROM tbl_purchase_request WHERE pr_no = '$pr_no' ";
            $res = mysqli_query($link,$sql);

            if($res==true)
            {
                header("Location: purchase_request_list.php");
            }
        }
        else
        {
            echo    '<script>
                        alert("Unable to delete purchase request. Please try again.");
                        window.location.href = "purchase_request_list.php";
                    </script>';
        }
            }
    ?>
</body>
</html>

<?php 
  mysqli_close($link);
?>