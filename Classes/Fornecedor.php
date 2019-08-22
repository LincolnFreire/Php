<?php
class Fornecedor{
	private $cod_fornecedor;
	private $empresa;
	private $tipo;
	private $ref;
	
	public function getCod_fornecedor() {
		return $this->cod_fornecedor;
	}

	public function getEmpresa() {
		return $this->empresa;
	}

	public function getTipo() {
		return $this->tipo;
	}

	public function getRef() {
		return $this->ref;
	}

	public function setCod_fornecedor($cod_fornecedor) {
		$this->cod_fornecedor = $cod_fornecedor;
	}

	public function setEmpresa($empresa) {
		$this->empresa = $empresa;
	}

	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}

	public function setRef($ref) {
		$this->ref = $ref;
	}

//----------------------------------------------------

	
	public function setAll($emp, $tip, $ref){
		$this->setEmpresa($emp);
		$this->setTipo($tip);
		$this->setRef($ref);
	}
	
	public function setDados($row){
		$this->setCod_fornecedor($row['cod_fornecedor']);
		$this->setEmpresa($row['empresa']);
		$this->setTipo($row['tipo']);
		$this->setRef($row['ref']);
	}
	
	public function loadByCod($cod) {
		$sql = new Conexao();
		$result = $sql->select("SELECT * FROM fornecedores where cod_fornecedor = :cod", array(":cod" => $cod));
		
		if(count($result) > 0)
			$this->setDados($result[0]);
	}
	
	public function insert(){
		$con = new Conexao();
		$con->select("inserir_fornecedores(:emp, :tip, :ref)", array( ":emp" => $this->getEmpresa(),
																																	":tip" => $this->getTipo(),
																																	":ref" => $this->getRef()
	 																															));
	}
	
	public function update($emp, $tip, $ref){
		$sql = new Conexao();
		
		$this->setAll($emp, $tip, $ref);
		
		$sql->query("UPDATE fornecedores SET empresa = :emp, tipo = :tip, refe = :ref WHERE cod_fornecedor = :cod",
				array(':cod' => $this->getCod_fornecedor(),
							':emp' => $this->getEmpresa(),
							':tipo' => $this->getTipo(),
							':ref' => $this->getRef()
				));
	}
	
	public function delete(){
		$sql = new Conexao();
		$sql->select("DELETE FROM fornecedores WHERE cod_fornecedor = :cod",array(':cod' => $this->getCod_fornecedor()));
	}
	
	
	
}