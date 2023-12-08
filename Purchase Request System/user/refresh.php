<?php
    session_start();
    $_SESSION['search'] = '';
    $_SESSION['m'] = 0;
    $_SESSION['y'] = 0;
    $_SESSION['yd'] = 'ALL';
    $_SESSION['md'] = 'ALL';

    header('Location:purchase_request_list.php');
    session_write_close();
?>