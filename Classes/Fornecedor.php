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
	
	
	public function insert(){
		$con = new Conexao();
		$con->select("inserir_fornecedore(:emp, :tip, :ref)", array(":emp" => $this->getEmpresa(),
																																":tip" => $this->getTipo(),
																																":ref" => $this->getRef()
	 																															));
	}
	
	public function update($emp, $tip, $ref){
		$sql = new Conexao();
		
		$this->setAll($emp, $tip, $ref);
		
		$sql->query("UPDATE cliente SET empresa = :emp,tipo = :tip,refe = :ref",array(':emp' => $this->getEmpresa(),
																																									':tipo' => $this->getTipo(),
																																									':ref' => $this->getRef()
																																									));
	}
	
	
	
	
}