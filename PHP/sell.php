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
    <title>List New Item</title>
    <style>
        /* --- 2. DESIGN (CSS) --- */
        :root {
            --bg-color: #0a110a;
            --card-bg: #141d14;
            --input-bg: #1c271c;
            --accent-green: #2ecc71;
            --text-white: #ffffff;
            --text-gray: #888;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-white);
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }

        .container { width: 100%; max-width: 450px; }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0 20px 0;
            font-size: 14px;
        }

        /* Feltöltő zóna */
        .upload-section {
            border: 2px dashed #263626;
            border-radius: 15px;
            padding: 30px 20px;
            text-align: center;
            background-color: var(--card-bg);
            margin-bottom: 20px;
            cursor: pointer;
        }

        .upload-icon { font-size: 32px; color: var(--accent-green); margin-bottom: 10px; }
        
        .upload-btn {
            background-color: #1a2e1a;
            color: var(--accent-green);
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: bold;
            margin-top: 10px;
            cursor: pointer;
        }

        #preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 15px;
            justify-content: center;
        }

        .preview-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #333;
        }

        /* Űrlap elemek */
        .form-group { margin-bottom: 18px; }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
        }

        input, select, textarea {
            width: 100%;
            background-color: var(--input-bg);
            border: none;
            border-radius: 10px;
            padding: 14px;
            color: white;
            font-size: 15px;
            box-sizing: border-box;
        }

        input::placeholder, textarea::placeholder { color: #555; }

        .price-input { color: var(--accent-green); font-weight: bold; }

        .publish-btn {
            width: 100%;
            background-color: var(--accent-green);
            color: #000;
            border: none;
            padding: 16px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .status-msg {
            background: #1a331a;
            color: var(--accent-green);
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <span style="color: var(--text-gray); cursor: pointer;">Cancel</span>
        <strong style="font-size: 16px;">List New Item</strong>
        <span style="color: var(--accent-green); cursor: pointer;">Drafts</span>
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
                <option value="electronics">Electronics</option>
                <option value="fashion">Fashion</option>
                <option value="home">Home & Garden</option>
            </select>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="price-input" placeholder="$ 0.00">
            <p style="font-size: 11px; color: var(--text-gray); margin-top: 5px;">Tip: Similar items sell for $45 - $60</p>
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
