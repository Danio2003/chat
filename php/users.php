<?php
session_start();
include_once "config.php";
$my_id=$_SESSION['unique_id'];
$sql = mysqli_query($conn, "SELECT 
            u.unique_id, u.fname, u.lname, u.image, u.Status, 
            MAX(w.data) AS last_message_time
            FROM friends f
            JOIN users u ON (f.friend1_id = u.unique_id OR f.friend2_id = u.unique_id)
            LEFT JOIN wiado w ON (w.odkogo_id = u.unique_id OR w.dokogo_id = u.unique_id)
            WHERE (f.friend1_id = '{$my_id}' OR f.friend2_id = '{$my_id}')
            GROUP BY u.unique_id, u.fname, u.lname, u.image, u.Status
            ORDER BY last_message_time DESC");
$wyjscie = "";
$bgcolor="";
if(mysqli_num_rows($sql)==1){
    $wyjscie.="Nie ma dostępnych użytkowników";
}elseif(mysqli_num_rows($sql)>1){
    while($row = mysqli_fetch_assoc($sql)){
        if($row['Status']=="Aktywny teraz"){
            $bgcolor = "greenyellow";
        }else{
            $bgcolor="white";
        }
        $wyjscie .='
        <a href="messenger.php?user_id='.$row['unique_id'].'">
        <div class="nav_main_konw">
        <div class="nav_main_konw_img">
            <img src="php/images/'.$row['image'].'" height="100%" class="imga">
        </div>
        <div class="aktywny" style="background-color:'.$bgcolor.';"></div>
        <div class="nav_main_konw_text">
            <p>'.$row['fname'].' '.$row['lname'].'</p>
            <p id="wiado">'.$row['Status'].'</p>
        </div>
        <div class="nav_main_konw_opt">
            <img src="ikona2.png" height="60%">
        </div>
    </div>
    </a>';
    }
}
echo $wyjscie;
?>