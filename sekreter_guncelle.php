<?php
include 'bagla.php';

if (isset($_GET['sekreter_id'])) {
    $sekreter_id = $_GET['sekreter_id'];

    $stmt = $pdo->prepare("SELECT * FROM sekreterler WHERE id = :id");
    $stmt->execute(['id' => $sekreter_id]);
    $sekreter = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($sekreter): ?>
        <form action="islemtwo.php" method="post">
            <input type="hidden" name="sekreter_id" value="<?php echo $sekreter['id']; ?>">
            <label>Ad:</label>
            <input type="text" name="sekreter_adi" value="<?php echo htmlspecialchars($sekreter['ad']); ?>" required>
            <label>Email:</label>
            <input type="email" name="sekreter_email" value="<?php echo htmlspecialchars($sekreter['email']); ?>" required>
            <button type="submit" name="sekreter_guncelle">Güncelle</button>
        </form>
    <?php endif;
}
?>
