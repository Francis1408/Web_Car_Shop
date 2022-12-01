<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MENU</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php echo "<h3>".$_SESSION['login'] . " </h3>";  ?>
	<a href="?logout">Fazer Logout</a>
	<br>
	<a href="?meusAnuncios">Meus Anúncios</a>
	<br>
	<a href="?criarAnuncio">Criar Anúncio</a>
	<br>
	<a href="?catalogo">Catalogo</a>
	<br>
	<a href="?transacoes">Minhas Transações</a>
	<?php  

		if(isset($_GET['detalhesCatalogo'])){
			include("detailsAnuncioPage.php");
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
		else if(isset($_GET['transacoes'])){
			include("transacoesPage.php");
		}
		else if(isset($_GET['detalhesTransacao1']) or isset($_GET['detalhesTransacao2']) ){
			include("detailsTransacao.php");
		}
		else if(isset($_GET['catalogo'])){
			include("catalogPage.php");
		}

	?>

</body>
</html>