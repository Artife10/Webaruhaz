<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "tradely");

$uzenet = "";
$target_dir = "uploads/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cim = mysqli_real_escape_string($connection, $_POST['title']);
    $kategoria = mysqli_real_escape_string($connection, $_POST['category']);
    $ar = mysqli_real_escape_string($connection, $_POST['price']);
    $leiras = mysqli_real_escape_string($connection, $_POST['description']);
    $userid = $_SESSION['id'];

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $feltoltott_db = 0;
    $elso_kep_utvonal = "";

    if (!empty($_FILES['photos']['name'][0])) {

        foreach ($_FILES['photos']['name'] as $key => $val) {

            $ujNev = time() . "_" . $key . ".png";
            $targetFilePath = $target_dir . $ujNev;

            if (move_uploaded_file($_FILES['photos']['tmp_name'][$key], $targetFilePath)) {

                if ($feltoltott_db == 0) {
                    $elso_kep_utvonal = $targetFilePath;
                }

                $feltoltott_db++;
            }
        }
    }

    // TERMÉK MENTÉSE
    $sql = "INSERT INTO termek (termeknev, katid, ar, leiras, userid, kep, hely)
            VALUES ('$cim', '$kategoria', '$ar', '$leiras', '$userid', '$elso_kep_utvonal', 'Szentes')";

    if (mysqli_query($connection, $sql)) {
        $uzenet = "Sikeresen közzétéve! ($feltoltott_db kép feltöltve)";
    } else {
        $uzenet = "Hiba történt: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Tradely - List New Item</title>
    <link rel="stylesheet" href="../CSS/list.css">
    <link rel="icon" type="image/x-icon" href="../ASSETS/logo.png">
</head>
<body>

<div class="container">
    <div class="header">
        <strong style="font-size: 16px;">List New Item</strong>
    </div>

    <?php if ($uzenet): ?>
        <div class="status-msg"><?php echo $uzenet; ?></div>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
        
        <input type="file" name="photos[]" id="fileInput" multiple accept="image/*" style="display: none;" onchange="showPreview(this)">
        
        <div class="upload-section" onclick="document.getElementById('fileInput').click()">
            <div class="upload-icon">📸</div>
            <div style="font-weight: bold; font-size: 15px;">Add Photos</div>
            <p style="color: var(--text-gray); font-size: 12px; margin: 5px 0;">Up to 10 photos. First one is the cover.</p>
            <button type="button" class="upload-btn">Upload</button>
            <div id="preview-container"></div>
        </div>

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" placeholder="What are you selling?" required>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="category">
                <?php
                $sql = "SELECT * FROM `kategoria`";
                $result = mysqli_query($connection, $sql);

                while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="' . $row['katid'] . '">' . htmlspecialchars($row['katnev']) . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="price-input" placeholder="HUF 0.00">
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4" placeholder="Describe your item..."></textarea>
        </div>

        <button type="submit" class="publish-btn">
            <span>⬆️</span> Publish Listing
        </button>
    </form>
</div>

<script>
function showPreview(input) {
    const container = document.getElementById('preview-container');
    container.innerHTML = "";
    
    if (input.files) {
        Array.from(input.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement("img");
                img.src = e.target.result;
                img.className = "preview-img";
                container.appendChild(img);
            }
            reader.readAsDataURL(file);
        });
    }
}
</script>

</body>
</html>
