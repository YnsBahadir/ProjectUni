<?php
include 'bagla.php';



    //sekreter ekleme karıştırma diğerleriyle!!
    if (isset($_POST['sekreter_ekle'])) {
        $sekreter_adi = $_POST['sekreter_adi'];
        $sekreter_email = $_POST['sekreter_email'];
        $sekreter_sifre = password_hash($_POST['sekreter_sifre'], PASSWORD_BCRYPT);
    
        try {
            $stmt = $pdo->prepare("INSERT INTO sekreterler (ad, email, sifre) VALUES (:ad, :email, :sifre)");
            $insert = $stmt->execute([
                'ad' => $sekreter_adi,
                'email' => $sekreter_email,
                'sifre' => $sekreter_sifre
            ]);
    
            if ($insert) {
                header("Location: doktor_panel.php?durum=sekreter_eklendi");
                exit;
            } else {
                echo "Sekreter eklenirken bir hata oluştu.";
            }
        } catch (PDOException $e) {
            echo "Hata: " . $e->getMessage();
        }
    }
    


    //sekreter silme unutma!
    if (isset($_POST['sekreter_sil'])) {
        $sekreter_id = $_POST['sekreter_id'];
    
        $stmt = $pdo->prepare("DELETE FROM sekreterler WHERE id = :id");
        $delete = $stmt->execute(['id' => $sekreter_id]);
    
        if ($delete) {
            header("Location: doktor_panel.php");
            exit;
        } else {
            echo "Sekreter silinirken bir hata oluştu.";
        }
    }
    
    //sekreter güncelleme unutma!
    if (isset($_POST['sekreter_guncelle'])) {
        $sekreter_id = $_POST['sekreter_id'];
        $sekreter_adi = $_POST['sekreter_adi'];
        $sekreter_email = $_POST['sekreter_email'];
    
        $stmt = $pdo->prepare("UPDATE sekreterler SET ad = :ad, email = :email WHERE id = :id");
        $update = $stmt->execute(['ad' => $sekreter_adi, 'email' => $sekreter_email, 'id' => $sekreter_id]);
    
        if ($update) {
            header("Location: doktor_panel.php");
            exit;
        } else {
            echo "Sekreter güncellenirken bir hata oluştu.";
        }
    }

    ?>