<?php
require "conexao.php";

function cadastro_contas($conexao, $titulo, $valor, $data, $categoria, $forma_pagamento, $status, $observacao, $tipo, $recorrente, $comprovante) {
    $stmt = $conexao->prepare("INSERT INTO contas (titulo, valor, data, categoria, forma_pagamento, status, observacao, tipo, recorrente, comprovante) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sdsissssss", $titulo, $valor, $data, $categoria, $forma_pagamento, $status, $observacao, $tipo, $recorrente, $comprovante);
    
    $resultado = $stmt->execute();
    $stmt->close();
    
    return $resultado;
}

?>