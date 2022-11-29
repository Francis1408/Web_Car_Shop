<?php session_start()  ?>
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
	<title>LOGIN</title>
</head>
<body>

	<?php  
		if(!isset($_SESSION['login'])){
			include('loginPage.php');

		}else{
			if(isset($_GET['logout'])){
				unset($_SESSION['login']);
				session_destroy();
				header("Location: index.php");
			}
			include('menuPage.php');
		}

	?>

</body>
</html>