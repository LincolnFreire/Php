<?php
	require_once 'Conexao.php';
	require_once 'Cliente.php';

	$c = new Cliente();
	
	$con = new Conexao();

	/*
	$c->setCod_Pessoa(3);
	$c->setNome('Lincoln');
	$c->setCpf('345346');
	$c->setSenha('123');
	$c->setData_Nasc('02/03/2000');
	
	$c->insert();
	*/
	if($c->login(4, '123'))
		echo $c;
	else 
		echo "Senha ou usuario invalido";
	
	
	