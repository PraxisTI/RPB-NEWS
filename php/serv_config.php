<?php 
	//destroi a sessão dps de 60min
	session_cache_expire(60);

	session_start();

	if(!isset($_SESSION['logado'])){
		$_SESSION['logado'] = false;
	}

	$_SESSION['login_erro'] = false;

	$data_base  = 'consu967_rpb_news';
	$user_db  = 'consu967_rpb';
	$pass_db    = 'Rpb*news123';
	$host_db     = 'localhost';
	$charset_db  = 'UTF8';
	$conexao_pdo = null;

	//Pré-conexão
	$detalhes_pdo = 'mysql:host=' . $host_db . ';';
	$detalhes_pdo .= 'dbname='. $data_base . ';';
	$detalhes_pdo .= 'charset=' . $charset_db . ';';

	//conexão  com o banco de dados
	try{
		$conexao_pdo = new PDO($detalhes_pdo, $user_db, $pass_db);
	} catch (PDOException $e) {

		print "Erro: " . $e->getMessage() . "<br/>";
		die();
	}
?>