<?php
require "conexao.php";

$dia_mes = date('d-m');
$dia_mes_ano = date('d-m-Y');

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

// EXIBIR HISTORICO DE TRANSACOES NO DOC TRANSACOES.PHP
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

//EXIBIR TRANSACOES NO DOC DASHBOARD.PHP
function transacoes_simplificada(){
    global $conexao;

    $sql = "
            SELECT 
                id,
                titulo,
                CONCAT('R$ ', FORMAT(valor, 2, 'pt_BR')) AS valor_formatado,
                DATE_FORMAT(data, '%d/%m/%Y') AS data_formatada,
                categoria,
                forma_pagamento,
                status,
                observacao,
                tipo,
                recorrente,
                comprovante,
                DATE_FORMAT(data_cadastro, '%d/%m/%Y') AS data_cadastro_formatada,
                TIME_FORMAT(TIME(data_cadastro), '%H:%i:%s') AS hora_cadastro
            FROM 
                contas;";
    $resultado = $conexao->query($sql);
    $row = mysqli_fetch_assoc($resultado);

    if($row['data_formatada'] == $dia_mes_ano){
        $row['data_formatda'] = "hoje";
    }

    if($resultado->num_rows > 0){
        foreach($resultado as $row){
            echo '
            <li class="transaction-item p-3">
                <div class="transaction-info">
                    <div class="transaction-icon expense">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="transaction-details">
                        <h5>' . $row['titulo'] . '</h5>
                        <p>' . $row['data_cadastro'] . '</p>
                    </div>
                </div>
                <div class="transaction-amount expense">- R$ 152,35</div>
            </li>';
        }
    }else{
        echo "0 resultados encontrados";
    }   
}


?>