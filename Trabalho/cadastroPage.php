<?php 

    $c = oci_connect(***REMOVED***, ***REMOVED***, "bdengcomp_high");
    if (!$c) {
        $m = oci_error();
        trigger_error("Could not connect to database: ". $m["message"], E_USER_ERROR);
    }

?>


<?php 

    if(isset($_POST["cadastrar"])){

        $s = oci_parse($c, "INSERT INTO USUARIO VALUES (:1, :2, :3, :4, :5) ");
        if (!$s) {
            $m = oci_error($c);
            trigger_error("Não pôde compilar a sentença: ". $m["message"], E_USER_ERROR);
        }

        oci_bind_by_name($s, ":1", $_POST['email']);
        oci_bind_by_name($s, ":2", $_POST['telefone']);
        oci_bind_by_name($s, ":3", $_POST['userId']);
        oci_bind_by_name($s, ":4", $_POST['endereco']);
        oci_bind_by_name($s, ":5", $_POST['nome']);
        
        $e = oci_execute($s, OCI_NO_AUTO_COMMIT);

        if(!$e){
            $m = oci_error($s);
            trigger_error("Não pôde executar a sentença: ". $m["message"], E_USER_ERROR);

        } else {
            print "Ususario cadastrado com sucesso!";
            oci_commit($c);
            header("Location: index.php");
        }
    }
    

?>


<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CADASTRO</title>
</head>
<body>

    <h3> Preencha os dados no novo Usuario </h3>
    <form method="post">
        Nome: <input type="text" name="nome">
        <br/>
        Email: <input type="text" name="email">
        <br/>
        Telefone: <input type="text" name="telefone">
        <br/>
        Endereço: <input type="text" name="endereco">
        <br/>
        Id: <input type="text" name="userId">
        <br/>
        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>
    


</body>
</html>


