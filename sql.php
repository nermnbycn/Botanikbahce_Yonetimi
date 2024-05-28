<?php
$servername = "sql111.infinityfree.com";
$username = "if0_36633303";
$password = "DkR83oy07bqJ";
$database = "if0_36633303_botanik";

// Veritabanına bağlanma
$conn = new mysqli($localhost, $username, $password, $database);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}
?>
