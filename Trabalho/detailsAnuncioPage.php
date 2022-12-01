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
	<?php  
		$s =  oci_parse($c, "SELECT * FROM ANUNCIO a JOIN USUARIO u 
			ON a.VENDEDOR = u.USERID 
			WHERE :1 = a.NUMERO");

			if(!$s) {
			$m = oci_error($c);
			trigger_error("Could not parse statment". $m["message"], E_USER_ERROR);
			}

			oci_bind_by_name($s, ":1", $_GET['detalhesCatalogo']);
			$e = oci_execute($s);

			if(!$e){
			$m = oci_error($s);
			trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
			}

			$row = oci_fetch_array($s, OCI_BOTH);

			echo "<h3> Descrição</h3><br>";
			echo "<h2>". $row[0] ."</h2> <br>";
			echo "<h3> Placa: ". $row[4] ."</h3> <br>";
			echo "<h4> Data Publicação: ". $row[2] ."</h4> <br>";
			echo "<h3> VALOR: R$". $row[3] ."</h3> <br>";

			echo "<h3> Detalhes Vendedor</h3><br>";
			echo "<h4> Nome: ". $row[10] ."</h4> <br>";
			echo "<h4> Email: ". $row[6] ."</h4> <br>";
			echo "<h4> Telefone: ". $row[7] ."</h4> <br>";

			echo"<a href='?comprar=". $row[1] ."'>Comprar</a>"


	?>

</body>
</html>