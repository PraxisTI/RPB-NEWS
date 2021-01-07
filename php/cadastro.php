<?php 
include('serv_config.php');
	if (isset($_POST['enviar'])) {


		$nome = $_POST['nome'];
		$email = $_POST['email'];
	    $tel = $_POST['celular'];
	    $facebook = $_POST['facebook'];
	    $twitter = $_POST['twitter'];
	    $instagram = $_POST['instagram'];
	    $data_nasc = $_POST['date'];
	    $estado = $_POST['estado'];
	    $sexo = $_POST['sexo'];	
	    /*------------ Redes Sociais ------------*/	
		$rede_sociais = "";
		$rede_social = isset($_POST['rede_sociais']) ? $_POST['rede_sociais'] : array();
		/*------------- Noticias ----------------*/
		$noticias = "";
		$noticia = isset($_POST['noticias']) ? $_POST['noticias'] : array();


		/*------------ Redes Sociais ------------*/
		foreach($rede_social as $key => $value){
			 if($rede_sociais != ""){
			    $rede_sociais = $rede_sociais.", ".$value;
			 }
			 else{
			    $rede_sociais = $value;
			}
		}
		/*---------- FIM//Redes Sociais ----------*/
		/*########################################*/
		/*-------------- Noticias ----------------*/
			foreach($noticia as $key => $value2){
				 if($noticias != ""){
				    $noticias = $noticias.", ".$value2;
				 }
				 else{
				    $noticias = $value2;
				}
			}
		/*------------ FIM//Noticias -------------*/


		$pdo_insere = $conexao_pdo->prepare('INSERT INTO cadastrados (nome, email, telefone, facebook, twitter, instagram, data_nasc, estado, sexo, rede_sociais, noticias) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
		   $pdo_insere->execute( array( $nome,$email,$tel,$facebook,$twitter,$instagram,$data_nasc,$estado,$sexo,$rede_sociais,$noticias) );
	}
	header("location: ../index.html");
?>