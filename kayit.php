<?php
if(isset($_POST['username'], $_POST['password'])) {
    // Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
    include('sql.php');

    // POST isteği ile gönderilen verileri alıyoruz
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Veritabanına ekleme sorgusu oluşturuyoruz
    $sql = "INSERT INTO kullanicilar (kullanici_ad, kullanici_sifre)
            VALUES ('$username', '$password')";

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


