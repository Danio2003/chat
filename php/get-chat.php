<?php
session_start();
if(isset($_SESSION['unique_id'])){
    include_once "config.php";
    $odkogo_id = mysqli_real_escape_string($conn, $_POST['odkogo_id']);
    $dokogo_id = mysqli_real_escape_string($conn, $_POST['dokogo_id']);
    $wiadomosc = "";

    $sql = "SELECT * FROM wiado WHERE (odkogo_id = {$odkogo_id} AND dokogo_id = {$dokogo_id})
            OR (odkogo_id = {$dokogo_id} AND dokogo_id = {$odkogo_id}) ORDER BY id DESC";
    $query = mysqli_query($conn, $sql);
    $sql2=mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$dokogo_id}");
            if(mysqli_num_rows($sql2) > 0){
                $row2 = mysqli_fetch_assoc($sql2);
            }
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            if($row['dokogo_id'] === $dokogo_id){
                $wiadomosc.='<div class="wiado">'.$row['wiado'].'</div>';
            }else{
                $wiadomosc.='<div class="wiado_ktos">
                <div class="wiado_ktos_img"><img src="php/images/'.$row2['image'].'" height="100%" class="imga"></div>
                <div class="wiado_ktos_text">'.$row['wiado'].'</div>
                </div>';
            }
        }
        echo $wiadomosc;
    }
}else{
    header("../login.php");
}
?>