<?php  
	$c = oci_connect(***REMOVED***, ***REMOVED***, "bdengcomp_high");
		if (!$c) {
	    	$m = oci_error();
	    	trigger_error("Could not connect to database: ". $m["message"], E_USER_ERROR);
		}

?>

<?php 
		$s = oci_parse($c, "SELECT NUMERO FROM ANUNCIO");
		if (!$s) {
	    	$m = oci_error($c);
	    	trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
		}

		$e = oci_execute($s);

		if(!$e){
			$m = oci_error($s);
			trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);

		}
		$a = array();
		while(($row = oci_fetch_array($s, OCI_BOTH)) != false) {
			array_push($a, $row[0]);
		} 

		while(in_array(($number = mt_rand(1,999)), $a));

		if(isset($_POST['create'])){
			$s = oci_parse($c, "INSERT INTO ANUNCIO VALUES(:1, :2, TO_DATE(:3, 'DD/MM/YYYY'), :4, :5, :6)");

			$d = date("d/m/Y");

			if (!$s) {
	    	$m = oci_error($c);
	    	trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
			}

			oci_bind_by_name($s, ":1", $_POST['Descricao']);
			oci_bind_by_name($s, ":2", $number);
			oci_bind_by_name($s, ":3", $d);
			oci_bind_by_name($s, ":4", $_POST['Valor']);
			oci_bind_by_name($s, ":5", $_POST['Carro']);
			oci_bind_by_name($s, ":6", $_SESSION['login']);

			echo"$d";

			$e = oci_execute($s, OCI_NO_AUTO_COMMIT);

			if(!$e){
				$m = oci_error($s);
				trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
			}
			else {
				print "Anuncio publicado com sucesso!";
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
	<title></title>
</head>
<body>
	<h4>Criar Anúncio</h4>
	<form method="post">
		<label for="Descrição">Descrição:</label>
		<input type="text"  size="100" name="Descricao">
		<br>
		<label for="Valor">Valor (R$):</label>
		<input type="text" name="Valor">
		<br>
		<label for="Valor">Placa do Carro:</label>
		<input type="text" name="Carro">
		<br>
		<input type="submit" name="create" value="Publicar">
	</form>
	<?php 
		$dd = $_SESSION['login'];
 
		echo"$dd";

	?>
</body>
</html>