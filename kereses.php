<?php

$connection = mysqli_connect("localhost", "root", "", "blog1");


if (!$connection) {
    die("Kapcsolódási hiba: " . mysqli_connect_error());
}


if (isset($_GET['search'])) {
    $safe_value = mysqli_real_escape_string($connection, $_GET['search']);

    
    $sql = "SELECT * FROM posts WHERE title LIKE '%$safe_value%'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>" . htmlspecialchars($row['title']) . "</p>";
        }
    } else {
        echo "Hiba a lekérdezésben: " . mysqli_error($connection);
    }
}
?>

