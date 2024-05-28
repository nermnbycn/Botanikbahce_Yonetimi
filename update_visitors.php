<?php
// Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
include('sql.php');

// Eğer form gönderilmişse (yani güncelleme butonuna basılmışsa)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri alıyoruz
    $ziyaretci_id = $_POST["ziyaretci_id"];
    $ziyaretci_ad = $_POST["ziyaretci_ad"];
    $ziyaretci_soyad = $_POST["ziyaretci_soyad"];
    $ziyaret_tarihi = $_POST["ziyaret_tarihi"];
    $ziyaret_nedeni = $_POST["ziyaret_nedeni"];
    $ziyaretci_tel = $_POST["ziyaretci_tel"];
    $ziyaretci_yas = $_POST["ziyaretci_yas"];
   

    // Veritabanında ilgili kaydı güncelliyoruz
    $sql = "UPDATE ziyaretciler SET 
            ziyaretci_ad = '$ziyaretci_ad', 
            ziyaretci_soyad = '$ziyaretci_soyad', 
            ziyaret_tarihi = '$ziyaret_tarihi', 
            ziyaret_nedeni = '$ziyaret_nedeni',
            ziyaretci_tel = '$ziyaretci_tel',
            ziyaretci_yas = '$ziyaretci_yas'
            WHERE ziyaretci_id = $ziyaretci_id";

    if ($conn->query($sql) === TRUE) {
        echo "Ziyaretçi bilgileri başarıyla güncellendi.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

// Eğer bir ziyaretci_id gönderilmişse, ilgili ziyaretçiyi veritabanından alıyoruz
if(isset($_GET["id"])) {
    $ziyaretci_id = $_GET["id"];
    $sql = "SELECT * FROM ziyaretciler WHERE ziyaretci_id = $ziyaretci_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ziyaretçi Bilgilerini Güncelle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style>
        /* Input alanlarının arka plan rengini siyah, yazı rengini beyaz yapalım */
        input[type="text"],
        input[type="date"],
        select {
            color: black;
        }
        .backgroundForm{
    background-color: rgba(92, 107, 45, 0.7);
    color:white;
    font-weight: bolder;
    margin-top: 100px;
    width:35%;
    border-radius: 50px;
    padding:50px;
}
.backgroundForm select {
    width: 200px; /* Genişliği piksel cinsinden belirleyin */
}
.container{
    background-image: url(backgorund.jpg);
    background-position: center;
    background-repeat: no-repeat;
    width:100%;
    height:100vh;
    background-size: cover;
}
.baslik{
    background-color: rgb(128, 128, 128);
    margin:10px 30%;
    border-radius: 20px;
}
.text-white{
    color:#fff;
}
    </style>
<body>
    <div class="container">
        <h2 class="text-center baslik text-white">Ziyaretçi Bilgilerini Güncelle</h2>
        <form method="post">
            <div class="d-flex justify-content-center">
                <div class="d-flex flex-column align-items-center backgroundForm justify-content-center">
                    <div class="mb-2">
                        <label for="visitorName">Ziyaretçi Ad:</label>
                        <input type="text" id="visitorName" name="ziyaretci_ad" value="<?php echo $row['ziyaretci_ad']; ?>">
                    </div>   
                    <div class="mb-2">
                        <label for="visitorLastName">Ziyaretçi Soyad:</label>
                        <input type="text" id="visitorLastName" name="ziyaretci_soyad" value="<?php echo $row['ziyaretci_soyad']; ?>">
                    </div>   
                    <div class="mb-2">
                        <label for="dateofVisit">Ziyaret Tarihi:</label>
                        <input type="date" id="dateofVisit" name="ziyaret_tarihi" value="<?php echo $row['ziyaret_tarihi']; ?>">
                    </div>   
                    <div class="mb-2">
                        <label for="reasonforVisit">Ziyaret Nedeni</label>
                        <select id="reasonforVisit" name="ziyaret_nedeni">
                            <option value="Egitim_Arastirma" <?php if($row['ziyaret_nedeni'] == 'Egitim_Arastirma') echo 'selected'; ?>>Eğitim ve Araştırma</option>
                            <option value="Doga_Rekreasyon" <?php if($row['ziyaret_nedeni'] == 'Doga_Rekreasyon') echo 'selected'; ?>>Doğa ve Rekreasyon</option>
                            <option value="Bitki_Gozlemi" <?php if($row['ziyaret_nedeni'] == 'Bitki_Gozlemi') echo 'selected'; ?>>Bitki Gözlemi</option>
                            <option value="Fotograf_Cekimi" <?php if($row['ziyaret_nedeni'] == 'Fotograf_Cekimi') echo 'selected'; ?>>Fotoğraf Çekimi</option>
                            <option value="Etkinlik_Eglence" <?php if($row['ziyaret_nedeni'] == 'Etkinlik_Eglence') echo 'selected'; ?>>Etkinlik ve Eğlence</option>
                            <option value="Dinlenme_Sosyallesme" <?php if($row['ziyaret_nedeni'] == 'Dinlenme_Sosyallesme') echo 'selected'; ?>>Dinlenme ve Sosyalleşme</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="visitorPhone">Telefon Numarası:</label>
                        <input type="text" id="visitorPhone" name="ziyaretci_tel" value="<?php echo $row['ziyaretci_tel']; ?>">
                    </div> 
                    <div class="mb-2">
                        <label for="ageofVisitor">Yaş:</label>
                        <input type="text" id="ageofVisitor" name="ziyaretci_yas" value="<?php echo $row['ziyaretci_yas']; ?>">
                    </div> 
                    <input type="hidden" name="ziyaretci_id" value="<?php echo $row['ziyaretci_id']; ?>">
                    <button type="submit" class="btn btn-success">Güncelle</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
