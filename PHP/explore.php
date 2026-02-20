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
    </div>
   <div class="searchbar">
    <div class="searchbar-left">
        <input type="text" placeholder="Irjad more">
    </div>
    <div class="searchbar-right">
       <button><img src="../ASSETS/search.png" width="30px" height="30px"</button> 
    </div>
   </div>
    <div class="grid">
        <table>
                <?php

                        $connection = mysqli_connect("localhost", "root", "", "tradely");


                        if (!$connection) {
                            die("Kapcsolódási hiba: " . mysqli_connect_error());
                        }
                        else {
                            $sql = "SELECT * FROM `termek` WHERE 1";
                            $result = mysqli_query($connection, $sql);
                            $i = 0;
                            echo "<tr>";
                            while($infoItems = $result->fetch_array()){
                                if ($i % 4 == 0) {
                                    echo"</tr><tr>";
                                }
                                $i++;
                            echo    "
                                        <td> <div class='gridhead'><img src=".$infoItems['kep']." alt='a fityfenét nem töltött be'> </div><div class='gridbody'><h1>".$infoItems['termeknev']."</h1><p>".$infoItems['leiras']."</p><button class='buy'>BUY</button></div></td>
                            ";

            }
            echo "</tr>";
                        }

    
?>
        </table>
    </div>
    <!-- ALSO VALAMI NAVBAR FOOTER-->
    <div class="menu">
        <button><img src="../ASSETS/search.png" width="40px" height="40px" alt="Keresés"></button>
        <button><img src="../ASSETS/explore.png" width="40px" height="40px" alt="Felfedezés"></button>
        <button><img src="../ASSETS/profile.png" width="40px" height="40px" alt="Profil"></button>
    </div>
</body>
</html>