
<?php
// Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
include('sql.php');

// Veritabanından bitki verilerini çekiyoruz
$sql = "SELECT bitki_id, bitki_ad, bitki_konum, isik_ihtiyaci, sulama_sikligi, gubreleme_periyodu FROM bitkiler";
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
        <h2 class="text-center">Bitki Listesi</h2>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr class="color">
                    <th>Bitki ID </th>
                    <th>Bitki Adı</th>
                    <th>Bitki Konumu</th>
                    <th>Işık İhtiyacı</th>
                    <th>Sulama Sıklığı</th>
                    <th>Gübreleme Periyodu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Her satır için veri döngüsü
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["bitki_id"] . "</td>";
                        echo "<td>" . $row["bitki_ad"] . "</td>";
                        echo "<td>" . $row["bitki_konum"] . "</td>";
                        echo "<td>" . $row["isik_ihtiyaci"] . "</td>";
                        echo "<td>" . $row["sulama_sikligi"] . "</td>";
                        echo "<td>" . $row["gubreleme_periyodu"] . "</td>";
                        echo "<td>";
                        echo "<a href='delete_plants.php?id=" . $row["bitki_id"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Bu kaydı silmek istediğinizden emin misiniz?\")'>Sil</a>";
                        echo "</td>";
                        echo "<td>";
                        echo "<a href='update_plants.php?id=" . $row["bitki_id"] . "' class='btn btn-danger btn-sm' onclick='return'>Güncelle</a>";
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


