
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h3>Criar Anúncio</h3>
	<form method="post" action="./createAction.php">
		<h4>Dê uma breve descrição</h4>
		<label for="Descrição">Descrição:</label>
		<input type="text" size="100" name="descricao">
		<br>
		<label for="Valor">Valor (R$):</label>
		<input type="text" name="valor">
		
		<input type="submit" name="publicar" value="Publicar">
	</form>
</body>
</html>