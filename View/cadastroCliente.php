
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cadastro de cliente</title>

<link
	href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
	rel="stylesheet" id="bootstrap-css">
<script
	src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="../Assets/styles.css">

</head>
<body>
	<h3>Cadastro de clientes</h3>
	<form>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputZip">Codígo</label> <input type="number"
					class="form-control" id="inputEmail4" placeholder="Email">
			</div>
			<div class="form-group col-md-6">
				<label for="inputPassword4">Password</label> <input type="password"
					class="form-control" id="inputPassword4" placeholder="Password">
			</div>
		</div>
		<div class="form-group">
			<label for="inputAddress">Address</label> <input type="text"
				class="form-control" id="inputAddress" placeholder="1234 Main St">
		</div>
		<div class="form-group">
			<label for="inputAddress2">Address 2</label> <input type="text"
				class="form-control" id="inputAddress2"
				placeholder="Apartment, studio, or floor">
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputCity">City</label> <input type="text"
					class="form-control" id="inputCity">
			</div>
			<div class="form-group col-md-4">
				<label for="inputState">State</label> <select id="inputState"
					class="form-control">
					<option selected>Choose...</option>
					<option>...</option>
				</select>
			</div>
			<div class="form-group col-md-2">
				<label for="inputZip">Zip</label> <input type="text"
					class="form-control" id="inputZip">
			</div>
		</div>
		<div class="form-group">
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="gridCheck"> <label
					class="form-check-label" for="gridCheck"> Check me out </label>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Sign in</button>
	</form>
</body>
</html>