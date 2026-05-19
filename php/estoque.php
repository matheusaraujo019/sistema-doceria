<?php
include "conexao.php";

$query = "SELECT id_pro, nome_pro FROM produto ORDER BY nome_pro ASC";
$resProd = $conexao->query($query);


if (isset($_POST['cadastrar'])) {

    $id_pro   = $_POST['id_pro'];
    $qtd      = $_POST['qtd'];
    $valor    = $_POST['valor'];
    $qtd_min  = $_POST['qtd_min'];

    $sql = "INSERT INTO estoque (id_pro, qtd, valor, qtd_min)
            VALUES ('$id_pro', '$qtd', '$valor', '$qtd_min')";

    if ($conexao->query($sql)) {
        echo "Estoque cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar estoque";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="POST" action="">

        <label>Produto:</label><br>
        <select name="id_pro" required>
            <option value="">Selecione...</option>
            <?php while ($row = $resProd->fetch_assoc()) { ?>
                <option value="<?= $row['id_pro']; ?>">
                    <?= $row['nome_pro']; ?>
                </option>
            <?php } ?>
        </select><br><br>

        <label>Quantidade:</label><br>
        <input type="number" name="qtd" required><br><br>

        <label>Valor Unitário:</label><br>
        <input type="number" name="valor" required><br><br>

        <label>Qtd. Mínima:</label><br>
        <input type="number" name="qtd_min" required><br><br>

        <button type="submit" name="cadastrar">OK</button>

    </form>
</body>

</html>

