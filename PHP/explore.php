<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/ex-style.css">
    <title>Tradely</title>
</head>
<body>
    <div class="navbar">
        <div class="title">
            <h1>Explore.</h1>
        </div>
        <div class="icons">
            <button><img src="../ASSETS/bell.png" alt="" width= "30px";></button>
            <button><img src="../ASSETS/filter.png" alt="" width="30px";></button>
        </div>
    </div><form method="GET" action="">
    <div class="searchbar">
        <div class="searchbar-left">
            <input type="text" name="kereses" placeholder="Mit keresel cigany">
        </div>
        <div class="searchbar-right">
            <button type="submit"><img src="../ASSETS/bell.png" width="40px"></button> 
        </div>
    </div>
</form>

   
   <table class="searchbar">
    <tr>
        <th id="input">
            <input type="text" placeholder="Irjad more">
        </th>
        <th  id="button-search">
            <img src="../ASSETS/bell.png" width="40px" height="40px">
        </th>
    </tr>
   </table>
    <div class="grid">
        <table>
               <?php
    $connection = mysqli_connect("localhost", "root", "", "tradely");

    if (!$connection) {
    die("Kapcsolódási hiba: " . mysqli_connect_error());
}

// Ellenőrizzük, jött-e keresési kifejezés
    $keresett = "";
if (isset($_GET['kereses'])) {
    $keresett = mysqli_real_escape_string($connection, $_GET['kereses']);
}

// Alapból mindent mutat, ha nincs keresés, egyébként szűr a termék nevére
$sql = "SELECT * FROM `termek` WHERE `termeknev` LIKE '%$keresett%'";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    $i = 0;
    echo "<tr>";
    while ($infoItems = $result->fetch_array()) {
        if ($i % 4 == 0 && $i != 0) {
            echo "</tr><tr>";
        }
        echo "<td>
                <img src='".$infoItems['kep']."' width='150px'><br>
                <strong>".$infoItems['termeknev']."</strong><br>
                ".$infoItems['leiras']."
              </td>";
        $i++;
    }
    echo "</tr>";
} else {
    echo "<tr><td>Nincs találat a keresésre.</td></tr>";
}
?>


    
?>
        </table>
    </div>
    <!-- ALSO VALAMI NAVBAR FOOTER-->
    <div class="menu">
       <img src="../ASSETS/bell.png" width="40px" height="40px">
       <img src="../ASSETS/filter.png" width="40px" height="40px"> 
       <img src="../ASSETS/bell.png" width="40px" height="40px"> 
    </div>
</body>
</html>