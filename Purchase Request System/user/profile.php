<?php
  session_start();
  include '../database/db_conn.php';

  if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
  }else{
    $email = '';
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="profile.css" />
    <title>RDO | My Profile</title>
    <link rel="icon" href="../images/rdo_logo.png">

    <style>
      #dp{
        background-color: rgba(0, 0, 0, 0.50);
      }  
      #dp a i{
          color: greenyellow;
      }
    </style>
</head>
<body>
    <?php
      include 'header.php';
    ?>

    <?php
        $sql = "SELECT * FROM tbl_admin WHERE email = '$email' ";
        $res = mysqli_query($link,$sql);
    
        if($res == true){
            $row = mysqli_fetch_assoc($res);
            $password = $row['password'];
            $user_type = $row['user_type'];
            $fname = $row['fname'];
            $lname = $row['lname'];
        }

        if(empty($email)){
            $email = 'Not found';
        }

        if(empty($fname)){
            $fname = 'Not Set';
        }

        if(empty($lname)){
            $lname = 'Not Set';
        }
    ?>

    <section>
      <div class="tab-container">
        <div class="tab">
          <button class="tablinks" onclick="openTab(event, 'my_profile')">My Profile</button>
          <button class="tablinks" onclick="openTab(event, 'change_password')">Change Password</button>
        </div>
        <form action="upd_dp.php" method="POST">
            <div id="my_profile" class="tabcontent">
                <div class="dp-container">
                    <label>First Name:</label>
                    <input type="text" name="fname" placeholder='<?php echo $fname;?>' ><br>
                    <label>Last Name:</label>
                    <input type="text" name="lname" placeholder='<?php echo $lname;?>' ><br>
                    <input type="hidden" name="prev_email" value='<?php echo $email;?>' >
                    <label>Username:</label>
                    <input type="email" name="email" placeholder='<?php echo $email;?>' required><br>
                    <label>Password:</label>
                    <input type="password" name="password1" value='<?php echo $password;?>' ><br>
                    <input type="submit" name="upd_dp" value="Update Profile">
                </div>
            </div>
            <div id="change_password" class="tabcontent">
                <div class="dp-container">
                  <label>New Password:</label>
                  <input type="password" name="password2"><br>
                  <label>Confirm Password:</label>
                  <input type="password" name="password3"><br>
                  <input type="submit" name="upd_pass" value="Confirm" formnovalidate>
                </div>
            </div>
        </form>
      </div>
    </section>

    <script>
      document.getElementsByClassName('tablinks')[0].click()
      function openTab(event, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        event.currentTarget.className += " active";
      }
    </script>
</body>
</html>

<?php
  mysqli_close($link);
  session_write_close();
?>