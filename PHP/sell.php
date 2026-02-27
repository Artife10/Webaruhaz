<?php
// 1. ADATFELDOLGOZÁS (PHP)
$uzenet = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Itt kapod meg az adatokat az űrlapról
    $cim = $_POST['title'] ?? 'Nincs megadva';
    $ar = $_POST['price'] ?? '0';
    
    // Itt végezhetnél adatbázisba mentést (pl. MySQL)
    // Most csak egy visszajelzést adunk:
    $uzenet = "Sikeres feltöltés: " . htmlspecialchars($cim) . " (" . htmlspecialchars($ar) . ")";
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hirdetés Kezelő</title>
    <style>
        /* 2. MEGJELENÉS (CSS) - A képed alapján */
        :root {
            --hatter: #0a0e0a;
            --kartya: #131a13;
            --bevitel: #1c261c;
            --zold: #21e67b;
            --szurke: #8a8e8a;
            --feher: #ffffff;
        }

        body {
            background-color: var(--hatter);
            color: var(--feher);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .app-container {
            width: 100%;
            max-width: 400px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            font-size: 14px;
            font-weight: 500;
        }

        .header .cancel { color: var(--szurke); cursor: pointer; }
        .header .drafts { color: var(--zold); cursor: pointer; }

        .upload-box {
            background-color: var(--kartya);
            border: 2px dashed #2a362a;
            border-radius: 15px;
            text-align: center;
            padding: 40px 20px;
            margin: 20px 0;
        }

        .upload-icon {
            font-size: 40px;
            color: var(--zold);
            margin-bottom: 10px;
        }

        .upload-btn {
            background-color: #1a2e1a;
            color: var(--zold);
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 15px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            background-color: var(--bevitel);
            border: none;
            border-radius: 12px;
            padding: 15px;
            color: white;
            font-size: 14px;
            box-sizing: border-box;
        }

        .price-text {
            color: var(--zold);
            font-weight: bold;
        }

        .publish-btn {
            width: 100%;
            background-color: var(--zold);
            color: black;
            border: none;
            padding: 16px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .status-msg {
            background: #1a331a;
            color: var(--zold);
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="app-container">
    <div class="header">
        <div class="cancel">Mégse</div>
        <div>Új hirdetés</div>
        <div class="drafts">Vázlatok</div>
    </div>

    <?php if ($uzenet): ?>
        <div class="status-msg"><?php echo $uzenet; ?></div>
    <?php endif; ?>

    <!-- 3. SZERKEZET (HTML) -->
    <form action="" method="POST">
        <div class="upload-box">
            <div class="upload-icon">📸</div>
            <div style="font-weight: bold;">Fotók hozzáadása</div>
            <div style="font-size: 11px; color: var(--szurke); margin-top: 5px;">
                Maximum 10 fotó. Az első lesz a borítókép.
            </div>
            <button type="button" class="upload-btn">Feltöltés</button>
        </div>

        <div class="form-group">
            <label>Cím</label>
            <input type="text" name="title" placeholder="Mit árulsz?" required>
        </div>

        <div class="form-group">
            <label>Kategória</label>
            <select name="category">
                <option value="">Válassz kategóriát</option>
                <option value="electronics">Elektronika</option>
                <option value="fashion">Divat</option>
                <option value="home">Otthon</option>
            </select>
        </div>

        <div class="form-group">
            <label>Ár</label>
            <input type="text" name="price" class="price-text" placeholder="$ 0.00">
        </div>

        <div class="form-group">
            <label>Leírás</label>
            <textarea name="description" rows="4" placeholder="Írd le a termék állapotát, jellemzőit..."></textarea>
        </div>

        <button type="submit" class="publish-btn">
            <span>📤</span> Hirdetés közzététele
        </button>
    </form>
</div>

</body>
</html>
