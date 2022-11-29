<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MENU</title>
</head>
<body>
	<?php echo "<h3>".$_SESSION['login'] . " </h3>";  ?>
	<a href="?logout">Fazer Logout</a>
	<br>
	<a href="?meusAnuncios">Meus Anúncios</a>
	<br>
	<a href="?criarAnuncio">Criar Anúncio</a>
	<?php  
		include("catalogPage.php");

		if(isset($_GET['detalhes'])){
			include("detailsPage.php");
		}
		else if(isset($_GET['meusAnuncios'])){
			include("meusAnuncios.php");
		}
		else if(isset($_GET['editar'])){
			include("editPage.php");

		}
		else if(isset($_GET['criarAnuncio'])){
			include("createPage.php");
		}

	?>

</body>
</html>