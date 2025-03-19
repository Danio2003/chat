<?php
session_start();
if(isset($_SESSION['unique_id'])){
    include_once "config.php";
    $odkogo_id = mysqli_real_escape_string($conn, $_POST['odkogo_id']);
    $dokogo_id = mysqli_real_escape_string($conn, $_POST['dokogo_id']);
    $wiadomosc = mysqli_real_escape_string($conn, $_POST['wiadomosc']);
    $timestamp = date("Y-m-d H:i:s");


    if(!empty($wiadomosc)){
        $sql = mysqli_query($conn, "INSERT INTO wiado (odkogo_id, dokogo_id, wiado, data)
                            VALUES ({$odkogo_id},{$dokogo_id},'{$wiadomosc}','{$timestamp}')") or die();
    }
}else{
    header("../login.php");
}
?>