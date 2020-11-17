<?php include 'islemler/baglan.php' ;
$ayarsor=$db->prepare("SELECT * FROM ayarlar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

// GİRİŞ YAPILAN İP ADRESİNİ SİSTEME LOGLAR
function sayac(){
    global $db;

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    $kontrol = $db->prepare("SELECT * FROM counter");
            $kontrol->execute(array());
    $tablo_dolumu = $kontrol->rowCount();

    if (!$tablo_dolumu) {

        $query = $db->prepare("INSERT INTO counter SET
        counter_sayac = ?");
        $insert = $query->execute(array(
         "0"
        ));

    }

    $sql = $db->prepare("SELECT * FROM counter_ip");
            $sql->execute(array());
            $row=$sql->fetch(PDO::FETCH_ASSOC);


    if ($row['counterip_ip'] != $ip) {

        $query = $db->prepare("INSERT INTO counter_ip SET
        counterip_ip = ?");
        $insert = $query->execute(array(
             $ip
        ));

        $sql = $db->prepare("SELECT * FROM counter WHERE counter_id =?");
            $sql->execute(array('1'));

            $row=$sql->fetch(PDO::FETCH_ASSOC);
            $artir = $row['counter_sayac']+1;


            $guncelle = $db->prepare("UPDATE counter SET counter_sayac=? WHERE counter_id = ?");
            $guncelle->execute(array(
            $artir,'1'));

    } else {
        $sql = $db->prepare("SELECT * FROM counter WHERE counter_id= ?");
        $sql->execute(array(
            '1'
        ));

        $row=$sql->fetch(PDO::FETCH_ASSOC);
        echo $row['counter_sayac'];
    }
}
?>
<?php sayac(); ?>

<!DOCTYPE html>
<html lang="tr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo $ayarcek['site_aciklama'] ?>">
  <meta name="author" content="<?php echo $ayarcek['site_sahibi'] ?>">
  <link rel="shortcut icon" type="image/png" href="<?php echo $ayarcek['site_logo'] ?>">

  <title><?php echo $ayarcek['site_baslik'] ?></title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/theme-dark.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
  <div class="container align-items-center" style="margin-top: 7%">
    <div class="row justify-content-center align-content-center">
      <div class="card o-hidden border-0 shadow-md" style="min-width: 45%">
       <div class="p-5">
        <div class="text-center">
          <h2 class="h2 text-gray-100 mb-4">Hoşgeldin</h2>
        </div>
        <form class="user" action="islemler/islem.php" method="POST">
          <div class="form-group">
            <input name="kul_mail" required type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder=" E-Mail ">
          </div>
          <div class="form-group">
            <input type="password" required name="kul_sifre" class="form-control form-control-user" id="exampleInputPassword" placeholder="Şifre">
          </div>
          <button name="oturumac" type="submit" class="btn text-white btn-primary btn-user btn-block">Oturum Aç</button>
          <hr>
          <p class="text-muted text-center"><?php echo $ayarcek['site_baslik'] ?></p>
        </form>
      </div>
    </div>
  </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<script src="vendor/sweetalert/sweetalert2.all.min.js"></script>
<?php if (@$_GET['durum']=="hata")  {?>
  <script>
    Swal.fire({
      type: 'error',
      title: 'Oturum Açma İşlemi Başarısız',
      text: 'Girdiğiniz Bilgileri Kontrol Edin Lütfen',
      showConfirmButton: true,
      confirmButtonText: 'Kapat'
    })
  </script>
<?php } ?>

<?php if (@$_GET['durum']=="izinsiz")  {?>
  <script>
    Swal.fire({
      type: 'error',
      title: 'Giriş İzniniz Yok',
      text: 'Sayfayı Görüntüleyebilmek İçin Lütfen Oturum Açın',
      showConfirmButton: true,
      confirmButtonText: 'Kapat'
    })
  </script>
<?php } ?>

<?php if (@$_GET['durum']=="suphe")  {?>
  <script>
    Swal.fire({
      type: 'error',
      title: 'Şüpheli Hareket',
      text: 'Şüpheli Bir Hareket Tespit Edildi Lütfen Tekrar Oturum Açın',
      showConfirmButton: true,
      confirmButtonText: 'Kapat'
    })
  </script>
<?php } ?>
