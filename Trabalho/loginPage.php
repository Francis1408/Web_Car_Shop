<div class="container-inicial">
	<div class="form-image">
		<img src="assets\img\relampago.png">
	</div>
	<div class="form-login">
		<form method="post">
			<div class="msg">
				<span><?php echo $_SESSION['pass_err']; ?></span>
			</div>
			<div class="form-header">
				<h1>Login</h1>
			</div>
			<div class="input-group">
				<div class="input-box">
					<input type="text" name="email" placeholder="Insira o email">
				</div>
				<div class="input-box">
					<input type="text" name="cpf" placeholder="Insira o CPF">
				</div>
				<div class="login-button">
					<button type="submit" name="entrar">
						Entrar
					</button>
				</div>
			</div>
		</form>
	</div>
	<div class="subcontainer-inicial">
		<div class="cad-button">
			<a href="?cadastro">
				Cadastrar
			</a>
		</div>
	</div>
</div>