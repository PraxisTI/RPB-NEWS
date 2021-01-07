<?php

try{

	if (isset($_POST['bt_enviar'])) {
		
		$nome = $_POST['con_name'];
		$email = $_POST['con_email'];
		$assunto = $_POST['con_assunto']; 
		$mensagem = $_POST['con_mensagem'];
		//====================================================
		
		//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
		//==================================================== 
		$email_remetente = "fidelmaximo@hotmail.com"; // deve ser uma conta de email do seu dominio 
		//====================================================
		
		//Configurações do email, ajustar conforme necessidade
		//==================================================== 
		$email_destinatario = "noticiasrpb@gmail.com"; // pode ser qualquer email que receberá as mensagens
		$email_reply = "$email"; 
		$email_assunto = "Contato RPB"; // Este será o assunto da mensagem
		//====================================================
		
		//Monta o Corpo da Mensagem
		//====================================================
		$email_conteudo = "Nome = $nome \n"; 
		$email_conteudo .= "Email = $email \n";
		$email_conteudo .= "Assunto = $assunto \n"; 
		$email_conteudo .= "Mensagem = $mensagem \n"; 
		//====================================================
		
		//Seta os Headers (Alterar somente caso necessario) 
		//==================================================== 
		$email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
		//====================================================
		
		//Enviando o email 
		//==================================================== 
		mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers);
		//====================================================

		header("location: ../index.html");
	} 

	die();
} catch (phpmailerException $e) {
    die();
} catch (Exception $e) {
    die();
}
?>