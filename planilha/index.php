<?php 
include('../php/serv_config.php');

	//nome do arquivo que será exportado
	$arquivo ='clientes.xls';

	//tabela com formato da planilha
	$html = '';
	$html .= '<table border="1">';
	$html .= '<tr>';
	$html .= '<td colspan="5">Planilha De Clientes</tr>';
	$html .= '</tr>';

	$html .= '<tr>';
	$html .= '<td><b>ID</b></td>';
	$html .= '<td><b>Nome</b></td>';
	$html .= '<td><b>Email</b></td>';
	$html .= '<td><b>Telefone</b></td>';
	$html .= '<td><b>Facebook</b></td>';
	$html .= '<td><b>Twitter</b></td>';
	$html .= '<td><b>Instagram</b></td>';
	$html .= '<td><b>Data de Nascimento</b></td>';
	$html .= '<td><b>Estado</b></td>';
	$html .= '<td><b>Sexo</b></td>';
	$html .= '<td><b>Redes Sociais</b></td>';
	$html .= '<td><b>Noticias</b></td>';
	$html .= '</tr>';

	$pdo_verifica = $conexao_pdo->prepare('SELECT * FROM cadastrados ORDER BY id ASC');
	$pdo_verifica->execute();

	//inserindo dados na tabela

	while ( $fetch = $pdo_verifica->fetch()){
		$html .= '<tr>';
		$html .= '<td>'.$fetch["id"].'</td>';
		$html .= '<td>'.$fetch["nome"].'</td>';
		$html .= '<td>'.$fetch["email"].'</td>';
		$html .= '<td>'.$fetch["telefone"].'</td>';
		$html .= '<td>'.$fetch["facebook"].'</td>';
		$html .= '<td>'.$fetch["twitter"].'</td>';
		$html .= '<td>'.$fetch["instagram"].'</td>';
		$html .= '<td>'.$fetch["data_nasc"].'</td>';
		$html .= '<td>'.$fetch["estado"].'</td>';
		$html .= '<td>'.$fetch["sexo"].'</td>';
		$html .= '<td>'.$fetch["rede_sociais"].'</td>';
		$html .= '<td>'.$fetch["noticias"].'</td>';
	}

		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;

		exit;

		header("location: ../index.html");

 ?>