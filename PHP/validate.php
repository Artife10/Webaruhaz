<?php

$connection = mysqli_connect("localhost", "root", "", "tradely");


if (!$connection) {
    die("Kapcsolódási hiba: " . mysqli_connect_error());
}
else {
    $nev = $_POST["nev"];
    $passw = $_POST["password"];

    $sql = "SELECT * FROM `users` WHERE `nev` LIKE '%$nev%' AND `password` LIKE '%$passw%'";
    $result = mysqli_query($connection, $sql);

    if ($result && $nev != "" && $passw != "") {
      if ($result->num_rows > 0) {
        header('Location: '."explore.php");
      }
      else {
        header('Location: '."register.php");
      }
    }
    else {
        header('Location: '."register.php");
    }
}

    
?>