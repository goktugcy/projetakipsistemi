
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
    <div class="input-group">
      <label><?php echo $ayarcek['site_baslik'] ?></label>
    </div>
  </form>

  <!-- Topbar Navbar -->



  <div id="clock" class="dark">
    <center>
            <div class="display"></div>
              <div class="weekdays"></div>

            </center>

        </div>

      <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown no-arrow mx-1">
                  <a class="nav-link " target="_blank" href="../index.php" role="button">
                       Siteyi Görüntüle <i class="ml-2 fas fa-external-link-alt"></i>
                  </a>
              </li>

          </ul>
    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow d-none d-sm-inline-block form-inline ml-md-3 my-2 my-md-0 mw-100">

      <a class="nav-link dropdown-toggle" id="userDropdown" data-toggle="dropdown" >

        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
          <?php echo $kullanicicek['kul_isim']; ?>
        </span>
        <?php
        if (strlen($kullanicicek['kul_logo'])>0) {?>
          <img class="img-profile rounded-circle" width="200"  src="<?php echo $kullanicicek['kul_logo']; ?>">
        <?php } else {?>
          <img class="img-profile rounded-circle" width="200"  src="admin/img/logo-yok.png">
        <?php } ?>
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="profil">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Profil
        </a>

        <?php
        if (yetkikontrol()=="yetkili") {?>
          <a class="dropdown-item" href="ayarlar">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Ayarlar
          </a>
        <?php } ?>

        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Oturumu Kapat
        </a>
      </div>
    </li>
  </ul>
</nav>
<!-- Logout Modal-->
<div class="modal fade bg-gradient-primary" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-gradient-primary">
      <div class="modal-header">
        <h5 class="modal-title text-gray-100" id="exampleModalLabel">Oturum Kapatma</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>

      </div>
      <div class="modal-body text-gray-100">Oturumu kapatmak istediğinize emin misiniz?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
        <a class="btn btn-primary" href="islemler/cikis">Çıkış Yap</a>
        </div>
      </div>
    </div>
  </div>
<!-- End of Topbar -->
