<?php
// --- 1. PHP ADATFELDOLGOZÁS ---
$uzenet = "";
$target_dir = "uploads/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Adatok begyűjtése
    $cim = $_POST['title'] ?? '';
    $kategoria = $_POST['category'] ?? '';
    $ar = $_POST['price'] ?? '';
    $leiras = $_POST['description'] ?? '';

    // Mappa létrehozása a képeknek
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Képek feltöltése
    $feltoltott_db = 0;
    if (!empty($_FILES['photos']['name'][0])) {
        foreach ($_FILES['photos']['name'] as $key => $val) {
            $fileName = basename($_FILES['photos']['name'][$key]);
            $targetFilePath = $target_dir . time() . "_" . $fileName;
            
            if (move_uploaded_file($_FILES['photos']['tmp_name'][$key], $targetFilePath)) {
                $feltoltott_db++;
            }
        }
        $uzenet = "Sikeresen közzétéve! ($feltoltott_db kép feltöltve)";
    } else {
        $uzenet = "Hirdetés közzétéve képek nélkül.";
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
    <link rel="icon" type="image/x-icon" href="../ASSETS/favicon.ico">
</head>
<body>

<div class="container">
    <div class="header">
        <span style="color: var(--text-gray); cursor: pointer;"></span>
        <strong style="font-size: 16px;">List New Item</strong>
        <span style="color: var(--accent-green); cursor: pointer;"></span>
    </div>

    <?php if ($uzenet): ?>
        <div class="status-msg"><?php echo $uzenet; ?></div>
    <?php endif; ?>

    <!-- --- 3. FORM (HTML) --- -->
    <form action="" method="POST" enctype="multipart/form-data">
        
        <!-- Képfeltöltés -->
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
                <option value="">Select a category</option>
                <option value="electronics">Elektronikai termékek</option>
                <option value="fashion">Divat</option>
                <option value="home">Házi eszközök és kert</option>
            </select>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="price-input" placeholder="$ 0.00">
            <p style="font-size: 11px; color: var(--text-gray); margin-top: 5px;">Tip: hasonló termékek 15.000FT-20.000FT közt mozognak </p>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4" placeholder="Describe your item's condition, features or reasons for selling..."></textarea>
        </div>

        <button type="submit" class="publish-btn">
            <span>⬆️</span> Publish Listing
        </button>
    </form>
</div>
<div class="menu">
    <a href="../PHP/explore.php"><button><img src="../ASSETS/explore.png" width="40px" height="40px" alt="Felfedezés"></button></a>
    <a href="../PHP/sell.php"><button><img src="../ASSETS/add.png" alt="" width="30px" height="30px"></button></a>
    <a href="../PHP/profile.php"><button><img src="../ASSETS/profile.png" alt="" width="40px";></button></a>
</div>

<script>
// --- 4. INTERAKCIÓ (JS) ---
function showPreview(input) {
    const container = document.getElementById('preview-container');
    container.innerHTML = ""; // Régi előnézet törlése
    
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
>>>>>>> e8412fe0d3251bafb33487346ee0846d0fb1500f
