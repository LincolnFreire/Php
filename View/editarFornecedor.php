<?php 
	require_once("config.php");	
	if(isset($_GET['id'])){
		$c = new Fornecedor();
		$c->loadByCod($_GET['id']);
	}else 
		header("Location: fornecedores.php");
	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Editar fornecedor</title>
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
			<h3>Editar Fornecedores</h3>			
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
					<label>Codígo do Fornecedor</label> 
					<input type="number" name="cod" disabled="disabled" class="form-control" value=<?php echo $c->getCod_fornecedor() ?>>
				</div>
				
				<div class="form-group col-md-4 ">
					<label>Empresa </label>
					<input type="text" name="emp" class="form-control" value=<?php echo $c->getEmpresa() ?>>
				</div>
			</div>
			
			<div class="form-row">
				<div class="form-group col-md-4">
					<label>Tipo</label> 
					<input type="text" name ="tip" class="form-control" value=<?php echo $c->getTipo() ?>>
				</div>			
			
				<div class="form-group col-md-3">
					<label>Referência</label> <input type="text" name="ref" class="form-control" value=<?php echo $c->getRef() ?>>
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

if((isset($_POST["emp"]) && isset($_POST["tip"]) && isset($_POST["ref"])) &&
		(!empty($_POST["emp"]) && !empty($_POST["tip"]) && !empty($_POST["ref"]))){
			
			$c->update($_POST["emp"], $_POST["tip"], $_POST["ref"]);
			header("Location: fornecedores.php");
}
?>
	
	
