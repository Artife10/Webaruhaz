<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Tradely - Adj el egy terméket</title>
    <link rel="stylesheet" href="../CSS/list.css">
    <link rel="icon" type="image/x-icon" href="../ASSETS/logo.png">
</head>
<body>

<div class="container">
    <div class="header">
        <strong style="font-size: 16px;">Adj el egy terméket</strong>
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
            <div style="font-weight: bold; font-size: 15px;">Tölts fel képeket</div>
            <p style="color: var(--text-gray); font-size: 12px; margin: 5px 0;">Akár 10 képet is feltölthetsz. Az első a borítókép.</p>
            <button type="button" class="upload-btn">Upload</button>
            <div id="preview-container"></div>
        </div>

        <div class="form-group">
            <label>Termék név</label>
            <input type="text" name="title" placeholder="Mit szeretnél eladni?" required>
        </div>

        <div class="form-group">
            <label>Kategória</label>
            <select name="category">
                <option value="">Válassz kategóriát</option>
                <option value="electronics">Elektronikai termékek</option>
                <option value="fashion">Divat</option>
                <option value="home">Otthon és kert</option>
                  <?php
                $connection = mysqli_connect("localhost", "root", "", "tradely");

                if (!$connection) {
                    die("Kapcsolódási hiba: " . mysqli_connect_error());
                }


                $sql = "SELECT * FROM `kategoria`";
                $result = mysqli_query($connection, $sql);

                while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="' . $row['katid'] . '">' . htmlspecialchars($row['katnev']) . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label>Ár</label>
            <input type="text" name="price" class="price-input" placeholder="HUF 0.00">
            <p style="font-size: 11px; color: var(--text-gray); margin-top: 5px;">Tip: hasonló termékek 15.000FT-20.000FT közt mozognak </p>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4" placeholder="Describe your item's condition, features or reasons for selling..."></textarea>
        </div>

        <button type="submit" class="publish-btn">
            <span>⬆️</span> Termék feltöltése
        </button>
        <br><br><br><br><br>
    </form>
</div>
<div class="menu">
<<<<<<< HEAD
            <table>
                <th class="roty"><a href="../PHP/explore.php"><img src="../ASSETS/explore.png" width="40px" height="40px" alt="Felfedezés"></a></th>
                <th class="roty"><a href="../PHP/sell.php"><img src="../ASSETS/add.png" alt="" width="30px" height="30px"></a></th>
                <th class="roty"><a href="../PHP/profile.php"><img src="../ASSETS/profile.png" alt="" width="40px" ;></a></th>
            </table>
        </div>
=======
    <table>
        <th class="roty"><a href="../PHP/explore.php"><img src="../ASSETS/explore.png" width="40px" height="40px" alt="Felfedezés"></a></th>
        <th class="roty"><a href="../PHP/sell.php"><img src="../ASSETS/add.png" alt="" width="30px" height="30px"></a></th>
        <th class="roty"><a href="../PHP/profile.php"><img src="../ASSETS/profile.png" alt="" width="40px" ;></a></th>
    </table>
</div>

>>>>>>> 16b0cf67bbf6741da80b080cf2cd4058113db64e
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

