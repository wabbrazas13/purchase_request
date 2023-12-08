<?php
    session_start();
    $_SESSION['entry_no'] = $_GET['no'];
    header('Location:purchase_request_list.php');
    session_write_close();
?>