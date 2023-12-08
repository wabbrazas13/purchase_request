<?php
    session_start();
    $_SESSION['m'] = $_GET['m'];
    $m = $_GET['m'];
    if($m==0){
        $md = 'ALL';
    }elseif($m=='01'){
        $md = 'JAN';
    }elseif($m=='02'){
        $md = 'FEB';
    }elseif($m=='03'){
        $md = 'MAR';
    }elseif($m=='04'){
        $md = 'APR';
    }elseif($m=='05'){
        $md = 'MAY';
    }elseif($m=='06'){
        $md = 'JUN';
    }elseif($m=='07'){
        $md = 'JUL';
    }elseif($m=='08'){
        $md = 'AUG';
    }elseif($m=='09'){
        $md = 'SEP';
    }elseif($m=='10'){
        $md = 'OCT';
    }elseif($m=='11'){
        $md = 'NOV';
    }elseif($m=='12'){
        $md = 'DEC';
    }
    $_SESSION['md'] = $md;
    header('Location:purchase_request_list.php');
    session_write_close();
?>