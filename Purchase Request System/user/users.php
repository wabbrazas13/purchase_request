<?php
  session_start();
  include '../database/db_conn.php';


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
    <link rel="stylesheet" href="users.css" />
    <title>RDO | Users</title>
    <link rel="icon" href="../images/rdo_logo.png">

    <style>
      #users{
        background-color: rgba(0, 0, 0, 0.50);
      }  
      #users a i{
          color: greenyellow;
      }
    </style>
</head>
<body>
    <?php
      include 'header.php';
    ?>

    <section>
      <div class="tab-container">
        <div class="tab">
          <button class="tablinks" onclick="openTab(event, 'add_user')">Add User</button>
          <button class="tablinks" onclick="openTab(event, 'user_list')">User List</button>
        </div>
        <div id="user_list" class="tabcontent">
          <div class="user-tbl">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;

                  $sql = "SELECT * FROM tbl_admin";
                  $res = mysqli_query($link,$sql);

                  while($row=mysqli_fetch_assoc($res)){
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $email = $row['email'];
                    $password = $row['password'];
                    $status = $row['status'];

                    if($status=='online'){
                      $bg = 'green';
                    }else{
                      $bg = 'red';
                    }

                    ?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $fname;?></td>
                        <td><?php echo $lname;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $password;?></td>
                        <td><i style="font-size: 10px; background-color: <?php echo $bg;?>;" class="fa-regular fa-circle"></i> <?php echo $status;?></td>
                      </tr>
                    <?php

                    $no++;
                  }

                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div id="add_user" class="tabcontent">
          <div class="user-container">
            <form action="add_user.php" method="POST">
              <label>First Name:</label>
              <input type="text" name="fname"><br>
              <label>Last Name:</label>
              <input type="text" name="lname"><br>
              <label>Username:</label>
              <input type="email" name="email" required><br>
              <label>Password:</label>
              <input type="password" name="password" required><br>
              <input type="submit" name="add_user" value="Add User">
              <input type="submit" name="edit_user" value="Edit User">
            </form>
          </div>
        </div>
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
  session_write_close();
  mysqli_close($link);
?>