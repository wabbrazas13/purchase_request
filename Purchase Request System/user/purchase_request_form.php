<?php 
  session_start();
  include '../database/db_conn.php';

  if(isset($_SESSION['txt_bo'])){
    $txt_bo = $_SESSION['txt_bo'];
  }else{
    $txt_bo = '';
  }

  if(isset($_SESSION['txt_fc'])){
    $txt_fc = $_SESSION['txt_fc'];
  }else{
    $txt_fc = '';
  }

  if(isset($_SESSION['txt_os'])){
    $txt_os = $_SESSION['txt_os'];
  }else{
    $txt_os = '';
  }

  if(isset($_SESSION['txt_pu'])){
    $txt_pu = $_SESSION['txt_pu'];
  }else{
    $txt_pu = '';
  }

  if(isset($_SESSION['txt_rb'])){
    $txt_rb = $_SESSION['txt_rb'];
  }else{
    $txt_rb = '';
  }

  if(isset($_SESSION['txt_ra'])){
    $txt_ra = $_SESSION['txt_ra'];
  }else{
    $txt_ra = '';
  }

  if(isset($_SESSION['txt_ab'])){
    $txt_ab = $_SESSION['txt_ab'];
  }else{
    $txt_ab = '';
  }

  if(isset($_SESSION['txt_date'])){
    $txt_date = $_SESSION['txt_date'];
  }else{
    $txt_date = '';
  }

  if(isset($_SESSION['pr_budget_officer'])){
    $pr_budget_officer = $_SESSION['pr_budget_officer'];
  }else{
    $pr_budget_officer = '';
  }

  if(isset($_SESSION['pr_fund_cluster'])){
    $pr_fund_cluster = $_SESSION['pr_fund_cluster'];
  }else{
    $pr_fund_cluster = '';
  }

  if(isset($_SESSION['pr_office_section'])){
    $pr_office_section = $_SESSION['pr_office_section'];
  }else{
    $pr_office_section = '';
  }

  if(isset($_SESSION['pr_responsibility_code'])){
    $pr_responsibility_code = $_SESSION['pr_responsibility_code'];
  }else{
    $pr_responsibility_code = '';
  }

  if(isset($_SESSION['pr_date'])){
    $pr_date = $_SESSION['pr_date'];
  }else{
    $pr_date = '';
  }
  
  if(empty($pr_date)){
    $month = date('m');
    $day = date('d');
    $year = date('Y');
    $pr_date = $year.'-'.$month.'-'.$day;
  }

  if(isset($_SESSION['pr_purpose'])){
    $pr_purpose = $_SESSION['pr_purpose'];
  }else{
    $pr_purpose = '';
  }

  if(isset($_SESSION['requested_by'])){
    $requested_by = $_SESSION['requested_by'];
  }else{
    $requested_by = '';
  }

  if(isset($_SESSION['recommending_approval'])){
    $recommending_approval = $_SESSION['recommending_approval'];
  }else{
    $recommending_approval = '';
  }

  if(isset($_SESSION['approved_by'])){
    $approved_by = $_SESSION['approved_by'];
  }else{
    $approved_by = '';
  }

  if(isset($_SESSION['bo_no'])){
    $bo_no = $_SESSION['bo_no'];
  }else{
    $bo_no = '';
  }
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
    <link rel="stylesheet" href="purchase_request_form.css" />
    <link rel="stylesheet" href="header.css" />
    <title>Add | Purchase Request</title>
    <link rel="icon" href="../images/rdo_logo.png">
  </head>
  <body>
    <?php
      include 'header.php';
    ?>
    
    <section>
      <form method="POST">

        <div class="add-property-container">
          <div class="at" style="display: flex; align-items: center; justify-content: left;">
            <a href="purchase_request_list.php" style="text-decoration: none; font-size: 25px; margin-right: 10px;">
              <i class="fa-solid fa-circle-left"></i> &nbsp;&nbsp;Back
            </a>
            <a href="#" data-bs-toggle="modal" data-bs-target="#add-stock-modal" style="text-decoration: none; font-size: 25px;">
              <i class="fa-sharp fa-solid fa-cart-plus"></i> Add Item
            </a>  
          </div>
          <hr style="margin-top: 0px; color: black;"> 
          <div>
            <div>
              <table style="width: 100%; height: 100%;">
                <tr>
                  <th style="width: 110px; text-align: center;">Stock No.</th>
                  <th style="width: 140px; text-align: center;">Unit</th>
                  <th style="text-align: center;">Item Description</th>
                  <th style="width: 130px; text-align: center;">Quantity</th>
                  <th style="width: 130px; text-align: center;">Unit Cost</th>
                  <th style="width: 140px; text-align: center;">Total Cost</th>
                  <th style="width: 140px; text-align: center;">Action</th>
                </tr>
                <?php include 'view_temp_item.php'; ?>
              </table>    
            </div>
            <div style="text-align: center; border-left: 1px solid grey; border-bottom: 1px solid grey; border-right: 1px solid grey; background: black; color: white;">
              <em style="font-size: 20px;"><b>Total Estimated Cost : </b>&nbsp&nbsp&nbsp<?php echo ' ₱ '.number_format($temp_total_estimated_cost).'.00'; ?></em>
            </div>
          </div>
        </div>

        <div class="add-pr-container" style="zoom: 1.1;">
          <div style="text-align: center;">
            <h1 class="lbly" style="font-size: 25px; font-weight: bold; position:relative; z-index: 800; color: black;">ADD PURCHASE REQUEST</h1>
          </div>
          <hr style="color: black;">
          <div id="pr_form" style="display: flex; justify-content: center;">
            <div class="form-group col1">
              <label class="lbly">Budget Officer : </label>
              <b style="color: red; margin-left: 195px;"><?php echo $txt_bo;?></b><br>
              <div class="col1">
                <select style="text-align: center; width: 450px; height: 40px; padding: 0px 0px 0px 0px; margin-left: 5px;" class="form-select" name="pr_budget_officer">
                  <option value="0" style="display: none;"></option>
                  <?php include 'display_person_to_form.php'; ?>                       
                </select>                
              </div>
              <div class="col2" title="Add Person">
                  <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#add-bo-modal">
                      <i class="fa-solid fa-user-plus"></i>
                  </button>
                  <button title="Edit Person" class="btn btn-primary" name="btn_bo" type="submit" formaction="<?php echo htmlspecialchars('edit_bo.php');?>">
                      <i class="fa-solid fa-user-pen"></i>
                  </button>
              </div><br><br>
              <label class="lbly">Fund Cluster : </label><b style="color: red; margin-left: 210px;"><?php echo $txt_fc;?></b><br>
              <input class="form-control" type="text" name="pr_fund_cluster" value="<?php echo $pr_fund_cluster;?>"><br>
              <label class="lbly">Office / Section : </label><b style="color: red; margin-left: 195px;"><?php echo $txt_os;?></b><br>
              <input class="form-control" type="text" name="pr_office_section" value="<?php echo $pr_office_section;?>"><br>
              <label class="lbly">Responsibility Code : </label><br>
              <input class="form-control" type="text" name="pr_responsibility_code" value="<?php echo $pr_responsibility_code;?>"><br>
              <label class="lbly">Date : </label><b style="color: red; margin-left: 210px;"><?php echo $txt_date;?></b><br>
              <input class="form-control" type="date" name="pr_date" min="2021-01-01" max="2025-12-31" value="<?php echo $pr_date;?>" ><br>
              <input type="hidden" name="pr_total_estimated_cost" value="<?php echo $temp_total_estimated_cost; ?>">
            </div>

            <div class="form-group col1">
              <div class="col2" style="height: 353px; margin-left: 40px;">
                <label class="lbly">Purpose : </label><b style="color: red; margin-left: 245px;"><?php echo $txt_pu;?></b><br>
                <textarea class="form-control" name="pr_purpose" style="height: 130px;"><?php echo $pr_purpose;?></textarea><br>
                <?php include "signatories_input.php";?>
              </div>
            </div>
          </div>
          <hr style="color: black;">
          <div style="text-align: right;">
            <div class="col1">
              <button type="submit" name="btn_clearForm" class="btn btn-warning" formaction="<?php echo htmlspecialchars('form_clear.php'); ?>"><i class="fa-solid fa-eraser"></i> Clear</button>
              <button type="submit" name="btn_savePR" class="btn btn-success" formaction="<?php echo htmlspecialchars('add_purchaserequest.php'); ?>"><i class="fa-solid fa-floppy-disk"></i> Save</button> 
              <a href="purchase_request_list.php">
                <button type="button" class="btn btn-primary"><i class="fa-solid fa-eye"></i> View</button>
              </a>
            </div>
          </div>
        </div>

        <!-- The Modal -->
        <div class="modal fade" id="add-stock-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Stock / Property</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body" id="add-item-modal">
                        <label>Unit : </label><br>
                        <input type="text" name="item_unit"><br>
                        <label>Item Description : </label><br>
                        <textarea name="item_description" cols="30" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'></textarea>
                        <label>Quantity : </label><br>
                        <input type="number" name="item_quantity" min="1" value="1" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"><br>
                        <label>Unit Cost : </label><br>
                        <input type="number" name="item_unit_cost"><br>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer" style="margin-top: 10px;">
                        <button style="width: 80px;" type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button style="width: 80px;" type="submit" name="btn_saveItem" class="btn btn-success" formaction="<?php echo htmlspecialchars('add_item.php'); ?>">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="add-person-modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Add Person</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <!-- Modal body -->
              <div class="modal-body" id="add-person-modal">
                <br>
                <label for="">Name : </label><br>
                <input type="text" name="sign_name"><br><br>
                <label for="">Position : </label><br>
                <input type="text" name="sign_position"><br>
                <br>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer" style="margin-top: 10px;">
                <button style="width: 80px;" type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button style="width: 80px;" type="submit" class="btn btn-success" name="btn_savePerson" formaction="<?php echo htmlspecialchars('add_signatories.php');?>">Save</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="add-person-modal1">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Add Person</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <!-- Modal body -->
              <div class="modal-body" id="add-person-modal">
                <br>
                <label for="">Name : </label><br>
                <input type="text" name="sign_name1"><br><br>
                <label for="">Position : </label><br>
                <input type="text" name="sign_position1"><br>
                <br>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer" style="margin-top: 10px;">
                <button style="width: 80px;" type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button style="width: 80px;" type="submit" class="btn btn-success" name="btn_savePerson" formaction="<?php echo htmlspecialchars('add_signatories1.php');?>">Save</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="add-person-modal2">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Add Person</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <!-- Modal body -->
              <div class="modal-body" id="add-person-modal">
                <br>
                <label for="">Name : </label><br>
                <input type="text" name="sign_name2"><br><br>
                <label for="">Position : </label><br>
                <input type="text" name="sign_position2"><br>
                <br>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer" style="margin-top: 10px;">
                <button style="width: 80px;" type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button style="width: 80px;" type="submit" class="btn btn-success" name="btn_savePerson" formaction="<?php echo htmlspecialchars('add_signatories2.php');?>">Save</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="add-bo-modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Add Person</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <!-- Modal body -->
              <div class="modal-body" id="add-person-modal">
                <br>
                <label for="">Name : </label><br>
                <input type="text" name="bo_name"><br><br>
                <label for="">Position : </label><br>
                <input type="text" name="bo_position"><br>
                <br>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer" style="margin-top: 10px;">
                <button style="width: 80px;" type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button style="width: 80px;" type="submit" class="btn btn-success" name="btn_savePerson" formaction="<?php echo htmlspecialchars('add_bo.php');?>">Save</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
  </body>
</html>

<?php 
  session_write_close();
  mysqli_close($link);
?>