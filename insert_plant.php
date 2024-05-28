<?php
if(isset($_POST['plantName'], $_POST['location'], $_POST['light'], $_POST['water'], $_POST['fertilizer'])) {
    // Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
    include('sql.php');

    // POST isteği ile gönderilen verileri alıyoruz
    $plantName = $_POST['plantName'];
    $location = $_POST['location'];
    $light = $_POST['light'];
    $water = $_POST['water'];
    $fertilizer = $_POST['fertilizer'];

    // Veritabanına ekleme sorgusu oluşturuyoruz
    $sql = "INSERT INTO bitkiler (bitki_ad, bitki_konum, isik_ihtiyaci, sulama_sikligi, gubreleme_periyodu)
            VALUES ('$plantName', '$location', '$light', '$water', '$fertilizer')";

    // Sorguyu çalıştırıyoruz ve sonucu kontrol ediyoruz
    if ($conn->query($sql) === TRUE) {
        echo "Yeni kayıt başarıyla eklendi";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }

    // Veritabanı bağlantısını kapatıyoruz
    $conn->close();
} else {
    echo "Hata: Formdan eksik veri gönderildi.";
}
?>





