<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cadastar fornecedor</title>
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
			<h3>Cadastar Fornecedores</h3>			
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
				<div class="form-group col-md-4 ">
					<label>Empresa </label>
					<input type="text" name="emp" class="form-control">
				</div>
				<div class="form-group col-md-3">
					<label>Tipo</label> 
					<input type="text" name ="tip" class="form-control">
				</div>
				
				
			</div>
			
			<div class="form-row">
				<div class="form-group col-md-4">
					<label>Referência</label> <input type="text" name="ref" class="form-control">
				</div>			
			
			</div>
			<br/><br/><br/><br/><br/><br/>
			
			<div class="form-row">
				<div class="form-group col-md-4">
					<button type="submit" class="btn btn-outline-dark">Cadastar</button>	
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
			require_once("config.php");
			$f = new Fornecedor();
			$f->setAll($_POST["emp"], $_POST["tip"], $_POST["ref"]);
			$f->insert();
			header("Location: fornecedores.php");
}
?>
	
	
