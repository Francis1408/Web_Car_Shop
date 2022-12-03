<?php
$c = oci_connect("admin", "admin", "bdengcomp_high");
if (!$c) {
    $m = oci_error();
    trigger_error("Could not connect to database: " . $m["message"], E_USER_ERROR);
}

?>


<?php

if (isset($_POST["cadastrar"])) {

    $s = oci_parse($c, "INSERT INTO USUARIO VALUES (:1, :2, :3, :4, :5) ");
    if (!$s) {
        $m = oci_error($c);
        trigger_error("Não pôde compilar a sentença: " . $m["message"], E_USER_ERROR);
    }

    oci_bind_by_name($s, ":1", $_POST['email']);
    oci_bind_by_name($s, ":2", $_POST['telefone']);
    oci_bind_by_name($s, ":3", $_POST['userId']);
    oci_bind_by_name($s, ":4", $_POST['endereco']);
    oci_bind_by_name($s, ":5", $_POST['nome']);

    $e = oci_execute($s, OCI_NO_AUTO_COMMIT);

    if (!$e) {
        $m = oci_error($s);
        trigger_error("Não pôde executar a sentença: " . $m["message"], E_USER_ERROR);
    } else {
        print "Usuario cadastrado com sucesso!";
        oci_commit($c);
        header("Location: index.php");
    }
}


?>
<div class="container-inicial">
    <div class="form-cad">
        <form method="post">
            <div class="form-header">
                <h1>Cadastre-se</h1>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <label for="nome">Nome</label>
                    <input id="nome" type="text" name="nome" placeholder="Filipe Bicalho">
                </div>
                <div class="input-box">
                    <label for="email">Email</label>
                    <input id="email" type="text" name="email" placeholder="lorem@ipsum.com">
                </div>
                <div class="input-box">
                    <label for="telefone">Telefone</label>
                    <input id="telefone" type="text" name="telefone" placeholder="(xx) xxxx-xxxx">
                </div>
                <div class="input-box">
                    <label for="endereco">Endereço</label>
                    <input id="endereco" type="text" name="endereco" placeholder="Rua Suaréz, bairro Calamidade, Belo Horizonte, MG. Brasil">
                </div>
                <div class="input-box">
                    <label for="userId">Id</label>
                    <input id="userId" type="text" name="userId" placeholder="Seja criativo">
                </div>
                <div class="login-button">
                    <button type="submit" name="cadastrar">
                        Cadastrar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

    


</body>
</html>

