
<style>
    body { background-color: #0d1a0d; color: white; font-family: sans-serif; display: flex; justify-content: center; padding: 20px; }
    .container { width: 100%; max-width: 450px; background: #122112; padding: 20px; border-radius: 12px; }
    .upload-box { border: 2px dashed #28a745; border-radius: 12px; padding: 30px; text-align: center; margin-bottom: 20px; }
    .input-group { margin-bottom: 15px; }
    label { display: block; margin-bottom: 5px; color: #88a088; }
    input, select, textarea { width: 100%; padding: 12px; background: #1a2e1a; border: none; color: white; border-radius: 8px; box-sizing: border-box; }
    .btn-publish { width: 100%; padding: 15px; background: #2ecc71; border: none; color: #0d1a0d; font-weight: bold; border-radius: 8px; cursor: pointer; margin-top: 10px; }
</style>





        
<div class="container">
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="upload-box">
            <input type="file" name="image" accept="image/*" id="file" style="display:none;">
            <label for="file" style="cursor:pointer; color:#2ecc71;"><b>Tölts fel képeket</b></label>
            <p style="font-size: 0.8em; color: #88a088;">Akár 10 képet is feltölthetsz</p>
        </div>

        <div class="input-group">
            <label>Title</label>
            <input type="text" name="title" placeholder="Mit szeretnél eladni?" required>
        </div>

        <div class="input-group">
            <label>Kategória</label>
            <select name="category">
                <option>Válassz kategóriát</option>
                <option value="electronics">Elektronikai termék</option>
                <option value="fashion">Divat</option>
            </select>
        </div>

        <div class="input-group">
            <label>Ár</label>
            <input type="number" name="price" placeholder="HUF 0" step="0.01">
        </div>

        <div class="input-group">
            <label>Leírás</label>
            <textarea name="description" rows="4" placeholder="Írj pár gondolatot a termékről"></textarea>
        </div>

        <!-- Ide került a Piszkozat gomb, a fő formon belülre -->
        <button type="submit" name="status" value="draft" style="width: 100%; padding: 10px; background: transparent; border: 1px solid #28a745; color: #28a745; border-radius: 8px; cursor: pointer; margin-bottom: 10px;">
            Piszkozat mentése
        </button>

        <button type="submit" name="status" value="publish" class="btn-publish">Tedd fel a terméket</button>
        
        <div style="text-align: center; margin-top: 15px;">
            <a href="index.php" style="color: #88a088; text-decoration: none; font-size: 0.9em;">Mégse</a>
        </div>
    </form>
</div>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = htmlspecialchars($_POST['title']);
    $price = $_POST['price'];
    
    // Képkezelés
    if (isset($_FILES) && $_FILES['error'] === UPLOAD_ERR_OK) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) mkdir($targetDir);
        
        $fileName = time() . "_" . basename($_FILES["name"]);
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["tmp_name"], $targetFilePath)) {
            echo "Sikeres feltöltés! Termék: $title ($price USD).";
        } else {
            echo "Hiba történt a fájl mentésekor.";
        }
    }
}
?>
