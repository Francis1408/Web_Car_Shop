<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="container-inicial">
        <div class="form-cad">
            <form method="post"  action="./compraAction.php">
                <div class="form-header">
                    <h1> Dê um feedback do vendedor </h1>
                </div>
                <div class="input-group" style="color:white">
                    <div class="input-box">
                        	<h3>Avaliação</h3>
                            <br>
                            <label for="positivo">Positiva</label><br>
                            <input type="radio" id="positivo" name="avaliacao" Value="Positiva">
                            <label for="negativo">Negativa</label><br>
                            <input type="radio" id="negativo" name="avaliacao" Value="Negativa">                      
                     </div>

                    <div class="input-box">
                        <label for="comentario">Comentário</label><br>
                        <input type="text" size="100" id="comentario" name="comentario">
                    </div>

                     <div class="login-button">
                        <button type="submit"  name="avaliar">
                            Avaliar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
