<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <h1 class="titulo">Registro <span> produtos </span></h1>
    <center>
        <form method="post" action="">
            
                <input type="text" name="nome" placeholder="Nome:"><br>

                <input type="text" name="fabricante" placeholder="Fabricante:"><br>

                <input type="text" name="descricao" placeholder="Descrição do produto:"><br>

                <input type="date" name="validade" placeholder="Validade:"><br>

                <input type="submit">


        </form>
    </center>

</body>

</html>

<?php

include "conexao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $fabricante = $_POST['fabricante'];
    $descricao = $_POST['descricao'];
    $validade = $_POST['validade'];


    $query = mysqli_query($conexao, "INSERT INTO produto (nome_pro, fabricante_pro, descricao_pro, validade_pro) 
                VALUES ('$nome','$fabricante','$descricao','$validade');");

    echo "<h1 class='gravado'>Gra<span>vado!!</span></h1>";
}
?>