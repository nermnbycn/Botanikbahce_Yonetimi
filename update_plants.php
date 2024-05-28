<?php
// Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
include('sql.php');

// Eğer form gönderilmişse (yani güncelleme butonuna basılmışsa)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri alıyoruz
    $bitki_id = $_POST["bitki_id"];
    $bitki_ad = $_POST["bitki_ad"];
    $bitki_konum = $_POST["bitki_konum"];
    $isik_ihtiyaci = $_POST["isik_ihtiyaci"];
    $sulama_sikligi = $_POST["sulama_sikligi"];
    $gubreleme_periyodu = $_POST["gubreleme_periyodu"];

    // Veritabanında ilgili kaydı güncelliyoruz
    $sql = "UPDATE bitkiler SET 
            bitki_ad = '$bitki_ad', 
            bitki_konum = '$bitki_konum', 
            isik_ihtiyaci = '$isik_ihtiyaci', 
            sulama_sikligi = '$sulama_sikligi', 
            gubreleme_periyodu = '$gubreleme_periyodu' 
            WHERE bitki_id = $bitki_id";

    if ($conn->query($sql) === TRUE) {
        echo "Bitki bilgileri başarıyla güncellendi.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

// Eğer bir bitki_id gönderilmişse, ilgili bitkiyi veritabanından alıyoruz
if(isset($_GET["id"])) {
    $bitki_id = $_GET["id"];
    $sql = "SELECT * FROM bitkiler WHERE bitki_id = $bitki_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitki Bilgilerini Güncelle</title>
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
        <h2 class="text-center baslik text-white">Bitki Bilgilerini Güncelle</h2>
        <form method="post">
          <div class="d-flex justify-content-center text-black">
            <div class="d-flex flex-column align-items-center backgroundForm justify-content-center">
              <div class="mb-2">
                <label for="plantName">Bitki Adı:</label>
                <input type="text" id="plantName" name="bitki_ad" value="<?php echo $row['bitki_ad']; ?>">
              </div>   
              <div class="mb-2 text-black">
                <label for="location">Bitki Konumu:</label>
                <select id="location" name="bitki_konum">
                  <option value="Bahce_Bolgesi" <?php if($row['bitki_konum'] == 'Bahce_Bolgesi') echo 'selected'; ?>>Bahçe Bölgesi</option>
                  <option value="Sus_Havuzu" <?php if($row['bitki_konum'] == 'Sus_Havuzu') echo 'selected'; ?>>Süs Havuzu</option>
                  <option value="Sera" <?php if($row['bitki_konum'] == 'Sera') echo 'selected'; ?>>Sera</option>
                  <option value="Orman_Alani" <?php if($row['bitki_konum'] == 'Orman_Alani') echo 'selected'; ?>>Orman Alanı</option>
                  <option value="Kuru_Bahce" <?php if($row['bitki_konum'] == 'Kuru_Bahce') echo 'selected'; ?>>Kuru Bahçe</option>
                  <option value="Tropikal_Bahce" <?php if($row['bitki_konum'] == 'Tropikal_Bahce') echo 'selected'; ?>>Tropikal Bahçe</option>
                  <option value="Egitim_Bahcesi" <?php if($row['bitki_konum'] == 'Egitim_Bahcesi') echo 'selected'; ?>>Eğitim Bahçesi</option>
                </select>
              </div>
              <div class="mb-2">
                <label for="light">Işık İhtiyacı:</label>
                <select id="light" name="isik_ihtiyaci">
                  <option value="Tam_Gunes" <?php if($row['isik_ihtiyaci'] == 'Tam_Gunes') echo 'selected'; ?>>Tam Güneş</option>
                  <option value="Yari_Golge" <?php if($row['isik_ihtiyaci'] == 'Yari_Golge') echo 'selected'; ?>>Yarı Gölge</option>
                  <option value="Tam_Golge" <?php if($row['isik_ihtiyaci'] == 'Tam_Golge') echo 'selected'; ?>>Tam Gölge</option>
                </select>
              </div>
              <div class="mb-2">
                <label for="water">Sulama Sıklığı:</label>
                <select id="water" name="sulama_sikligi">
                  <option value="Gunluk" <?php if($row['sulama_sikligi'] == 'Gunluk') echo 'selected'; ?>>Günlük Sulama</option>
                  <option value="Haftada_Bir" <?php if($row['sulama_sikligi'] == 'Haftada_Bir') echo 'selected'; ?>>Haftada Bir Sulama</option>
                  <option value="IkiHaftada_Bir" <?php if($row['sulama_sikligi'] == 'IkiHaftada_Bir') echo 'selected'; ?>>İki Haftada Bir Sulama</option>
                  <option value="Ayda_Bir" <?php if($row['sulama_sikligi'] == 'Ayda_Bir') echo 'selected'; ?>>Ayda Bir Sulama</option>
                  <option value="Mevsimsel" <?php if($row['sulama_sikligi'] == 'Mevsimsel') echo 'selected'; ?>>Mevsimsel Sulama</option>
                  <option value="Nem_Oranina_Bagli" <?php if($row['sulama_sikligi'] == 'Nem_Oranina_Bagli') echo 'selected'; ?>>Toprak Nemine Bağlı Sulama</option>
                </select>
              </div>
              <div class="mb-2">
                <label for="fertilizer">Gübreleme Sıklığı:</label>
                <select id="fertilizer" name="gubreleme_periyodu">
                  <option value="Ilkbahar-Sonbahar" <?php if($row['gubreleme_periyodu'] == 'Ilkbahar-Sonbahar') echo 'selected'; ?>>İlkbahar-Sonbahar</option>
                  <option value="Yaz-Kıs" <?php if($row['gubreleme_periyodu'] == 'Yaz-Kıs') echo 'selected'; ?>>Yaz-Kış</option>
                  <option value="Aylik" <?php if($row['gubreleme_periyodu'] == 'Aylik') echo 'selected'; ?>>Aylık Gübreleme</option>
                  <option value="Yillik" <?php if($row['gubreleme_periyodu'] == 'Yillik') echo 'selected'; ?>>Yıllık Gübreleme</option>
                  <option value="Gelisime_Bagli" <?php if($row['gubreleme_periyodu'] == 'Gelisime_Bagli') echo 'selected'; ?>>Gelişime Bağlı Gübreleme</option>
                </select>
              </div>
              <input type="hidden" name="bitki_id" value="<?php echo $row['bitki_id']; ?>">
              <button type="submit" class="btn btn-success">Güncelle</button>
            </div>
          </div>
        </form>
    </div>
</body>
</html>

   
              




  
       
         
