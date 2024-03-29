<?php

class Cliente {
	
	private $cod_pessoa;
	private $nome;
	private $cpf;
	private $data_nasc;
	private $senha;
	
	const SESSION = 'user';
	
	public function setCod_Pessoa($cod) {
		$this->cod_pessoa = $cod;
	}
	
	public function getCod_Pessoa() {
		return $this->cod_pessoa;
	}
	
	public function setNome($nome) {
		$this->nome = $nome;
	}
	
	public function getNome() {
		return $this->nome;
	}
	
	public function setCpf($cpf) {
		$this->cpf = $cpf;
	}
	
	public function getCpf() {
		return $this->cpf;
	}
	
	public function setData_Nasc($data) {
		//$this->data_nasc = $data->format('d/m/Y');
		$this->data_nasc = $data;
	}
	
	public function getData_Nasc() {
		return $this->data_nasc;
	}
	
	public function setSenha($senha) {
		$this->senha = $senha;
	}
	
	public function getSenha() {
		return $this->senha;
	}
	
	//--------------------------------------------------
	
	public function setDados($linha){
		$this->setCod_Pessoa($linha['cod_pes']);
		$this->setNome($linha['nome']);
		$this->setCpf($linha['cpf']);
		$this->setSenha($linha['senha']);
		$this->setData_Nasc(new DateTime($linha['data_nasc']));
		$_SESSION[Cliente::SESSION]['cod_pes'] = $linha['cod_pes'];
		$_SESSION[Cliente::SESSION]['nome']    = $linha['nome'];
		
	}
	
	public function setAll($nome ,$cpf , $senha, $data){
		$this->setNome($nome);
		$this->setCpf($cpf);
		$this->setSenha($senha);
		$this->setData_Nasc($data);
	}
	
	public function loadByCod($cod) {
		$sql = new Conexao();
		$result = $sql->select("SELECT * FROM cliente where cod_pes = :cod", array(":cod" => $cod));
		
		if(count($result) > 0)
			$this->setDados($result[0]);
		
		return $result[0];
	}
	
	public function login($cod,$senha){
		$sql = new Conexao();
		$results = $sql->select("SELECT * FROM cliente WHERE cod_pes = :cod AND senha = :senha",
				[":cod" => $cod,":senha" => $senha]);
		
		if(count($results) > 0){
				$this->setDados($results[0]);
				return true;
		}else
			return false;
	}
	
	public static function litaTotos(){
		$con = new Conexao();
		
		$res = $con->select("SELECT * FROM cliente ORDER BY cod_pes");
		
		return $res;
	}
	public function insert() {
		$sql = new Conexao();

		$sql->select("SELECT inserir_cliente(:cod, :nome, :cpf, :senha, :dat)", array(
				":cod" => $this->getCod_Pessoa(),
				":nome" => $this->getNome(),
				":cpf" => $this->getCpf(),
				":senha" => $this->getSenha(),
				":dat" => $this->getData_Nasc()));
	}
	
	
	public function update($nome ,$cpf , $senha, $data=""){
		$sql = new Conexao();
		
		$this->setAll($nome, $cpf, $senha, $data);
		
		$sql->query("UPDATE cliente SET nome = :NOME, cpf = :CPF, senha = :SENHA, data_nasc = :DATA WHERE cod_pes = :ID",array(
				':NOME' => $this->getNome(),
				':CPF' => $this->getCpf(),
				':SENHA' => $this->getSenha(),
				':DATA' => $this->getData_Nasc(),
				':ID' => $this->getCod_Pessoa())
				);
	}
	
	public function delete(){
		$sql = new Conexao();
		$sql->select("DELETE FROM cliente WHERE cod_pes = :cod",array(':cod' => $this->getCod_Pessoa()));
		$this->setCod_Pessoa(0);
		$this->setAll("", "", "", New DateTime());
		$_SESSION[Cliente::SESSION] = NULL;
	}
	
	public static function sair(){
		$_SESSION[Cliente::SESSION] = NULL;
	}
	public function __toString() {
		return json_encode(array(
				"cod_pessoa" => $this->getCod_Pessoa(),
				"nome" => $this->getNome(),
				"cpf" => $this->getCpf(),
				"senha" => $this->getSenha(),
				"data_nasc" => $this->getData_Nasc()
		));
	}
	
}
?>

