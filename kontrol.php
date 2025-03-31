<?php
include "bağlanti.php";

if(!empty($_POST['tc'])){
    $tc = $_POST['tc'];
    
    // TC Kimlik Numarasının veritabanında var olup olmadığını kontrol et
    $stmt = $pdo->prepare("SELECT * FROM users WHERE idNumber = ?");
    $stmt->execute([$tc]);
    $user = $stmt->fetch();
    
    if($user){
        echo 'BU KULLANICI ZATEN KAYITLI LÜTFEN BİLGİLERİNİ KONTROL EDİNİZ'; // TC Kimlik Numarası veritabanında varsa 'var' yanıtı döndür
    } else {
        echo 'BAŞVURUNUZ OLUŞTURULDU.'; // TC Kimlik Numarası veritabanında yoksa 'yok' yanıtı döndür
    }
}
?>
