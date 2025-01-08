<?php include 'headertwo.php'; ?>


<?php
include 'bagla.php';
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Randevu Yönetimi</title>
</head>
<body>

    <h2>Hastaların Randevuları</h2>

    <?php
    $stmt = $pdo->prepare("SELECT * FROM randevular ORDER BY tarih, saat");
    $stmt->execute();
    $randevular = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($randevular) > 0): ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Randevu ID</th>
                    <th>Hasta Adı</th>
                    <th>Tarih</th>
                    <th>Klinik</th>
                    <th>Doktor</th>
                    <th>Saat</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($randevular as $randevu): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($randevu['id']); ?></td>
                        <td><?php echo htmlspecialchars($randevu['hasta_adi']); ?></td>
                        <td><?php echo htmlspecialchars($randevu['tarih']); ?></td>
                        <td><?php echo htmlspecialchars($randevu['klinik']); ?></td>
                        <td><?php echo htmlspecialchars($randevu['doktor']); ?></td>
                        <td><?php echo htmlspecialchars($randevu['saat']); ?></td>
                        <td>
                        <form action="islem.php" method="post" style="display:inline;">
                            <input type="hidden" name="randevu_id" value="<?php echo $randevu['id']; ?>">
                            <button type="submit" name="randevu_iptal">İptal Et</button>
                        </form>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Henüz kayıtlı bir randevu bulunmamaktadır.</p>
    <?php endif; ?>

    <footer>
        <p>© 2024 Hastane Randevu Sistemi</p>
    </footer>

</body>
</html>
