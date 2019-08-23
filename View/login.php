
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="../Assets/styles.css" rel="stylesheet">
</head>
	
<body>
	<header>
			<img alt="logo" src="../Assets/img/logo.png">
				
	</header>
	  
		<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center">Login</h3>
                            <div class="form-group">
                                <label for="username">Username:</label><br>
                                <input type="text" name="login" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label><br>
                                <input type="password" name="pass" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <br/>
                                <input type="submit" name="submit" class="btn btn-outline-dark" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="cadastroCliente.php" class="text-info">Cadastar-se</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
	<footer class="footer">
		<b>© 2019 Lincoln Aguiar</b>
	</footer>
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
			header("Location: inicio.php");
			exit();
		}
		echo "Senha invalida";
	
	}
?>