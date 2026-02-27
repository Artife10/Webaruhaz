<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "tradely");

if (isset($_POST['modositas'])) {
    $regi_nev = $_SESSION['nev'];
    $uj_nev = mysqli_real_escape_string($connection, $_POST['uj_nev']);

    if (!empty($uj_nev)) {
      
        $sql = "UPDATE `users` SET `nev` = '$uj_nev' WHERE `nev` = '$regi_nev'";
        
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