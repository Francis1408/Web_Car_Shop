<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

	<div class="lateral-menu-conteiner">

		<?php echo "<h3>" . $_SESSION['login'] . " </h3>";  ?>
		<div class="lateral-menu-button">
			<a href="?logout">Fazer Logout</a>
		</div>
		<div class="lateral-menu-button">
			<a href="?meusAnuncios">Meus Anúncios</a>
		</div>
		<div class="lateral-menu-button">
			<a href="?criarAnuncio">Criar Anúncio</a>
		</div>
		<div class="lateral-menu-button">
			<a href="?catalogo">Catalogo</a>
		</div>
		<div class="lateral-menu-button">
			<a href="?transacoes">Minhas Transações</a>
		</div>
	</div>
	<?php

	if (isset($_GET['detalhesCatalogo'])) {
		include("detailsAnuncioPage.php");
	} else if (isset($_GET['meusAnuncios'])) {
		include("meusAnuncios.php");
	} else if (isset($_GET['editar'])) {
		include("editPage.php");
	} else if (isset($_GET['excluir'])) {
		include("removeAnuncioPage.php");
	} else if (isset($_GET['criarAnuncio']) or isset($_POST['register'])) {
		include("createAction.php");
	} else if (isset($_GET['transacoes'])) {
		include("transacoesPage.php");
	} else if (isset($_GET['detalhesTransacao1']) or isset($_GET['detalhesTransacao2'])) {
		include("detailsTransacao.php");
	} else if (isset($_POST['compra'])) {
		include("feedbackPage.php");
	} else if (isset($_GET['comprar'])) {
		include("compraPage.php");
	} else if (isset($_GET['catalogo'])) {
		include("catalogPage.php");
	}

	?>

</body>

</html>