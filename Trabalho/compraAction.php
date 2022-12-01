<?php  
	$c = oci_connect(***REMOVED***, ***REMOVED***, "bdengcomp_high");
		if (!$c) {
	    	$m = oci_error();
	    	trigger_error("Could not connect to database: ". $m["message"], E_USER_ERROR);
		}

?>





<?php  
	if(!isset($_POST['compra'])){
		include("compraPage.php");
	}
	else{
		include("feedbackPage.php");
	}
?>