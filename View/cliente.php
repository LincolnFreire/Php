<?php 
	require_once("config.php");
	session_start()
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Amigos & Cerveja</title>

<script type="text/javascript">
    
    function logout()
    {
         <?php echo "OK"; ?> 
    
    }
    
</script>
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
			<h3>Lista de clientes</h3>			
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

	<table class="table">
		<tr>
			<th>Cod</th>
			<th>Nome</th>
			<th>Cpf</th>
			<th>Data_Nascimento</th>
			<th>Senha</th>
			<th>Editar</th>
			<th>Apagar</th>
		</tr>
		<?php 
			$res = Cliente::litaTotos();
			foreach($res as $clientes){
				echo "<tr>";
				foreach($clientes as $atr){
					echo "<td>$atr</td>";
				}
				echo "<td><a href='editarcliente.php?id=".$clientes['cod_pes']."'>Editar</a></td>";
				echo "<td><a href='cliente.php?acao=delete&id=".$clientes['cod_pes']."'>Excluir</a></td>";
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
 		$c = new Cliente();
 		$c->loadByCod($_GET['id']);
 		$c->delete();
 		header("Location: cliente.php");
 		exit;
 	}
 }
 ?>