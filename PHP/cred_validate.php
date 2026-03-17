<?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "", "tradely");
    $person = $_SESSION['id'];

    $sql = "UPDATE `users` SET `cred`='' WHERE `userid` LIKE %$person%"



?>