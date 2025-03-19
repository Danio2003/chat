<?php
session_start();
include_once "config.php";

$dokogo_id = $_SESSION['unique_id'];
$odkogo_id = mysqli_real_escape_string($conn, $_POST['user_id']);

$sql1 = mysqli_query($conn, "INSERT INTO friends (friend1_id, friend2_id) 
                            VALUES ('{$odkogo_id}','{$dokogo_id}')");

if ($sql1) {
    $sql2 = mysqli_query($conn, "DELETE FROM requests WHERE odkogo_id='{$odkogo_id}' AND dokogo_id='{$dokogo_id}'");

    if ($sql2) {
        echo "Dodano do znajomych i usunięto zaproszenie!";
    } else {
        echo "Błąd przy usuwaniu zaproszenia: " . mysqli_error($conn);
    }
} else {
    echo "Błąd przy dodawaniu do znajomych: " . mysqli_error($conn);
}
?>