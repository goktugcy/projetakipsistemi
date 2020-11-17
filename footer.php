				<?php
            	 $iletisim=$db->prepare("SELECT * FROM iletisim ORDER BY wp_id DESC");
            	 $iletisim->execute();
				 $iletisimcek=$iletisim->fetch(PDO::FETCH_ASSOC) ?>
				 <?php
            	 $vizyon=$db->prepare("SELECT * FROM vizyon ORDER BY viz_id DESC");
            	 $vizyon->execute();
				 $vizcek=$vizyon->fetch(PDO::FETCH_ASSOC) ?>
				 
				 <style>
				footer {  display: -webkit-box;
    				-webkit-line-clamp: 5;
    				-webkit-box-orient: vertical; 
					overflow:hidden;
				};
				</style>

				<!-- Footer -->
					<footer id="footer">
						
						<section>
							<h2><?php echo $vizcek['viz_baslik']?></h2>
							<p><?php echo $vizcek['viz_aciklama']?></p>
						</section>
						
						<section>
							<h2>İletişim </h2>
							<dl class="alt">
								<dt>Address</dt>
								<dd><?php echo $iletisimcek['adres']?></dd>
								<dt>Phone</dt>
								<dd><?php echo $iletisimcek['whatsapp']?></dd>
								<dt>Email</dt>
								<dd><a href="mailto:<?php echo $iletisimcek['mail']?>"><?php echo $iletisimcek['mail']?></a></dd>
							</dl>
							<ul class="icons">
								<li><a href="<?php echo $iletisimcek['twitter']?>" class="icon brands fa-twitter alt"><span class="label">Twitter</span></a></li>
								<li><a href="<?php echo $iletisimcek['facebook']?>" class="icon brands fa-facebook-f alt"><span class="label">Facebook</span></a></li>
								<li><a href="<?php echo $iletisimcek['instagram']?>" class="icon brands fa-instagram alt"><span class="label">Instagram</span></a></li>
								<li><a href="<?php echo $iletisimcek['linkedin']?>" class="icon brands fa-linkedin-in alt"><span class="label">GitHub</span></a></li>
								</ul>
						</section>
						<p class="copyright">&copy; <?php echo $ayarcek['site_baslik'] ?></p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="admin/vendor/sweetalert/sweetalert2.all.min.js"></script>
	</body>
</html>