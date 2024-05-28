<?php
if(isset($_POST['personelName'], $_POST['personelLastName'] , $_POST['taskofPersonel'], $_POST['personelEmail'], $_POST['personelPhone'])) {
    // Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
    include('sql.php');

    // POST isteği ile gönderilen verileri alıyoruz
    $personelName = $_POST['personelName'];
    $personelLastName = $_POST['personelLastName'];
    $taskofPersonel = $_POST['taskofPersonel'];
    $personelEmail = $_POST['personelEmail'];
    $personelPhone = $_POST['personelPhone'];
   

    // Veritabanına ekleme sorgusu oluşturuyoruz
    $sql = "INSERT INTO  personeller (personel_ad, personel_soyad, personel_gorev, personel_email, personel_tel)
            VALUES ('$personelName', '$personelLastName', '$taskofPersonel' , '$personelEmail','$personelPhone')";

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