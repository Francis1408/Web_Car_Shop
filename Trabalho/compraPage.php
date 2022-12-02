<?php  
    
    $_SESSION['anuncio'] = $_GET['comprar'];
    $_SESSION['vendedor'] = $_GET['vendedor'];
    $_SESSION['preco'] = $_GET['preco'];


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>COMPRAR</title>
</head>
<body>

	 <h3> Preencha os dados de pagamento </h3>
    <form method="post">
    	<h4>Bandeira do cartão</h4>
        <input type="radio" id="master" name="cartao" Value="MasterCard">
        <label for="master">MasterCard</label><br>
        <input type="radio" id="visa" name="cartao" Value="Visa">
        <label for="visa">Visa</label><br>
        <input type="radio" id="elo" name="cartao" Value="Elo">
        <label for="elo">Elo</label><br>
        <input type="radio" id="hiper" name="cartao" Value="Hipercard">
        <label for="hiper">HiperCard</label><br>

        <h4>Número do cartão</h4>
        <label for="numero">Número</label><br>
        <input type="text" size="50" id="numero" name="numero">

        <h4>Titular</h4>
        <label for="titular">Titular</label><br>
        <input type="text" size="100" id="titular" name="titular">

        <h4>CVV</h4>
        <label for="cvv">CVV</label><br>
        <input type="text" size="10" id="cvv" name="cvv"><br>

  
        <input type="submit" name="compra" value="Comprar">
    </form>

</body>
</html>
