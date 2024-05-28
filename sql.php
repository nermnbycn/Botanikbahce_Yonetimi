<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Botanik_Bahce";

// Veritabanına bağlanma
$conn = new mysqli($servername, $username, $password, $database);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}
?>
