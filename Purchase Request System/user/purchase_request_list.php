<?php
  session_start();
  include '../database/db_conn.php';

  if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
  }else{
    $email = '';
  }

  if(isset($_SESSION['user_type'])){
    $user_type = $_SESSION['user_type'];
  }else{
    $user_type = 'user';
  }

  if($user_type=='admin'){
    $user = '';
  }else{
    $user = "added_by = '$email' AND";
  }

  if(isset($_SESSION['bo_no'])){
    unset($_SESSION['bo_no']);
  }

  if(isset($_SESSION['pr_fund_cluster'])){
    unset($_SESSION['pr_fund_cluster']);
  }

  if(isset($_SESSION['pr_office_section'])){
    unset($_SESSION['pr_office_section']);
  }

  if(isset($_SESSION['pr_responsibility_code'])){
    unset($_SESSION['pr_responsibility_code']);
  }

  if(isset($_SESSION['pr_date'])){
    unset($_SESSION['pr_date']);
  }

  if(isset($_SESSION['pr_purpose'])){
    unset($_SESSION['pr_purpose']);
  }

  if(isset($_SESSION['requested_by'])){
    unset($_SESSION['requested_by']);
  }

  if(isset($_SESSION['recommending_approval'])){
    unset($_SESSION['recommending_approval']);
  }

  if(isset($_SESSION['approved_by'])){
    unset($_SESSION['approved_by']);
  }

  if(isset($_SESSION['txt_bo'])){
    unset($_SESSION['txt_bo']);
  }

  if(isset($_SESSION['txt_fc'])){
    unset($_SESSION['txt_fc']);
  }

  if(isset($_SESSION['txt_os'])){
    unset($_SESSION['txt_os']);
  }

  if(isset($_SESSION['txt_pu'])){
    unset($_SESSION['txt_pu']);
  }

  if(isset($_SESSION['txt_rb'])){
    unset($_SESSION['txt_rb']);
  }

  if(isset($_SESSION['txt_ra'])){
    unset($_SESSION['txt_ra']);
  }

  if(isset($_SESSION['txt_ab'])){
    unset($_SESSION['txt_ab']);
  }

  if(isset($_SESSION['entry_no'])){
    $entry_no = $_SESSION['entry_no'];
  }else{
    $entry_no = 10;
  }

  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }else{
    $page = 1;
  }

  if(isset($_SESSION['m'])){
    $m = $_SESSION['m'];
    if($m==0){
      $m = '';
    }
  }else{
    $m = '';
  }

  if(isset($_SESSION['md'])){
    $md = $_SESSION['md'];
  }else{
    $md = 'ALL';
  }

  if(isset($_SESSION['y'])){
    $y = $_SESSION['y'];
    if($y==0){
      $y = '';
    }
  }else{
    $y = '';
  }

  if(isset($_SESSION['yd'])){
    $yd = $_SESSION['yd'];
  }else{
    $yd = 'ALL';
  }

  if(isset($_SESSION['search'])){
    $search = $_SESSION['search'];
  }else{
    $search = '';
  }

  if(isset($_SESSION['nodata'])){
    $_SESSION['nodata'] = '';
  }else{
    $_SESSION['nodata'] = 'hidden';
  }

  $start_from = ($page-1) * $entry_no;

  $sql = "SELECT * FROM tbl_purchase_request 
          WHERE $user
                ((MONTH(pr_date) LIKE '%$m%' AND
                YEAR(pr_date) LIKE '%$y%') AND
                (pr_no LIKE '%$search%' OR
                pr_purpose LIKE '%$search%'))
          LIMIT $start_from,$entry_no";
  $res = mysqli_query($link,$sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="purchase_request_list.css" />
    <link rel="stylesheet" href="header.css"/>
    <title>RDO | Purchase Request</title>
    <link rel="icon" href="../images/rdo_logo.png">
  </head>
  <body>
    <?php
      include 'header.php';
    ?>
    <section>
        <div class="wrapper">
          <div style="margin-bottom: 10px;">
            <div class="col1" style="padding-left: 3px;">
              <div class="col1 vam" style="margin-right: 20px;">
                <a href="purchase_request_form.php" id="apr">
                  <i class="fa-solid fa-plus"></i> Add
                </a>
              </div>
              <label class="vam" style="font-weight: bold; font-size: 40px;"> Purchase Request</label>
            </div>
            <div class="col2">
              <div class="btn-refresh">
                <a href="refresh.php">
                  <button><i class="fa-sharp fa-solid fa-rotate"></i> Refresh</button>
                </a>
              </div>
            </div>
          </div>
          
          <div style="margin-bottom: 10px;">
            <div class="col1" style="height: 38px;">
              <label style="font-size: 20px;">
                Show
                <div class="dropdown-se">
                  <button class="dropbtn-se"><?php echo $entry_no;?> <i class="fa-sharp fa-solid fa-caret-down"></i></button>
                  <div class="dropdown-content-se">
                    <a href="show_entries.php?no=10">10</a>
                    <a href="show_entries.php?no=25">25</a>
                    <a href="show_entries.php?no=50">50</a>
                  </div>
                </div>
                Entries
              </label>  
            </div>
            <div class="col2" style="display: flex; align-items: center;">
              <div>
                <div class="dropdown-m">
                  <button class="dropbtn-m"><?php echo $md;?> &nbsp;&nbsp;<i class="fa-sharp fa-solid fa-caret-down"></i></button>
                  <div class="dropdown-content-m">
                    <a href="search_by_month.php?m=0">ALL</a>
                    <a href="search_by_month.php?m=01">JAN</a>
                    <a href="search_by_month.php?m=02">FEB</a>
                    <a href="search_by_month.php?m=03">MAR</a>
                    <a href="search_by_month.php?m=04">APR</a>
                    <a href="search_by_month.php?m=05">MAY</a>
                    <a href="search_by_month.php?m=06">JUN</a>
                    <a href="search_by_month.php?m=07">JUL</a>
                    <a href="search_by_month.php?m=08">AUG</a>
                    <a href="search_by_month.php?m=09">SEP</a>
                    <a href="search_by_month.php?m=10">OCT</a>
                    <a href="search_by_month.php?m=11">NOV</a>
                    <a href="search_by_month.php?m=12">DEC</a>
                  </div>
                </div>
                <div class="dropdown-y" style="margin-left: 10px;">
                  <button class="dropbtn-y"><?php echo $yd;?> &nbsp;&nbsp;<i class="fa-sharp fa-solid fa-caret-down"></i></button>
                  <div class="dropdown-content-y">
                    <a href="search_by_year.php?y=0">ALL</a>
                    <a href="search_by_year.php?y=2021">2021</a>
                    <a href="search_by_year.php?y=2022">2022</a>
                    <a href="search_by_year.php?y=2023">2023</a>
                    <a href="search_by_year.php?y=2024">2024</a>
                    <a href="search_by_year.php?y=2025">2025</a>
                  </div>
                </div> 
              </div> 
              <form action="search.php" method="POST">          
                <div style="margin-left: 20px;">
                  <div class="col1">
                    <input type="search" name="search" placeholder="Search" class="form-control"  style="text-align: center; width: 700px; border-bottom-left-radius: 15px; border-top-left-radius: 15px; border-bottom-right-radius: 0px; border-top-right-radius: 0px;"/>
                  </div>
                  <div class="col2">
                    <button type="submit" class="btn btn-primary" style="border-bottom-right-radius: 15px; border-top-right-radius: 15px; border-bottom-left-radius: 0px; border-top-left-radius: 0px;">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>  
            </div>
          </div>

          <div style="background-color: aliceblue; min-height: 500px;">
            <table style="width: 100%;" class="table table-stripped table-hover">
              <thead>
                <tr>
                  <th style="width: 70px;">PR No.</th>
                  <th style="width: 90px; text-align: center;">ID</th>
                  <th style="width: 110px;">Date</th>
                  <th style="text-align: center;">Budget Officer</th>
                  <th style="text-align: center;">Fund Cluster</th>
                  <th style="text-align: center;">Office/Section</th>
                  <th style="text-align: center;">Purpose</th>
                  <th style="width: 140px; text-align: center;">Total Estimated Cost</th>
                  <th style="text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if(mysqli_num_rows($res)<1){
                    $_SESSION['nodata'] = '';
                    ?>
                      <script>
                        alert("No record found in the database!");
                      </script>
                    <?php
                  }else{
                    $_SESSION['nodata'] = 'hidden';
                  }

                  while($row=mysqli_fetch_assoc($res))
                  {
                    $pr_no = $row['pr_no'];
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
                    $tbl_year = $row['tbl_year'];

                    $sql2 = "SELECT * FROM tbl_budget_officer WHERE bo_no = '$bo_no' ";
                    $res2 = mysqli_query($link,$sql2);

                    if($res2==true)
                    {
                      $row2 = mysqli_fetch_assoc($res2);
                      $bo_name = $row2['bo_name'];
                      $bo_position = $row2['bo_position'];
                    }

                    $sql3 = "SELECT * FROM tbl_$tbl_year WHERE pr_no = '$pr_no' ";
                    $res3 = mysqli_query($link,$sql3);

                    if($res3==true)
                    {
                      $row3 = mysqli_fetch_assoc($res3);
                      $_no = $row3['no'];

                      if((strlen($_no)) == 1){
                        $_no = '000'.$_no;
                      }elseif((strlen($_no)) == 2){
                        $_no = '00'.$_no;
                      }elseif((strlen($_no)) == 3){
                        $_no = '0'.$_no;
                      }else{
                        $_no = $_no;
                      }
                    }

                    ?>
                      <tr>
                        <td style="text-align: center;"><?php echo $pr_no;?></td>
                        <td><?php echo $tbl_year.'-'.$_no;?></td>
                        <td style="text-align: center; line-height: 18px;"><?php echo date('F d, Y', strtotime($pr_date));?></td>
                        <td style="width: 200px; text-align: center; line-height: 18px;"><?php echo $bo_name;?></td>
                        <td style="width: 150px; text-align: center; line-height: 18px;"><?php echo $pr_fund_cluster;?></td>
                        <td style="width: 50px; text-align: center; line-height: 18px;"><?php echo $pr_office_section;?></td>
                        <td style="width: 500px; text-align: justify; line-height: 18px;"><?php echo $pr_purpose;?></td>
                        <td style="text-align: right;"><?php echo '₱ '.number_format($pr_total_estimated_cost).' .00';?></td>
                        <td style="text-align: center; width: 150px;">
                          <div class="col1">
                            <a href="delete_pr.php?pr_no=<?php echo $pr_no;?>" class="btn btn-danger">
                              <i class="fa-sharp fa-solid fa-xmark" style="font-weight: bold; font-size: 22px;"></i>
                            </a>
                          </div>
                          <div class="col1">
                            <a href="edit_pr.php?pr_no=<?php echo $pr_no;?>">
                              <button title="Edit" class="btn btn-success">
                                <i class="fa-solid fa-pen-to-square"></i>
                              </button>
                            </a>
                          </div>
                          <div class="col1">
                            <a href="print_pr.php?pr_no=<?php echo $pr_no;?>" target="blank">
                              <button title="Print" class="btn btn-primary">
                                <i class="fa-solid fa-print"></i>
                              </button>
                            </a>
                          </div>
                        </td>
                      </tr>
                    <?php
                  }
                ?>
              </tbody>
            </table>
            <div class="nodata" <?php echo $_SESSION['nodata'];?>>
              <div><h1>No Data Found!</h1></div>
            </div>
          </div>
          <div style="display: flex; justify-content: right;">
            <div>
              <?php
                $sql1 = "SELECT * FROM tbl_purchase_request";
                $res1 = mysqli_query($link,$sql1);
                $total_record = mysqli_num_rows($res1);

                $total_page = ceil($total_record/$entry_no);

                if($page>1){
                  echo "<a href='purchase_request_list.php?page=".($page-1)."' class='btn btn-primary'>Prev</a>";
                }

                for($i=1;$i<$total_page;$i++){
                  echo "<a href='purchase_request_list.php?page=".$i."' class='btn btn-info'>$i</a>";
                }

                if($i>$page){
                  echo "<a href='purchase_request_list.php?page=".($page+1)."' class='btn btn-primary'>Next</a>";
                }
              ?>
            </div>
          </div>
        </div>
    </section>
  </body>
</html>

<?php 
  session_write_close();
  mysqli_close($link);
?>