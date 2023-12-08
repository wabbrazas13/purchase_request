<?php
    session_start();
    $_SESSION['y'] = $_GET['y'];
    $y = $_GET['y'];
    if($y==0){
        $yd = 'ALL';
    }elseif($y=='2021'){
        $yd = '2021';
    }elseif($y=='2022'){
        $yd = '2022';
    }elseif($y=='2023'){
        $yd = '2023';
    }elseif($y=='2024'){
        $yd = '2024';
    }elseif($y=='2025'){
        $yd = '2025';
    }
    $_SESSION['yd'] = $yd;
    header('Location:purchase_request_list.php');
    session_write_close();
?>