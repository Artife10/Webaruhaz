<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=ű, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="card">
        <div class="register">
            <h1>Register</h1>
            <form action="register_validate.php" method="post">
                <input type="text" name="nev" id="nev" placeholder="Name"><br><br>
                <input type="password" name="password" id="password" placeholder="Password"><br>
                <button>Register</button>
            </form>
            <a href="login.php">I have an account</a>
        </div>
    </div>
</body>
</html>