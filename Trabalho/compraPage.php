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
</head>
<body>
    <div class="container-inicial">
        <div class="form-cad">
            <form method="post">
                <div class="form-header">
                    <h1> Preencha os dados de pagamento </h1>
                </div>
                <div class="input-group" style="color:white">
                    <div class="input-box">
                        <h3>Bandeira do cartão</h3>
                        <br>
                        <label for="master">MasterCard</label><br>
                        <input type="radio"  id="master" name="cartao" Value="MasterCard">
                        <label for="visa">Visa</label><br>
                        <input type="radio" id="visa" name="cartao" Value="Visa">
                        <label for="elo">Elo</label><br>
                        <input type="radio" id="elo" name="cartao" Value="Elo">
                        <label for="hiper">HiperCard</label><br>
                        <input type="radio" id="hiper" name="cartao" Value="Hipercard">
                    </div>

                    <div class="input-box">
                        <label for="numero">Número do cartão</label><br>
                        <input type="text" size="50" id="numero" name="numero">
                    </div>

                   <div class="input-box">
                        <label for="titular">Titular</label><br>
                        <input type="text" size="100" id="titular" name="titular">
                    </div>

                    <div class="input-box">
                        <label for="cvv">CVV</label><br>
                        <input type="text" size="10" id="cvv" name="cvv"><br>
                    </div>
                    <div class="login-button">
                        <button type="submit" name="compra">
                            Comprar
                        </button>
                    </div>
                </div>
            </form>
        </div>    
    </div>
</body>
</html>

