<?php
session_start();
include_once "config.php";
$name = mysqli_real_escape_string($conn, $_POST['search_user']);
if(strpos($name, " ") !== false){
    $Array = explode(" ", $name);
    $fname=$Array[0];
    $lname=$Array[1];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE (fname LIKE '{$fname}' AND lname LIKE '{$lname}') OR (fname LIKE '{$lname}' AND lname LIKE '{$fname}')");
}
else{
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE fname LIKE '{$name}' OR lname LIKE '{$name}'");
}

$wyjscie = "";
if(mysqli_num_rows($sql)>0){
    while($row = mysqli_fetch_assoc($sql)){
        $wyjscie .='<div class="find_users_user">
                        <div class="find_users_user_img"><img src="php/images/'.$row['image'].'" alt=""></div>
                        <div class="find_users_user_name">'.$row['fname'].' '.$row['lname'].'</div>
                            <form class="add_uz center" action="#" autocomplete="off">
                                <input type="text" name="odkogo_id"value="'.$_SESSION['unique_id'].'" hidden>
                                <input type="text" name="dokogo_id"value="'.$row['unique_id'].'" hidden>
                                <button class="button3 center" onclick="add_user('.$row['unique_id'].')">
                                    <svg width="30px" height="30px" class="ikona clicker" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M12 5.75v12.5"></path>
                                        <path d="M18.25 12H5.75"></path>
                                    </svg>
                                </button>
                            </form>       
                    </div>';
    }
}else{
    $wyjscie .= 'Brak użytkowników';
}
echo $wyjscie;
?>