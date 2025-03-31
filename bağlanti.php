<?php
// Veritabanı bilgileri
$host = '127.0.0.1';
$dbname = 'kentkartdb';
$username = 'root';
$password = '132456';

try {
    // Veritabanına bağlanma
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Hata modunu ayarlama (isteğe bağlı)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    // Hata durumunda hata mesajını yazdırma
    echo "Bağlantı hatası: " . $e->getMessage();
}
?>
