
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cadastro de cliente</title>

<link
	href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
	rel="stylesheet" id="bootstrap-css">
<script
	src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="../Assets/styles.css">

<script>
	function cadastar(){
		alert("Cadastrado com sucesso!");
	}
</script>
</head>
<body>
	<header>
		<a href="login.php">
			<img alt="logo" src="../Assets/img/logo.png">
		</a>	
			<h3>Cadastro de clientes</h3>			
	</header>
	  
	<div class="cadastro">
	
	
	<form method="POST">
			<div class="form-row">
				<div class="form-group col-md-3">
					<label>Codígo do Cliente</label> 
					<input type="number" name="cod" class="form-control" placeholder="Codígo do Cliente">
				</div>
				
				<div class="form-group col-md-4 ">
					<label>Senha do Cliente</label>
					<input type="password" name="pass" class="form-control" 	placeholder="Senha do Cliente">
				</div>
			</div>
			
			<div class="form-row">
				<div class="form-group col-md-4">
					<label>Nome</label> 
					<input type="text" name ="nome" class="form-control" placeholder="Seu nome">
				</div>
				<div class="form-group col-md-3">
					<label>Data</label> <input type="date" name="dat" class="form-control">
				</div>
			
			</div>
			
			<div class="form-row">
				<div class="form-group col-md-3">
					<label>CPF</label> <input type="text" name="cpf" class="form-control"
							placeholder="694.694.666-24">
				</div>
			</div>
			<br/><br/><br/><br/>	<br/><br/><br/>
		
			
		<div class="form-goup col-md-4">
			<button type="submit" class="btn btn-outline-dark">Cadastrar</button>
		
		</div>			
	</form>
	
	</div>
	<footer class="footer">
		<b>© 2019 Lincoln Aguiar</b>
	</footer>
</body>
</html>

<?php 

if((isset($_POST["cod"]) && isset($_POST["pass"]) && isset($_POST["nome"]) && isset($_POST["dat"]) && isset($_POST["cpf"])) &&
		(!empty($_POST["cod"]) && !empty($_POST["pass"]) && !empty($_POST["nome"]) && !empty($_POST["dat"]) && !empty($_POST["cpf"]))){	
		require_once("config.php");
		$c = new Cliente(); 
		$c->setCod_Pessoa($_POST['cod']);
		$c->setSenha( $_POST['pass']);
		$c->setNome($_POST['nome']);
		$c->setData_Nasc($_POST['dat']);
		$c->setCpf($_POST['cpf']);
		$c->insert();
		echo  "<script>alert('Cadastrado com Sucesso!');</script>";
	}
		
	
	
