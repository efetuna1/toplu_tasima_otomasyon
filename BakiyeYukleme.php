<?php
// Veritabanı bağlantısı
include "bağlanti.php";

// Form submit edilmiş mi kontrol et
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form verilerini al
    $kartNo = $_POST["kartNo"];
    $miktar = $_POST["miktar"];

    // Kimlik numarasının veritabanında var olup olmadığını kontrol et
    $stmt = $pdo->prepare("SELECT * FROM users WHERE idNumber = ?");
    $stmt->execute([$kartNo]);
    $user = $stmt->fetch();

    if($user){
        // Kullanıcının mevcut bakiyesini al
        $mevcutBakiye = $user['balance'];
        
        // Yeni yüklenen miktarı mevcut bakiyeye ekle
        $yeniBakiye = $mevcutBakiye + $miktar;

        // Kullanıcının bakiyesini güncelle
        $sql = "UPDATE users SET balance = :yeni_bakiye WHERE idNumber = :kart_no";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':yeni_bakiye', $yeniBakiye, PDO::PARAM_INT);
        $stmt->bindParam(':kart_no', $kartNo, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            // Yükleme işlemi başarılı olduğunda, tl_yukleme tablosuna da ekle
            $sql_tl_yukleme = "INSERT INTO tl_yukleme (users_id, yukleme_miktari, yukleme_tarihi) VALUES (:users_id, :yukleme_miktari, CURDATE())";
            $stmt_tl_yukleme = $pdo->prepare($sql_tl_yukleme);
            $stmt_tl_yukleme->bindParam(':users_id', $user['id'], PDO::PARAM_INT);
            $stmt_tl_yukleme->bindParam(':yukleme_miktari', $miktar, PDO::PARAM_STR);
            $stmt_tl_yukleme->execute();

            // Başarılı bir şekilde güncellendiğine dair mesaj
            echo "HESABINIZA PARA YÜKLENMİŞTİR.";
        } else {
            // Hata durumunda mesaj
            echo "Bakiye yükleme işlemi sırasında bir hata oluştu.";
        }
    } else {
        echo 'BÖYLE BİR KART SAHİBİ YOK LÜTFEN KART BAŞVURUSU YAPINIZ.';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        .navbar-nav .nav-link {
            color: white !important;
        }

        .sosyal-medya {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .sosyal-medya li {
            display: inline-block;
            margin-left: auto;
            padding-left: 25px;
        }

        .sosyal-medya li a {
            color: white;
            font-size: 18px;
        }

        .navbar-nav .nav-link {
            color: white !important;
        }

        .sosyal-medya {
            margin-left: 620px;
            margin-top: 7px;
        }

        body {
            background-image: url('https://r.resimlink.com/MlLTZGt.jpg');
            background-size: cover;
            background-attachment: fixed;
        }

        .carousel {
            margin-top: 125px;
            width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .container {
            margin-top: 175px;
            color: deepskyblue;

        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"],
        input[type="submit"] {
            width: 30%;
            padding: 7px;
            border-radius: 5px;
            border: 1px solid #1b00b5;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }


        #miktar {
            background-color: #fff;
            color: #333;
        }

        button[type="submit"] {
            width: 10%;
            padding: 10px 20px;
            background-color: deepskyblue;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kocaeli Ulaşım Merkezi</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index2.php"><i class="fas fa-house"></i> Anasayfa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="kartBasvuru.php"><i class="fas fa-credit-card"></i> Kart Başvuru</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="kartIslemleri.php" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                <li class="nav-item">
                    <a class="nav-link" href="başvurularım.php"><i class="fas fa-file-alt"></i> Başvurularım</a>
                </li>
                        <i class="fas fa-credit-card"></i> Kart İşlemleri
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="BakiyeSorgulama.php"><i class="fas fa-search-dollar"></i> Bakiye
                            Sorgulama</a>
                        <a class="dropdown-item" href="BakiyeYukleme.php"><i class="fas fa-money-bill-wave"></i> Bakiye
                            Yükleme</a>
                        <div class="dropdown-divider"></div>

                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="NasilGiderim.php"><i class="fas fa-bus"></i> Nasıl Giderim?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="İletişim.php"><i class="fa-solid fa-phone"></i> İletişim</a>
                </li>
            </ul>
            <div class="sosyal-medya" style="margin-left: auto;">
                <ul>
                    <li><a href="https://www.facebook.com/ulasimpark/" target="_blank"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/ulasimpark" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com/ulasimparkas/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCwJTOkDfYKDou0Pfq0b-DGw" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
            </div>

            </ul>
        </div>

    </nav>
    
    <center>
        <div class="container">
            <h2 style="color: deepskyblue;">Kentkart Bakiye Yükleme <br><br></h2>
            <form id="bakiyeForm" action="#" method="post">
                <div class="form-group">
                    <label for="kartNo">TC Kimlik Numarası:</label><br>
                    <input type="text" id="kartNo" name="kartNo" required>
                </div>             
                <div class="form-group">
                    <label for="miktar">Yüklenecek Miktar:</label><br>
                    <input type="number" id="miktar" name="miktar" required>
                </div>
                <div class="form-group">
                    <button type="submit">
                        Yükle
                    </button>
                </div>
            </form>
        </div>
    </center>
    <script>
    $(document).ready(function(){
    $("#bakiyeForm").submit(function(e){
        e.preventDefault(); // Formun normal submit işlemini engelle
        
        // Form verilerini al
        var kartNo = $("#kartNo").val();
        var miktar = $("#miktar").val();
        
        // Verileri JSON formatında oluştur
        var formData = {
            kartNo: kartNo,
            miktar: miktar
        };
        
        // AJAX isteği gönder
        $.ajax({
            type: "POST",
            url: "BakiyeYukleme.php", // Verileri işleyecek PHP dosyasının adresi
            data: formData, // Form verilerini gönder
            success: function(response){
                // Kontrol sonucuna göre mesajı göster
                if(response.trim() === 'BÖYLE BİR KART SAHİBİ YOK LÜTFEN KART BAŞVURUSU YAPINIZ.') {
                    alert(response);
                } else if(response.trim() === 'HESABINIZA PARA YÜKLENMİŞTİR.') {
                    alert(response);
                    // İşlem başarılıysa, sayfayı yenileme gibi bir işlem yapılabilir
                    // window.location.reload();
                } else {
                    alert("Bir hata oluştu. Lütfen tekrar deneyin.");
                }
            }
        });
    });
    });
    </script>





    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
        crossorigin="anonymous"></script>

</body>

</php>
    
</body>

</html>