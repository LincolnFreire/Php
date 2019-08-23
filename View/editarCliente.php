<?php 
	require_once("config.php");	
	if(isset($_GET['id'])){
		$c = new Cliente();
		$r = $c->loadByCod($_GET['id']);
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Editar cliente</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link
	href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
	rel="stylesheet" id="bootstrap-css">
<script
	src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="../Assets/styles.css">

</head>
<body>
	<header>
			<img alt="logo" src="../Assets/img/logo.png">
			<h3>Editar clientes</h3>			
	</header>
	<a href="inicio.php">
		<button type="button">
	  	<span class="fas fa-home"></span>    
	  </button>
  </a>
	<br/>
	<br/>
	
	<button type="button" class="fas fa-sign-out-alt">
  	<span class="glyphicon glyphicon-off"></span>   
  </button>
  
    
	<div class="cadastro">
	
	
	<form method="POST">
			<div class="form-row">
				<div class="form-group col-md-3">
					<label>Codígo do Cliente</label> 
					<input type="number" name="cod" disabled="disabled" class="form-control" value=<?php echo $c->getCod_Pessoa() ?>>
				</div>
				
				<div class="form-group col-md-4 ">
					<label>Senha do Cliente</label>
					<input type="text" name="pass" class="form-control" value=<?php echo $c->getSenha() ?>>
				</div>
			</div>
			
			<div class="form-row">
				<div class="form-group col-md-4">
					<label>Nome</label> 
					<input type="text" name ="nome" class="form-control" value=<?php echo $c->getNome() ?>>
				</div>			
			
				<div class="form-group col-md-3">
					<label>CPF</label> <input type="text" name="cpf" class="form-control" value=<?php echo $c->getCpf() ?>>
				</div>
			</div>
			<br/><br/><br/><br/><br/><br/>
			
			<div class="form-row">
				<div class="form-group col-md-4">
					<button type="submit" class="btn btn-outline-dark">Alterar</button>	
				</div>
			</div>		
	
	</form>
	
	</div>
	<footer class="footer">
		<b>© 2019 Lincoln Aguiar</b>
	</footer>
</body>
</html>
		
<?php 

if((isset($_POST["pass"]) && isset($_POST["nome"]) && isset($_POST["cpf"])) &&
		(!empty($_POST["pass"]) && !empty($_POST["nome"]) && !empty($_POST["cpf"]))){
			
			$c->update($_POST["nome"], $_POST["cpf"], $_POST["pass"],$r['data_nasc']);

			header("Location: cliente.php");
}
?>
	
	
