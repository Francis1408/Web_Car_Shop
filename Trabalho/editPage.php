<?php
	$c = oci_connect(***REMOVED***, ***REMOVED***, "bdengcomp_high");
	if (!$c) {
		$m = oci_error();
		trigger_error("Could not connect to database: " . $m["message"], E_USER_ERROR);
	}

?>

<?php

if (isset($_POST['alter'])) {
	$s = oci_parse($c, "UPDATE ANUNCIO SET DESCRICAO = :1, VALOR = :2
						WHERE NUMERO = :3 ");
	if (!$s) {
		$m = oci_error($c);
		trigger_error("Não pôde compilar a sentença: " . $m["message"], E_USER_ERROR);
	}

	oci_bind_by_name($s, ":1", $_POST['descricao']);
	oci_bind_by_name($s, ":2", str_replace(',', '.', $_POST['valor']));
	oci_bind_by_name($s, ":3", $_GET['editar']);


	$e = oci_execute($s, OCI_NO_AUTO_COMMIT);

	if (!$e) {
		$m = oci_error($s);
		trigger_error("Não pôde executar a sentença: " . $m["message"], E_USER_ERROR);
	} else {
		print "Anuncio alterado com sucesso!";
		oci_commit($c);
		header("Location: index.php");
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EDIÇÃO</title>
</head>

<body>
	<h4>Editar Anuncio</h4>

	<?php
	$s =  oci_parse($c, "SELECT * FROM ANUNCIO WHERE :1 = NUMERO");

	if (!$s) {
		$m = oci_error($c);
		trigger_error("Could not parse statment" . $m["message"], E_USER_ERROR);
	}

	oci_bind_by_name($s, ":1", $_GET['editar']);
	$e = oci_execute($s);

	if (!$e) {
		$m = oci_error($s);
		trigger_error("Não pôde executar a sentença: " . $m["message"], E_USER_ERROR);
	}

	$row = oci_fetch_array($s, OCI_BOTH);

	?>

	<form method="post">
		<label for="Descrição">Descrição:</label>
		<input type="text" size="100" name="descricao" value=<?php echo " $row[0]" ?>>
		<br>
		<label for="Valor">Valor (R$):</label>
		<input type="text" name="valor" value=<?php echo " $row[3]" ?>>
		<br>
		<input type="submit" name="alter" value="Alterar">
	</form>

</body>

</html>