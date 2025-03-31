<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesaj Gösterme</title>
    <style>
        .message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #d6e9c6;
            border-radius: 4px;
        }

        .error-message {
            background-color: #f2dede;
            color: #a94442;
            border-color: #ebccd1;
        }
    </style>
</head>
<body>

<div id="messageBox" class="message" style="display: none;"></div>

<form id="myForm">
    <input type="text" id="inputField" placeholder="Bir değer girin">
    <button type="submit">Gönder</button>
</form>

<script>
    document.getElementById("myForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Formun normal submit işlemini engelle

        var inputValue = document.getElementById("inputField").value;

        // Burada işlem sonucuna göre mesajı değiştirebilirsiniz
        if (inputValue === "başarılı") {
            showMessage("İşlem başarılı!", false);
        } else {
            showMessage("İşlem başarısız!", true);
        }
    });

    function showMessage(message, isError) {
        var messageBox = document.getElementById("messageBox");
        messageBox.innerHTML = message;
        
        // Hata durumunda farklı bir stil uygula
        if (isError) {
            messageBox.classList.add("error-message");
        } else {
            messageBox.classList.remove("error-message");
        }

        messageBox.style.display = "block";

        // 3 saniye sonra mesaj kutusunu gizle
        setTimeout(function() {
            messageBox.style.display = "none";
        }, 3000);
    }
</script>

</body>
</html>

