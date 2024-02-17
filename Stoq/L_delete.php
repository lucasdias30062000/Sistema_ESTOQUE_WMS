<?php

	require_once 'conection.php';

	$id = $_GET['id'];


	$stmt = $conn->prepare("DELETE FROM tbdcadprod WHERE id_Produto = $id");

	$stmt->execute();

	header('Location: consulta.php');
	


?>