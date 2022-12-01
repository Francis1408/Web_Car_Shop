<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FEEDBACK</title>
</head>
<body>

	 <h3> Dê um feedback do vendedor </h3>
    <form method="post">
    	<h4>Avaliação</h4>
        <input type="radio" id="positivo" name="avaliacao" Value="Positiva">
        <label for="positivo">Positiva</label><br>
        <input type="radio" id="negativo" name="avaliacao" Value="Negativa">
        <label for="negativo">Negativa</label><br>

        <h4>Comentário</h4>
        <label for="comentario">Comentário</label><br>
        <input type="text" size="100" id="comentario" name="comentario">

  
        <input type="submit" name="avaliar" value="Avaliar">
    </form>

</body>
</html>