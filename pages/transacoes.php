<?php
require_once "../conexao.php";
require_once "../validacao_login.php";
require_once "header.php";
require_once "../funcoes.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit_despesa'])) {
        // Processar formulário de despesa
        cadastro_contas(
            $conexao,
            $_POST["titulo"],
            $_POST["valor"],
            $_POST["data"],
            $_POST["categoria"],
            $_POST["forma_pagamento"],
            $_POST["status"],
            $_POST["observacao"],
            "despesa",
            $_POST["recorrente"],
            $_POST["comprovante"]
        );
    } elseif (isset($_POST['submit_receita'])) {
        // Processar formulário de receita
    } elseif (isset($_POST['submit_transferencia'])) {
        // Processar formulário de transferência
    }
}

?>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php require_once "componentes/sidebar.php"; ?>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4 main-content">
                <!-- Top Navigation -->
                <?php require_once "componentes/navigation.php"; ?>
                
                <div class="container-fluid">
                    <!-- Page Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="h3">Transações</h1>
                        <div>
                            <button type="button" class="btn btn-gradient" data-toggle="modal" data-target="#addTransactionModal">
                                <i class="fas fa-plus mr-2"></i> Nova Transação
                            </button>
                        </div>
                    </div>
                    
                    <!-- Filters Card -->
                    <div class="card shadow-sm mb-4 fade-in-up">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3 mb-md-0">
                                    <label for="dateRange">Período</label>
                                    <select class="form-control" id="dateRange">
                                        <option>Últimos 7 dias</option>
                                        <option>Últimos 30 dias</option>
                                        <option selected>Este mês</option>
                                        <option>Mês passado</option>
                                        <option>Este ano</option>
                                        <option>Personalizado</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3 mb-md-0">
                                    <label for="transactionType">Tipo</label>
                                    <select class="form-control" id="transactionType">
                                        <option selected>Todas</option>
                                        <option>Receitas</option>
                                        <option>Despesas</option>
                                        <option>Transferências</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3 mb-md-0">
                                    <label for="account">Conta</label>
                                    <select class="form-control" id="account">
                                        <option selected>Todas as contas</option>
                                        <option>Conta Corrente</option>
                                        <option>Poupança</option>
                                        <option>Cartão de Crédito</option>
                                        <option>Investimentos</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="category">Categoria</label>
                                    <select class="form-control" id="category">
                                        <option selected>Todas as categorias</option>
                                        <option>Alimentação</option>
                                        <option>Transporte</option>
                                        <option>Moradia</option>
                                        <option>Lazer</option>
                                        <option>Saúde</option>
                                        <option>Educação</option>
                                        <option>Salário</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Pesquisar descrição...">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3 mb-md-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light">Mín</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Valor mínimo">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light">Máx</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Valor máximo">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <button class="btn btn-accent">
                                        <i class="fas fa-filter mr-2"></i> Aplicar Filtros
                                    </button>
                                    <button class="btn btn-outline-secondary ml-2">
                                        <i class="fas fa-redo mr-2"></i> Limpar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Transaction Summary Cards -->
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="card shadow-sm text-center fade-in-up">
                                <div class="card-body">
                                    <h5 class="text-success mb-1">Receitas</h5>
                                    <h3 class="mb-0">R$ 8.549,32</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="card shadow-sm text-center fade-in-up delay-200">
                                <div class="card-body">
                                    <h5 class="text-danger mb-1">Despesas</h5>
                                    <h3 class="mb-0">R$ 5.238,17</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm text-center fade-in-up delay-300">
                                <div class="card-body">
                                    <h5 class="text-info mb-1">Saldo</h5>
                                    <h3 class="mb-0">R$ 3.311,15</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Transactions Table -->
                    <div class="card shadow-sm mb-4 fade-in-up">
                        <div class="card-body">
                            <ul class="nav nav-tabs custom-tabs mb-3" id="transactionTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab">Todas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="income-tab" data-toggle="tab" href="#income" role="tab">Receitas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="expense-tab" data-toggle="tab" href="#expense" role="tab">Despesas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="transfer-tab" data-toggle="tab" href="#transfer" role="tab">Transferências</a>
                                </li>
                                <li class="nav-item ml-auto">
                                    <div class="btn-group btn-group-sm">
                                        <button type="button" class="btn btn-outline-secondary">
                                            <i class="fas fa-download"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </div>
                                </li>
                            </ul>
                            
                            <div class="tab-content" id="transactionTabsContent">
                                <div class="tab-pane fade show active" id="all" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Descrição</th>
                                                    <th>Categoria</th>
                                                    <th>Conta</th>
                                                    <th>Valor</th>
                                                    <th>Status</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>13/03/2025</td>
                                                    <td>Supermercado Extra</td>
                                                    <td>
                                                        <span class="badge badge-light">Alimentação</span>
                                                    </td>
                                                    <td>Cartão de Crédito</td>
                                                    <td class="text-danger">- R$ 152,35</td>
                                                    <td>
                                                        <span class="badge badge-success">Efetivada</span>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Editar">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Duplicar">
                                                                <i class="fas fa-copy"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" title="Excluir">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>12/03/2025</td>
                                                    <td>Restaurante Sabor & Arte</td>
                                                    <td>
                                                        <span class="badge badge-light">Alimentação</span>
                                                    </td>
                                                    <td>Cartão de Crédito</td>
                                                    <td class="text-danger">- R$ 75,90</td>
                                                    <td>
                                                        <span class="badge badge-success">Efetivada</span>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Editar">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Duplicar">
                                                                <i class="fas fa-copy"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" title="Excluir">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>12/03/2025</td>
                                                    <td>Salário Empresa XYZ</td>
                                                    <td>
                                                        <span class="badge badge-light">Salário</span>
                                                    </td>
                                                    <td>Conta Corrente</td>
                                                    <td class="text-success">+ R$ 4.500,00</td>
                                                    <td>
                                                        <span class="badge badge-success">Efetivada</span>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Editar">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Duplicar">
                                                                <i class="fas fa-copy"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" title="Excluir">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>10/03/2025</td>
                                                    <td>Conta de Luz - ENEL</td>
                                                    <td>
                                                        <span class="badge badge-light">Moradia</span>
                                                    </td>
                                                    <td>Conta Corrente</td>
                                                    <td class="text-danger">- R$ 187,32</td>
                                                    <td>
                                                        <span class="badge badge-success">Efetivada</span>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Editar">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Duplicar">
                                                                <i class="fas fa-copy"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" title="Excluir">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>08/03/2025</td>
                                                    <td>Conta de Água - SABESP</td>
                                                    <td>
                                                        <span class="badge badge-light">Moradia</span>
                                                    </td>
                                                    <td>Conta Corrente</td>
                                                    <td class="text-danger">- R$ 95,47</td>
                                                    <td>
                                                        <span class="badge badge-success">Efetivada</span>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Editar">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Duplicar">
                                                                <i class="fas fa-copy"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" title="Excluir">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>05/03/2025</td>
                                                    <td>Internet - Vivo Fibra</td>
                                                    <td>
                                                        <span class="badge badge-light">Moradia</span>
                                                    </td>
                                                    <td>Conta Corrente</td>
                                                    <td class="text-danger">- R$ 120,00</td>
                                                    <td>
                                                        <span class="badge badge-success">Efetivada</span>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Editar">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Duplicar">
                                                                <i class="fas fa-copy"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" title="Excluir">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>03/03/2025</td>
                                                    <td>Academia Smart Fit</td>
                                                    <td>
                                                        <span class="badge badge-light">Saúde</span>
                                                    </td>
                                                    <td>Cartão de Crédito</td>
                                                    <td class="text-danger">- R$ 99,90</td>
                                                    <td>
                                                        <span class="badge badge-success">Efetivada</span>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Editar">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Duplicar">
                                                                <i class="fas fa-copy"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" title="Excluir">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>01/03/2025</td>
                                                    <td>Aluguel Apartamento</td>
                                                    <td>
                                                        <span class="badge badge-light">Moradia</span>
                                                    </td>
                                                    <td>Conta Corrente</td>
                                                    <td class="text-danger">- R$ 1.500,00</td>
                                                    <td>
                                                        <span class="badge badge-success">Efetivada</span>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Editar">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Duplicar">
                                                                <i class="fas fa-copy"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" title="Excluir">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <!-- Pagination -->
                                    <nav aria-label="Page navigation" class="mt-3">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1">Anterior</a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Próximo</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                
                                <div class="tab-pane fade" id="income" role="tabpanel">
                                    <!-- Conteúdo da aba Receitas -->
                                    <p class="text-center text-muted py-5">Selecione o filtro "Receitas" para visualizar apenas transações de entrada.</p>
                                </div>
                                
                                <div class="tab-pane fade" id="expense" role="tabpanel">
                                    <!-- Conteúdo da aba Despesas -->
                                    <p class="text-center text-muted py-5">Selecione o filtro "Despesas" para visualizar apenas transações de saída.</p>
                                </div>
                                
                                <div class="tab-pane fade" id="transfer" role="tabpanel">
                                    <!-- Conteúdo da aba Transferências -->
                                    <p class="text-center text-muted py-5">Selecione o filtro "Transferências" para visualizar apenas movimentações entre contas.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <footer class="mt-5 text-center text-muted">
                    <p class="mb-1">&copy; 2025 FinManager. Todos os direitos reservados.</p>
                    <p class="mb-0">v1.0.0</p>
                </footer>
            </main>
        </div>
    </div>

    <!-- Modal Add Transaction -->
