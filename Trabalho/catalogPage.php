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
	<title>MENU</title>
</head>
<body>
	<h1>CATÁLOGO</h1>
	<br>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>CARRO</th>
				<th>ANUNCIANTE</th>
				<th>VALOR</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<?php  
				$s =  oci_parse($c, " SELECT A.NUMERO, A.DESCRICAO, A.DATA, A.VALOR, U.NOME FROM ANUNCIO A JOIN USUARIO U ON (A.VENDEDOR = U.USERID)
									  WHERE numero not in (SELECT ANUNCIO FROM TRANSACAO ) and A.VENDEDOR != :1");

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
						<td>" . $row[3] . "</td>
						<td>
							<a href='?detalhesCatalogo=". $row[0] ."'>Detalhes</a>
						</td>

					</tr>";
				}
			?>

		</tbody>
	</table>

</body>
</html>