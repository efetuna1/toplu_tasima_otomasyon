<?php
// Bağlantı dosyasını dahil et
include 'bağlanti.php';

// Kullanıcının girdiği bilgileri al
$ad = $_POST['ad'] ?? null;
$soyad = $_POST['soyad'] ?? null;
$tc = $_POST['tc'] ?? null;
$telefon = $_POST['telefon'] ?? null;

if ($ad && $soyad && $tc && $telefon && $kartTuru) {
    // Veritabanında TC kimlik numarasını kontrol et
    $sql = "SELECT * FROM userss WHERE idNumber = '$tc'";
    $result = $conn->query($sql);

    // Eğer sorgu sonuç döndürüyorsa
    if ($result->num_rows > 0) {
        echo "exists"; // Kullanıcı zaten kayıtlı olduğunu belirten bir işaret döndür
    } else {
        // Veritabanına kullanıcının bilgilerini ekle
        $insert_sql = "INSERT INTO userss (idNumber, name, surName, telephoneNumber) 
                       VALUES ('$tc', '$ad', '$soyad', '$telefon', )";

        if ($conn->query($insert_sql) === TRUE) {
            echo "success"; // Başvuru başarılı olduğunu belirten bir işaret döndür
        } else {
            echo "error"; // Bir hata oluştuğunu belirten bir işaret döndür
        }
    }
} else {
    echo "error"; // Formdan eksik veri gönderildiğinde bir hata işareti döndür
}
?>
