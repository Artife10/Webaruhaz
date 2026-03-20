<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "tradely");

if (isset($_POST['modositas'])) {
    $regi_nev = $_SESSION['nev'];
    $uj_nev = $_POST['uj_nev'];
    $uj_jelszo = $_POST['uj_passw'];

    if (!empty($uj_nev)) {
      
        $sql = "UPDATE `users` SET `nev` = '$uj_nev', `password` = '$uj_jelszo' WHERE `nev` = '$regi_nev'";
        
        if (mysqli_query($connection, $sql)) {
           
            $_SESSION['nev'] = $uj_nev;
            
            header("Location: profile.php?success=updated");
            exit();
        } else {
            echo "Hiba a frissítés során: " . mysqli_error($connection);
        }
    }
}
?>