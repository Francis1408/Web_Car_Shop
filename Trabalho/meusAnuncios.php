<?php
$c = oci_connect(***REMOVED***, ***REMOVED***, "bdengcomp_high");


if (!$c) {
	$m = oci_error();
	trigger_error("Could not connect to database: " . $m["message"], E_USER_ERROR);
}

?>


<!DOCTYPE html>
<html>

<div class="container">
	<div class="page-header">
		<h1>Meus Anúncios</h1>
	</div>


	<div class="page-tab">
		<div class="table">
			<div class="table-header">
				<div class="header__item">ID</div>
				<div class="header__item">CARRO</div>
				<div class="header__item">DATA PUBLICAÇÃO</div>
				<div class="header__item">PREÇO</div>
				<div class="header__item"></div>
			</div>

			<div class="table-content">
				<?php
				$s =  oci_parse($c, "SELECT * FROM ANUNCIO WHERE NUMERO not in (SELECT ANUNCIO FROM TRANSACAO ) and VENDEDOR = :1");

				if (!$s) {
					$m = oci_error($c);
					trigger_error("Could not parse statment" . $m["message"], E_USER_ERROR);
				}

				oci_bind_by_name($s, ":1", $_SESSION['login']);
				$e = oci_execute($s);

				if (!$e) {
					$m = oci_error($s);
					trigger_error("Não pôde executar a sentença: " . $m["message"], E_USER_ERROR);
				}

				while (($row = oci_fetch_array($s, OCI_BOTH)) != false) {
					echo "
					<div class='table-row'>\n
						<div class='table-data'>" . $row[1] . "</div>
						<div class='table-data'>" . $row[0]  . "</div>
						<div class='table-data'>" . $row[2] . "</div>
						<div class='table-data'>R$" . $row[3] . "</div>
						<div class='table-data-button'>
							<div class='tab-button'>
								<a href='?editar=" . $row[1] . "'>Editar</a>
							</div>
							<div class='tab-button'>
								<a href='?excluir=" . $row[1] . "'>Excluir</a>
							</div>
						</div>

					</div>
					";
				}
				?>

			</div>
			<div class="msgrem">
				<span><?php echo $_SESSION['success_rem_vei']; ?></span>
				<?php $_SESSION['success_rem_vei'] = null; ?>
			</div>
		</div>



	</div>

</html>