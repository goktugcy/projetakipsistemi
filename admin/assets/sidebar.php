
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <li class="nav-item mt-1 mb-1">
    <center>
      <a class="nav-link" style="text-align: center;" href="index.php" title="Ana Sayfa">
        <li> <?php echo $ayarcek['site_baslik'] ?></li>
      </a>

    </center>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Ana Sayfa</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-edit"></i>
        <span>İçerik</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">İçerik İşlemleri</h6>
          <a class="collapse-item" href="hakkimizda">Hakkımızda</a>
          <a class="collapse-item" href="vizyon">Vizyon & Misyon</a>
        </div>
      </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Proje - Sipariş
    </div>




    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
        <i class="fas fa-tasks"></i>
        <span>Projeler</span>
      </a>
      <div id="collapseone" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Proje İşlemleri</h6>
          <a class="collapse-item" href="projeler">Tüm Projeler</a>
          <?php
          if (yetkikontrol()=="yetkili") {?>
            <a class="collapse-item" href="projeekle">Proje Ekle</a>
          <?php } ?>

        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
        <i class="fas fa-shopping-cart"></i>
        <span>Siparişler</span>
      </a>
      <div id="collapsefour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Sipariş İşlemleri</h6>
          <a class="collapse-item" href="siparisler">Tüm Siparişler</a>
          <?php
          if (yetkikontrol()=="yetkili") {?>
            <a class="collapse-item" href="siparisekle">Sipariş Ekle</a>
          <?php } ?>

        </div>
      </div>
    </li>
      <hr class="sidebar-divider">
    <li class="nav-item">
      <a class="nav-link" href="profil">
        <i class="fas fa-user-circle"></i>
        <span>Profil</span>
      </a>
    </li>

    <?php
    if (yetkikontrol()=="yetkili") {?>
      <li class="nav-item">
        <a class="nav-link" href="log">
          <i class="far fa fa-shield-alt"></i>
          <span>Son Girişler</span>
        </a>
      </li>
    <?php } ?>

    <?php
    if (yetkikontrol()=="yetkili") {?>
      <li class="nav-item">
        <a class="nav-link" href="ayarlar">
          <i class="fas fas fa-fw fa-cog"></i>
          <span>Ayarlar</span>
        </a>
      </li>
    <?php } ?>

    <?php
    if (yetkikontrol()=="yetkili") {?>
      <li class="nav-item">
        <a class="nav-link" href="iletisim">
          <i class="fab fa-whatsapp"></i>
          <span>Sosyal Medya & iletişim</span>
        </a>
      </li>
    <?php } ?>

    <li class="nav-item">
      <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
        <span>Oturumu Kapat</span>
      </a>
    </li>



    <!-- Nav Item - Utilities Collapse Menu -->


    <!-- Divider -->
    <hr class="sidebar-divider">

  </ul>
  <!-- End of Sidebar -->
