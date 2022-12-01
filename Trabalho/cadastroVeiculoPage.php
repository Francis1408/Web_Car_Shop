
<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h4>Preencha as informações do veículo que será anunciado</h4>
	<form method="post" action="./createPage.php">
		<label for="Placa">Placa:</label>
		<input type="text" name="placa">
		<br>
		<label for="Modelo">Modelo:</label>
		<input type="text" name="modelo">
		<br>
		<label for="Ano">Ano:</label>
		<input type="text" name="ano">
		<br>
		<label for="Cor">Cor:</label>
		<input type="text" name="cor">
		<br>
		<label for="Marca">Marca:</label>
		<input type="text" name="marca">
		<br>
		<input type="submit" name="register" value="Publicar" class="button">
	</form>
</body>
</html>
