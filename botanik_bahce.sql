-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 May 2024, 18:19:16
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `botanik_bahce`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bitkiler`
--

CREATE TABLE `bitkiler` (
  `bitki_ad` varchar(100) DEFAULT NULL,
  `bitki_konum` varchar(100) DEFAULT NULL,
  `isik_ihtiyaci` varchar(100) DEFAULT NULL,
  `sulama_sikligi` varchar(100) DEFAULT NULL,
  `gubreleme_periyodu` varchar(100) DEFAULT NULL,
  `bitki_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `bitkiler`
--

INSERT INTO `bitkiler` (`bitki_ad`, `bitki_konum`, `isik_ihtiyaci`, `sulama_sikligi`, `gubreleme_periyodu`, `bitki_id`) VALUES
('', 'Sera', 'Tam_Gunes', 'Gunluk', 'Ilkbahar-Sonbahar', 10);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `etkinlikler`
--

CREATE TABLE `etkinlikler` (
  `etkinlik_ad` varchar(100) DEFAULT NULL,
  `etkinlik_tarihi` date DEFAULT NULL,
  `etkinlik_konu` varchar(100) DEFAULT NULL,
  `katilimci_sayisi` int(11) DEFAULT NULL,
  `etkinlik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_ad` varchar(255) NOT NULL,
  `kullanici_sifre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kullanici_id`, `kullanici_ad`, `kullanici_sifre`) VALUES
(2, 'nermin', 'A4tech123.'),
(3, '', ''),
(4, 'nrmnn4', 'bn');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personeller`
--

CREATE TABLE `personeller` (
  `personel_ad` varchar(100) DEFAULT NULL,
  `personel_soyad` varchar(100) DEFAULT NULL,
  `personel_gorev` varchar(100) DEFAULT NULL,
  `personel_email` varchar(100) DEFAULT NULL,
  `personel_tel` varchar(11) DEFAULT NULL,
  `personel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `personeller`
--

INSERT INTO `personeller` (`personel_ad`, `personel_soyad`, `personel_gorev`, `personel_email`, `personel_tel`, `personel_id`) VALUES
('Rabia', 'Kamış', 'Rehberlik', 'nerminbaycan7@gmail.com', '123456', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ziyaretciler`
--

CREATE TABLE `ziyaretciler` (
  `ziyaretci_ad` varchar(100) DEFAULT NULL,
  `ziyaretci_soyad` varchar(100) DEFAULT NULL,
  `ziyaret_tarihi` date DEFAULT NULL,
  `ziyaret_nedeni` varchar(100) DEFAULT NULL,
  `ziyaretci_tel` varchar(11) DEFAULT NULL,
  `ziyaretci_yas` int(11) DEFAULT NULL,
  `ziyaretci_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bitkiler`
--
ALTER TABLE `bitkiler`
  ADD PRIMARY KEY (`bitki_id`);

--
-- Tablo için indeksler `etkinlikler`
--
ALTER TABLE `etkinlikler`
  ADD PRIMARY KEY (`etkinlik_id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `personeller`
--
ALTER TABLE `personeller`
  ADD PRIMARY KEY (`personel_id`);

--
-- Tablo için indeksler `ziyaretciler`
--
ALTER TABLE `ziyaretciler`
  ADD PRIMARY KEY (`ziyaretci_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bitkiler`
--
ALTER TABLE `bitkiler`
  MODIFY `bitki_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `etkinlikler`
--
ALTER TABLE `etkinlikler`
  MODIFY `etkinlik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `personeller`
--
ALTER TABLE `personeller`
  MODIFY `personel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `ziyaretciler`
--
ALTER TABLE `ziyaretciler`
  MODIFY `ziyaretci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
