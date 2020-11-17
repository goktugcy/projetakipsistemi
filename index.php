<?php include 'header.php'?>
				<!-- Nav -->
				<?php
            	 $haksor=$db->prepare("SELECT * FROM hakkimizda ORDER BY hak_id DESC");
            	 $haksor->execute();
				 $hakcek=$haksor->fetch(PDO::FETCH_ASSOC) ?>
				 
					<nav id="nav">
						<ul>
							<li><a href="#<?php echo $hakcek['hak_baslik']?>" class="active"><?php echo $hakcek['hak_baslik']?></a></li>
							<li><a href="#first">First Section</a></li>
							<li><a href="#cta">Get Started</a></li>
						</ul>
					</nav>
			  
				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="<?php echo $hakcek['hak_baslik']?>" class="main">
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

						<!-- First Section -->
							<section id="first" class="main special">
								<header class="major">
									<h2>Magna veroeros</h2>
								</header>
								<ul class="features">
									<li>
										<span class="icon solid major style1 fa-code"></span>
										<h3>Ipsum consequat</h3>
										<p>Sed lorem amet ipsum dolor et amet nullam consequat a feugiat consequat tempus veroeros sed consequat.</p>
									</li>
									<li>
										<span class="icon major style3 fa-copy"></span>
										<h3>Amed sed feugiat</h3>
										<p>Sed lorem amet ipsum dolor et amet nullam consequat a feugiat consequat tempus veroeros sed consequat.</p>
									</li>
									<li>
										<span class="icon major style5 fa-gem"></span>
										<h3>Dolor nullam</h3>
										<p>Sed lorem amet ipsum dolor et amet nullam consequat a feugiat consequat tempus veroeros sed consequat.</p>
									</li>
								</ul>
								<footer class="major">
									<ul class="actions special">
										<li><a href="generic.html" class="button">Learn More</a></li>
									</ul>
								</footer>
							</section>

						
						<!-- Get Started -->
							<section id="cta" class="main special">
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
											</div>
										</form>
								</footer>
							</section>

					</div>
<?php include 'footer.php'?>

<script type="text/javascript">
  $('#islemsonucu').modal('show');
  setTimeout(function() {
    $('#islemsonucu').modal('hide');
  }, 3000);
</script>

