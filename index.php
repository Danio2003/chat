<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="logsign.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
   <div calss="main">
       <div class="logo">
           <img src="logo.png" height="100%">
       </div>
       <div class="formularz">
           <div class="nazwa">Messenger</div>
           <form action="#" enctype="multipart/form-data" autocomplete="off">
           <div class="error-txt"></div>
           <div class="pole">
               <label>Email:</label>
               <input type="text" name="email" placeholder="Email" required>
           </div>
           <div class="pole">
               <label>Hasło:</label>
               <input type="password" name="password" placeholder="Hasło" required>
           </div>
           <div class="pole przycisk">
               <input type="submit" value="Kontynuuj">
           </div>
           Nie masz konta? <a href="signup.php">Zarejestruj się!</a>
          
       </form>
       </div>
   </div>
   <script src="javascript/login.js"></script>
</body>
</html>