<?php 
	require_once("config.php");
	session_start()
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Fornecedores</title>

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
			<h3>Lista de fornecedores</h3>			
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
  
  
  <a class="adicionar" href="cadastrarFornecedor.php">
		<b>Adicionar Fornecedor</b>
  </a>

	<table class="table">
		<tr>
			<th>Codigo</th>
			<th>Empresa</th>
			<th>Tipo</th>
			<th>Referência</th>
			<th>Editar</th>
		</tr>
		<?php 
			$res = Fornecedor::litasTodos();
			foreach($res as $fornecedores){
				echo "<tr>";
				foreach($fornecedores as $atr){
					echo "<td>$atr</td>";
				}
				echo "<td><a href='editarFornecedor.php?id=".$fornecedores['cod_fornecedor']."'>Editar</a></td>";
				echo "</th>";
			}
		?>
  </table>
 </body>
 </html>