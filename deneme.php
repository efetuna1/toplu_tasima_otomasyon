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
    </style>
    <style>
        .container {
            max-width: 350px;
            margin: 125px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 15px;
            background-color: #ccc;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            font-size: 14px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            border-radius: 20px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 10%;
            padding: 10px 20px;
            margin-left: 0%;
            background-color: #0073e6;

            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;

        }

        button[type="submit"]:hover {
            background-color: #000000;

            color: rgb(255, 255, 255);

        }

        form {
            text-align: center;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index2.html"><i class="fas fa-house"></i> Anasayfa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="kartBasvuru.html"><i class="fas fa-credit-card"></i> Kart Başvuru</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="kartIslemleri.html" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-credit-card"></i> Kart İşlemleri
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="BakiyeSorgulama.html"><i class="fas fa-search-dollar"></i> Bakiye
                            Sorgulama</a>
                        <a class="dropdown-item" href="BakiyeYukleme.html"><i class="fas fa-money-bill-wave"></i> Bakiye
                            Yükleme</a>
                        <div class="dropdown-divider"></div>

                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="NasilGiderim.html"><i class="fas fa-bus"></i> Nasıl Giderim?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="İletişim.html"><i class="fa-solid fa-phone"></i> İletişim</a>
                </li>
                <ul class="sosyal-medya ">
                    <li><a href="https://www.facebook.com/ulasimpark/" target="_blank"><i
                                class="fab fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/ulasimpark" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com/ulasimparkas/" target="_blank"><i
                                class="fab fa-instagram"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCwJTOkDfYKDou0Pfq0b-DGw" target="_blank"><i
                                class="fa-brands fa-youtube"></i></a></li>
                </ul>

            </ul>
        </div>

    </nav>

    <div class="container">
        <h2>KentKart Başvuru Formu</h2>
        <form id="kartBasvuruForm" action="" method="post">
            <div class="form-group">
                <label for="ad">İsim:</label>
                <input type="text" id="ad" name="ad" required>
            </div>
            <div class="form-group">
                <label for="soyad">Soyisim:</label>
                <input type="text" id="soyad" name="soyad" required>
            </div>
            <div class="form-group">
                <label for="tc">TC Kimlik Numarası:</label>
                <input type="text" id="tc" name="tc" min="11" max="11" required>
            </div>
            <div class="form-group">
                <label for="telefon">Telefon Numarası:</label>
                <input type="text" id="telefon" name="telefon" min="11" max="11" required>
                <div class="form-group">
    <label for="kartTuru">Kart Türü:</label>
    <select id="kartTuru" name="kartTuru" required>
        <option value="">Lütfen seçiniz</option>
        <?php foreach ($kart_turleri as $kart): ?>
            <option value="<?= $kart['id'] ?>"><?= $kart['card_name'] ?></option>
        <?php endforeach; ?>
    </select>
</div>
                

?>

            <button type="submit" id="gonderButton">Gönder</button>
            
        </form>
       
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Kart türlerini getirme işlemi
            $.ajax({
                url: 'kartTurleriGetir.php',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Dropdown menüsünü güncelle
                    var dropdown = $('#kartTuru');
                    dropdown.empty();
                    $.each(data, function (index, item) {
                        dropdown.append($('<option></option>').attr('value', item.id).text(item.card_name));
                    });
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });

            // Form submit işlemi
            $('#gonderButton').click(function (e) {
                e.preventDefault(); // Formun otomatik olarak gönderilmesini engellemek için
                $('#kartBasvuruForm').submit();
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>