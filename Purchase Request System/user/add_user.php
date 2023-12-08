<?php
    include '../database/db_conn.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $usertype = 'user';

    if(isset($_POST['add_user'])){
        $sql = "SELECT * FROM tbl_admin WHERE email = '$email' ";
        $res = mysqli_query($link,$sql);
        
        if(mysqli_num_rows($res)>0){
            header('Location:users.php');
        }else{
            $sql = "INSERT INTO tbl_admin (email,password,user_type,fname,lname,status)
                    VALUES ('$email','$password','$usertype','$fname','$lname', 'offline')";
            $res = mysqli_query($link,$sql);

            if($res==true){
                ?>
                    <script>
                        alert('User Added!');
                        window.location.href = 'users.php';
                    </script>
                <?php
            }
        }
    }
    
    if(isset($_POST['edit_user'])){
        $sql = "SELECT * FROM tbl_admin WHERE email = '$email' ";
        $res = mysqli_query($link,$sql);
        
        if(mysqli_num_rows($res)>0){
            $sql = "UPDATE tbl_admin
                    SET password = '$password',
                        fname = '$fname',
                        lname = '$lname'
                    WHERE email = '$email' ";
            $res = mysqli_query($link,$sql);

            if($res==true){
                ?>
                    <script>
                        alert('User Information Updated!');
                        window.location.href = 'users.php';
                    </script>
                <?php
            }
        }else{
            header('Location:users.php');
        }    
    }  

    mysqli_close($link);
?>