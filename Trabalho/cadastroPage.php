<?php 
	print <<<_HTML_
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
        <INPUT type="submit" value="Cadastrar">
        </FORM>
      _HTML_;

?>