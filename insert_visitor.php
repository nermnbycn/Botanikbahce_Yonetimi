<?php
if(isset($_POST['visitorName'], $_POST['visitorLastName'], $_POST['dateofVisit'], $_POST['reasonforVisit'], $_POST['visitorPhone'], $_POST['ageofVisitor'])) {
    // Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
    include('sql.php');

    // POST isteği ile gönderilen verileri alıyoruz
    $visitorName = $_POST['visitorName'];
    $visitorLastName = $_POST['visitorLastName'];
    $dateofVisit = $_POST['dateofVisit'];
    $reasonforVisit = $_POST['reasonforVisit'];
    $visitorPhone = $_POST['visitorPhone'];
    $ageofVisitor = $_POST['ageofVisitor'];

    // Veritabanına ekleme sorgusu oluşturuyoruz
    $sql = "INSERT INTO ziyaretciler (ziyaretci_ad, ziyaretci_soyad, ziyaret_tarihi, ziyaret_nedeni, ziyaretci_tel, ziyaretci_yas)
            VALUES ('$visitorName', '$visitorLastName', '$dateofVisit', '$reasonforVisit', '$visitorPhone', '$ageofVisitor')";

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