<div class="modal fade" id="addTransactionModal" tabindex="-1" role="dialog" aria-labelledby="addTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient text-white">
                <h5 class="modal-title" id="addTransactionModalLabel">Nova Transação</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills nav-justified mb-4" id="transactionTypeTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="expense-tab-form" data-toggle="pill" href="#expense-form" role="tab">
                            <i class="fas fa-arrow-circle-down text-danger mr-1"></i> Despesa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="income-tab-form" data-toggle="pill" href="#income-form" role="tab">
                            <i class="fas fa-arrow-circle-up text-success mr-1"></i> Receita
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="transfer-tab-form" data-toggle="pill" href="#transfer-form" role="tab">
                            <i class="fas fa-exchange-alt text-info mr-1"></i> Transferência
                        </a>
                    </li>
                </ul>
                
                <div class="tab-content" id="transactionTypeTabsContent">
                    <!-- FORMS DE DESPESA -->
                    <div class="tab-pane fade show active" id="expense-form" role="tabpanel">
                        <form id="formDespesa" method="POST" action="transacoes.php">
                            <!-- Campo oculto para identificar o formulário -->
                            <input type="hidden" name="form_tipo" value="despesa">
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="titulo">Titulo</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ex: Supermercado, Aluguel...">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="valor">Valor</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="text" class="form-control" id="valor" name="valor" placeholder="0,00">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="data">Data</label>
                                    <input type="date" class="form-control" id="data" name="data">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="categoria">Categoria</label>
                                    <select class="form-control" id="categoria" name="categoria">
                                        <option selected>Selecione...</option>
                                        <option>Alimentação</option>
                                        <option>Transporte</option>
                                        <option>Moradia</option>
                                        <option>Saúde</option>
                                        <option>Educação</option>
                                        <option>Lazer</option>
                                        <option>Vestuário</option>
                                        <option>Outros</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="forma_pagamento">Conta</label>
                                    <select class="form-control" id="forma_pagamento" name="forma_pagamento">
                                        <option selected>Selecione...</option>
                                        <option>Conta Corrente</option>
                                        <option>Poupança</option>
                                        <option>Cartão de Crédito</option>
                                        <option>Dinheiro</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option>Pendente</option>
                                        <option selected>Efetivada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="observacao">Observações</label>
                                <textarea class="form-control" id="observacao" name="observacao" rows="3" placeholder="Notas ou observações adicionais..."></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="expenseRecurring" name="recorrente" value="recorrente">
                                        <label class="custom-control-label" for="expenseRecurring">Transação recorrente</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="expenseAttachment" name="comprovante" value="comprovante">
                                        <label class="custom-control-label" for="expenseAttachment">Adicionar comprovante</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger" name="submit_despesa">Salvar</button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- FORMS DE RECEITA -->
                    <div class="tab-pane fade" id="income-form" role="tabpanel">
                        <form id="formReceita" method="POST" action="processar_transacao.php">
                            <!-- Campo oculto para identificar o formulário -->
                            <input type="hidden" name="form_tipo" value="receita">
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="incomeDescription">Descrição</label>
                                    <input type="text" class="form-control" id="incomeDescription" name="descricao" placeholder="Ex: Salário, Freelance...">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="incomeAmount">Valor</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="text" class="form-control" id="incomeAmount" name="valor" placeholder="0,00">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="incomeDate">Data</label>
                                    <input type="date" class="form-control" id="incomeDate" name="data">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="incomeCategory">Categoria</label>
                                    <select class="form-control" id="incomeCategory" name="categoria">
                                        <option selected>Selecione...</option>
                                        <option>Salário</option>
                                        <option>Investimentos</option>
                                        <option>Freelance</option>
                                        <option>Vendas</option>
                                        <option>Bônus</option>
                                        <option>Reembolso</option>
                                        <option>Outros</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="incomeAccount">Conta</label>
                                    <select class="form-control" id="incomeAccount" name="conta">
                                        <option selected>Selecione...</option>
                                        <option>Conta Corrente</option>
                                        <option>Poupança</option>
                                        <option>Dinheiro</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="incomeStatus">Status</label>
                                    <select class="form-control" id="incomeStatus" name="status">
                                        <option>Pendente</option>
                                        <option selected>Efetivada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="incomeNotes">Observações</label>
                                <textarea class="form-control" id="incomeNotes" name="observacoes" rows="3" placeholder="Notas ou observações adicionais..."></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="incomeRecurring" name="recorrente">
                                        <label class="custom-control-label" for="incomeRecurring">Transação recorrente</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="incomeAttachment" name="comprovante">
                                        <label class="custom-control-label" for="incomeAttachment">Adicionar comprovante</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- FORMS DE TRANSACOES -->
                    <div class="tab-pane fade" id="transfer-form" role="tabpanel">
                        <form id="formTransferencia" method="POST" action="processar_transacao.php">
                            <!-- Campo oculto para identificar o formulário -->
                            <input type="hidden" name="form_tipo" value="transferencia">
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="transferDescription">Descrição</label>
                                    <input type="text" class="form-control" id="transferDescription" name="descricao" placeholder="Ex: Transferência mensal...">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="transferAmount">Valor</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="text" class="form-control" id="transferAmount" name="valor" placeholder="0,00">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="transferDate">Data</label>
                                    <input type="date" class="form-control" id="transferDate" name="data">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="transferFromAccount">Conta de Origem</label>
                                    <select class="form-control" id="transferFromAccount" name="contaOrigem">
                                        <option selected>Selecione...</option>
                                        <option>Conta Corrente</option>
                                        <option>Poupança</option>
                                        <option>Cartão de Crédito</option>
                                        <option>Dinheiro</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="transferToAccount">Conta de Destino</label>
                                    <select class="form-control" id="transferToAccount" name="contaDestino">
                                        <option selected>Selecione...</option>
                                        <option>Conta Corrente</option>
                                        <option>Poupança</option>
                                        <option>Cartão de Crédito</option>
                                        <option>Dinheiro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="transferStatus">Status</label>
                                    <select class="form-control" id="transferStatus" name="status">
                                        <option>Pendente</option>
                                        <option selected>Efetivada</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="transferFee">Taxa de Transferência</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="text" class="form-control" id="transferFee" name="taxa" placeholder="0,00">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="transferNotes">Observações</label>
                                <textarea class="form-control" id="transferNotes" name="observacoes" rows="3" placeholder="Notas ou observações adicionais..."></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="transferRecurring" name="recorrente">
                                        <label class="custom-control-label" for="transferRecurring">Transferência recorrente</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="transferAttachment" name="comprovante">
                                        <label class="custom-control-label" for="transferAttachment">Adicionar comprovante</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-info">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap & jQuery JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script>
    // Inicializa tooltips
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    
    // Script para toggling sidebar em dispositivos móveis
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarToggle = document.querySelector('.navbar-toggler');
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function() {
                document.querySelector('.sidebar').classList.toggle('show');
            });
        }
        
        // Formatar campos de valor para formato monetário
        const camposValor = document.querySelectorAll('#valor, #incomeAmount, #transferAmount, #transferFee');
        camposValor.forEach(function(campo) {
            campo.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                value = (value / 100).toFixed(2).replace('.', ',');
                e.target.value = value;
            });
        });
    });
</script>
</body>
</html>