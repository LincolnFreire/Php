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
	
	public function setDados($linha){
		$this->setCod_produto($linha['cod_produto']);
		$this->setNome($linha['nome']);
		$this->setValor($linha['valor']);
		$this->setQuantidade($linha['quantidade']);
		$this->setFornecedor($linha['fk_forne']);
		$this->setRefe(($linha['refe']));
		
	}
	
	public function setAll($nome, $qtd, $vlr, $ref, $forn){
		$this->setNome($nome);
		$this->setQuantidade($qtd);
		$this->setValor($vlr);
		$this->setRefe($ref);
		$this->setFornecedor($forn);
	}
	
	public function loadByCod($cod) {
		$sql = new Conexao();
		$result = $sql->select("SELECT * FROM produtos where cod_produto = :cod", array(":cod" => $cod));
		
		if(count($result) > 0)
			$this->setDados($result[0]);
	}
	
	public function inserir(){
		$con = new Conexao();
		$con->select("SELECT inserir_produtos(:nome, :qtd, :vlr, :refe, :forn)",
				array(':nome' => $this->getNome(),
							':refe' => $this->getRefe(),
							':vlr'  => $this->getValor(),
							':forn' => $this->getFornecedor(),
							':qtd'  => $this->getQuantidade()
				));
	}
	
	
	public function inserirCompra($cli, $prod, $dt_comp, $qtd, $vlr_tot){
		$con = new Conexao();
		$con->select("SELECT inserir_compra(:cli, :prod, :dt, :qtd, :valor)",array(":cli" => $cli, ":prod" => $prod, ":dt" => $dt_comp,
																																				":qtd" => $qtd, ":valor" => $vlr_tot));
	}
	
	
	public function update($nome, $qtd, $vlr, $ref, $forn){
		$sql = new Conexao();
		
		$this->setAll($nome, $qtd, $vlr, $ref, $forn);
		
		$sql->query("UPDATE produtos SET nome = :nome, quantidade = :qtd, valor = :vlr, refe = :ref, fk_forne = :forn  WHERE cod_produto = :cod",
				array(':cod' => $this->getCod_produto(),
							':forn' => $this->getFornecedor(),
							':nome' => $this->getNome(),
							':qtd'  => $this->getQuantidade(),
							':ref'  => $this->getRefe(),
							':vlr'  => $this->getValor()
				));
	}
	
	
	public function delete(){
		$sql = new Conexao();
		$sql->select("DELETE FROM produtos WHERE cod_produto = :cod",array(':cod' => $this->getCod_produto()));
	}
	
	public function __toString() {
		return json_encode(array(
				"Cod_produto" => $this->getCod_produto(),
				"Nome" => $this->getNome(),
				"QTD" => $this->getQuantidade(),
				"Valor" => $this->getValor(),
				"Refe" => $this->getRefe(),
				"Forn" => $this->getFornecedor()
		));
	}

	

}

