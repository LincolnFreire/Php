<?php 
	require_once 'config.php';
	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cadastar Produto</title>
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
			<h3>Cadastar Produtoss</h3>			
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
					<label>Nome </label>
					<input type="text" name="nom" class="form-control">
				</div>
				<div class="form-group col-md-3">
					<label>Quantidade</label> 
					<input type="number" name ="qtd" class="form-control">
				</div>
				
			</div>
			
			<div class="form-row">
				<div class="form-group col-md-3">
					<label>valor</label> <input type="number" name="vlr" class="form-control">
				</div>			
				<div class="form-group col-md-4">
					<label>Referência</label> <input type="text" name="ref" class="form-control">
				</div>			
			
			</div>
			<div class="form-group col-md-4">
      	<label>Fornecedor</label>
      	<select name="forn" class="form-control">
        	<option selected>Escolher...</option>
        	<?php 
        		$forns = Fornecedor::litasTodos();
        		var_dump($forns);
        		foreach ($forns as $val)
        			echo "<option value='".$val['cod_fornecedor']."'>".$val['empresa']."</option>";
        		
        	?>
        	
      	</select>
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

if((isset($_POST["nom"]) && isset($_POST["qtd"]) && isset($_POST["vlr"]) && isset($_POST["ref"])) &&
		(!empty($_POST["nom"]) && !empty($_POST["qtd"]) && !empty($_POST["vlr"]) && !empty($_POST["ref"]))){
			require_once("config.php");
			$p = new Produto();
 			$p->setAll($_POST["nom"],$_POST["qtd"], $_POST["vlr"], $_POST["ref"], $_POST["forn"]);
			$p->insert();
			exit();
			header("Location: fornecedores.php");
}
?>
	
	
