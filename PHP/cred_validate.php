<?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "", "tradely");
    $person = $_SESSION['id'];
    $amount = $_POST["amount"];

    echo $amount;

    $sql = "UPDATE `users` SET `cred`= `cred` + $amount WHERE `userid` LIKE $person";
    $result = mysqli_query($connection, $sql);
    header('Location: '.'buy_cred.php');


?>