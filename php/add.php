<?php
session_start();
include_once "config.php";

$odkogo_id = $_SESSION['unique_id'];
$dokogo_id = mysqli_real_escape_string($conn, $_POST['user_id']);

$sql1 = mysqli_query($conn, "SELECT * FROM requests 
    WHERE (odkogo_id = '{$odkogo_id}' AND dokogo_id = '{$dokogo_id}') 
    OR (odkogo_id = '{$dokogo_id}' AND dokogo_id = '{$odkogo_id}')");

$sql2 = mysqli_query($conn, "SELECT * FROM friends 
    WHERE (friend1_id = '{$odkogo_id}' AND friend2_id = '{$dokogo_id}') 
    OR (friend1_id = '{$dokogo_id}' AND friend2_id = '{$odkogo_id}')");

if (mysqli_num_rows($sql1) == 0 && mysqli_num_rows($sql2) == 0) {
    $sql3 = mysqli_query($conn, "INSERT INTO requests (odkogo_id, dokogo_id) 
                                VALUES ('{$odkogo_id}','{$dokogo_id}')");
    if ($sql3) {
        echo "Zaproszenie zostało wysłane.";
    } else {
        echo "Błąd: " . mysqli_error($conn);
    }
} else {
    echo "Użytkownik jest już znajomym lub zaproszenie zostało już wysłane.";
}
?>
