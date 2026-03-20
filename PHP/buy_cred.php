<!DOCTYPE html>
<html lang="en">
<?php
session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/ex-style.css">
    <link rel="stylesheet" href="../CSS/buy_cred.css">
    <link rel="icon" type="image/x-icon" href="../ASSETS/logo.png">
    <title>Tradely</title>
</head>

<body>
    <div class="navbar">
        <div class="title">
            <img src="../ASSETS/logo.png" alt="" class='logo'>
            <h1>Explore.</h1>
        </div>
        <div class="icons">
            <button><img src="../ASSETS/bell.png" alt="" width="30px" ;></button>
            <a href="../PHP/profile.php"><button><img src="../ASSETS/profile.png" alt="" width="30px" ;></button></a>
            <a href="../PHP/buy_cred.php"><button><img src="../ASSETS/profile.png" alt="" width="30px" ;></button></a>
        </div>
    </div>
    <div class="card">
        <br>
        <form class="register" action="cred_validate.php" method="post">
            <h1>Amount:</h1>
            <h1>
            <?php
            $connection = mysqli_connect("localhost", "root", "", "tradely");
            $userid = $_SESSION['id'];
            $sql = "SELECT `cred` FROM `users` WHERE `userid` LIKE $userid;";
            $result = mysqli_query($connection, $sql);
            echo $result->fetch_assoc()['cred'];
            ?>
             </h1>
            <input type="number" name="amount" id="amount"><br>
            <button>BUY</button>
        </form>
    </div>
     <div class="menu">
            <a href="../PHP/explore.php"><button><img src="../ASSETS/explore.png" width="40px" height="40px" alt="Felfedezés"></button></a>
            <a href="../PHP/sell.php"><button><img src="../ASSETS/add.png" alt="" width="30px" height="30px"></button></a>
            <a href="../PHP/profile.php"><button><img src="../ASSETS/profile.png" alt="" width="40px" ;></button></a>
    </div>
</body>

</html>