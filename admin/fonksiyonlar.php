<?php


function turkce_temizle($metin) {
	$turkce=array("ş","Ş","ı","ü","Ü","ö","Ö","ç","Ç","ş","Ş","ı","ğ","Ğ","İ","ö","Ö","Ç","ç","ü","Ü");
	$duzgun=array("s","S","i","u","U","o","O","c","C","s","S","i","g","G","I","o","O","C","c","u","U");
	$metin=str_replace($turkce,$duzgun,$metin);
	$metin = preg_replace("@[^a-z0-9\-_şıüğçİŞĞÜÇ]+@i","-",$metin);
	$yeniisim = mb_strtolower($metin, 'utf8');
	return $yeniisim;
};


function tum_bosluk_sil($veri)
{
	return str_replace(" ", "", $veri);
};

function yetkikontrol() {
	if (empty($_SESSION['kul_mail'])) {
		$kul_mail="x";
	} else {
		$kul_mail=$_SESSION['kul_mail'];
	}

	include 'islemler/baglan.php';
	$yetki=$db->prepare("SELECT kul_yetki FROM kullanicilar where session_mail=:session_mail");
	$yetki->execute(array(
		'session_mail' => $kul_mail
	));
	$yetkicek=$yetki->fetch(PDO::FETCH_ASSOC);

	if ($yetkicek['kul_yetki']==1) {
		$sonuc="yetkili";
		return $sonuc;
	} else {
		$sonuc="yetkisiz";
		return $sonuc;
	}
};

function oturumkontrol() {
	include 'islemler/baglan.php';
	if (empty($_SESSION['kul_mail']) or empty($_SESSION['kul_id'])) {
		header("location:login.php?durum=izinsiz");
		exit;
	} else {

		$kullanici=$db->prepare("SELECT * FROM kullanicilar where session_mail=:session_mail");
		$kullanici->execute(array(
			'session_mail' => $_SESSION['kul_mail']
		));

		$say=$kullanici->rowcount();
		$kullanicicek=$kullanici->fetch(PDO::FETCH_ASSOC);
		if ($say==0) {
			header("location:login.php?durum=izinsiz");
			exit;
		}
	}
};


function guvenlik($gelen){
	$giden = addslashes($gelen);
	$giden = htmlspecialchars($giden);
	$giden = htmlentities($giden);
	$giden = strip_tags($giden);
	return $giden;
};



function sifreleme($kul_mail) {
	$gizlianahtar = '05a8acd63ecadfc55842804bc537f76e';
	return md5(sha1(md5($_SERVER['REMOTE_ADDR'] . $gizlianahtar . $kul_mail . "goktug.cy" . date('d.m.Y H:i:s') . $_SERVER['HTTP_USER_AGENT'])));
};

?>
