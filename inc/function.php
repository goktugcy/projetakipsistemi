
<?php
include '../config/baglan.php';
  

if (isset($_POST['ekle'])) {                  
    $ekle=$db->prepare("INSERT INTO mailbox SET
        ad=:ad,
        soyad=:soyad,
        tel=:tel,
        mail=:mail,
        mesaj=:mesaj
    ");

    $ekleme=$ekle->execute(array(
        'ad' => $_POST['ad'],
        'soyad' => $_POST['soyad'],
        'tel' => $_POST['tel'],
        'mail' => $_POST['mail'],
        'mesaj' => $_POST['mesaj'],
    ));

    

    if ($ekle) {
        header("location:../index.php?durum=ok");
        exit;
    } else {
        header("location:../index.php?durum=no");
        exit;
    }
    exit;
}
?>
