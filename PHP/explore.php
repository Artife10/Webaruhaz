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
       <button><img src="../ASSETS/bell.png" width="40px" height="40px"</button> 
    </div>
   </div>
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
                                        <td>
                                            <td> <img src=".$infoItems['kep'].">".$infoItems['termeknev'].$infoItems['leiras']."</td>
                                        </td>
                            ";

            }
            echo "</tr>";
                        }

    
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