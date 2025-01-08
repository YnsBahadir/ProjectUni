-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 Ara 2024, 21:40:09
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
-- Veritabanı: `hastane_sistem`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hasta_gecmisi`
--

CREATE TABLE `hasta_gecmisi` (
  `hasta_id` int(11) NOT NULL,
  `hasta_adi` varchar(100) NOT NULL,
  `surekli_ilaclar` text DEFAULT NULL,
  `rahatsizliklar` text DEFAULT NULL,
  `muayene_sonucu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `hasta_gecmisi`
--

INSERT INTO `hasta_gecmisi` (`hasta_id`, `hasta_adi`, `surekli_ilaclar`, `rahatsizliklar`, `muayene_sonucu`) VALUES
(1, 'Yunus Bahadır', 'Lansor', 'İskender görünce dayanamıyor.', 'İskender tedavisi'),
(2, 'Ali Hamsi', 'Lansormaz', 'Hamsi meraklısı', 'Hamsi yemeli');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevular`
--

CREATE TABLE `randevular` (
  `id` int(11) NOT NULL,
  `hasta_adi` varchar(100) DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  `klinik` varchar(100) DEFAULT NULL,
  `doktor` varchar(100) DEFAULT NULL,
  `saat` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `randevular`
--

INSERT INTO `randevular` (`id`, `hasta_adi`, `tarih`, `klinik`, `doktor`, `saat`) VALUES
(3, 'Ali Hamsi', '2025-04-11', 'Dahiliye', 'Yunus Bahadır', '11:30'),
(4, 'Baraya', '2025-03-14', 'Göz Hastalıkları', 'Yunus Bahadır', '10:30'),
(5, 'Veli', '2024-01-17', 'Ortopedi', 'Jasmine Lovecraft', '15:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sekreterler`
--

CREATE TABLE `sekreterler` (
  `id` int(11) NOT NULL,
  `ad` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sifre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `sekreterler`
--

INSERT INTO `sekreterler` (`id`, `ad`, `email`, `sifre`) VALUES
(11, 'Hamsici Hasim', 'hamsi@hamsici.com', '$2y$10$5OxIinT/4sNaXJ6d41gE9OC2xJCfOb3Na4IgGcFLZtxl/qt276D66');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `hasta_gecmisi`
--
ALTER TABLE `hasta_gecmisi`
  ADD PRIMARY KEY (`hasta_id`);

--
-- Tablo için indeksler `randevular`
--
ALTER TABLE `randevular`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sekreterler`
--
ALTER TABLE `sekreterler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `hasta_gecmisi`
--
ALTER TABLE `hasta_gecmisi`
  MODIFY `hasta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `randevular`
--
ALTER TABLE `randevular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `sekreterler`
--
ALTER TABLE `sekreterler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
