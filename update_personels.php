<?php
// Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
include('sql.php');

// Eğer form gönderilmişse (yani güncelleme butonuna basılmışsa)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri alıyoruz
    $personel_id = $_POST["personel_id"];
    $personel_ad = $_POST["personel_ad"];
    $personel_soyad = $_POST["personel_soyad"];
    $personel_gorev = $_POST["personel_gorev"];
    $personel_email = $_POST["personel_email"];
    $personel_tel = $_POST["personel_tel"];
   

    // Veritabanında ilgili kaydı güncelliyoruz
    $sql = "UPDATE personeller SET 
            personel_ad = '$personel_ad', 
            personel_soyad = '$personel_soyad', 
            personel_gorev = '$personel_gorev', 
            personel_email = '$personel_email',
            personel_tel = '$personel_tel'
            WHERE personel_id = $personel_id";

    if ($conn->query($sql) === TRUE) {
        echo "Personel bilgileri başarıyla güncellendi.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

// Eğer bir personel_id gönderilmişse, ilgili personeli veritabanından alıyoruz
if(isset($_GET["id"])) {
    $personel_id = $_GET["id"];
    $sql = "SELECT * FROM personeller WHERE personel_id = $personel_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personel Bilgilerini Güncelle</title>
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
        <h2 class="text-center baslik text-white">Personel Bilgilerini Güncelle</h2>
        <form method="post">
            <div class="formContainer3 d-none"> 
                <div class="d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center backgroundForm justify-content-center">
                        <div class="mb-2">
                            <label for="personel_ad">Personel Ad:</label>
                            <input type="text" id="personel_ad" name="personel_ad" value="<?php echo $row['personel_ad']; ?>">
                        </div>   
                        <div class="mb-2">
                            <label for="personel_soyad">Personel Soyad:</label>
                            <input type="text" id="personel_soyad" name="personel_soyad" value="<?php echo $row['personel_soyad']; ?>">
                        </div>      
                        <div class="mb-2">
                            <label for="personel_gorev">Personel Görevi:</label>
                            <select id="personel_gorev" name="personel_gorev">
                                <option value="Bakim_Sulama" <?php if($row['personel_gorev'] == 'Bakim_Sulama') echo 'selected'; ?>>Bitki Bakımı ve Sulama</option>
                                <option value="Duzen_Tasarim" <?php if($row['personel_gorev'] == 'Duzen_Tasarim') echo 'selected'; ?>>Bahçe Düzeni ve Peyzaj Tasarımı</option>
                                <option value="Rehberlik" <?php if($row['personel_gorev'] == 'Rehberlik') echo 'selected'; ?>>Ziyaretçi Rehberliği</option>
                                <option value="Egitim" <?php if($row['personel_gorev'] == 'Egitim') echo 'selected'; ?>>Eğitim ve Seminerler</option>
                                <option value="Guvenlik" <?php if($row['personel_gorev'] == 'Guvenlik') echo 'selected'; ?>>Botanik Bahçe Güvenliği</option>
                                <option value="Yonetim" <?php if($row['personel_gorev'] == 'Yonetim') echo 'selected'; ?>>Yönetim ve İdari Destek</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="personel_email">E-mail:</label>
                            <input type="text" id="personel_email" name="personel_email" value="<?php echo $row['personel_email']; ?>">
                        </div> 
                        <div class="mb-2">
                            <label for="personel_tel">Telefon Numarası:</label>
                            <input type="text" id="personel_tel" name="personel_tel" value="<?php echo $row['personel_tel']; ?>">
                        </div> 
                        <input type="hidden" name="personel_id" value="<?php echo $row['personel_id']; ?>">
                        <button type="submit" class="btn btn-success">Güncelle</button>
                    </div>
                </div>
            </div>       
        </form>
    </div>
</body>
</html>

