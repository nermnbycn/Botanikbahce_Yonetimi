<?php
// Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
include('sql.php');

// Eğer form gönderilmişse (yani güncelleme butonuna basılmışsa)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri alıyoruz
    $etkinlik_id = $_POST["etkinlik_id"];
    $etkinlik_ad = $_POST["etkinlik_ad"];
    $etkinlik_tarihi = $_POST["etkinlik_tarihi"];
    $etkinlik_konu = $_POST["etkinlik_konu"];
    $katilimci_sayisi = $_POST["katilimci_sayisi"];
   

    // Veritabanında ilgili kaydı güncelliyoruz
    $sql = "UPDATE etkinlikler SET 
            etkinlik_ad = '$etkinlik_ad', 
            etkinlik_tarihi = '$etkinlik_tarihi', 
            etkinlik_konu = '$etkinlik_konu', 
            katilimci_sayisi = '$katilimci_sayisi'  
            WHERE etkinlik_id = $etkinlik_id";

    if ($conn->query($sql) === TRUE) {
        echo "Etkinlik bilgileri başarıyla güncellendi.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

// Eğer bir etkinlik_id gönderilmişse, ilgili bitkiyi veritabanından alıyoruz
if(isset($_GET["id"])) {
    $etkinlik_id = $_GET["id"];
    $sql = "SELECT * FROM etkinlikler WHERE etkinlik_id = $etkinlik_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitki Bilgilerini Güncelle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        /* Input alanlarının arka plan rengini siyah, yazı rengini beyaz yapalım */
        input[type="text"],
        input[type="date"],
        select {
            color: black;
        }
        .backgroundForm{
    background-color: rgba(92, 107, 45, 0.7);
    color:white;
    font-weight: bolder;
    margin-top: 100px;
    width:35%;
    border-radius: 50px;
    padding:50px;
}
.backgroundForm select {
    width: 200px; /* Genişliği piksel cinsinden belirleyin */
}
.container{
    background-image: url(backgorund.jpg);
    background-position: center;
    background-repeat: no-repeat;
    width:100%;
    height:100vh;
    background-size: cover;
}
.baslik{
    background-color: rgb(128, 128, 128);
    margin:10px 30%;
    border-radius: 20px;
}
.text-white{
    color:#fff;
}
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center baslik text-white">Etkinlik Bilgilerini Güncelle</h2>
        <form method="post">
            <div class="d-flex justify-content-center">
                <div class="d-flex flex-column align-items-center backgroundForm justify-content-center">
                    <div class="mb-2">
                        <label for="eventName">Etkinlik Adı:</label>
                        <input type="text" id="eventName" name="etkinlik_ad" value="<?php echo $row['etkinlik_ad']; ?>">
                    </div>   
                    <div class="mb-2">
                        <label for="eventDate">Etkinlik Tarihi:</label>
                        <input type="date" id="eventDate" name="etkinlik_tarihi" value="<?php echo $row['etkinlik_tarihi']; ?>">
                    </div>   
                    <div class="mb-2">
                        <label for="subjectofEvent">Etkinlik Konusu:</label>
                        <select id="subjectofEvent" name="etkinlik_konu">
                            <option value="Bitki_Bakim_Atolyeleri" <?php if($row['etkinlik_konu'] == 'Bitki_Bakim_Atolyeleri') echo 'selected'; ?>>Bitki Bakım Atölyeleri</option>
                            <option value="Doga_Yuruyusleri" <?php if($row['etkinlik_konu'] == 'Doga_Yuruyusleri') echo 'selected'; ?>>Doğa Yürüyüşleri</option>
                            <option value="Bitki_Fotografciligi" <?php if($row['etkinlik_konu'] == 'Bitki_Fotografciligi') echo 'selected'; ?>>Bitki Fotoğrafçılığı</option>
                            <option value="Bitki_Temali_Yarismalar" <?php if($row['etkinlik_konu'] == 'Bitki_Temali_Yarismalar') echo 'selected'; ?>>Bitki Temalı Yarışmalar</option>
                            <option value="Bitki_Sergileri" <?php if($row['etkinlik_konu'] == 'Bitki_Sergileri') echo 'selected'; ?>>Bitki Sergileri</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="numberofKatilimci">Katılımcı Sayısı:</label>
                        <input type="number" id="numberofKatilimci" name="katilimci_sayisi" value="<?php echo $row['katilimci_sayisi']; ?>">
                    </div>  
                    <input type="hidden" name="etkinlik_id" value="<?php echo $row['etkinlik_id']; ?>">
                    <button type="submit" class="btn btn-success">Güncelle</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
