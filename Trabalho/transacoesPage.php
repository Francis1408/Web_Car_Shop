<?php  
	$c = oci_connect(***REMOVED***, ***REMOVED***, "bdengcomp_high");
		if (!$c) {
	    	$m = oci_error();
	    	trigger_error("Could not connect to database: ". $m["message"], E_USER_ERROR);
		}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TRANSAÇÕES</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>TRANSAÇÕES</h1>

	<h2>MINHAS VENDAS</h2>
	<table class="table">
		<thead>
			<tr>
				<th>ID ANUNCIO</th>
				<th>DATA DA COMPRA</th>
				<th>COMPRADO POR</th>
				<th>VALOR</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<?php  
				$s =  oci_parse($c, "SELECT T.ANUNCIO, T.DATA, U.NOME, T.VALOR, T.COMPRADOR 
									 FROM TRANSACAO T JOIN USUARIO U ON (T.COMPRADOR = U.USERID) WHERE T.VENDEDOR = :1");

				if(!$s) {
				$m = oci_error($c);
				trigger_error("Could not parse statment". $m["message"], E_USER_ERROR);
				}

				oci_bind_by_name($s, ":1", $_SESSION['login']);
				$e = oci_execute($s);

				if(!$e){
				$m = oci_error($s);
				trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
				}

				while(($row = oci_fetch_array($s, OCI_BOTH)) != false) {
					echo "<tr>\n
						<td>" . $row[0] . "</td>
						<td>" . $row[1] . "</td>
						<td>" . $row[2] . "</td>
						<td> R$ " . $row[3] . "</td>
						<td>
							<a href='?detalhesTransacao1=". $row[0] ."'>Detalhes</a>
						</td>

					</tr>";
				}
			?>

		</tbody>
	</table>

		<h2>MINHAS COMPRAS</h2>
		<table class="table">
		<thead>
			<tr>
				<th>ID ANUNCIO</th>
				<th>DATA DA COMPRA</th>
				<th>VENDIDO POR</th>
				<th>VALOR</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<?php  
				$s =  oci_parse($c, "SELECT T.ANUNCIO, T.DATA, U.NOME, T.VALOR, T.VENDEDOR 
									 FROM TRANSACAO T JOIN USUARIO U ON (T.VENDEDOR = U.USERID) WHERE T.COMPRADOR = :1");

				if(!$s) {
				$m = oci_error($c);
				trigger_error("Could not parse statment". $m["message"], E_USER_ERROR);
				}

				oci_bind_by_name($s, ":1", $_SESSION['login']);
				$e = oci_execute($s);

				if(!$e){
				$m = oci_error($s);
				trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
				}

				while(($row = oci_fetch_array($s, OCI_BOTH)) != false) {
					echo "<tr>\n
						<td>" . $row[0] . "</td>
						<td>" . $row[1] . "</td>
						<td>" . $row[2] . "</td>
						<td> R$ " . $row[3] . "</td>
						<td>
							<a href='?detalhesTransacao2=". $row[0] ."'>Detalhes</a>
						</td>

					</tr>";
				}
			?>

		</tbody>
	</table>
</body>
</html>