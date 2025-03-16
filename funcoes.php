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

// EXIBIR HISTORICO DE TRANSACOES
function transacoes($tipo){
    global $conexao;

    if($tipo == "todas"){
        $sql = "SELECT * FROM contas";
    }else{
        $sql = "SELECT * FROM contas WHERE tipo = '" . $tipo . "'";
    }

    $resultado = $conexao->query($sql);
    $row = mysqli_fetch_assoc($resultado);

    if($resultado->num_rows > 0){
        if($row['tipo'] == "despesa" ){
            $valor = "- " . $row['valor'];
            $cor_btn = "danger";
        } else{
            $valor = $row['valor'];
            $cor_btn = "sucess";
        }
    
        if ($resultado->num_rows > 0) {
    
            foreach($resultado as $row) {
    
                if($row['tipo'] == "despesa" ){
                    $valor = "- " . $row['valor'];
                    $cor_btn = "danger";
                } else{
                    $valor = $row['valor'];
                    $cor_btn = "sucess";
                }
    
                echo "  
                <tr>
                    <td>" . $row['data'] . "</td>
                    <td>" . $row['titulo'] . "</td>
                    <td>
                        <span class='badge badge-light'>" . $row['categoria'] . "</span>
                    </td>
                    <td>" . $row['forma_pagamento'] . "</td>
                    <td class='text-" . $cor_btn . "'>" . $valor . "</td>
                    <td>
                        <span class='badge badge-success'>" . $row['status'] . "</span>
                    </td>
                    <td>
                        <div class='btn-group btn-group-sm'>
                            <button type='button' class='btn btn-outline-secondary' data-toggle='tooltip' title='Editar'>
                                <i class='fas fa-edit'></i>
                            </button>
                            <button type='button' class='btn btn-outline-secondary' data-toggle='tooltip' title='Duplicar'>
                                <i class='fas fa-copy'></i>
                            </button>
                            <button type='button' class='btn btn-outline-danger' data-toggle='tooltip' title='Excluir'>
                                <i class='fas fa-trash'></i>
                            </button>
                        </div>
                    </td>
                </tr>";
            }
    
        }
    }else {
        echo "
        <tr>
            <td>
                0 resultados encontrados
            </td>
        </tr>";
    }
}


?>