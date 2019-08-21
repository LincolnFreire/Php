<?php

class Produto {
	private $cod_produto;
	private $nome;
	private $quantidade;
	private $valor;
	private $refe;
	
	public function getCod_produto() {
		return $this->cod_produto;
	}

	public function getNome() {
		return $this->nome;
	}

	public function getQuantidade() {
		return $this->quantidade;
	}

	public function getValor() {
		return $this->valor;
	}

	public function getRefe() {
		return $this->refe;
	}

	public function setCod_produto($cod_produto) {
		$this->cod_produto = $cod_produto;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function setQuantidade($quantidade) {
		$this->quantidade = $quantidade;
	}

	public function setValor($valor) {
		$this->valor = $valor;
	}

	public function setRefe($refe) {
		$this->refe = $refe;
	}

	
//------------------------------------------------------
	//fatando cadastra, alterar e excluir Produto
	public function inserirCompra($cli, $prod, $dt_comp, $qtd, $vlr_tot){
		$con = new Conexao();
		$con->select("inserir_compra(:cli, :prod, :dt, :qtd, :valor)",array(":cli" => $cli, ":prod" => $prod, ":dt" => $dt_comp,
																																				":qtd" => $qtd, ":valor" => $vlr_tot));
		
	}

	

}

