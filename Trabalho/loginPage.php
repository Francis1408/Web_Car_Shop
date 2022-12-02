<div class="container">
	<link rel="icon" href="assets\img\relampago95.png" />
	<div class="form-image">
		<img src="assets\img\relampago.png">
	</div>
	<div class="form">
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
				<div class="login-button">
					<a href="?cadastro">
						Cadastrar
					</a>
				</div>
			</div>
		</form>
	</div>
</div>