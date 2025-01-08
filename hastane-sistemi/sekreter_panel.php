<?php
session_start();

if ($_SESSION['role'] !== 'sekreter') {
    header("Location: giris.php");
    exit;
}

?>

<?php
    include 'header.php';
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Hastane Sistem</title>
</head>
<body>


<div class="orta_div" id="randevu_div">
    <form action="islem.php" method="post">
        <label for="hasta_adi">Hasta Adı:</label>
        <input type="text" name="hasta_adi" required placeholder="Hasta Adı">

        <br>

        <label for="tarih">Tarih:</label>
        <input type="date" name="tarih" required>
        
        <br>

        <label for="klinik">Klinik:</label>
        <select name="klinik" class="klinik" required>
            <option value="">Klinik Seçiniz</option>
            <option value="Dahiliye">Dahiliye</option>
            <option value="Göz Hastalıkları">Göz Hastalıkları</option>
            <option value="Kulak Burun Boğaz">Kulak Burun Boğaz</option>
            <option value="Ortopedi">Ortopedi</option>
        </select>

        <br>

        <label for="doktor">Doktor:</label>
        <select name="doktor" class="doktor" required>
            <option value="">Doktor Seçiniz</option>
            <option value="Yunus Bahadır">Yunus Bahadır</option>
            <option value="Hamit Hamsici">Hamit Hamsici</option>
            <option value="Jasmine Lovecraft">Jasmine Lovecraft</option>
            <option value="Seto Kaiba">Seto Kaiba</option>
        </select>

        <br>

        <label for="saat">Saat:</label>
        <select name="saat" class="saat" required>
            <option value="">Saat Seçiniz</option>
            <option value="10:00">10:00</option>
            <option value="10:30">10:30</option>
            <option value="11:00">11:00</option>
            <option value="11:30">11:30</option>
            <option value="12:00">12:00</option>
            <option value="12:30">12:30</option>
            <option value="14:00">14:00</option>
            <option value="14:30">14:30</option>
            <option value="15:00">15:00</option>
            <option value="15:30">15:30</option>
            <option value="16:00">16:00</option>
        </select>

        <button type="submit" name="randevu_kaydet">Randevu Kaydet</button>
    </form>
</div>

    
    <div class="orta_div" id="doktor_div">
        <h3>Doktor</h3>
        <p>
            Doktorunuza Ait Bir Çalışma Saati Bulunamamıştır.
        </p>
    </div>
    <footer>
        <p>© 2024 Hastane Randevu Sistemi</p>
    </footer>

</body>
</html>