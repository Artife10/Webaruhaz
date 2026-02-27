<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/prof-style.css">
    <link rel="icon" type="image/x-icon" href="../ASSETS/favicon.ico">
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
    <p>Member since 2026.</p>
    <hr>  
    <form action="update_profile.php" method="POST">
        <p>Name</p>
        <input id="input" type="text" name="uj_nev" placeholder="Write your name here" value="<?php echo htmlspecialchars($_SESSION['nev']); ?>" required>     
        <p>Password</p>
        <input id="input" type="password" name="uj_passw" placeholder="Leave empty to keep current"><br>
        <button type="submit" name="modositas" class="edit-btn">Save Changes</button>
    </form> 
</div>
       <!-- ALSO VALAMI NAVBAR FOOTER-->
<div class="menu">
    <button><img src="../ASSETS/search.png" width="40px" height="40px" alt="Keresés"></button>
    <a href="../PHP/explore.php"><button><img src="../ASSETS/explore.png" width="40px" height="40px" alt="Felfedezés"></button></a>
    <a href="../PHP/profile.php"><button><img src="../ASSETS/profile.png" alt="" width="40px";></button></a>
    <a href="../PHP/sell.php"><button><img src="../A" alt=""></button></a>
</div>
</body>
</html>


