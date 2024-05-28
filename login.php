<?php
if(isset($_POST['username'], $_POST['password'])) {
    include('sql.php');

$username =($_POST['username']);
$password =($_POST['password']);
}

// Veritabanından kullanıcıyı sorgulama
$sql = "SELECT * FROM kullanicilar WHERE kullanici_ad='$username' AND kullanici_sifre='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Giriş başarılı ise bahce.php'ye yönlendirme
    header("Location: bahce.php");
} else {
    // Giriş başarısız ise hata mesajı gösterme
    echo "Kullanıcı adı veya şifre yanlış.";
}

// Bağlantıyı kapatma
$conn->close();
?>

