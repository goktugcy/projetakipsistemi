<?php include 'header.php'?>
				<!-- Nav -->
				<?php
            	 $haksor=$db->prepare("SELECT * FROM hakkimizda ORDER BY hak_id DESC");
            	 $haksor->execute();
				 $hakcek=$haksor->fetch(PDO::FETCH_ASSOC) ?>
				 
					<nav id="nav">
						<ul>
							<li><a href="#hakkimizda"><?php echo $hakcek['hak_baslik']?></a></li>
							<li><a href="#iletisim">İletişim</a></li>
						</ul>
					</nav>
			  
				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="hakkimizda" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2><?php echo $hakcek['hak_baslik'] ?></h2>
										</header>
										<p><?php echo $hakcek['hak_aciklama'] ?></p>
										<ul class="actions">
											<li><a href="generic.html" class="button">Learn More</a></li>
										</ul>
									</div>
									<span class="image"><img src="admin/<?php echo $ayarcek['site_logo'] ?>" alt="" /></span>
								</div>
							</section>

					
						
						<!-- Get Started -->
							<section id="iletisim" class="main special">
								<header class="major">
									<h2>İletişim</h2>
								
								</header>
								<footer class="major">
						<form method="POST" action="inc/function.php" enctype="multipart/form-data"  data-parsley-validate>
											<div class="row gtr-uniform">
												<div class="col-6 col-12-xsmall">
													<input type="text" name="ad"   placeholder="İsim" required>
												</div>
												<div class="col-6 col-12-xsmall">
													<input type="text" name="soyad"   placeholder="Soyisim" required>
												</div>
												<div class="col-6 col-12-xsmall">
													<input type="text" name="tel"   placeholder="Telefon" required>
												</div>
												<div class="col-6 col-12-xsmall">
													<input type="email" name="mail"   placeholder="Email" required>
												</div>
											
												<div class="col-12">
													<textarea name="mesaj"   placeholder="Mesajınız" rows="6" required></textarea>
												</div>
												<div class="col-12">
													<ul class="actions">
														<li><input type="submit"  name="ekle" placeholder="Gönder" class="primary"></li>
													</ul>
												</div>
												
										</form>
								</footer>
							</section>

					</div>
<?php include 'footer.php'?>

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
      text: 'İçerik Başarıyla Kaydedildi!',
      showConfirmButton: false,
      timer: 2000
    })
  </script>
  <?php } ?>