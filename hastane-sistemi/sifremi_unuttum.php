<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hastane Randevu Sistemi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Hastane Randevu Sistemi</h1>
    </header>

    <div class="tableOuter">
        <h1>Mail Adresinizi Giriniz</h1>
        <form method="POST">
            <label for="tc">Mail:</label>
                <input type="text" name="tc" required><br>

                <input type="submit" class="sub" id="giris" value="Kod Gönder">
        </form>
        <a href="index.php"><button class="sub" id="uye">Geri Dön</button></a>
    </div>

    <footer>
        <p>© 2024 Hastane Randevu Sistemi</p>
    </footer>
</body>
</html>