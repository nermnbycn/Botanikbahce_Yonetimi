<?php
if(isset($_POST['eventName'], $_POST['eventDate'], $_POST['subjectofEvent'], $_POST['numberofKatilimci'])) {
    // Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
    include('sql.php');

    // POST isteği ile gönderilen verileri alıyoruz
    $eventName = $_POST['eventName'];
    $eventDate = $_POST['eventDate'];
    $subjectofEvent = $_POST['subjectofEvent'];
    $numberofKatilimci = $_POST['numberofKatilimci'];
   

    // Veritabanına ekleme sorgusu oluşturuyoruz
    $sql = "INSERT INTO  etkinlikler (etkinlik_ad, etkinlik_tarihi, etkinlik_konu, katilimci_sayisi)
            VALUES ('$eventName', '$eventDate', '$subjectofEvent', '$numberofKatilimci')";

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