<?php

ob_start();
session_start();

include 'islemler/baglan.php';
include 'fonksiyonlar.php';

oturumkontrol();

$ayarsor=$db->prepare("SELECT * FROM ayarlar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

$kullanici=$db->prepare("SELECT * FROM kullanicilar where session_mail=:mail");
$kullanici->execute(array(
	'mail' => $_SESSION['kul_mail']
));

$say=$kullanici->rowcount();
$kullanicicek=$kullanici->fetch(PDO::FETCH_ASSOC);
if ($say==0) {
	header("location:login?durum=izinsiz");
	exit;
};

/*Eğer IP Adresi Değiştiğinde Oturum Sonlandırılmasını İstemiyorsanız Aşağıdaki Satırları Silin*/

if ($kullanicicek['ip_adresi']!=$_SERVER['REMOTE_ADDR']) {
	header("location:login?durum=suphe");
	session_destroy();
	exit;
}

/*Eğer IP Adresi Değiştiğinde Oturum Sonlandırılmasını İstemiyorsanız Yukarıdaki Satırları Silin*/

?>

<!DOCTYPE html>
<html lang="tr">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="<?php echo $ayarcek['site_aciklama'] ?>">
	<meta name="author" content="<?php echo $ayarcek['site_sahibi'] ?>">
	<link rel="shortcut icon" type="image/png" href="<?php echo $ayarcek['site_logo'] ?>">

	<title><?php echo $ayarcek['site_baslik'] ?></title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<script src="https://kit.fontawesome.com/8e6fd15958.js" crossorigin="anonymous"></script>

	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
		<link href="css/theme-dark.css" rel="stylesheet">
	<link href="css/admin.css" rel="stylesheet">

	<style type="text/css" media="screen">
		.file-details-cell {
			display: none
		}
	</style>

</head>
<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">
<?php include 'sidebar.php'?>

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">

				<!-- Main Content -->
				<div id="content">

				<?php include 'topbar.php'?>
					<script type="text/javascript">
						var genislik = $(window).width()
						if (genislik < 768) {
							function gizle(){
								$('#sidebarToggleTop').trigger('click');
							}
							setTimeout("gizle()",1);
						}
					</script>



	<!-- SAAT TARİH -->
					<style type="text/css">
	.time-frame {
		background-color: transparent;
		color: #2E353E;
		width: auto;
		min-width: 160px;
		font-family: Arial;
		margin:0 auto;
		display:table;
		padding:10px 10px;

		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
	}

	.time-frame > div {
		width: 100%;
		text-align: center;
	}

	#tarih-bolumu {
		font-size: 18px;
		color:#2E353E;
	}
	#saat-bolumu {
		font-size: 32px;
		line-height: 30px;
		margin-top:5px;
	}
</style>

					<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
							<script type="text/javascript" src="js/scripts.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
<script type="text/javascript">
	$(window).load(function(){
		$(document).ready(function() {
			var interval = setInterval(function() {
				var momentNow = moment();
				$('#tarih-bolumu').html(momentNow.format('DD.MM.YYYY'));
				$('#saat-bolumu').html(momentNow.format('hh:mm:ss'));
			}, 100);
		});
	});
</script>
