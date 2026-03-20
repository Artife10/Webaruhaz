<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/ex-style.css">
    <link rel="icon" type="image/x-icon" href="../ASSETS/logo.png">
    <title>Tradely</title>
    <style>
        
        .grid td { vertical-align: top; padding: 10px; text-align: center; }
        .grid img { width: 100%; display: block; margin-bottom: 0; }
        .grid h3 { margin: 5px 0 0 0; font-size: 14px; color: #555; }
        .grid h1 { margin: 0; font-size: 22px; font-weight: bold; }
        .grid p { margin: 5px 0; }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="title">
            <img src="../ASSETS/logo.png" alt="" class='logo'>
            <h1>Explore.</h1>
        </div>
        <div class="icons">
            <button><img src="../ASSETS/bell.png" alt="" width="30px"></button>
            <a href="../PHP/profile.php"><button><img src="../ASSETS/profile.png" alt="" width="30px"></button></a>
            <a href="../PHP/buy_cred.php"><button><img src="../ASSETS/profile.png" alt="" width="30px"></button></a>
        </div>
    </div>

    <form method="GET" action="">
        <div class="searchbar">
            <div class="searchbar-left">
                <input type="text" name="kereses" placeholder="Search" value="<?php echo isset($_GET['kereses']) ? htmlspecialchars($_GET['kereses']) : ''; ?>">
            </div>
            <div class="searchbar-right">
                <button type="submit"><img src="../ASSETS/bell.png" width="40px"></button>
            </div>
        </div>

        <div class="grid">
            <table style="width: 100%; border-collapse: collapse;">
                <?php
                $connection = mysqli_connect("localhost", "root", "", "tradely");

                if (!$connection) {
                    die("Kapcsolódási hiba: " . mysqli_connect_error());
                }

                $keresett = "";
                if (isset($_GET['kereses'])) {
                    $keresett = mysqli_real_escape_string($connection, $_GET['kereses']);
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
                        
                        echo "<td>
                                <img src='" . $infoItems['kep'] . "' alt='termék képe'>
                                <h3>" . $infoItems['hely'] . "</h3>
                                <h1>" . $infoItems['termeknev'] . "</h1>
                                <p>" . $infoItems['leiras'] . "</p>
                                <button class='500FT'>500FT</button>
                              </td>";
                        $i++;
                    }
                    echo "</tr>";
                }
                mysqli_close($connection);
                ?>
            </table>
        </div>

        <div class="menu">
            <a href="../PHP/explore.php"><button type="button"><img src="../ASSETS/explore.png" width="40px" height="40px"></button></a>
            <a href="../PHP/sell.php"><button type="button"><img src="../ASSETS/add.png" width="30px" height="30px"></button></a>
            <a href="../PHP/profile.php"><button type="button"><img src="../ASSETS/profile.png" width="40px"></button></a>
        </div>
    </form>
</body>

</html>
