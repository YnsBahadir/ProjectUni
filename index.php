<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tc = $_POST['tc'];
    $sifre = $_POST['sifre'];

    $kullaniciBilgileri = file('bilgi.txt', FILE_IGNORE_NEW_LINES);

    $girisBasarili = false;
    foreach ($kullaniciBilgileri as $kullanici) {
        list($kayitTc, $kayitSifre, $kayitRol) = explode(':', $kullanici);


        if ($tc === $kayitTc && $sifre === $kayitSifre) {

            $_SESSION['tc'] = $tc;
            $_SESSION['role'] = $kayitRol;
            $girisBasarili = true;

            if ($_SESSION['role'] === 'sekreter') {
                header("Location: sekreter_panel.php");
                exit;
            } elseif ($_SESSION['role'] === 'doktor') {
                header("Location: doktor_panel.php");
                exit;
            }
        }
    }

    if (!$girisBasarili) {
        echo "TC veya şifre yanlış!";
    }
}
?>


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
        <h1>Giriş Yap</h1>
        <form method="POST">
            <label for="tc">TC:  </label>
                <input type="text" name="tc" required><br>

            <label for="sifre">Şifre:</label>
                <input type="password" name="sifre" required><br>

                <input type="submit" class="sub" id="giris" value="Giriş Yap">
        </form>
        <a href="sifremi_unuttum.php"><button class="sub" id="uye">Şifremi Unuttum</button></a>
    </div>

    <footer>
        <p>© 2024 Hastane Randevu Sistemi</p>
    </footer>
</body>
</html>
