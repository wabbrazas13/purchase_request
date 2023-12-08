<?php
    session_start();

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

    header("Location:purchase_request_form.php#pr_form");

    session_write_close();
?>