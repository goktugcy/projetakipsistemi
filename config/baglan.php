<?php
$host="sql204.epizy.com"; 
$veritabani_ismi="epiz_27167367_gc"; 
$kullanici_adi="epiz_27167367";
$sifre="WtaJ2VyN3ate"; 

try {
	$db=new PDO("mysql:host=$host;dbname=$veritabani_ismi;charset=utf8",$kullanici_adi,$sifre);
	
}

catch (PDOExpception $e) {
	echo $e->getMessage();
}

?>
