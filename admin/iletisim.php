<?php
include 'assets/header.php';
if (yetkikontrol()!="yetkili") {
  header("location:index.php?durum=izinsiz");
  exit;
}

?>

<link rel="stylesheet" media="all" type="text/css" href="vendor/upload/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" media="all" href="vendor/upload/themes/explorer-fas/theme.min.css">
<script src="vendor/upload/js/fileinput.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/fas/theme.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/explorer-fas/theme.minn.js" type="text/javascript" charset="utf-8"></script>
<?php
$telsor=$db->prepare("SELECT * FROM iletisim ORDER BY whatsapp DESC");
$telsor->execute();
$telcek=$telsor->fetch(PDO::FETCH_ASSOC) ?>

<?php
$fbsor=$db->prepare("SELECT * FROM iletisim ORDER BY facebook DESC");
$fbsor->execute();
$fbcek=$fbsor->fetch(PDO::FETCH_ASSOC) ?>
<?php
$igsor=$db->prepare("SELECT * FROM iletisim ORDER BY instagram DESC");
$igsor->execute();
$igcek=$igsor->fetch(PDO::FETCH_ASSOC) ?>
<?php
$lksor=$db->prepare("SELECT * FROM iletisim ORDER BY linkedin DESC");
$lksor->execute();
$lkcek=$lksor->fetch(PDO::FETCH_ASSOC) ?>

<?php
$ttsor=$db->prepare("SELECT * FROM iletisim ORDER BY twitter DESC");
$ttsor->execute();
$ttcek=$ttsor->fetch(PDO::FETCH_ASSOC) ?>

<?php
$mailsor=$db->prepare("SELECT * FROM iletisim ORDER BY mail DESC");
$mailsor->execute();
$mailcek=$mailsor->fetch(PDO::FETCH_ASSOC) ?>
<?php
$adressor=$db->prepare("SELECT * FROM iletisim ORDER BY adres DESC");
$adressor->execute();
$adrescek=$adressor->fetch(PDO::FETCH_ASSOC) ?>
<center>


  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Sosyal Medya & İletişim</h5>
      </div>
      <div class="card-body">
        <form action="islemler/islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate>
        <h4>Linkedin</h4>
        <div class="form-group col-md-12">
              <input type="text" class="form-control" name="linkedin" value="<?php echo $lkcek['linkedin'] ?>">
            </div>
     
        <h4>Twitter</h4>
          <div class="form-group col-md-12">
              <input type="text" class="form-control" name="twitter" value="<?php echo $ttcek['twitter'] ?>">
            </div>
       
          <h4>Facebook</h4>
          <div class="form-group col-md-12">
              <input type="text" class="form-control" name="facebook" value="<?php echo $fbcek['facebook'] ?>">
            </div>
        
          <h4>İnstagram</h4>
          <div class="form-group col-md-12">
              <input type="text" class="form-control" name="instagram" value="<?php echo $igcek['instagram'] ?>">
            </div>
          
            <h4>E posta</h4>
          <div class="form-group col-md-12">
              <input type="email" class="form-control" name="mail"  value="<?php echo $mailcek['mail'] ?>">
            </div>
            <h4>WhatsApp</h4>
            <div class="form-group col-md-12">
              <input type="phone" class="form-control" name="whatsapp" value="<?php echo $telcek['whatsapp'] ?>">
            </div>
          <h4>WhatsApp Mesaj İçeriği (Ziyaretçi Tarafı)</h4>
          <div class="form-group col-md-12">
            <input type="text" class="form-control" name="wp_mesaj" value="<?php echo $telcek['wp_mesaj'] ?>">
          </div>

        <h4>Adres</h4>
          <div class="form-group col-md-12">
            <input type="text" class="form-control" name="adres" value="<?php echo $adrescek['adres'] ?>">
          </div>


        <button type="submit" name="iletisim" class="btn btn-primary">Kaydet</button>
      </form>
    </div>
  </div>
  </div>
  <!-- End of Main Content -->


</center>
<?php include 'assets/footer.php'?>
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
