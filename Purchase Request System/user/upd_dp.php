<?php
    include '../database/db_conn.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $prev_email = $_POST['prev_email'];
    $email = $_POST['email'];
    $password2 = $_POST['password2'];
    $password3 = $_POST['password3'];

    if(isset($_POST['upd_dp'])){
        $sql = "UPDATE tbl_admin
                SET fname = '$fname',
                    lname = '$lname',
                    email = '$email'
                WHERE email = '$prev_email' ";
        $res = mysqli_query($link,$sql);

        if($res==true){
            ?>
                <script>
                    alert('Profile Updated!');
                    window.location.href = 'profile.php';
                </script>
            <?php
        }
    }
    
    if(isset($_POST['upd_pass'])){
        if($password2==$password3){
            if(!empty($password2)){
                $sql = "UPDATE tbl_admin
                        SET password = '$password2'
                        WHERE email = '$prev_email' ";
                $res = mysqli_query($link,$sql);

                if($res==true){
                    ?>
                        <script>
                            alert('Password Changed.');
                            window.location.href = 'profile.php';
                        </script>
                    <?php
                }
            }else{
                ?>
                    <script>
                        alert("Invalid Password.");
                        window.location.href = 'profile.php';
                    </script>
                <?php
            }
        }else{
            ?>
                <script>
                    alert("Password don't match.");
                    window.location.href = 'profile.php';
                </script>
            <?php
        }
    }

    mysqli_close($link);
?>