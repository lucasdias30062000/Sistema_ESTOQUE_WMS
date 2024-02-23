<?php

	$usuario = "root";
	$senha = "";
	$dtb = "dtbstoq";
	$host = "localhost";

	$conn = new PDO("mysql:dbname=dtbstoq;host=localhost", "root", "");
	$conection = mysqli_connect($host, $usuario, $senha, $dtb) or die('Nao foi possivel conectar');
	
?>
