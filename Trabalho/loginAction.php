<?php session_start()  ?>

<?php 

	$c = oci_connect(***REMOVED***, ***REMOVED***, "bdengcomp_high");
		if (!$c) {
	    	$m = oci_error();
	    	trigger_error("Could not connect to database: ". $m["message"], E_USER_ERROR);
		}

	if(isset($_POST['action'])){
		$s = oci_parse($c, "SELECT * FROM USUARIO WHERE email = :1 AND userid = :2");
		if(!$s) {
			$m = oci_error($c);
			trigger_error("Could not parse statment". $m["message"], E_USER_ERROR);
		}

		oci_bind_by_name($s, ":1", $_POST['Email']);
		oci_bind_by_name($s, ":2", $_POST['CPF']);

		$e = oci_execute($s);

		if(!$e){
			$m = oci_error($s);
			trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
			}

		} else {
			$result = oci_num_fields($s);
			if($result != 0){
				$_SESSION['login'] = $_POST['CPF'];
			} 
			header("Location: index.php");
			}
?>