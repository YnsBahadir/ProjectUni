<?php
include 'bagla.php';

if (isset($_POST['randevu_kaydet'])) {
    $hasta_adi = trim($_POST['hasta_adi']);
    $tarih = $_POST['tarih'];
    $klinik = $_POST['klinik'];
    $doktor = $_POST['doktor'];
    $saat = $_POST['saat'];

    if (empty($hasta_adi) || empty($tarih) || empty($klinik) || empty($doktor) || empty($saat)) {
        die("Lütfen tüm alanları doldurunuz.");
    }

    $stmt = $pdo->prepare("INSERT INTO randevular (hasta_adi, tarih, klinik, doktor, saat) VALUES (:hasta_adi, :tarih, :klinik, :doktor, :saat)");
    $insert = $stmt->execute([
        'hasta_adi' => $hasta_adi,
        'tarih' => $tarih,
        'klinik' => $klinik,
        'doktor' => $doktor,
        'saat' => $saat
    ]);

    if ($insert) {
        echo "Randevu başarıyla kaydedildi. Lütfen bekleyin...";
        header("Refresh: 2; url=sekreter_panel.php");
        exit;
    } else {

        echo "Randevu kaydı sırasında bir hata oluştu. Lütfen tekrar deneyin.";
        header("Refresh: 2; url=sekreter_panel.php");
        exit;
    }
}


if (isset($_POST['randevu_iptal'])) {
    $randevu_id = $_POST['randevu_id'];

    $stmt = $pdo->prepare("DELETE FROM randevular WHERE id = :id");
    $delete = $stmt->execute(['id' => $randevu_id]);

    if ($delete) {
        echo "Randevu başarıyla iptal edildi.";
        header("Refresh: 2; url=randevu.php");
        exit;
    } else {
        echo "Randevu iptal edilirken bir hata oluştu.";
        header("Refresh: 2; url=randevu.php");
        exit;
    }
}
?>
