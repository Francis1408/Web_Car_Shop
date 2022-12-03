<?php 
	require 'teste.php';

	$c = oci_connect(***REMOVED***, ***REMOVED***, "bdengcomp_high");

	if (!$c) {
    	$m = oci_error();
    	trigger_error("Could not connect to database: ". $m["message"], E_USER_ERROR);
	}


	$s = oci_parse($c, "INSERT INTO USUARIO VALUES (:1, :2, :3, :4, :5) ");
	if (!$s) {
    	$m = oci_error($c);
    	trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
	}

	oci_bind_by_name($s, ":1", $_POST['email']);
	oci_bind_by_name($s, ":2", $_POST['telefone']);
	oci_bind_by_name($s, ":3", $_POST['userId']);
	oci_bind_by_name($s, ":4", $_POST['endereco']);
	oci_bind_by_name($s, ":5", $_POST['nome']);
	
	$e = oci_execute($s, OCI_NO_AUTO_COMMIT);

	if(!$e){
		$m = oci_error($s);
		trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);

	} else {
		print "Ususario (".$_POST['userId'].", ".$_POST['email'].", ". $_POST['telefone'].", ".$_POST['endereco']. ", ".$_POST['nome'].") cadastrado.";
	 	oci_commit($c);
	}
	

?>