	<?php
include 'config/baglan.php';

if ($_POST) {
			// Formdan Gelen Kayıtlar
			
            $ad        =    $_POST["ad"];
			$soyad    =    $_POST["soyad"];
			$tel    =    $_POST["tel"];
			$mail    =    $_POST["mail"];
			$mesaj    =    $_POST["mesaj"];
		
         
            $ekle       =    mysql_query("insert into mailbox (ad,soyad,tel,mail,mesaj) values ('$ad','$soyad','$tel','$mail','$mesaj')");
            
            
            if($ekle){
              	header("location:../index?durum=ok");
							exit;
						} else {
							header("location:../index?durum=no");
							exit;
						}
					 exit;
				 }
   
?>