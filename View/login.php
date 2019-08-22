
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>

</head>
<body>
	<form method="POST">
		<input type="number" placeholder="Login" name="login"><br/>
		<input type="password" placeholder="Senha" name="pass">
		<button type="submit">Entrar</button>
	</form>

</body>
</html>

<?php
	session_start();
	if(isset($_POST['login']) && isset($_POST['pass'])){
		require_once("config.php");
		$c = new Cliente();
		$cod = $_POST['login'];
		$senha = $_POST['pass'];
		 
		if($c->login($cod, $senha)){
			echo "---------------------------";
			header("Location: cadastroCliente.php");
			exit();
		}
		echo "Senha invalida";
	
	}
?>