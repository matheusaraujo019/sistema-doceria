<?php
include "conexao.php"; 

$query = mysqli_query($conexao, "SELECT id_est, id_pro, qtd, valor, qtd_min from estoque");


echo "<table border='1'>";
echo "<tr>  <th>Código</th> <th>Codigo Produto</th> <th>Quantidade</th> <th>Valor Unitário</th> <th>Quantidade Mínima</th>
            <th>Saida</th> </tr>"; 

// Enquanto tiver registro dentro de $query, não sairá do laço
while ($saida = mysqli_fetch_array($query)) {
    $id_est     = $saida[0]; 
    $id_pro       = $saida[1]; 
    $qtd = $saida[2]; 
    $valor  = $saida[3]; 
    $qtd_min   = $saida[4];

    // Exibe os dados na tabela
    echo ("<tr>");
    echo (" <td> " . $id_est    .  "</td>");
    echo (" <td> " . $id_pro      .  "</td>");
    echo (" <td> " . $qtd .  "</td>");
    echo (" <td> " . $valor  .  "</td>");
    echo (" <td> " . $qtd_min  .  "</td>");
    echo (" <td> <a class='saida' href='saida.php?id=". $id_est ."' >SAIDA</a></td>");
    echo ("</tr>");
}

echo ("</table>");


mysqli_close($conexao);
?>
