<?php
    $conn = mysqli_connect("localhost","root","","chat");
    if(!$conn){
        echo "Niepołączono z bazą danych".mysqli_connect_error();
    }
?>