<?php
session_start();

if ($_SESSION['role'] !== 'doktor') {
    header("Location: giris.php");
    exit;
}
?>

<?php
    include 'headertwo.php';
?>


<?php if (isset($_GET['durum'])): ?>
    <?php if ($_GET['durum'] == 'sekreter_eklendi'): ?>
        <p style="color: green;">Sekreter başarıyla eklendi!</p>
    <?php elseif ($_GET['durum'] == 'hata'): ?>
        <p style="color: red;">Bir hata oluştu, lütfen tekrar deneyin.</p>
    <?php endif; ?>
<?php endif; ?>




<?php
include 'bagla.php';
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Doktor Paneli</title>
</head>
<body>

<h2>Doktor Paneli</h2>

<a href="sekreter_islemleri.php"><button class="sekbutton" id="sk">Sekreter İşlemleri</button></a>

<a href="hasta_bilgileri.php"><button class="sekbutton" id="sk">Hasta Bilgileri</button></a>

<footer>
        <p>© 2024 Hastane Randevu Sistemi</p>
    </footer>


</body>
</html>
