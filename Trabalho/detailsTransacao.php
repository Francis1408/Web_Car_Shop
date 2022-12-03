<?php
	$c = oci_connect(***REMOVED***, ***REMOVED***, "bdengcomp_high");
	if (!$c) {
		$m = oci_error();
		trigger_error("Could not connect to database: " . $m["message"], E_USER_ERROR);
	}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<?php
	// DETALHES MINHAS VENDAS


	if (isset($_GET['detalhesTransacao1'])) {
		$s =  oci_parse($c, "SELECT T.VALOR, T.DATA, 
							 A.DESCRICAO, A.NUMERO, A.DATA, A.CARRO, 
							 F.COMENTARIO, F.AVALIACAO, 
							 U.EMAIL, U.TELEFONE, U.NOME, 
							 C.PLACA, C.MODELO, C.ANO, C.COR, C.MARCA 
							 FROM TRANSACAO T JOIN ANUNCIO A ON (T.ANUNCIO = A.NUMERO) 
							 JOIN FEEDBACK F ON (T.FEEDBACK_ID = F.ID) 
							 JOIN USUARIO U ON (T.COMPRADOR = U.USERID) 
							 JOIN CARRO C ON (A.CARRO = C.PLACA)
							 WHERE A.NUMERO = :1");

		if (!$s) {
			$m = oci_error($c);
			trigger_error("Could not parse statment" . $m["message"], E_USER_ERROR);
		}

		oci_bind_by_name($s, ":1", $_GET['detalhesTransacao1']);
	} else {
		$s =  oci_parse($c, "SELECT T.VALOR, T.DATA, 
							 A.DESCRICAO, A.NUMERO, A.DATA, A.CARRO, 
							 F.COMENTARIO, F.AVALIACAO, 
							 U.EMAIL, U.TELEFONE, U.NOME, 
							 C.PLACA, C.MODELO, C.ANO, C.COR, C.MARCA 
							 FROM TRANSACAO T JOIN ANUNCIO A ON (T.ANUNCIO = A.NUMERO) 
							 JOIN FEEDBACK F ON (T.FEEDBACK_ID = F.ID) 
							 JOIN USUARIO U ON (T.VENDEDOR = U.USERID) 
							 JOIN CARRO C ON (A.CARRO = C.PLACA)
							 WHERE A.NUMERO = :1");

		if (!$s) {
			$m = oci_error($c);
			trigger_error("Could not parse statment" . $m["message"], E_USER_ERROR);
		}

		oci_bind_by_name($s, ":1", $_GET['detalhesTransacao2']);
	}


	$e = oci_execute($s);

	if (!$e) {
		$m = oci_error($s);
		trigger_error("Não pôde executar a sentença: " . $m["message"], E_USER_ERROR);
	}

	$row = oci_fetch_array($s, OCI_BOTH);


	echo "<div class='container-cat'";
	echo "<h3> Data Publicação: " . $row[4] . "</h3>";
	echo "<h3> Data da Venda: " . $row[1] . "</h3> ";
	echo "<h3> Numero do Anuncio: " . $row[3] . "</h3> ";
	echo "<h3> Valor da Venda R$: " . $row[0] . "</h3> ";
	echo "<h3> Descrição:  " . $row[2] . "</h3> ";
	echo "</div>";

	echo "<div class='container-cat'";
	echo "<h2> Detalhes do Veículo </h2> ";
	echo "<h3> Placa do Carro: " . $row[11] . "</h3>";
	echo "<h3> Modelo: " . $row[12] . "</h3> ";
	echo "<h3> Ano: " . $row[13] . "</h3> ";
	echo "<h3> Cor: " . $row[14] . "</h3> ";
	echo "<h3> Marca: " . $row[15] . "</h3> ";
	echo "</div>";

	echo "<div class='container-cat'";
	if (isset($_GET['detalhesTransacao1'])) {
		echo "<h2> Detalhes do Comprador </h2> ";
	} else {
		echo "<h2> Detalhes do Vendedor </h2> ";
	}

	
	echo "<h3> Nome: " . $row[10] . "</h3> ";
	echo "<h3> Email: " . $row[8] . "</h3> ";
	echo "<h3> Telefone: " . $row[9] . "</h3> ";
	echo "</div>";

	echo "<div class='container-cat'";
	echo "<h2> FeedBack da Transação </h2>";

	if ($row[7]) {
		echo "<h2> Positiva </h2> ";
	} else {
		echo "<h2> Negativa </h2> ";
	}
	echo "<h3>Comentários: " . $row[6] . "</h3>";
	echo "</div>";

	?>

</body>

</html>