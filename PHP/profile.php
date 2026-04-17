<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/prof-style.css">
    <link rel="icon" type="image/x-icon" href="../ASSETS/logo.png">
    <title>Tradely - Profile</title>
</head>
<body>
<div class="card">
    <div class="avatar-container">
        <div class="avatar-ring">
            <img src="../ASSETS/avatar.png" alt="User Avatar">
        </div>
        <div class="icon-badge"></div>
    </div>
    
    <h1><?php echo htmlspecialchars($_SESSION['nev']); ?></h1>
    <hr>  
    <form action="update_profile.php" method="POST">
        <p>Név</p>
        <input id="input" type="text" name="uj_nev" placeholder="Írd a neved ide" required>     
        <p>Jelszó</p>
        <input id="input" type="password" name="uj_passw" placeholder="Hagyd üresen ha nem szeretnél váltani"><br>
        <?php

  
  $plaintext_password = "Password@123";

  
  $hash = password_hash($plaintext_password, 
          PASSWORD_DEFAULT);
?>
        <button type="submit" name="modositas" class="edit-btn">Mentés</button>
    </form>
    
    
    <button id="grey"><a href="../PHP/logout.php"><b>Kijelentkezés</b></a></button>
</div>
       <!-- ALSO VALAMI NAVBAR FOOTER-->
<div class="menu">
            <table>
                <th class="roty"><a href="../PHP/explore.php"><img src="../ASSETS/explore.png" width="40px" height="40px" alt="Felfedezés"></a></th>
                <th class="roty"><a href="../PHP/sell.php"><img src="../ASSETS/add.png" alt="" width="30px" height="30px"></a></th>
                <th class="roty"><a href="../PHP/profile.php"><img src="../ASSETS/profile.png" alt="" width="40px" ;></a></th>
            </table>
        </div>
</body>
</html>


