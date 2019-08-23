<?php
require_once 'config.php';


//  $c->setCod_Pessoa(6);
//  $c->setNome('Lincoln');
//  $c->setCpf('345346');
//  $c->setSenha('123');
//  $c->setData_Nasc('02/03/2000');
 
//  $c->insert();
 

  $f = new Fornecedor();
  $f->loadByCod(4);
   
  //$f->update('Alpragatas','Chinelo-Havaianas','João');
	//$f->delete();
  echo $f;
	
	//$p = new Produto();
	/*
	$p->setNome('Havaianas');
	$p->setQuantidade(100);
	$p->setValor(29.98);
	$p->setRefe('098080');
	$p->setFornecedor(4);
	
	$p->inserir();
	*/
	
	//$p->loadByCod(5);
	//$p->update('Celular Sansung', 100, 1200, '12213', 1);
	//$p->delete();
	//echo $p;
	
	
	