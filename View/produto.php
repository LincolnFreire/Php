<?php 
	require_once("config.php");
	session_start()
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Produtos</title>

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
			<h3>Lista de Produtos</h3>			
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
	 <a class="adicionar" href="cadastroProduto.php">
		<b>Adicionar Produto</b>
  </a>
	<table class="table">
		<tr>
			<th>Codigo</th>
			<th>Nome</th>
			<th>Quantidade</th>
			<th>Valor</th>
			<th>Referencia</th>
			<th>Fornecedor(ID)</th>
			<th>Alterar</th>
		</tr>
		<?php 
			$res = Produto::listaTodos();
			foreach($res as $produtos){
				echo "<tr>";
				foreach($produtos as $atr){
					echo "<td>$atr</td>";
				}
				echo "<td><a href='editarProduto.php?id=".$produtos['cod_produto']."'>Editar</a></td>";
				echo "</th>";
			}
		?>
  </table>
 </body>
 </html>
 
 <?php 
 echo isset($_GET['acao']) && isset($_GET['id']);
 if(isset($_GET['acao']) && isset($_GET['id'])){
 	if($_GET['acao'] =='delete'){
 		$f = new Fornecedor();
 		$f->loadByCod($_GET['id']);
 		$f->delete();
 		header("Location: produtos.php");
 		
 	}
 }
 ?>