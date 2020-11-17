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
<!-- Begin Page Content -->
<!------------------------>
<?php
$haksor=$db->prepare("SELECT * FROM hakkimizda ORDER BY hak_id DESC");
$haksor->execute();
$hakcek=$haksor->fetch(PDO::FETCH_ASSOC) ?>

	
<div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
          <h6 class="m-0 font-weight-bold text-primary">  <?php echo $hakcek['hak_baslik'] ?></h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample" style="">
          <div class="card-body">
          <?php echo $hakcek['hak_aciklama'] ?>
          </div>
        </div>
      </div>

</div>


<div class="container">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary">Hakkımızda</h5>
    </div>
    <div class="card-body">
      <form action="islemler/islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Hakkımızda</label>
           
            <input type="text" class="form-control" name="hak_baslik" placeholder="<?php echo $hakcek['hak_baslik'] ?>">
          </div>
        </div>



      <div class="form-row mt-2">
        <div class="form-group col-md-12">
          <textarea class="ckeditor" name="hak_aciklama" id="editor"></textarea>
        </div>
      </div>
      <button type="submit" name="hakkimizda" class="btn btn-primary">Kaydet</button>
    </form>
  </div>
</div>
</div>
<!-- End of Main Content -->
<?php include 'assets/footer.php' ?>
<script src="ckeditor/ckeditor.js"></script>



<script>
 CKEDITOR.replace('editor',{
 });
</script>
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
