<?php 
	$c = oci_connect(***REMOVED***, ***REMOVED***, "bdengcomp_high");
		if (!$c) {
	    	$m = oci_error();
	    	trigger_error("Could not connect to database: ". $m["message"], E_USER_ERROR);
		}
?>	



<?php
	if(isset($_POST['register'])){
		session_start();
		$_SESSION['placa'] = $_POST['placa'];
		$s = oci_parse($c, "SELECT * FROM CARRO WHERE :1 = PLACA ");

		if (!$s) {
	    $m = oci_error($c);
	    trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
		}

		oci_bind_by_name($s, ":1", $_POST['placa']);

		$e = oci_execute($s);

		if(!$e){
			$m = oci_error($s);
			trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
		}

		$row = oci_fetch_array($s);

		if(empty($row)){

			$s = oci_parse($c, "INSERT INTO CARRO VALUES(:1, :2, :3, :4, :5)");

			if (!$s) {
		    $m = oci_error($c);
		    trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
			}

			oci_bind_by_name($s, ":1", $_POST['placa']);
			oci_bind_by_name($s, ":2", $_POST['modelo']);
			oci_bind_by_name($s, ":3", $_POST['ano']);
			oci_bind_by_name($s, ":4", $_POST['cor']);
			oci_bind_by_name($s, ":5", $_POST['marca']);


			$e = oci_execute($s, OCI_NO_AUTO_COMMIT);

			if(!$e){
				$m = oci_error($s);
				trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
			}
			else {
			 	oci_commit($c);
			}
			echo"Veículo Cadastrado com Sucesso!";
		}
		else{
			echo"Veículo já Cadastrado";
		}

	}

?>

<?php
	
	if(isset($_POST['publicar'])){
		session_start();
		echo"ENTREI AQUI";
		print($_SESSION['placa']);
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



		//Creating anuncio entity

		$s = oci_parse($c, "INSERT INTO ANUNCIO VALUES(:1, :2, TO_DATE(:3, 'DD/MM/YYYY'), :4, :5, :6)");

		if (!$s) {
	    	$m = oci_error($c);
	    	trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
			}

		$d = date("d/m/Y");

		oci_bind_by_name($s, ":1", $_POST['descricao']);
		oci_bind_by_name($s, ":2", $number);
		oci_bind_by_name($s, ":3", $d);
		oci_bind_by_name($s, ":4", $_POST['valor']);
		oci_bind_by_name($s, ":5", $_SESSION['placa']);
		oci_bind_by_name($s, ":6", $_SESSION['login']);



		$e = oci_execute($s, OCI_NO_AUTO_COMMIT);

		if(!$e){
			$m = oci_error($s);
			trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
		}
		else {
			print "Anuncio publicado com sucesso!";
		 	oci_commit($c);
		 	//unset($_POST['register']);
		 	//unset($_SESSION['publicar']);
		 	header("Location: index.php");
		}
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
		if(!isset($_POST['register'])){
			include("cadastroVeiculoPage.php");
		}
		else{
			include("createAnuncio.php");

		}

	?>

</body>
</html>