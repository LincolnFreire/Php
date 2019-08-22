<?php

class Produto {
	private $cod_produto;
	private $nome;
	private $quantidade;
	private $valor;
	private $refe;
	private $fornecedor;
	
	const SESSION = "User";
	
	public function getFornecedor() {
		return $this->fornecedor;
	}

	public function setFornecedor($fornecedor) {
		$this->fornecedor = $fornecedor;
	}

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
	
	public function setAll($nome, $qtd, $vlr, $ref, $forn){
		$this->setNome($nome);
		$this->setQuantidade($qtd);
		$this->setValor($vlr);
		$this->setRef($ref);
		$this->setFornecedor($forn);
	}
	
	public function inserir(){
		$con = new Conexao();
		$con->select("inserir_produtos(:nome, :qtd, :vlr, :refe, :forn)",
				array(':nome' => $this->getNome(),
							':refe' => $this->getRefe(),
							':vlr'  => $this->getValor(),
							':forn' => $this->getFornecedor(),
							':qtd'  => $this->getQuantidade()
				));
	}
	public function inserirCompra($cli, $prod, $dt_comp, $qtd, $vlr_tot){
		$con = new Conexao();
		$con->select("inserir_compra(:cli, :prod, :dt, :qtd, :valor)",array(":cli" => $cli, ":prod" => $prod, ":dt" => $dt_comp,
																																				":qtd" => $qtd, ":valor" => $vlr_tot));
	}
	
	
	public function update($nome, $qtd, $vlr, $ref, $forn){
		$sql = new Conexao();
		
		$this->setAll($nome, $qtd, $vlr, $ref, $forn);
		
		$sql->query("UPDATE produtos SET nome = :nome, quantidade = :qtd, valor = :vlr, refe = :ref, Fk_fornr = :forn  WHERE cod_fornecedor = :cod",
				array(':forn' => $this->getCod_fornecedor(),
							':nome' => $this->getNome(),
							':qtd'  => $this->getQuantidade(),
							':ref'  => $this->getRef(),
							':vlr'  => $this->getValor()
				));
	}
	


	

}

