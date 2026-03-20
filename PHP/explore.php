<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/ex-style.css">
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
    <form method="GET" action="">
        <div class="searchbar">
            <div class="searchbar-left">
                <input type="text" name="kereses" placeholder="Search">
            </div>
            <div class="searchbar-right">
                <button type="submit"><img src="../ASSETS/bell.png" width="40px"></button>
            </div>
        </div>

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

                if (!$connection) {
                    die("Kapcsolódási hiba: " . mysqli_connect_error());
                }
                if (str_contains($keresett, ':') != TRUE) {
                    $sql = "SELECT * FROM `termek` WHERE `termeknev` LIKE '%$keresett%'";
                } else {
                    $keresett = ltrim($keresett, ":");
                    $sql = "SELECT * FROM termek INNER JOIN kategoria ON kategoria.katid = termek.katid WHERE kategoria.katnev LIKE '%$keresett%';";
                }

                $result = mysqli_query($connection, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $i = 0;
                    echo "<tr>";
                    while ($infoItems = $result->fetch_array()) {
                        if ($i % 4 == 0 && $i != 0) {
                            echo "</tr><tr>";
                        }
<<<<<<< Updated upstream
                        echo "<td><div class='gridhead'><img src=" . $infoItems['kep'] . " alt='a fityfenét nem töltött be'><h3>" . $infoItems['hely'] . "</h3><h1>" . $infoItems['termeknev'] . "</h1><p>" . $infoItems['leiras'] . "</p><button class='buy'>BUY</button></div></td>";
=======
                        echo "<td><div class='gridhead'><img src=" . $infoItems['kep'] . " alt='a fityfenét nem töltött be'></div><div class='gridbody'><h3>" . $infoItems['hely'] . "</h3><h1>" . $infoItems['termeknev'] . "</h1><p>" . $infoItems['leiras'] . "</p><button class='buy'>BUY</button></div></td>";
>>>>>>> Stashed changes
                        $i++;
                    }
                }
                echo "</tr>";
                ?>


            </table>
        </div>
        <!-- ALSO VALAMI NAVBAR FOOTER-->
        <div class="menu">
            <a href="../PHP/explore.php"><button><img src="../ASSETS/explore.png" width="40px" height="40px" alt="Felfedezés"></button></a>
            <a href="../PHP/sell.php"><button><img src="../ASSETS/add.png" alt="" width="30px" height="30px"></button></a>
            <a href="../PHP/profile.php"><button><img src="../ASSETS/profile.png" alt="" width="40px" ;></button></a>
        </div>
</body>

</html>