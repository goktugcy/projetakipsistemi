-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: sql204.epizy.com
-- Üretim Zamanı: 16 Kas 2020, 19:54:33
-- Sunucu sürümü: 5.6.48-88.0
-- PHP Sürümü: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `epiz_27167367_gc`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `site_baslik` varchar(300) DEFAULT NULL,
  `site_aciklama` varchar(300) DEFAULT NULL,
  `site_sahibi` varchar(100) DEFAULT NULL,
  `mail_onayi` int(11) DEFAULT NULL,
  `duyuru_onayi` int(11) DEFAULT NULL,
  `site_logo` varchar(250) DEFAULT NULL,
  `keywords` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `site_baslik`, `site_aciklama`, `site_sahibi`, `mail_onayi`, `duyuru_onayi`, `site_logo`, `keywords`) VALUES
(1, 'Worker GC', 'G&ouml;ktuğ Ceyhan İş Takip Scripti', 'G&ouml;ktuğ Ceyhan', 0, 0, 'img/28472660nike_PNG7.png', 'iş proje takip sistemi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `counter`
--

CREATE TABLE `counter` (
  `counter_id` int(11) NOT NULL,
  `counter_sayac` int(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `counter`
--

INSERT INTO `counter` (`counter_id`, `counter_sayac`) VALUES
(0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `counter_ip`
--

CREATE TABLE `counter_ip` (
  `counterip_id` int(11) NOT NULL,
  `counterip_ip` varchar(20) NOT NULL,
  `counterip_yetki` int(1) NOT NULL DEFAULT '0',
  `tarih` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `counter_ip`
--

INSERT INTO `counter_ip` (`counterip_id`, `counterip_ip`, `counterip_yetki`, `tarih`) VALUES
(19, '85.98.21.195', 0, '2020-11-04 10:55:51'),
(20, '46.106.60.43', 0, '2020-11-04 11:11:55'),
(21, '46.221.45.43', 0, '2020-11-04 12:45:04'),
(22, '46.221.45.43', 0, '2020-11-04 12:45:40'),
(23, '46.221.45.43', 0, '2020-11-04 12:46:09'),
(24, '46.106.60.43', 0, '2020-11-04 13:41:33'),
(25, '5.181.233.162', 0, '2020-11-04 20:02:24'),
(26, '46.106.36.217', 0, '2020-11-05 17:48:40'),
(27, '107.181.177.138', 0, '2020-11-05 23:44:11'),
(28, '46.106.36.217', 0, '2020-11-05 23:46:01'),
(29, '176.55.154.254', 0, '2020-11-06 09:02:00'),
(30, '85.98.19.17', 0, '2020-11-06 18:13:02'),
(31, '176.55.104.240', 0, '2020-11-07 13:35:09'),
(32, '176.54.83.183', 0, '2020-11-08 11:52:31'),
(33, '85.98.19.17', 0, '2020-11-11 00:18:19'),
(34, '85.98.19.17', 0, '2020-11-11 00:21:53'),
(35, '176.55.31.0', 0, '2020-11-11 00:22:50'),
(36, '85.98.19.17', 0, '2020-11-11 00:24:23'),
(37, '85.98.19.17', 0, '2020-11-11 09:26:37'),
(38, '176.55.102.201', 0, '2020-11-11 11:44:57'),
(39, '85.98.19.17', 0, '2020-11-11 22:41:48'),
(40, '85.98.19.17', 0, '2020-11-12 07:55:38'),
(41, '176.55.75.241', 0, '2020-11-12 21:26:00'),
(42, '85.98.19.17', 0, '2020-11-13 00:06:27'),
(43, '85.98.19.17', 0, '2020-11-13 22:44:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hak_id` int(11) NOT NULL,
  `hak_baslik` varchar(50) DEFAULT NULL,
  `hak_aciklama` varchar(5000) DEFAULT NULL,
  `hk_foto` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hak_id`, `hak_baslik`, `hak_aciklama`, `hk_foto`) VALUES
(1, 'Hakkımızda', '<p><strong>Lorem Ipsum</strong>, dizgi ve baskı end&uuml;strisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak &uuml;zere bir yazı galerisini alarak karıştırdığı 1500&#39;lerden beri end&uuml;stri standardı sahte metinler olarak kullanılmıştır. Beşy&uuml;z yıl boyunca varlığını s&uuml;rd&uuml;rmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sı&ccedil;ramıştır. 1960&#39;larda Lorem Ipsum pasajları da i&ccedil;eren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum s&uuml;r&uuml;mleri i&ccedil;eren masa&uuml;st&uuml; yayıncılık yazılımları ile pop&uuml;ler olmuştur.</p>\r\n', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `wp_id` int(11) NOT NULL,
  `linkedin` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `facebook` varchar(90) CHARACTER SET utf8 DEFAULT NULL,
  `instagram` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `twitter` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `mail` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `whatsapp` varchar(13) CHARACTER SET utf8 DEFAULT NULL,
  `wp_mesaj` varchar(100) CHARACTER SET utf8 NOT NULL,
  `adres` varchar(250) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`wp_id`, `linkedin`, `facebook`, `instagram`, `twitter`, `mail`, `whatsapp`, `wp_mesaj`, `adres`) VALUES
(2, 'https://www.linkedin.com/in/g%C3%B6ktu%C4%9F-ceyhan-08812a45/', 'https://www.facebook.com/profile.php?id=100000027647963', 'https://instagram.com/goktug.cy', 'https://twitter.com/goktug.cy', 'goktugceyhan@gmail.com', '+905512067962', 'Merhaba bir konu hakkında bir şey soracağım.', 'Lorem Ipsum Press is licensed by Bionetwork Ltd. Our office is located within the company\'s building. Address: Keas 69 Str.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `kul_id` int(5) NOT NULL,
  `kul_isim` varchar(200) DEFAULT NULL,
  `kul_mail` varchar(250) DEFAULT NULL,
  `kul_sifre` varchar(250) DEFAULT NULL,
  `kul_telefon` varchar(50) DEFAULT NULL,
  `kul_unvan` varchar(250) DEFAULT NULL,
  `kul_yetki` int(11) DEFAULT NULL,
  `kul_logo` varchar(250) DEFAULT NULL,
  `ip_adresi` varchar(300) DEFAULT NULL,
  `session_mail` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kul_id`, `kul_isim`, `kul_mail`, `kul_sifre`, `kul_telefon`, `kul_unvan`, `kul_yetki`, `kul_logo`, `ip_adresi`, `session_mail`) VALUES
(1, 'G&ouml;ktuğ Ceyhan ', 'goktugceyhan@gmail.com', '46c188f168665146be19f18b28f1b1e6', '0', 'Yazılımcı | Admin', 1, 'img/95421451173b6db5b6-dc90-4cbf-9915-99cf8f3a6998.jpeg', '85.98.19.17', '1f5809592edc05fac4848aadf425b223');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mailbox`
--

CREATE TABLE `mailbox` (
  `id` int(11) NOT NULL,
  `ad` varchar(10) DEFAULT NULL,
  `soyad` varchar(15) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `mail` varchar(40) DEFAULT NULL,
  `mesaj` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje`
--

CREATE TABLE `proje` (
  `proje_id` int(5) NOT NULL,
  `proje_baslik` varchar(250) DEFAULT NULL,
  `proje_detay` text,
  `proje_teslim_tarihi` varchar(100) DEFAULT NULL,
  `proje_baslama_tarihi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `proje_durum` varchar(100) DEFAULT NULL,
  `proje_aciliyet` varchar(100) DEFAULT NULL,
  `dosya_yolu` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `proje`
--

INSERT INTO `proje` (`proje_id`, `proje_baslik`, `proje_detay`, `proje_teslim_tarihi`, `proje_baslama_tarihi`, `proje_durum`, `proje_aciliyet`, `dosya_yolu`) VALUES
(2, 'Proje-1', '<p>Proje-1</p>\r\n', '2019-04-28', '2019-04-06 13:19:39', 'Yeni Başladı', 'Acil', 'dosyalar/Proje-1142'),
(4, 'Proje-3', '<p>Proje-3</p>\r\n\r\n<p><em><strong>Aksoyhlc.net</strong></em></p>\r\n', '2019-04-18', '2019-04-06 13:20:33', 'Bitti', 'Normal', 'dosyalar/Proje-3639Logo.png'),
(11, 'Deneme', '', '2020-11-11', '2020-10-20 18:47:01', 'Devam Ediyor', 'Normal', NULL),
(12, 'sdfdsf', '', '2222-03-24', '2020-10-20 19:01:42', 'Devam Ediyor', 'Acil', NULL),
(14, 'deneme1', '', '2020-09-09', '2020-10-29 00:45:22', 'Yeni Başladı', 'Acil', NULL),
(15, '&Ouml;rnek Proje', '<p>&Ouml;rnek proje&nbsp;</p>\r\n', '2020-09-01', '2020-10-30 11:58:02', 'Yeni Başladı', 'Normal', 'dosyalar/3008093b6db5b6-dc90-4cbf-9915-99cf8f3a6998.jpeg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `sip_id` int(5) NOT NULL,
  `musteri_isim` varchar(250) DEFAULT NULL,
  `musteri_mail` varchar(250) DEFAULT NULL,
  `musteri_telefon` varchar(50) DEFAULT NULL,
  `sip_baslik` varchar(300) DEFAULT NULL,
  `sip_teslim_tarihi` varchar(100) DEFAULT NULL,
  `sip_aciliyet` varchar(100) DEFAULT NULL,
  `sip_durum` varchar(100) DEFAULT NULL,
  `sip_detay` mediumtext,
  `sip_ucret` varchar(100) DEFAULT NULL,
  `sip_baslama_tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dosya_yolu` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`sip_id`, `musteri_isim`, `musteri_mail`, `musteri_telefon`, `sip_baslik`, `sip_teslim_tarihi`, `sip_aciliyet`, `sip_durum`, `sip_detay`, `sip_ucret`, `sip_baslama_tarih`, `dosya_yolu`) VALUES
(9, 'G&ouml;ktuğ Ceyhan', 'goktugceyhan@gmail.com', '05512067962', 'Test 1 ', '2021-09-01', 'Acil', 'Yeni Başladı', '<p>asdasd</p>\r\n', '95', '2020-10-29 05:29:01', NULL),
(10, 'G&ouml;ktuğ Ceyhan', 'goktugceyhan@gmail.com', '905512067962', 'Test 112', '2020-11-12', 'Normal', 'Bitti', '<p>denemee</p>\r\n', '250', '2020-11-13 17:46:57', 'dosyalar/583kk.jpeg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `vizyon`
--

CREATE TABLE `vizyon` (
  `viz_id` int(11) NOT NULL,
  `viz_baslik` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `viz_aciklama` varchar(5000) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `vizyon`
--

INSERT INTO `vizyon` (`viz_id`, `viz_baslik`, `viz_aciklama`) VALUES
(1, 'VİZYON - MİSYON', '<p><strong>Lorem Ipsum</strong>, dizgi ve baskı end&uuml;strisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak &uuml;zere bir yazı galerisini alarak karıştırdığı 1500&#39;lerden beri end&uuml;stri standardı sahte metinler olarak kullanılmıştır. Beşy&uuml;z yıl boyunca varlığını s&uuml;rd&uuml;rmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sı&ccedil;ramıştır. 1960&#39;larda Lorem Ipsum pasajları da i&ccedil;eren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum s&uuml;r&uuml;mleri i&ccedil;eren masa&uuml;st&uuml; yayıncılık yazılımları ile pop&uuml;ler olmuştur.</p>\r\n');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `counter_ip`
--
ALTER TABLE `counter_ip`
  ADD PRIMARY KEY (`counterip_id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hak_id`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`wp_id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`kul_id`),
  ADD UNIQUE KEY `kul_mail` (`kul_mail`);

--
-- Tablo için indeksler `mailbox`
--
ALTER TABLE `mailbox`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `proje`
--
ALTER TABLE `proje`
  ADD PRIMARY KEY (`proje_id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`sip_id`);

--
-- Tablo için indeksler `vizyon`
--
ALTER TABLE `vizyon`
  ADD PRIMARY KEY (`viz_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `counter_ip`
--
ALTER TABLE `counter_ip`
  MODIFY `counterip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Tablo için AUTO_INCREMENT değeri `hakkimizda`
--
ALTER TABLE `hakkimizda`
  MODIFY `hak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `wp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `kul_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `mailbox`
--
ALTER TABLE `mailbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `proje`
--
ALTER TABLE `proje`
  MODIFY `proje_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `sip_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `vizyon`
--
ALTER TABLE `vizyon`
  MODIFY `viz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
