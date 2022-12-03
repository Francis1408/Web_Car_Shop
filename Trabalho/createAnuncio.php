

<body>
	<div class="container-inicial">
		<div class="form-cad">
			<form method="post" action="./createAction.php">
				<div class="msg">
					<span><?php echo $_SESSION['success_cad_vei']; ?></span>
				</div>

				<div class="form-header">
					<h1>Criar Anúncio</h1>
				</div>
				<div class="input-group">
					<div class="input-box">
						<label for="descricao">Dê uma breve descrição</label>
						<input id="descricao" type="text" name="descricao" placeholder="Descrição" size="100">
					</div>
					<div class="input-box">
						<label for="valor">Preço</label>
						<input id="valor" type="text" name="valor" placeholder="1000,00">
					</div>
					<div class="login-button">
						<button type="submit" name="publicar">
							Publicar
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
