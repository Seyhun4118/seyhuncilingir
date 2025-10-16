<?php
ini_set('display_errors', 0);
$dem=0; // Bu alanda 1 yazıldığında sistem demo moda geçer.
try {
	$db=new PDO('mysql:host=localhost;dbname=DBADI','KULLANICIADI','SIFRE');
	$db->query("SET NAMES utf8");
}
catch (PDOException $e) {

	echo $e->getMessage();
}