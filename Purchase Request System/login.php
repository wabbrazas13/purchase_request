<?php
    session_start();
    include 'database/db_conn.php';

    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }else{
        $email = '';
    }

    if(isset($_POST['password'])){
        $password = $_POST['password'];
    }else{
        $password = '';
    }

    $email = stripslashes($email);
    $password = stripslashes($password);

    if(empty($email) || empty($password)){
        ?>
            <script>
                alert('Invalid Input: Please Try Again!');
                window.location.href = 'index.php';
            </script>
        <?php
    }else{
        $sql = "SELECT * FROM tbl_admin WHERE email = '$email' AND BINARY password = BINARY '$password' ";
        $res = mysqli_query($link,$sql);

        if(mysqli_num_rows($res)==1){
            $row=mysqli_fetch_assoc($res);
            $email = $row['email'];
            $password = $row['password'];
            $user_type = $row['user_type'];
            $fname = $row['fname'];
            $lname = $row['lname'];

            $sql = "UPDATE tbl_admin
                    SET status = 'online' 
                    WHERE email = '$email' ";
            $res = mysqli_query($link,$sql);

            $_SESSION['email'] = $email;
            $_SESSION['fname'] = $fname;
            $_SESSION['user_type'] = $user_type;

            if($user_type=='user'){
                ?>
                    <script>
                        alert('Welcome User!');
                        window.location.href = 'user/purchase_request_list.php';
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        alert('Welcome Admin!');
                        window.location.href = 'user/purchase_request_list.php';
                    </script>
                <?php
            }
        }
        else{
            ?>
                <script>
                    alert('Login Failed: Please check your email and password!');
                    window.location.href = 'index.php';
                </script>
            <?php
        }
    }

    session_write_close();
    mysqli_close($link);
?>