<?php  
	$c = oci_connect(***REMOVED***, ***REMOVED***, "bdengcomp_high");
		if (!$c) {
	    	$m = oci_error();
	    	trigger_error("Could not connect to database: ". $m["message"], E_USER_ERROR);
		}

?>

<?php  
	$s = oci_parse($c, "DELETE FROM ANUNCIO A WHERE A.NUMERO = :1 ");
	    if (!$s) {
	        $m = oci_error($c);
	        trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
	    }

	    oci_bind_by_name($s, ":1", $_GET['excluir']);
	        
	    $e = oci_execute($s, OCI_NO_AUTO_COMMIT);

	    if(!$e){
	        $m = oci_error($s);
	        trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);

	    } else {
	        echo "<br> Anuncio Removido com Sucesso!";
	        oci_commit($c);
	    }
?>
