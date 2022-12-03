<?php
$c = oci_connect("admin", "admin", "bdengcomp_high");
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
</head>

<body>
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

	<div class="container-inicial">
		<div class="form-cad">
			<form method="post">
				<div class="form-header">
					<h1>Editar Anúncio</h1>
				</div>
				<div class="input-group">
					<div class="input-box">
						<label for="descricao">Descrição</label>
						<input id="descricao" type="text" name="descricao" size="100" value="<?php echo " $row[0]" ?>" placeholder="Descrição">
					</div>
					<div class="input-box">
						<label for="valor">Valor (R$)</label>
						<input id="valor" type="text" name="valor" value="<?php echo " $row[3]" ?>" placeholder="Valor">
					</div>
					<div class="login-button">
						<button type="submit" name="alter">
							Alterar
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>

</html>