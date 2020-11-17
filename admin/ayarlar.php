<?php
include 'assets/header.php';
if (yetkikontrol()!="yetkili") {
	header("location:index.php?durum=izinsiz");
	exit;
};
?>
<link rel="stylesheet" media="all" type="text/css" href="vendor/upload/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" media="all" href="vendor/upload/themes/explorer-fas/theme.min.css">
<script src="vendor/upload/js/fileinput.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/fas/theme.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/explorer-fas/theme.minn.js" type="text/javascript" charset="utf-8"></script>
<!-- Begin Page Content -->
<script type="text/javascript">
	var genislik = $(window).width()
	if (genislik < 768) {
		function yenile(){
			$('#sidebarToggleTop').trigger('click');
		}
		setTimeout("yenile()",1);
	}
</script>
		<div class="container-fluid p-2">
<div class="col-md-17">

	<div class="container-fluid p-2">
		<div class="row" style="margin-bottom: -20px;">


			<div class="col-xl-3 col-md-6 mb-4">
					<div class="card bg-primary border-left-warning shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-s font-weight-bold text-white text-uppercase mb-1">PHP <b>SÜRÜM</b></div>

										<?php
		echo '<div class="h4 mb-0 font-weight-bold text-gray-100"> ' . phpversion();
			// prints e.g. '2.0' or nothing if the extension isn't enabled
			echo phpversion('tidy')."\n";?>
								</div>
								</div>
								<div class="col-auto">
									<i class="fab fa-php fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
					</div>


			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-success text-uppercase mb-1">CGI <b>Server</b> Kontrolü</div>
								<div class="h4 mb-0 font-weight-bold text-gray-100">
									<?php
												$sapi_type = php_sapi_name();
												if (substr($sapi_type, 0, 3) == 'cgi') {
	    								echo "CGI PHP mevcut\n";
										} else {
	    						echo "CGI PHP mevcut değil\n";
								}
								?>
								</div>
							</div>
							<div class="col-auto">
								<i class="fa fa-server fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-danger shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Sunucu <b>İşletim</b> Sistemi</div>
								<div class="h4 mb-0 font-weight-bold text-gray-100">

									<?php

echo ' '.php_uname('s')."\n"; // output: "s: Linux"
echo ''.php_uname('m')."\n"; // output: "m: x86_64"




?>

								</div>
							</div>
							<div class="col-auto">
								<i class="fa fa-windows  fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Earnings (Monthly) Card Example -->

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">PHP'ye ayrılan bellek</b></div>
								<div class="h4 mb-0 font-weight-bold text-gray-100">
									<?php
									function convert($size)
		{
		    $unit=array('b','kb','mb','gb','tb','pb');
		    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
		}

		echo convert(memory_get_usage(true)); // 123 kb
	?></div>
							</div>
							<div class="col-auto">
								<i class="fa  fa-database fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>


<div class="container-fluid p-2">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h5 class="m-0 font-weight-bold text-primary">Site Ayarları</h5>
		</div>
		<div class="card-body">
			<form action="islemler/islem.php" method="POST" enctype="multipart/form-data" data-parsley-validate>
				<div class="form-row mb-3">
					<div class="file-loading">
						<input class="form-control" id="sitelogosu" name="site_logo" type="file">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Site Başlığı</label>
						<input type="text" required class="form-control" name="site_baslik" value="<?php echo $ayarcek['site_baslik'] ?>" placeholder="Site Başlığı">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Site Açıklaması</label>
						<input type="text" required class="form-control" name="site_aciklama" value="<?php echo $ayarcek['site_aciklama'] ?>" placeholder="Site Açıklaması (En Fazla 250 Karakter)">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Site Anahtar Kelimeler</label>
						<input type="text" required class="form-control" name="keywords" value="<?php echo $ayarcek['keywords'] ?>" placeholder="Anahtar Kelimeler (En fazla 50 kelime)">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Site Sahibi</label>
						<input type="text" required class="form-control" name="site_sahibi" value="<?php echo $ayarcek['site_sahibi'] ?>" placeholder="Site Sahibi">
					</div>
				</div>

				<button type="submit" name="genelayarkaydet" class="btn btn-primary">Kaydet</button>
			</form>

		</div>
	</div>
</div>


<script>
	$(document).ready(function () {
		$("#sitelogosu").fileinput({
			'theme': 'explorer-fas',
			'showUpload': false,
			minFileSize: 5,
			allowedFileExtensions: ["jpg", "png", "jpeg","mp4","zip"],
			initialPreview: [
			"<img src='<?php echo $ayarcek['site_logo'] ?>' style='height:90px' class='file-preview-image' alt='Logo' title='Logo'>"
			],
		});
	});
</script>
<script type="text/javascript">
	function ayarlarikaydet() {
		$.ajax({
        type: 'POST',   //post olarak belirledik
        url: 'islemler/mail.php',  //formdaki verilerin gidecegi adres
        data: $('form#mailformu').serialize(), //#form id li formumuzu bilesenlerine ayirdik
        success: function(gelen) { //islem basarili oldugunda yapilacak
        	$('#sonuc').html(gelen);
        }
    });
	}
</script>﻿
<?php include 'assets/footer.php' ?>

<?php if (@$_GET['durum']=="no")  {?>
	<script>
		Swal.fire({
			type: 'error',
			title: 'İşlem Başarısız',
			text: 'Lütfen Tekrar Deneyin',
			showConfirmButton: true,
			confirmButtonText: 'Kapat'
		})
	</script>
<?php } ?>

<?php if (@$_GET['durum']=="ok")  {?>
	<script>
		Swal.fire({
			type: 'success',
			title: 'İşlem Başarılı',
			text: 'İşleminiz Başarıyla Gerçekleştirildi',
			showConfirmButton: true,
			confirmButtonText: 'Kapat'
		})
	</script>
	<?php } ?>
