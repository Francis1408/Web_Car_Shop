<?php session_start();  ?>
<?php
$c = oci_connect(***REMOVED***, ***REMOVED***, "bdengcomp_high");

if (!$c) {
	$m = oci_error();
	trigger_error("Could not connect to database: " . $m["message"], E_USER_ERROR);
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" href="assets\img\relampago95.png" />
</head>

<body>

	<?php
	if (!isset($_SESSION['login'])) {
		$_SESSION['pass_err'] = null;
		if (isset($_POST['entrar'])) {
			$s = oci_parse($c, "SELECT * FROM USUARIO WHERE email = :1 AND userid = :2");
			if (!$s) {
				$m = oci_error($c);
				trigger_error("Could not parse statment" . $m["message"], E_USER_ERROR);
			}

			oci_bind_by_name($s, ":1", $_POST['email']);
			oci_bind_by_name($s, ":2", $_POST['cpf']);

			$e = oci_execute($s);
			if (!$e) {
				$m = oci_error($s);
				trigger_error("Não pôde executar a sentença: " . $m["message"], E_USER_ERROR);
			}
			$row = oci_fetch_array($s);
			if (empty($row)) {
				// echo 'Dados Inválidos';
				$_SESSION['pass_err'] = 'Dados Inválidos';
			} else {
				$_SESSION['login'] = $_POST['cpf'];
				header("Location: index.php");
			}
		}

		if (isset($_GET['cadastro'])) {
			include("cadastroPage.php");
		} else {
			include('loginPage.php');
		}
	} else {
		if (isset($_GET['logout'])) {
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