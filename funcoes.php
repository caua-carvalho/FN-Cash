<?php
require "conexao.php";

$dia_mes = date('d-m');
$dia_mes_ano = date('d-m-Y');

// CADASTRO DE DESPESAS
function cadastro_contas($conexao, $titulo, $valor, $data, $categoria, $forma_pagamento, $status, $observacao, $tipo, $recorrente, $comprovante, $icone) {
    $stmt = $conexao->prepare("INSERT INTO contas (titulo, valor, data, categoria, forma_pagamento, status, observacao, tipo, recorrente, comprovante, icone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sdsssssssss", $titulo, $valor, $data, $categoria, $forma_pagamento, $status, $observacao, $tipo, $recorrente, $comprovante, $icone);
    
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
    $conta = $row['valor'] ? $row['valor'] : 0;

    echo "R$ " . $conta;
}



function select_despesa(){
    global $conexao;
    $sql = "SELECT SUM(valor) as valor FROM contas WHERE tipo = 'despesa'";   
    $resultado = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($resultado);

    if($resultado->num_rows > 0){
        $valor = $row['valor'];

        return $valor;
    }
}

function select_receita(){
    global $conexao;
    $sql = "SELECT SUM(valor) as valor FROM contas WHERE tipo = 'receita'";   
    $resultado = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($resultado);

    if($resultado->num_rows > 0){
        $valor = $row["valor"];

        return $valor;
    }
}

// SALDO
function exibir_saldo(){
    global $conexao;
    $saldo = select_receita() - select_despesa();

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
    global $dia_mes_ano;

    $sql = "
            SELECT 
                id,
                titulo,
                valor,
                DATE_FORMAT(data, '%d/%m/%Y') AS data_formatada,
                categoria,
                forma_pagamento,
                status,
                observacao,
                tipo,
                recorrente,
                comprovante,
                DATE_FORMAT(data_cadastro, '%d/%m/%Y') AS data_cadastro,
                TIME_FORMAT(TIME(data_cadastro), '%H:%i:%s') AS hora_cadastro,
                icone
            FROM 
                contas;";
    $resultado = $conexao->query($sql);
    $row = mysqli_fetch_assoc($resultado);

    if($resultado->num_rows > 0){
        if($row['data_formatada'] == $dia_mes_ano){
            $row['data_formatda'] = "hoje";
        }

        if($row['tipo'] == "despesa" ){
            $valor = "- " . $row['valor'];
            $cor_btn = "expense";
            $cor_valor = "expense";
        } else{
            $valor = $row['valor'];
            $cor_btn = "bg-accent";
            $cor_valor = "";
        }

        foreach($resultado as $row){
            echo '
            <li class="transaction-item p-3">
                <div class="transaction-info">
                    <div class="btn ' . $cor_btn . '" style="border-radius: 100px; margin-right:">
                        <i class="bi bi-' . $row["icone"] . '"></i>
                    </div>
                    <div class="transaction-details">
                        <h5>' . $row['titulo'] . '</h5>
                        <p>' . $row['data_cadastro'] . '</p>
                    </div>
                </div>
                <div class="transaction-amount ' . $cor_valor . '">' . $row['valor'] . '</div>
            </li>';
        }
    }else{
        echo '0 resultados encontrados.';
    }   
}

?>