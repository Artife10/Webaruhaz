<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/prof-style.css">
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

    <!-- A form nyitása -->
    <form action="update_profile.php" method="POST">
        <p>Name</p>
        <input id="input" type="text" name="uj_nev" placeholder="Write your name here" value="<?php echo htmlspecialchars($_SESSION['nev']); ?>" required>
        
        <p>Password</p>
        <input id="input" type="password" name="uj_passw" placeholder="New password (leave empty to keep current)"><br>
        
        <!-- A gombnak a formon BELÜL kell lennie -->
        <button type="submit" name="modositas" class="edit-btn">Save Changes</button>
    </form> 
    <!-- A form zárása az összes input után -->
</div>
        
</body>
</html>


