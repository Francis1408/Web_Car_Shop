<?php  
	$c = oci_connect(***REMOVED***, ***REMOVED***, "bdengcomp_high");

	if (!$c) {
		$m = oci_error();
	    trigger_error("Could not connect to database: ". $m["message"], E_USER_ERROR);
	}

?>

<?php 


	if(isset($_POST['avaliar'])){
		session_start();

		$s = oci_parse($c, "SELECT ID FROM FEEDBACK");
		if (!$s) {
	    	$m = oci_error($c);
	    	trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
		}

		$e1 = oci_execute($s);

		if(!$e1){
			$m = oci_error($s);
			trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);

		}
		$a = array();
		while(($row = oci_fetch_array($s, OCI_BOTH)) != false) {
			array_push($a, $row[0]);
		} 

		while(in_array(($number = mt_rand(1,999)), $a));

		// Creating Feedback value

		$f = oci_parse($c, "INSERT INTO FEEDBACK VALUES(:1, :2, :3)");
		if (!$f) {
	    	$m = oci_error($c);
	    	trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
		}

		if($_POST['avaliacao']){
			$nota = 1;
		}
		else{
			$nota = 0;
		}
		oci_bind_by_name($f, ":1", $_POST['comentario']);
		oci_bind_by_name($f, ":2", $nota);
		oci_bind_by_name($f, ":3", $number);


		$e2 = oci_execute($f, OCI_NO_AUTO_COMMIT);

		if(!$e2){
			$m = oci_error($f);
			trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
		}

		oci_commit($c);

		// Creating Transacao value

		$t = oci_parse($c, "INSERT INTO TRANSACAO VALUES(:1, TO_DATE(:2, 'DD/MM/YYYY'), :3, :4, :5, :6)");
		if (!$t) {
	    	$m = oci_error($c);
	    	trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
		}

		$d = date("d/m/Y");


		oci_bind_by_name($t, ":1", $_SESSION['preco']);
		oci_bind_by_name($t, ":2", $d);
		oci_bind_by_name($t, ":3", $_SESSION['login']);
		oci_bind_by_name($t, ":4", $_SESSION['vendedor']);
		oci_bind_by_name($t, ":5", $_SESSION['anuncio']);
		oci_bind_by_name($t, ":6", $number);

		$e3 = oci_execute($t, OCI_NO_AUTO_COMMIT);

		if(!$e3){
			$m = oci_error($t);
			trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
		}
		else {
			print "Compra realizada com sucesso!";
		 	oci_commit($c);
		 	header("Location: index.php");
		}

	}

?>



<?php 

	if(!isset($_POST['compra'])){
		include("compraPage.php");
	}
	else {
		include("feedbackPage.php");
	}
?>