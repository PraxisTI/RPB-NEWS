<?php 
include('../php/serv_config.php');

	$pdo_verifica = $conexao_pdo->prepare("TRUNCATE TABLE `cadastrados`");
	$pdo_verifica->execute();

	header("location: ../index.html");
 ?>