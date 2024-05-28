



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlantArea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" class="href">  
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid px-5">
        <p class="exo-2 green-color font-15 fw-bolder">PlantArea</p>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto font-1">
            <div><a class="nav-link py-2 px-3 fw-semibold" href="#">Anasayfa</a></div>
            <div><a class="nav-link py-2 px-3 fw-semibold" href="display_plants.php">Bitkiler</a></div>
            <div><a class="nav-link px-3 py-2 fw-semibold" href="display_events.php">Etkinlikler</a></div>
            <div><a class="nav-link py-2 px-3 fw-semibold" href="display_visitors.php">Ziyaretçiler</a></div>
            <div><a class="nav-link px-3 py-2 fw-semibold" href="display_personels.php">Personeller</a></div>
          </div>
        </div>
      </div>
    </nav>
    <div class="background-image">
      <div class="d-flex justify-content-evenly"> <!--Butonlar-->
        <button type="button" class="btn btn-light mt-5 fw-bolder yazi" id="addPlantButton">Bitki Ekle</button>
        <button type="button" class="btn btn-light mt-5 fw-bolder yazi" id="addEventButton">Etkinlik Ekle</button>
        <button type="button" class="btn btn-light mt-5 fw-bolder yazi" id="addZiyaretciButton">Ziyaretçi Ekle</button>
        <button type="button" class="btn btn-light mt-5 fw-bolder yazi" id="addEPersonelButton">Personel Ekle</button>
      </div>
        <!--Kullanicidan bilgi alma (Form)-->
        <form method="post" action="insert_plant.php" id="plantForm">
        <div class="formContainer d-none"> 
        <div class="d-flex justify-content-center">
          <div class="d-flex flex-column align-items-center backgroundForm justify-content-center">
           <div class="mb-2">
              <label for="plantName">Bitki Adı:</label>
              <input type="text" id="plantName" name="plantName">
            </div>   
            <div class="mb-2">
              <label for="location">Bitki Konumu:</label>
              <select id="location" name="location">
                <option value="Bahce_Bolgesi">Bahçe Bölgesi</option>
                <option value="Sus_Havuzu">Süs Havuzu</option>
                <option value="Sera">Sera</option>
                <option value="Orman_Alani">Orman Alanı</option>
                <option value="Kuru_Bahce">Kuru Bahçe</option>
                <option value="Tropikal_Bahce">Tropikal Bahçe</option>
                <option value="Egitim_Bahcesi">Eğitim Bahçesi</option>
              </select>
            </div>
            <div class="mb-2">
              <label for="light">Işık İhtiyacı:</label>
              <select id="light" name="light">
                <option value="Tam_Gunes">Tam Güneş</option>
                <option value="Yari_Golge">Yarı Gölge</option>
                <option value="Tam_Golge">Tam Gölge</option>
              </select>
            </div>
            <div class="mb-2">
              <label for="water">Sulama Sıklığı:</label>
              <select id="water" name="water">
                <option value="Gunluk">Günlük Sulama</option>
                <option value="Haftada_Bir">Haftada Bir Sulama</option>
                <option value="IkiHaftada_Bir">İki Haftada Bir Sulama</option>
                <option value="Ayda_Bir">Ayda Bir Sulama</option>
                <option value="Mevsimsel">Mevsimsel Sulama</option>
                <option value="Nem_Oranina_Bagli">Toprak Nemine Bağlı Sulama</option>
              </select>
            </div>
            <div class="mb-2">
              <label for="fertilizer">Gübreleme Sıklığı:</label>
              <select id="fertilizer" name="fertilizer">
                <option value="Ilkbahar-Sonbahar">İlkbahar-Sonbahar</option>
                <option value="Yaz-Kıs">Yaz-Kış</option>
                <option value="Aylik">Aylık Gübreleme</option>
                <option value="Yillik">Yıllık Gübreleme</option>
                <option value="Gelisime_Bagli">Gelişime Bağlı Gübreleme</option>
              </select>
            </div>
            <button type="submit" class="btn btn-light mt-3 fw-bolder yazi px-5">Bitki Ekle</button>
          </div>
      </div>
    </div>
</form>

    <!--Kullanicidan bilgi alma (Form)-->
    <form method="post" action="insert_event.php">
    <div class="formContainer1 d-none"> 
      <div class="d-flex justify-content-center">
        <div class="d-flex flex-column align-items-center backgroundForm justify-content-center">
          <div class="mb-2">
            <label for="eventName">Etkinlik Adı:</label>
            <input type="text" id="eventName" name="eventName">
          </div>   
          <div class="mb-2">
            <label for="eventDate">Etkinlik Tarihi:</label>
            <input type="date" id="eventDate" name="eventDate">
          </div>   
          <div class="mb-2">
            <label for="subjectofEvent">Etkinlik Konusu:</label>
            <select id="subjectofEvent" name="subjectofEvent">
              <option value="Bitki_Bakim_Atolyeleri">Bitki Bakım Atölyeleri</option>
              <option value="Doga_Yuruyusleri">Doğa Yürüyüşleri</option>
              <option value="Bitki_Fotografciligi">Bitki Fotoğrafçılığı</option>
              <option value="Bitki_Temali_Yarismalar">Bitki Temalı Yarışmalar</option>
              <option value="Bitki_Sergileri">Bitki Sergileri</option>
            </select>
          </div>
          <div class="mb-2">
            <label for="numberofKatilimci">Katılımcı Sayısı:</label>
            <input type="number" id="numberofKatilimci" name="numberofKatilimci">
          </div>  
          <button type="submit" class="btn btn-light mt-3 fw-bolder yazi px-5">Etkinlik Ekle</button>
        </div>
    </div>
  </div>
