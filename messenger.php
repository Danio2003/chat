<?php
session_start();
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<head>
    <!DOCTYPE html>
    <html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" media="screen and (max-width: 720px)" href="smallscreen.css">
    <title>Chat</title>
</head>
<body>
    <?php
    include_once "php/config.php";
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id ='{$_SESSION['unique_id']}'");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
    }
    ?>
    <div class="nav">
        <div class="nav_gora">
            <div class="nav_gora_main">
                <div class="nav_img">
                    <img src="<?php echo "php/images/".$row['image'] ?>" height="100%" class="imga">
                </div>
                <div class="nav_text">
                    <p>Czaty</p>
                </div>
                
                <div class="nav_icon">
                    
                </div>
            </div>
                    <a href="php/logout.php?logout_id=<?php echo $row['unique_id']?>">
                        <span width="40" height="40" margin-right="10">
                            <svg width="40" height="40" class="ikona" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24">
                                <path d="m15.75 8.75 3.5 3.25-3.5 3.25"></path>
                                <path d="M19 12h-8.25"></path>
                                <path d="M15.25 4.75h-8.5a2 2 0 0 0-2 2v10.5a2 2 0 0 0 2 2h8.5"></path>
                            </svg>
                        </span>
                    </a>
        </div>
        <div class="nav_sear">
            <div class="nav_sear_main">
                <p>Szukaj w Messenger</p>
            </div>
        </div>
        <div class="nav_main">
        <script src="javascript/users.js"></script>
        </div>
        <div class="nav_dol">
                <p>Wykonał Daniel Walendowski</p>
            
        </div>
    </div>
    <div class="main" id="maindiv">
        <?php
            $user_id = isset($_GET['user_id']) ? mysqli_real_escape_string($conn, $_GET['user_id']) : $_SESSION['unique_id'];
            $sql2=mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
            if(mysqli_num_rows($sql2) > 0){
                $row2 = mysqli_fetch_assoc($sql2);
            }
        ?>
        <div class="main_top">
                <div class="imieinazw">
                    <div class="main_top_img">
                        <img src="<?php echo "php/images/".$row2['image'] ?>" height="90%" class="imga prof">
                    </div>
                    <span class="column">
                        <p class="wazne"><?php echo $row2['fname']." ".$row2['lname']; ?></p>
                        <p class="status"> <?php echo $row2['Status'];?></p>
                    </span>
                </div>
                <div class="main_icon">
                    <span class="main_icon_item menu">
                        <svg width="33" height="33" class="ikona" fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M19.75 12a.75.75 0 0 0-.75-.75H5a.75.75 0 0 0 0 1.5h14a.75.75 0 0 0 .75-.75Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M19.75 7a.75.75 0 0 0-.75-.75H5a.75.75 0 0 0 0 1.5h14a.75.75 0 0 0 .75-.75Z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M19.75 17a.75.75 0 0 0-.75-.75H5a.75.75 0 0 0 0 1.5h14a.75.75 0 0 0 .75-.75Z" clip-rule="evenodd"></path>
                          </svg>
                    </span>
                    
                    <span class="main_icon_item add_friend">
                        <svg width="24" height="24" class="ikona" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 2a5 5 0 1 0 0 10 5 5 0 1 0 0-10z"></path>
                            <path d="M17 22H5.266a2 2 0 0 1-1.985-2.248l.39-3.124A3 3 0 0 1 6.649 14H7"></path>
                            <path d="M19 13v6"></path>
                            <path d="M16 16h6"></path>
                          </svg>
                    </span>
                </div>
        </div>
                <div class="main_main">
                </div>
                <div class="main_dol">
                    <form class="wysylanie" action="#" autocomplete="off">
                        <input type="text" name="odkogo_id"value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                        <input type="text" name="dokogo_id"value="<?php echo $user_id; ?>" hidden>
                        <input type="text" placeholder="Aa" name="wiadomosc" id="wysyl">
                        <button id="button1">
                            <svg width="30" height="30" class="ikona" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M9.912 12H4L2.023 4.135A.662.662 0 0 1 2 3.995c-.022-.721.772-1.221 1.46-.891L22 12 3.46 20.896c-.68.327-1.464-.159-1.46-.867a.66.66 0 0 1 .033-.186L3.5 15"></path>
                              </svg>
                        </button>
                    </form>
                    
                </div>
        </div>
    </div>
    <div class="rgt" id="rightdiv">
        <div class="find_user">
            <form class="szukaj_uz" action="#" autocomplete="off">
                <input type="text" placeholder="Szukaj użytkownika" class="szukaj_uzytkownika center" name="search_user">
                <button class="button2">
                    <svg width="20" height="20" class="ikona" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M10 17a7 7 0 1 0 0-14 7 7 0 0 0 0 14Z"></path>
                        <path d="m21 21-6-6"></path>
                      </svg>
                </button>
            </form>
            <div class="find_users">
                <script src="javascript/search.js"></script>
            </div>
        </div>
        <div class="requests">
            <div class="center request_top">
                Moje zaproszenia
            </div>
            <div class="find_users">
                
            </div>
        </div>
    </div>
    <script>
        document.querySelector('.add_friend').addEventListener('click', function(){
            document.getElementById('rightdiv').classList.toggle('active');
            document.getElementById('maindiv').classList.toggle('active');
        });
    </script>
    <script src="javascript/chat.js"></script>
    <script src="javascript/add.js"></script>
    <script src="javascript/requests.js"></script>
    
</body>
</html>