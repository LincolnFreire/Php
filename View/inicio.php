<?php 
	require_once("config.php");
	session_start()
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Amigos & Cerveja</title>

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
			<img class="figure" alt="logo" src="../Assets/img/logo.png">
			<h3>Bem Vindo,<?php echo $_SESSION[Cliente::SESSION]['nome']?></h3>			
	</header>
	<a href="inicio.php">
		<button type="button">
	  	<span class="fas fa-home"></span>    
	  </button>
  </a>
	<br/>
	<br/>
	<a href="inicio.php?op=sair">
	<button type="button" class="fas fa-sign-out-alt">
  	<span class="glyphicon glyphicon-off"></span>   
  </button>
  </a>
	
	<figure>
  	<a href="cliente.php">
  		<img src="../Assets/img/clientes.png"width="136" height="200">
  	</a>
  	<figcaption>Cliente</figcaption>
	</figure>
	
	<figure>
		<a href="produto.php">
  		<img src="../Assets/img/produto.png"width="136" height="200">
  	</a>
  	<figcaption>Produto</figcaption>
	</figure>	
	
	
	<figure>
		<a href="fornecedores.php">
  		<img src="../Assets/img/fornecedor.png"width="136" height="200">
  	</a>
  	<figcaption>Fornecedor</figcaption>
	</figure>	
	
	<footer class="footer">
		<b>© 2019 Lincoln Aguiar</b>
	</footer>
</body>
</html>
		
<?php 
if(isset($_GET['op']) && $_GET['op'] == 'sair'){
	Cliente::sair();
	header('Location:login.php');
}
?>