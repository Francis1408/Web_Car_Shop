<?php

	// print <<<_HTML_
  //       <H3> Preencha os dados no novo Usuario </H3>
  //       <FORM method="post" action="insere_usuario.php">
  //       Nome: <input type="text" name="nome">
  //       <BR/>
  //       Email: <input type="text" name="email">
  //       <BR/>
  //       Telefone: <input type="text" name="telefone">
  //       <BR/>
  //       Endereço: <input type="text" name="endereco">
  //       <BR/>
  //       Id: <input type="text" name="userId">
  //       <BR/>
  //       <INPUT type="submit" value="Cadastrar">
  //       </FORM>
  //     _HTML_;

?>


<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<H3> Preencha os dados no novo Usuario </H3>
        <FORM method="post" action="insere_usuario.php">
        Nome: <input type="text" name="nome">
        <BR/>
        Email: <input type="text" name="email">
        <BR/>
        Telefone: <input type="text" name="telefone">
        <BR/>
        Endereço: <input type="text" name="endereco">
        <BR/>
        Id: <input type="text" name="userId">
        <BR/>
        <INPUT type="submit" value="Cadastrar" class="button">
        </FORM>
</body>
</html>
