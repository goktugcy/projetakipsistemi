<?php

ob_start();
session_start();
include 'config/baglan.php';
$ayarsor=$db->prepare("SELECT * FROM ayarlar ");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title><?php echo $ayarcek['site_baslik'] ?></title>
		<meta charset="UTF-8">
     	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    	<meta http-equiv="Content-Language" content="tr" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    	
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">
				<?php
				$iletisimsor=$db->prepare("SELECT * FROM iletisim ");
				$iletisimsor->execute();
				$iletisimcek=$iletisimsor->fetch(PDO::FETCH_ASSOC);

				?>
				<!-- Header -->
					<header id="header" class="alt">
						
						<span class="logo"><img src="/admin/<?php echo $ayarcek['site_logo'] ?>" alt="" width="200" height="200"/></span>
						<h1><?php echo $ayarcek['site_baslik'] ?></h1>
						<p><?php echo $ayarcek['site_aciklama'] ?><br />
						Twitter <a href="<?php echo $iletisimcek['twitter']?>"><i class="fa fa-twitter my-float"></i></a>  &nbsp&nbsp&nbsp WhatsApp <a href="https://api.whatsapp.com/send?phone=<?php echo $iletisimcek['whatsapp'];?>&text=<?php echo $iletisimcek['wp_mesaj'];?>" class="float" target="_blank"><i class="fa fa-whatsapp my-float"></i>.</p>
						<ul class="statistics">
			
			<?php
					$siparissayisor=$db->prepare("SELECT sip_id FROM siparis");
					$siparissayisor->execute();
					$siparissayisicek = $siparissayisor->rowCount();
			?>
									<li class="style1">
										<span class="icon solid fa-shopping-basket"></span>
										<strong><?php echo $siparissayisicek; ?></strong> Siparişler
									</li>
			<?php
				$siparis_biten_sayi_sor=$db->prepare("SELECT sip_id FROM siparis WHERE sip_durum='Bitti'");
				$siparis_biten_sayi_sor->execute();
				$siparis_biten_sayi_cek = $siparis_biten_sayi_sor->rowCount();
		?>
									<li class="style2">
										<span class="icon fa-handshake"></span>
										<strong><?php echo $siparis_biten_sayi_cek; ?></strong> Tamamlanan Siparişler
									</li>
			<?php
				$siparissayisor=$db->prepare("SELECT sip_id FROM siparis WHERE sip_aciliyet='Acil'");
				$siparissayisor->execute();
				$siparissayicek = $siparissayisor->rowCount();
			?>
									<li class="style3">
										<span class="icon solid fa-tachometer-alt"></span>
										<strong><?php echo $siparissayicek; ?></strong> Hızlandırılan Sipariş Sayısı
									</li>
			<?php
				$proje_biten_sayi_sor=$db->prepare("SELECT proje_id FROM proje WHERE proje_durum='Bitti'");
				$proje_biten_sayi_sor->execute();
				$proje_biten_sayi_cek = $proje_biten_sayi_sor->rowCount();
			?>
									<li class="style4">
										<span class="icon solid fa-check"></span>
										<strong><?php echo $proje_biten_sayi_cek; ?></strong> Bitirdiğimiz Projeler
									</li>
			<?php
				$projesayisor=$db->prepare("SELECT proje_id FROM proje WHERE proje_durum='Yeni Başladı'");
				$projesayisor->execute();
				$projesayicek = $projesayisor->rowCount();
			?>
									<li class="style5">
										<span class="icon fa-gem"></span>
										<strong><?php echo $projesayicek;?></strong> Yeni Başlayan Projeler
									</li>
								</ul>
						</header>
