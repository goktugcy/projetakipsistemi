<?php
$host="sql204.epizy.com"; //Host adınızı girin varsayılan olarak Localhosttur eğer bilginiz yoksa bu şekilde bırakın
$veritabani_ismi="epiz_27167367_gc"; //Veritabanı İsminiz
$kullanici_adi="epiz_27167367"; //Veritabanı kullanıcı adınız
$sifre="WtaJ2VyN3ate"; //Kullanıcı şifreniz şifre yoksa 123456789 yazan yeri silip boş bırakın

try {
	$db=new PDO("mysql:host=$host;dbname=$veritabani_ismi;charset=utf8",$kullanici_adi,$sifre);
	//echo "veritabanı bağlantısı başarılı";
}

catch (PDOExpception $e) {
	echo $e->getMessage();
}

?>
