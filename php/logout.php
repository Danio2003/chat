<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Nie aktywny";
            $sql = mysqli_query($conn, "UPDATE users SET Status = '{$status}' WHERE unique_id = {$logout_id}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../index.php");
            }
        }else{
            header("location: ../messenger.php");
        }
    }else{
        header("location: ../index.php");
    }
?>