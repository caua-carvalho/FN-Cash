<?php
require "conexao.php";

// CADASTRO DE DESPESAS
function cadastro_contas($conexao, $titulo, $valor, $data, $categoria, $forma_pagamento, $status, $observacao, $tipo, $recorrente, $comprovante) {
    $stmt = $conexao->prepare("INSERT INTO contas (titulo, valor, data, categoria, forma_pagamento, status, observacao, tipo, recorrente, comprovante) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sdssssssss", $titulo, $valor, $data, $categoria, $forma_pagamento, $status, $observacao, $tipo, $recorrente, $comprovante);
    
    $resultado = $stmt->execute();
    header("Location: transacoes.php");
    $stmt->close();
    
    return $resultado;
}

// TOTAL DESPESAS
function exibir_conta($tipo){
    global $conexao;
    
    $sql = "SELECT SUM(valor) as valor FROM contas WHERE tipo = '" . $tipo . "'";
    $resultado = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($resultado);
    $valor_despesa = $row['valor'] ? $row['valor'] : 0;

    echo "R$ " . $valor_despesa;
}

// SALDO
function exibir_saldo(){
    global $conexao;
    $sql = "SELECT 
                (SELECT COALESCE(SUM(valor), 0) FROM contas WHERE tipo = 'despesa') - 
                (SELECT COALESCE(SUM(valor), 0) FROM contas WHERE tipo = 'receita') AS saldo";
    
    $resultado = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($resultado);
    $saldo = $row['saldo'];

    echo "R$ " . $saldo;
}

?>