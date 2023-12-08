<?php
  if(isset($_SESSION['user_type'])){
    $user_type = $_SESSION['user_type'];
  }else{
    $user_type = 'user';
  }

  if(isset($_SESSION['fname'])){
    $fname = $_SESSION['fname'];
  }else{
    $fname = '';
  }

  if(empty($fname)){
    $fname = $user_type;
  }

  if($user_type=='user'){
    $hidden = "hidden = 'hidden'";
  }else{
    $hidden = '';
  }
?>

<header>
  <div class="header-wrapper">
    <div class="header-left">
      <div id="rdo_logo">
        <a href="purchase_request_list.php">
          <img src="../images/rdo_logo.png" alt="">
        </a>
      </div>
      <div id="logo_lbl">
        <a href="purchase_request_list.php">
          RESEARCH & DEVELOPMENT OFFICE
        </a>
      </div>
    </div>
    <div class="header-right">
      <div id="dp">
        <a href="profile.php">
          <div id="dp_icon">
            <i class="fa-solid fa-user"></i>
          </div>
          &nbsp;<?php echo 'Hi, '.ucwords($fname).'!';?>
        </a>
      </div>
      <div id="users" <?php echo $hidden;?> >
        <a href="users.php">
          <i class="fa-solid fa-users"></i> Users
        </a>
      </div>
      <div id="logout">
        <a href="log_out.php">
          <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
      </div>
    </div>
  </div>
</header>
<hr style="margin: 0px;">

<?php
  session_write_close();
?>