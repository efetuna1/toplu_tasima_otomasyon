<?php
include "bağlanti.php";

// Kart türlerini getirme sorgusu
$sql = "SELECT * FROM cart_type";
$stmt = $pdo->query($sql);
$kart_turleri = $stmt->fetchAll(PDO::FETCH_ASSOC);

// JSON formatında kart türlerini döndürme
echo json_encode($kart_turleri);
?>
