<!DOCTYPE html>
<html lang="en">
<?php
session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/buy_cred.css">
    <link rel="icon" type="image/x-icon" href="../ASSETS/logo.png">
    <title>Tradely</title>
</head>

<body>
    <div class="card">
        <h1>
            <?php
            $connection = mysqli_connect("localhost", "root", "", "tradely");
            $userid = $_SESSION['id'];
            $sql = "SELECT `cred` FROM `users` WHERE `userid` LIKE %$userid%;";
            $result = mysqli_query($connection, $sql);
            echo $result->fetch_assoc()['cred'];
            ?>
        </h1>
        <br>
        <br>
        <br>
        <form class="register" action="cred_validate.php" method="post">
            <h1>Amount:</h1>
            <input type="number"><br>
            <button>BUY</button>
        </form>
    </div>
</body>

</html>