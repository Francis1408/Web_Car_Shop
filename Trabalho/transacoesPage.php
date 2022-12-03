<?php
$c = oci_connect(***REMOVED***, ***REMOVED***, "bdengcomp_high");

if (!$c) {
	$m = oci_error();
	trigger_error("Could not connect to database: " . $m["message"], E_USER_ERROR);
}

?>


<!-- <!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TRANSAÇÕES</title>
</head>

<body> -->

<div class="container">
	<div class="page-header">
		<h1>Minhas Vendas</h1>
	</div>

	<div class="page-tab">
		<div class="table">
			<div class="table-header">
				<div class="header__item">ID ANUNCIO</div>
				<div class="header__item">DATA DA COMPRA</div>
				<div class="header__item">COMPRADO POR</div>
				<div class="header__item">VALOR</div>
				<div class="header__item"></div>
			</div>
			<div class="table-content">
				<?php
				$s =  oci_parse($c, "SELECT T.ANUNCIO, T.DATA, U.NOME, T.VALOR, T.COMPRADOR 
									 FROM TRANSACAO T JOIN USUARIO U ON (T.COMPRADOR = U.USERID) WHERE T.VENDEDOR = :1");

				if (!$s) {
					$m = oci_error($c);
					trigger_error("Could not parse statment" . $m["message"], E_USER_ERROR);
				}

				oci_bind_by_name($s, ":1", $_SESSION['login']);
				$e = oci_execute($s);

				if (!$e) {
					$m = oci_error($s);
					trigger_error("Não pôde executar a sentença: " . $m["message"], E_USER_ERROR);
				}

				while (($row = oci_fetch_array($s, OCI_BOTH)) != false) {
					echo "
							<div class='table-row'>\n
								<div class='table-data'>" . $row[0] . "</div>
								<div class='table-data'>" . $row[1] . "</div>
								<div class='table-data'>" . $row[2] . "</div>
								<div class='table-data'>R$" . $row[3] . "</div>
								<div class='table-data-button'>
									<div class='tab-button'>
										<a href='?detalhesTransacao1=" . $row[0] . "'>Detalhes</a>
									</div>
								</div>
							</div>";
				};
				?>

			</div>
		</div>
	</div>



	<div class="page-header">
		<h1>Minhas Compras</h1>
	</div>

	<div class="page-tab">
		<div class="table">
			<div class="table-header">
				<div class="header__item">ID ANUNCIO</div>
				<div class="header__item">DATA DA COMPRA</div>
				<div class="header__item">COMPRADO POR</div>
				<div class="header__item">VALOR</div>
				<div class="header__item"></div>
			</div>
			<div class="table-content">
				<?php
				$s =  oci_parse($c, "SELECT T.ANUNCIO, T.DATA, U.NOME, T.VALOR, T.VENDEDOR 
									 FROM TRANSACAO T JOIN USUARIO U ON (T.VENDEDOR = U.USERID) WHERE T.COMPRADOR = :1");

				if (!$s) {
					$m = oci_error($c);
					trigger_error("Could not parse statment" . $m["message"], E_USER_ERROR);
				}

				oci_bind_by_name($s, ":1", $_SESSION['login']);
				$e = oci_execute($s);

				if (!$e) {
					$m = oci_error($s);
					trigger_error("Não pôde executar a sentença: " . $m["message"], E_USER_ERROR);
				}

				while (($row = oci_fetch_array($s, OCI_BOTH)) != false) {
					echo "
									<div class='table-row'>\n
										<div class='table-data'>" . $row[0] . "</div>
										<div class='table-data'>" . $row[1] . "</div>
										<div class='table-data'>" . $row[2] . "</div>
										<div class='table-data'>R$" . $row[3] . "</div>
										<div class='table-data'>
											<div class='tab-button'>
												<a href='?detalhesTransacao2=" . $row[0] . "'>Detalhes</a>
											</div>
										</div>
									</div>";
				}
				?>
			</div>
		</div>
	</div>
</div>
<!-- </body>

</html> -->