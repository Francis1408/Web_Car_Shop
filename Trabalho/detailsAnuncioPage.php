<?php
	$c = oci_connect("admin", "admin", "bdengcomp_high");
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
	$s =  oci_parse($c, "SELECT * FROM ANUNCIO a JOIN USUARIO u 
			ON a.VENDEDOR = u.USERID 
			WHERE :1 = a.NUMERO");

	if (!$s) {
		$m = oci_error($c);
		trigger_error("Could not parse statment" . $m["message"], E_USER_ERROR);
	}

	oci_bind_by_name($s, ":1", $_GET['detalhesCatalogo']);
	$e = oci_execute($s);

	if (!$e) {
		$m = oci_error($s);
		trigger_error("Não pôde executar a sentença: " . $m["message"], E_USER_ERROR);
	}

	$row = oci_fetch_array($s, OCI_BOTH);

	echo "<div class='container'>";
	
	echo "<div class='page'>";
	echo "<div class='page-header'><h3> Descrição</h3></div>";
	echo "<div class='page-content'>" . $row[0] . "</div>";
	echo "<div class='page-content'>Placa: " . $row[4] . "</div>";
	echo "<div class='page-content'>Data Publicação: " . $row[2] . "</div>";
	echo "<div class='page-header'>R$" . $row[3] . "</div>";
	echo "</div>";

	echo "<div class='page'>";
	echo "<div class='page-header'><h3> Detalhes Vendedor</h3></div>";
	echo "<div class='page-content'>Nome: " . $row[10] . "</div>";
	echo "<div class='page-content'>Email: " . $row[6] . "</div>";
	echo "<div class='page-content'>Telefone: " . $row[7] . "</div>";
	echo "</div>";
	echo "<div class='page-detail'>";
	echo "<div class='cad-button'><a href='?comprar=" . $row[1] . "&vendedor=" . $row[5] . "&preco=" . $row[3] . "'>Comprar</a></div>";
	echo "</div>";
	echo "</div>";
	?>

</body>

</html>