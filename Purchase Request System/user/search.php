<?php
    session_start();
    if(isset($_POST['search'])){
        $search = $_POST['search'];
    }else{
        $search = '';
    }
    $_SESSION['search'] = $search;
    header('Location:purchase_request_list.php');
    session_write_close();
?>