</form>
  <!--Kullanicidan bilgi alma (Form)-->
  <form method="post" action="insert_visitor.php">
  <div class="formContainer2 d-none"> 
    <div class="d-flex justify-content-center">
      <div class="d-flex flex-column align-items-center backgroundForm justify-content-center">
        <div class="mb-2">
          <label for="visitorName">Ziyaretçi Ad:</label>
          <input type="text" id="visitorName" name="visitorName">
        </div>   
        <div class="mb-2">
          <label for="visitorLastName">Ziyaretçi Soyad:</label>
          <input type="text" id="visitorLastName" name="visitorLastName">
        </div>   
        <div class="mb-2">
          <label for="dateofVisit">Ziyaret Tarihi:</label>
          <input type="date" id="dateofVisit" name="dateofVisit">
        </div>   
        <div class="mb-2">
          <label for="reasonforVisit">Ziyaret Nedeni</label>
          <select id="reasonforVisit" name="reasonforVisit">
            <option value="Egitim_Arastirma">Eğitim ve Araştırma</option>
            <option value="Doga_Rekreasyon">Doğa ve Rekreasyon</option>
            <option value="Bitki_Gozlemi">Bitki Gözlemi</option>
            <option value="Fotograf_Cekimi">Fotoğraf Çekimi</option>
            <option value="Etkinlik_Eglence">Etkinlik ve Eğlence</option>
            <option value="Dinlenme_Sosyallesme">Dinlenme ve Sosyalleşme</option>
          </select>
        </div>
        <div class="mb-2">
          <label for="visitorPhone">Telefon Numarası:</label>
          <input type="text" id="visitorPhone" name="visitorPhone">
        </div> 
        <div class="mb-2">
          <label for="ageofVisitor">Yas:</label>
          <input type="text" id="ageofVisitor" name="ageofVisitor">
        </div> 
        <button type="submit" class="btn btn-light mt-3 fw-bolder yazi px-5">Ziyaretçi Ekle</button>
      </div>
  </div>
</div>
</form>
<!--Kullanicidan bilgi alma (Form)-->
<form method="post" action="insert_personel.php">
<div class="formContainer3 d-none"> 
  <div class="d-flex justify-content-center">
    <div class="d-flex flex-column align-items-center backgroundForm justify-content-center">
      <div class="mb-2">
        <label for="personelName">Personel Ad:</label>
        <input type="text" id="personelName" name="personelName">
      </div>   
      <div class="mb-2">
        <label for="personelLastName">Personel Soyad:</label>
        <input type="text" id="personelLastName" name="personelLastName">
      </div>      
      <div class="mb-2">
        <label for="taskofPersonel">PersoneL Görevi:</label>
        <select id="taskofPersonel" name="taskofPersonel">
          <option value="Bakim_Sulama">Bitki Bakımı ve Sulama</option>
          <option value="Duzen_Tasarim">Bahçe Düzeni ve Peyzaj Tasarımı</option>
          <option value="Rehberlik">Ziyaretçi Rehberliği</option>
          <option value="Egitim">Eğitim ve Seminerler</option>
          <option value="Guvenlik">Botanik Bahçe Güvenliği</option>
          <option value="Yonetim">Yönetim ve İdari Destek</option>
        </select>
      </div>
      <div class="mb-2">
        <label for="personelEmail">E-mail:</label>
        <input type="text" id="personelEmail" name="personelEmail">
      </div> 
      <div class="mb-2">
        <label for="personelPhone">Telefon Numarası:</label>
        <input type="text" id="personelPhone" name="personelPhone">
      </div> 
      <button type="submit" class="btn btn-light mt-3 fw-bolder yazi px-5">Personel Ekle</button>
    </div>
</div>
</div>
</form>

  <script>
    document.getElementById("addPlantButton").addEventListener("click", function() {
        // Bitki ekleme formunu göster
        document.querySelector(".formContainer").classList.remove("d-none");
        // Diğer formları gizle
        document.querySelector(".formContainer1").classList.add("d-none");
        document.querySelector(".formContainer2").classList.add("d-none");
        document.querySelector(".formContainer3").classList.add("d-none");
    });

    document.getElementById("addEventButton").addEventListener("click", function() {
        // Etkinlik ekleme formunu göster
        document.querySelector(".formContainer1").classList.remove("d-none");
        // Diğer formları gizle
        document.querySelector(".formContainer").classList.add("d-none");
        document.querySelector(".formContainer2").classList.add("d-none");
        document.querySelector(".formContainer3").classList.add("d-none");
    });

    document.getElementById("addZiyaretciButton").addEventListener("click", function() {
        // Etkinlik ekleme formunu göster
        document.querySelector(".formContainer2").classList.remove("d-none");
        // Diğer formları gizle
        document.querySelector(".formContainer").classList.add("d-none");
        document.querySelector(".formContainer1").classList.add("d-none");
        document.querySelector(".formContainer3").classList.add("d-none");
    });

    document.getElementById("addEPersonelButton").addEventListener("click", function() {
        // Etkinlik ekleme formunu göster
        document.querySelector(".formContainer3").classList.remove("d-none");
        // Diğer formları gizle
        document.querySelector(".formContainer").classList.add("d-none");
        document.querySelector(".formContainer1").classList.add("d-none");
        document.querySelector(".formContainer2").classList.add("d-none");
    });
</script>


   
</body>
</html>

