<?php
    session_start();

    $connection = mysqli_connect("localhost", "root", "", "tradely");
    $person = $_SESSION['id'];
    $itemid = $_POST["buy"];
    $sql = "SELECT `cred` FROM `users` WHERE `userid` LIKE $person;";
    $result = mysqli_query($connection, $sql);
    $personcred = $result->fetch_assoc()["cred"];
    $sql = "SELECT `ar` FROM `termek` WHERE `termekid` LIKE $itemid;";
    $result = mysqli_query($connection, $sql);
    echo "<script type='text/javascript'>alert('$itemid');</script>";
    $amount = $result->fetch_assoc()["ar"];
    if ($personcred-$amount >= 0) {
        $sql = "UPDATE `users` SET `cred`= `cred`-$amount WHERE `userid` LIKE $person;";
        $result = mysqli_query($connection, $sql);

        $sql = "DELETE FROM `termek` WHERE `termekid` LIKE $itemid;";
        $result = mysqli_query($connection, $sql);
    }
    else{
        echo "az gatya";
    }
    
    header('Location: ' . "explore.php");    


?>