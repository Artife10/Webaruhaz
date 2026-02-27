<?php
session_start();
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
        $row = mysqli_fetch_assoc($result); 
        $_SESSION['nev'] = $row['nev'];
        header('Location: '."explore.php");
      }
      else {
        header('Location: '."login.php");
      }
    }
    else {
        header('Location: '."login.php");
    }


}



    
?>