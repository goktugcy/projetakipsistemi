<?php


@ob_start();
@session_start();
include 'baglan.php';
include '../fonksiyonlar.php';

//Site ayarlarını veritabanından çekme işlemi
$ayarsor=$db->prepare("SELECT * FROM ayarlar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

/********************************************************************************/

/*Oturum Açma İşlemi Giriş*/
if (isset($_POST['oturumac'])) {
	$kul_mail=guvenlik($_POST['kul_mail']);
	$kul_sifre=md5($_POST['kul_sifre']);
	$kullanicisor=$db->prepare("SELECT * FROM kullanicilar WHERE kul_mail=:mail and kul_sifre=:sifre");
	$kullanicisor->execute(array(
		'mail'=> $kul_mail,
		'sifre'=> $kul_sifre
	));
	$sonuc=$kullanicisor->rowCount();
	if ($sonuc==1) {
		$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
		$_SESSION['kul_mail']=sifreleme($kul_mail); //Session güvenliği için sessionumuzu üç aşamalı oalrak şifreliyoruz
		$_SESSION['kul_id']=$kullanicicek['kul_id'];

		$ipkaydet=$db->prepare("UPDATE kullanicilar SET
			ip_adresi=:ip_adresi,
			session_mail=:session_mail WHERE
			kul_mail=:kul_mail
			");

		$kaydet=$ipkaydet->execute(array(
			'ip_adresi' => $_SERVER['REMOTE_ADDR'], //Güvenlik için işlemine karşı kullanıcının ip adresini veritabanına kayıt ediyoruz
			'session_mail' => sifreleme($kul_mail),
			'kul_mail' => $kul_mail
		));
		header("location:../index.php");
		exit;
	} else {
		header("location:../login?durum=hata");
	}
	exit;
}
/*Oturum Açma İşlemi Giriş*/


/*******************************************************************************/

if (isset($_POST['genelayarkaydet'])) {
  if (yetkikontrol()!="yetkili") {
    header("location:../index.php");
    exit;
  }
 			$boyut = $_FILES['site_logo']['size'];//Dosya boyutumuzu alıp değişkene aktardık.
            if($boyut > 3145728)//Burada dosyamız 3 mb büyükse girmesini söyledik
            {
            //İsteyen arkadaslar burayı istediği gibi değiştirebilir size kalmış bir şey
                echo 'Dosya 3MB den büyük olamaz.';// 3 mb büyükse ekrana yazdıracağımız alan
              } else {

               if ($boyut < 20) {
                $genelayarkaydet=$db->prepare("UPDATE ayarlar SET
                 site_baslik=:baslik,
                 site_aciklama=:aciklama,
								 keywords=:keywords,
                 site_sahibi=:sahip,
                 mail_onayi=:mail_onayi,
                 duyuru_onayi=:duyuru_onayi where id=1
                 ");

                $ekleme=$genelayarkaydet->execute(array(
                 'baslik' => guvenlik($_POST['site_baslik']),
                 'aciklama' => guvenlik($_POST['site_aciklama']),
								 'keywords' => guvenlik($_POST['keywords']),
                 'sahip' => guvenlik($_POST['site_sahibi']),
                 'mail_onayi' => guvenlik($_POST['mail_onayi']),
                 'duyuru_onayi' => guvenlik($_POST['duyuru_onayi'])
               ));

              } else {

                $yuklemeklasoru = '../img';
                @$gecici_isim = $_FILES['site_logo']["tmp_name"];
                @$dosya_ismi = $_FILES['site_logo']["name"];
            		$benzersizsayi1=rand(100,10000); //Güvenlik için yüklenen dosyanın başına rastgele karakterler koyuyoruz
            		$benzersizsayi2=rand(100,10000); //Güvenlik için yüklenen dosyanın başına rastgele karakterler koyuyoruz
            		$isim=$benzersizsayi1.$benzersizsayi2.$dosya_ismi;
            		$resim_yolu=substr($yuklemeklasoru, 3)."/".tum_bosluk_sil($isim);
            		@move_uploaded_file($gecici_isim, "$yuklemeklasoru/$isim");

            		$genelayarkaydet=$db->prepare("UPDATE ayarlar SET
            			site_baslik=:baslik,
            			site_aciklama=:aciklama,
									keywords=:keywords,
            			site_sahibi=:sahip,
            			mail_onayi=:onay,
            			duyuru_onayi=:duyuru_onayi,
            			site_logo=:site_logo where id=1
            			");

            		$ekleme=$genelayarkaydet->execute(array(
            			'baslik' => guvenlik($_POST['site_baslik']),
            			'aciklama' => guvenlik($_POST['site_aciklama']),
									'keywords' => guvenlik($_POST['keywords']),
            			'sahip' => guvenlik($_POST['site_sahibi']),
            			'onay' => guvenlik($_POST['mail_onayi']),
            			'duyuru_onayi' => guvenlik($_POST['duyuru_onayi']),
            			'site_logo' => $resim_yolu
            		));
            	}
            }

            if ($ekleme) {
            	header("location:../ayarlar?durum=ok");
            } else {
            	header("location:../ayarlar?durum=no");
            	exit;
            }
          }

          /*******************************************************************************/

//Proje Ekleme Bölümü
          if (isset($_POST['projeekle'])) {
            if (yetkikontrol()!="yetkili") {
              header("location:../index.php");
              exit;
            }
//Proje detaylarını veritabanınına kayıt etme
            $projeekle=$db->prepare("INSERT INTO proje SET
             proje_baslik=:baslik,
             proje_detay=:detay,
             proje_teslim_tarihi=:teslim_tarihi,
             proje_durum=:durum,
             proje_aciliyet=:aciliyet
             ");

            $ekleme=$projeekle->execute(array(
             'baslik' => guvenlik($_POST['proje_baslik']),
             'detay' => $_POST['proje_detay'],
             'teslim_tarihi' => guvenlik($_POST['proje_teslim_tarihi']),
             'durum' => guvenlik($_POST['proje_durum']),
             'aciliyet' => guvenlik($_POST['proje_aciliyet'])
           ));

            if ($_FILES['proje_dosya']['error']=="0") {
              $yuklemeklasoru = '../dosyalar';
              @$gecici_isim = $_FILES['proje_dosya']["tmp_name"];
              @$dosya_ismi = $_FILES['proje_dosya']["name"];
              $benzersizsayi1=rand(100000,999999);
              $isim=$benzersizsayi1.$dosya_ismi;
              $resim_yolu=substr($yuklemeklasoru, 3)."/".tum_bosluk_sil($isim);
              @move_uploaded_file($gecici_isim, "$yuklemeklasoru/$isim");
              $son_eklenen_id=$db->lastInsertId();
              $dosyayukleme=$db->prepare("UPDATE proje SET
               dosya_yolu=:dosya_yolu WHERE proje_id=:proje_id ");

              $yukleme=$dosyayukleme->execute(array(
               'dosya_yolu' => $resim_yolu,
               'proje_id' => $son_eklenen_id
             ));
            }

            if ($ekleme) {
             header("location:../projeler?durum=ok");
             exit;
           } else {
             header("location:../projeler?durum=no");
             exit;
           }
           exit;
         }


         /********************************************************************************/

         if (isset($_POST['projeguncelle'])) {
          if (yetkikontrol()!="yetkili") {
            header("location:../index.php");
            exit;
          }
          $projeguncelle=$db->prepare("UPDATE proje SET
            proje_baslik=:baslik,
            proje_detay=:detay,
            proje_teslim_tarihi=:teslim_tarihi,
            proje_durum=:durum,
            proje_aciliyet=:aciliyet where proje_id={$_POST['proje_id']}");

          $guncelle=$projeguncelle->execute(array(
            'baslik' => guvenlik($_POST['proje_baslik']),
            'detay' => $_POST['proje_detay'],
            'teslim_tarihi' => guvenlik($_POST['proje_teslim_tarihi']),
            'durum' => guvenlik($_POST['proje_durum']),
            'aciliyet' => guvenlik($_POST['proje_aciliyet'])
          ));
          if ($_FILES['proje_dosya']['error']=="0") {

            $yuklemeklasoru = '../dosyalar';
            @$gecici_isim = $_FILES['proje_dosya']["tmp_name"];
            @$dosya_ismi = $_FILES['proje_dosya']["name"];
            $benzersizsayi1=rand(10,1000);
            $isim1=$benzersizsayi1.$dosya_ismi;
            $isim=tum_bosluk_sil($isim1);
            $resim_yolu=substr($yuklemeklasoru, 3)."/".$isim;
            @move_uploaded_file($gecici_isim, "$yuklemeklasoru/$isim");

            $dosyayukleme=$db->prepare("UPDATE proje SET
              dosya_yolu=:dosya_yolu WHERE proje_id=:proje_id ");

            $yukleme=$dosyayukleme->execute(array(
              'dosya_yolu' => $resim_yolu,
              'proje_id' => $_POST['proje_id']
            ));

          };

          if ($guncelle) {
            header("location:../projeler?durum=ok");
            exit;
          } else {
            header("location:../projeler?durum=no");
            exit;
          }
          exit;
        }

        /********************************************************************************/


        if (isset($_POST['siparisekle'])) {
          if (yetkikontrol()!="yetkili") {
            header("location:../index.php");
            exit;
          }
          $siparisekle=$db->prepare("INSERT INTO siparis SET
            musteri_isim=:isim,
            musteri_mail=:mail,
            musteri_telefon=:telefon,
            sip_baslik=:baslik,
            sip_teslim_tarihi=:teslim_tarihi,
            sip_aciliyet=:aciliyet,
            sip_durum=:durum,
            sip_ucret=:ucret,
            sip_detay=:detay
            ");

          $ekleme=$siparisekle->execute(array(
            'isim' => guvenlik($_POST['musteri_isim']),
            'mail' => guvenlik($_POST['musteri_mail']),
            'telefon' => guvenlik($_POST['musteri_telefon']),
            'baslik' => guvenlik($_POST['sip_baslik']),
            'teslim_tarihi' => guvenlik($_POST['sip_teslim_tarihi']),
            'aciliyet' => guvenlik($_POST['sip_aciliyet']),
            'durum' => guvenlik($_POST['sip_durum']),
            'ucret' => guvenlik($_POST['sip_ucret']),
            'detay' => $_POST['sip_detay']
          ));

          if ($_FILES['sip_dosya']["error"]=="0") {
           $yuklemeklasoru = '../dosyalar';
           @$gecici_isim = $_FILES['sip_dosya']["tmp_name"];
           @$dosya_ismi = $_FILES['sip_dosya']["name"];
           $benzersizsayi1=rand(10,1000);
           $isim1=$benzersizsayi1.$dosya_ismi;
           $isim=tum_bosluk_sil($isim1);
           $resim_yolu=substr($yuklemeklasoru, 3)."/".$isim;
           move_uploaded_file($gecici_isim, "$yuklemeklasoru/$isim");



           $son_eklenen_id=$db->lastInsertId();

           $dosyayukleme=$db->prepare("UPDATE siparis SET
            dosya_yolu=:dosya_yolu WHERE sip_id=:sip_id ");

           $yukleme=$dosyayukleme->execute(array(
            'dosya_yolu' => $resim_yolu,
            'sip_id' => $son_eklenen_id
          ));
         }


         if ($ekleme) {
          header("location:../siparisler?durum=ok");
          exit;
        } else {
          header("location:../siparisler?durum=no");
          exit;
        }
        exit;
      }


      /********************************************************************************/


      if (isset($_POST['siparisguncelle'])) {
        if (yetkikontrol()!="yetkili") {
          header("location:../index.php");
          exit;
        }
        $siparisguncelle=$db->prepare("UPDATE siparis SET
          musteri_isim=:isim,
          musteri_mail=:mail,
          musteri_telefon=:telefon,
          sip_baslik=:baslik,
          sip_teslim_tarihi=:teslim_tarihi,
          sip_aciliyet=:aciliyet,
          sip_durum=:durum,
          sip_detay=:detay,
          sip_ucret=:ucret
          WHERE sip_id={$_POST['sip_id']}");

        $guncelle=$siparisguncelle->execute(array(
          'isim' => guvenlik($_POST['musteri_isim']),
          'mail' => guvenlik($_POST['musteri_mail']),
          'telefon' => guvenlik($_POST['musteri_telefon']),
          'baslik' => guvenlik($_POST['sip_baslik']),
          'teslim_tarihi' => guvenlik($_POST['sip_teslim_tarihi']),
          'aciliyet' => guvenlik($_POST['sip_aciliyet']),
          'durum' => guvenlik($_POST['sip_durum']),
          'detay' => $_POST['sip_detay'],
          'ucret' => guvenlik($_POST['sip_ucret'])
        ));


        if ($_FILES['sip_dosya']['error']=="0") {

          $yuklemeklasoru = '../dosyalar';
          @$gecici_isim = $_FILES['sip_dosya']["tmp_name"];
          @$dosya_ismi = $_FILES['sip_dosya']["name"];
          $benzersizsayi1=rand(10,1000);
          $isim1=$benzersizsayi1.$dosya_ismi;
          $isim=tum_bosluk_sil($isim1);
          $resim_yolu=substr($yuklemeklasoru, 3)."/".$isim;
          @move_uploaded_file($gecici_isim, "$yuklemeklasoru/$isim");


          if ($_POST['dosya_sil']=="sil") {
            $dosya_yolu="";
          } else {
            $dosya_yolu=$resim_yolu;
          };

          $dosyayukleme=$db->prepare("UPDATE siparis SET
            dosya_yolu=:dosya_yolu WHERE sip_id=:sip_id ");

          $yukleme=$dosyayukleme->execute(array(
            'dosya_yolu' => $dosya_yolu,
            'sip_id' => $_POST['sip_id']
          ));

        }

        if ($guncelle) {
          header("location:../siparisler?durum=ok");
          exit;
        } else {
          echo "\nPDOStatement::errorInfo():\n";
          $arr = $guncelle->errorInfo();
          print_r($arr);
          exit;
        }
        exit;
      }



      /********************************************************************************/


      if (isset($_POST['sifreguncelle'])) {
        if (yetkikontrol()!="yetkili") {
          header("location:../index.php");
          exit;
        }
        $eskisifre=guvenlik($_POST['eskisifre']);
        $yenisifre_bir=guvenlik($_POST['yenisifre_bir']);
        $yenisifre_iki=guvenlik($_POST['yenisifre_iki']);

        $kul_sifre=md5($eskisifre);

        $kullanicisor=$db->prepare("SELECT * FROM kullanicilar WHERE kul_sifre=:sifre AND kul_id=:id");
        $kullanicisor->execute(array(
          'id' => guvenlik($_POST['kul_id']),
          'sifre' => $kul_sifre
        ));

//dönen satır sayısını belirtir
        $say=$kullanicisor->rowCount();

        if ($say==0) {
          header("Location:../profil?durum=eskisifrehata");
        } else {
//eski şifre doğruysa başla
          if ($yenisifre_bir==$yenisifre_iki) {
           if (strlen($yenisifre_bir)>=6) {
//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
            $sifre=md5($yenisifre_bir);
            $kullanici_yetki=0;
            $kullanicikaydet=$db->prepare("UPDATE kullanicilar SET
             kul_sifre=:kul_sifre
             WHERE kul_id=:kul_id");

            $insert=$kullanicikaydet->execute(array(
             'kul_sifre' => $sifre,
             'kul_id'=>guvenlik($_POST['kul_id'])
           ));

            if ($insert) {
             header("Location:../profil.php?durum=sifredegisti");
//Header("Location:../production/genel-ayarlar?durum=ok");
           } else {
             header("Location:../profil.php?durum=no");
           }

// Bitiş
         } else {
          header("Location:../profil.php?durum=eksiksifre");
        }

      } else {
       header("Location:../profil?durum=sifreleruyusmuyor");
       exit;
     }
   }
   exit;
   if ($update) {
    header("Location:../profil?durum=ok");

  } else {
    header("Location:../profil?durum=no");
  }
}


/********************************************************************************/


if (isset($_POST['profilguncelle'])) {
  if (yetkikontrol()!="yetkili") {
    header("location:../index.php");
    exit;
  }
  if (isset($_SESSION['kul_mail'])) {

			$boyut = $_FILES['kul_logo']['size'];//Dosya boyutumuzu alıp değişkene aktardık.
            if($boyut > 3145728)//Burada dosyamız 3 mb büyükse girmesini söyledik
            {
            //İsteyen arkadaslar burayı istediği gibi değiştirebilir size kalmış bir şey
                echo 'Dosya 3MB den büyük olamaz.';// 3 mb büyükse ekrana yazdıracağımız alan
              } else {
               $yuklemeklasoru = '../img';
               @$gecici_isim = $_FILES['kul_logo']["tmp_name"];
               @$dosya_ismi = $_FILES['kul_logo']["name"];
               $benzersizsayi1=rand(10000,99999);
               $benzersizsayi2=rand(10000,99999);
               $isim=$benzersizsayi1.$benzersizsayi2.$dosya_ismi;
               $resim_yolu=substr($yuklemeklasoru, 3)."/".tum_bosluk_sil($isim);
               @move_uploaded_file($gecici_isim, "$yuklemeklasoru/$isim");
             }

             $uzunluk=strlen($resim_yolu);
             if ($uzunluk<18) {
               $profilguncelle=$db->prepare("UPDATE kullanicilar SET
                kul_isim=:isim,
                kul_mail=:mail,
                kul_telefon=:telefon,
                kul_unvan=:unvan WHERE session_mail=:session_mail");
               $ekleme=$profilguncelle->execute(array(
                'isim' => guvenlik($_POST['kul_isim']),
                'mail' => guvenlik($_POST['kul_mail']),
                'telefon' => guvenlik($_POST['kul_telefon']),
                'unvan' => guvenlik($_POST['kul_unvan']),
                'session_mail' => $_SESSION['kul_mail']
              ));

               if ($ekleme) {
                header("Location:../profil?durum=ok");
              } else {

                header("Location:../profil?durum=no");
              }
              exit;
            } else {
            	$profilguncelle=$db->prepare("UPDATE kullanicilar SET
            		kul_isim=:isim,
            		kul_mail=:mail,
            		kul_telefon=:telefon,
            		kul_unvan=:unvan,
            		kul_logo=:logo WHERE session_mail=:session_mail");
            	$ekleme=$profilguncelle->execute(array(
            		'isim' => guvenlik($_POST['kul_isim']),
            		'mail' => guvenlik($_POST['kul_mail']),
            		'telefon' => guvenlik($_POST['kul_telefon']),
            		'unvan' => guvenlik($_POST['kul_unvan']),
            		'logo' => $resim_yolu,
            		'session_mail' => $_SESSION['kul_mail']
            	));

            	if ($ekleme) {
            		header("Location:../profil?durum=ok");
            	} else {
            		header("Location:../profil?durum=noff");
            	}
            	exit;
            }

          }
          header("Location:../profil");
          exit;

        }


        /********************************************************************************/



        if (isset($_POST['siparissilme'])) {
          if (yetkikontrol()!="yetkili") {
            header("location:../index.php");
            exit;
          }
          $sil=$db->prepare("DELETE from siparis where sip_id=:id");
          $kontrol=$sil->execute(array(
            'id' => guvenlik($_POST['sip_id'])
          ));

          if ($kontrol) {
//echo "kayıt başarılı";
            header("location:../siparisler?durum=ok");
            exit;
          } else {
//echo "kayıt başarısız";
            header("location:../siparisler?durum=no");
            exit;

          }
        }


        /********************************************************************************/


        if (isset($_POST['projesilme'])) {
          if (yetkikontrol()!="yetkili") {
            header("location:../index.php");
            exit;
          }
          $sil=$db->prepare("DELETE from proje where proje_id=:id");
          $kontrol=$sil->execute(array(
            'id' => guvenlik($_POST['proje_id'])
          ));

          if ($kontrol) {
//echo "kayıt başarılı";
            header("location:../projeler?durum=ok");
            exit;
          } else {
//echo "kayıt başarısız";
            header("location:../projeler?durum=no");
            exit;

          }
        }


        /********************************************************************************/



 	    if (isset($_POST['hakkimizda'])) {
 	     if (yetkikontrol()!="yetkili") {
 	       header("location:../index.php");
 		      exit;
 		    }
 		    $hakkimizda=$db->prepare("UPDATE  hakkimizda SET
 		      hak_baslik=:baslik,
 		      hak_aciklama=:aciklama		");

 			   $guncelle=$hakkimizda->execute(array(
 			     'baslik' => guvenlik($_POST['hak_baslik']),
 			     'aciklama' => $_POST['hak_aciklama'],
 			   ));


 				  if ($guncelle) {
 				    header("location:../hakkimizda?durum=ok");
 				    exit;
 				  } else {
 				    header("location:../hakkimizda?durum=no");
 				    exit;
 				  }
 			   exit;
 			 }

			 /***********************************************************************/


			 if (isset($_POST['vizyon'])) {
				if (yetkikontrol()!="yetkili") {
					header("location:../index.php");
					 exit;
				 }
				 $vizyon=$db->prepare("UPDATE   vizyon SET
					 viz_baslik=:baslik,
					 viz_aciklama=:aciklama		");

					$guncelle=$vizyon->execute(array(
						'baslik' => guvenlik($_POST['viz_baslik']),
						'aciklama' => $_POST['viz_aciklama'],
					));


					 if ($guncelle) {
						 header("location:../vizyon?durum=ok");
						 exit;
					 } else {
						 header("location:../vizyon?durum=no");
						 exit;
					 }
					exit;
				}


				/**********************************************************************/



				if (isset($_POST['iletisim'])) {
				 if (yetkikontrol()!="yetkili") {
					 header("location:../index.php");
						exit;
					}
					$iletisim=$db->prepare("UPDATE iletisim SET
						whatsapp=:no,
            wp_mesaj=:mesaj,
            linkedin=:lk,
            facebook=:fb,
            instagram=:ig,
            twitter=:tt,
            mail=:mail,
            adres=:adres ");

					 $guncelle=$iletisim->execute(array(
						 'no' => guvenlik($_POST['whatsapp']),
             'mesaj' => $_POST['wp_mesaj'],
             'lk' => $_POST['linkedin'],
             'fb' => $_POST['facebook'],
             'ig' => $_POST['instagram'],
             'tt' => $_POST['twitter'],
             'mail' => $_POST['mail'],
             'adres' => $_POST['adres'],
					 ));


						if ($guncelle) {
							header("location:../iletisim?durum=ok");
							exit;
						} else {
							header("location:../iletisim?durum=no");
							exit;
						}
					 exit;
				 }

    /*********************************************************/

    if (isset($_POST['logsil'])) {
          if (yetkikontrol()!="yetkili") {
            header("location:../index.php");
            exit;
          }
          $sil=$db->prepare("DELETE from mailbox where id=:id");
          $kontrol=$sil->execute(array(
            'id' => guvenlik($_POST['id'])
          ));

          if ($kontrol) {

            header("location:../mailbox?durum=ok");
            exit;
          } else {

            header("location:../mailbox?durum=no");
            exit;

          }
        }

    /******************************************************/

         if (isset($_POST['ipsil'])) {
          if (yetkikontrol()!="yetkili") {
            header("location:../index.php");
            exit;
          }
          $ipsil=$db->prepare("DELETE from counter_ip where counterip_id=:counterip_id < 1000;");
          $kontrol=$ipsil->execute(array(
            'counterip_id' => guvenlik($_POST['counterip_id'])
          ));

          if ($kontrol) {

            header("location:../log?durum=ok");
            exit;
          } else {

            header("location:../log?durum=no");
            exit;

          }
        }
        

        ?>
