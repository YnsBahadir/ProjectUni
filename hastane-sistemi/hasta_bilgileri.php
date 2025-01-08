<?php
include 'bagla.php';
?>

<?php
    include 'headertwo.php';
?>



<h3>Hasta Geçmişi</h3>
<?php
$stmt = $pdo->prepare("SELECT * FROM hasta_gecmisi ORDER BY hasta_id");
$stmt->execute();
$hastalar = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($hastalar) > 0): ?>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Hasta ID</th>
                <th>Adı</th>
                <th>Sürekli İlaçlar</th>
                <th>Rahatsızlıklar</th>
                <th>Muayene Sonucu</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hastalar as $hasta): ?>
                <tr>
                    <td><?php echo htmlspecialchars($hasta['hasta_id']); ?></td>
                    <td><?php echo htmlspecialchars($hasta['hasta_adi']); ?></td>
                    <td><?php echo htmlspecialchars($hasta['surekli_ilaclar']); ?></td>
                    <td><?php echo htmlspecialchars($hasta['rahatsizliklar']); ?></td>
                    <td><?php echo htmlspecialchars($hasta['muayene_sonucu']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Henüz hasta geçmişi kaydı bulunmamaktadır.</p>
<?php endif; ?>


<footer>
        <p>© 2024 Hastane Randevu Sistemi</p>
    </footer>