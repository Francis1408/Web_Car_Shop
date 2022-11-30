<?php session_start();  ?>
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
			
			if(isset($_POST['act'])){
				$s = oci_parse($c, "SELECT * FROM USUARIO WHERE email = :1 AND userid = :2");
				if(!$s) {
					$m = oci_error($c);
					trigger_error("Could not parse statment". $m["message"], E_USER_ERROR);
				}

				oci_bind_by_name($s, ":1", $_POST['email']);
				oci_bind_by_name($s, ":2", $_POST['cpf']);

				$e = oci_execute($s);
				if(!$e){
					$m = oci_error($s);
					trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);
				}

				$row = oci_fetch_array($s);
				if(empty($row)){
					echo"Dados Inválidos";
				}
				else{
					$_SESSION['login'] = $_POST['cpf'];
					header("Location: index.php");
				}
				
			}
			include('loginPage.php');
		}
		else{
			if(isset($_GET['logout'])){
				unset($_SESSION['login']);
				session_destroy();
				header("Location: index.php");
			}
			$_GET['catalogo'] = 1;
			include('menuPage.php');
		}

	?>

</body>
</html>