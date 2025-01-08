<?php
include 'bagla.php';
?>

<?php
    include 'headertwo.php';
?>


<h3>Yeni Sekreter Oluştur</h3>
<form action="islemtwo.php" method="post">
    <label>Sekreter Adı:</label>
    <input type="text" name="sekreter_adi" required>
    <br>
    <label>Email:</label>
    <input type="email" name="sekreter_email" required>
    <br>
    <label>Şifre:</label>
    <input type="password" name="sekreter_sifre" required>
    <br>
    <button type="submit" name="sekreter_ekle">Sekreter Ekle</button>
</form>


<h3>Mevcut Sekreterler</h3>
<?php
$stmt = $pdo->prepare("SELECT * FROM sekreterler");
$stmt->execute();
$sekreterler = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($sekreterler) > 0): ?>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Sekreter ID</th>
                <th>Ad</th>
                <th>Email</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sekreterler as $sekreter): ?>
                <tr>
                    <td><?php echo htmlspecialchars($sekreter['id']); ?></td>
                    <td><?php echo htmlspecialchars($sekreter['ad']); ?></td>
                    <td><?php echo htmlspecialchars($sekreter['email']); ?></td>
                    <td>
                        <form action="sekreter_guncelle.php" method="get" style="display:inline;">
                            <input type="hidden" name="sekreter_id" value="<?php echo $sekreter['id']; ?>">
                            <button type="submit">Güncelle</button>
                        </form>
                        <form action="islemtwo.php" method="post" style="display:inline;">
                            <input type="hidden" name="sekreter_id" value="<?php echo $sekreter['id']; ?>">
                            <button type="submit" name="sekreter_sil">Sil</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Henüz kayıtlı bir sekreter bulunmamaktadır.</p>
<?php endif; ?>


<footer>
        <p>© 2024 Hastane Randevu Sistemi</p>
</footer>