<?php
include "conexao.php";

$id_est = $_GET['id'];

// Buscar dados do estoque e produto
$sql = "
    SELECT e.id_est, e.qtd, p.nome_pro
    FROM estoque e
    INNER JOIN produto p ON p.id_pro = e.id_pro
    WHERE e.id_est = '$id_est'
";

$query = mysqli_query($conexao, $sql);
$saida = mysqli_fetch_array($query);

if (!$saida) {
    die("Produto não encontrado.");
}

$id_est   = $saida['id_est'];
$qtd_atual = $saida['qtd'];
$produto  = $saida['nome_pro'];

// Se o botão foi clicado
if (isset($_POST['vender'])) {

    $qtd_saida = $_POST['saida'];
    $nova_qtd = $qtd_atual - $qtd_saida;

    if ($nova_qtd < 0) {
        $nova_qtd = 0; 
    }

    // Atualizar o estoque
    $sqlUp = "UPDATE estoque SET qtd='$nova_qtd' WHERE id_est='$id_est'";
    mysqli_query($conexao, $sqlUp);

    echo "<script>alert('Saída registrada com sucesso!'); window.location='consulta.php';</script>";
    exit;
}

?>

<h2>Saída de Produto</h2>

<p><b>Produto:</b> <?= $produto; ?></p>
<p><b>Quantidade atual:</b> <?= $qtd_atual; ?></p>

<form method="POST">
    <label>Quantidade de saída:</label><br>
    <input type="number" name="saida" required><br><br>

    <button type="submit" name="vender">Confirmar saída</button>
</form>

<br>
<a href="consulta.php">Voltar</a>
