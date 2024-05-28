
<?php
// Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
include('sql.php');

// Veritabanından bitki verilerini çekiyoruz
$sql = "SELECT personel_id, personel_ad, personel_soyad, personel_gorev, personel_email, personel_tel FROM personeller";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitki Listesi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style2.css" class="href">  
</head>
<style>
     .container{
    background-image: url(backgorund.jpg);
    background-position: center;
    background-repeat: no-repeat;
    width:100%;
    height:100vh;
    background-size: cover;
    }
    .color{
        background-color: rgb(128, 128, 128);
    }
    td{
        background-color:rgba(92, 107, 45, 0.7);
    }
    .text-white{
        color:#fff;
    }
    .baslik{
    background-color: rgb(128, 128, 128);
    margin:10px 30%;
    border-radius: 20px;
}
</style>
<body>
    <div class="container text-white">
        <div class="baslik">
        <h2 class="text-center">Personel Listesi</h2>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr class="color">
                    <th>Personel ID </th>
                    <th>Personel Adı</th>
                    <th>Personel Soyadı</th>
                    <th>Personel Görevi</th>
                    <th>Personel E-mail</th>
                    <th>Personel Telefon Numarası</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Her satır için veri döngüsü
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["personel_id"] . "</td>";
                        echo "<td>" . $row["personel_ad"] . "</td>";
                        echo "<td>" . $row["personel_soyad"] . "</td>";
                        echo "<td>" . $row["personel_gorev"] . "</td>";
                        echo "<td>" . $row["personel_email"] . "</td>";
                        echo "<td>" . $row["personel_tel"] . "</td>";
                        echo "<td>";
                        echo "<a href='delete_personels.php?id=" . $row["personel_id"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Bu kaydı silmek istediğinizden emin misiniz?\")'>Sil</a>";
                        echo "</td>";
                        echo "<td>";
                        echo "<a href='update_personels.php?id=" . $row["personel_id"] . "' class='btn btn-danger btn-sm' onclick='return'>Güncelle</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Kayıt bulunamadı</td></tr>";
                }
                // Veritabanı bağlantısını kapatıyoruz
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
