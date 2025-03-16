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
        header("Location: transacoes.php?sucesso");
    } elseif (isset($_POST['submit_receita'])) {
        // Processar formulário de receita
        cadastro_contas(
            $conexao,
            $_POST["titulo"],
            $_POST["valor"],
            $_POST["data"],
            $_POST["categoria"],
            $_POST["forma_pagamento"],
            $_POST["status"],
            $_POST["observacao"],
            "receita",
            $_POST["recorrente"],
            $_POST["comprovante"]
        );
    } elseif (isset($_POST['submit_transferencia'])) {
        // Processar formulário de transferência
        cadastro_contas(
            $conexao,
            $_POST["titulo"],
            $_POST["valor"],
            $_POST["data"],
            $_POST["categoria"],
            $_POST["forma_pagamento"],
            $_POST["status"],
            $_POST["observacao"],
            "transacoes",
            $_POST["recorrente"],
            $_POST["comprovante"]
        );
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

                    <!-- CARDS COM TOTAL DE CADA TIPO DE CONTA -->
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="card shadow-sm text-center fade-in-up">
                                <div class="card-body">
                                    <h5 class="text-success mb-1">Receitas</h5>
                                    <h3 class="mb-0">
                                    <?php exibir_conta("receita"); ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="card shadow-sm text-center fade-in-up delay-200">
                                <div class="card-body">
                                    <h5 class="text-danger mb-1">Despesas</h5>
                                    <h3 class="mb-0">
                                    <?php exibir_conta("despesa"); ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm text-center fade-in-up delay-300">
                                <div class="card-body">
                                    <h5 class="text-info mb-1">Saldo</h5>
                                    <h3 class="mb-0">
                                    <?php exibir_conta("transacoes"); ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FILTROS -->
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
                    
                    <!-- TRANSACOES -->
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

                            <!-- TABELA DE TRANSACOES -->
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
                                                <?php transacoes("todas"); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <!-- Pagination -->
                                    <nav aria-label="Page navigation" class="mt-3">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item disabled">
                                                <a class="page-link text-accent" href="#" tabindex="-1">Anterior</a>
                                            </li>
                                            <li class="page-item"><a class="page-link btn-accent" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link text-accent" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link text-accent" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link text-accent" href="#">Próximo</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                
                                <div class="tab-pane fade" id="income" role="tabpanel">
                                    <!-- Conteúdo da aba Receitas -->
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
                                                <?php transacoes("receita"); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="expense" role="tabpanel">
                                    <!-- Conteúdo da aba Receitas -->
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
                                                <?php transacoes("despesa"); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="transfer" role="tabpanel">
                                    <!-- Conteúdo da aba Receitas -->
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
                                                <?php transacoes("transferP"); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- FOOTER -->
                <footer class="mt-5 text-center text-muted">
                    <p class="mb-1">&copy; 2025 FN-CASH. Todos os direitos reservados.</p>
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
                                        <option value="">Selecione...</option>
                                        <option value="alimentacao">Alimentação</option>
                                        <option value="transporte">Transporte</option>
                                        
                                        <option value="moradia">Moradia</option>
                                        <option value="saude">Saúde</option>
                                        <option value="educacao">Educação</option>
                                        <option value="lazer">Lazer</option>
                                        <option value="vestuario">Vestuário</option>
                                        <option value="outros">Outros</option>
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
                                        <input type="checkbox" class="custom-control-input" id="expenseRecurring" name="recorrente" value="sim">
                                        <label class="custom-control-label" for="expenseRecurring">Transação recorrente</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="expenseAttachment" name="comprovante" value="sim">
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
                        <form id="formReceita" method="POST" action="transacoes.php">
                            <!-- Campo oculto para identificar o formulário -->
                            <input type="hidden" name="form_tipo" value="receita">
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="titulo_receita">Descrição</label>
                                    <input type="text" class="form-control" id="titulo_receita" name="titulo" placeholder="Ex: Salário, Freelance...">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="valor_receita">Valor</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="text" class="form-control" id="valor_receita" name="valor" placeholder="0,00">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="data_receita">Data</label>
                                    <input type="date" class="form-control" id="data_receita" name="data">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="categoria_receita">Categoria</label>
                                    <select class="form-control" id="categoria_receita" name="categoria">
                                        <option selected>Selecione...</option>
                                        <option value="salario">Salário</option>
                                        <option value="investimentos">Investimentos</option>
                                        <option value="freelance">Freelance</option>
                                        <option value="vendas">Vendas</option>
                                        <option value="bonus">Bônus</option>
                                        <option value="reembolso">Reembolso</option>
                                        <option value="outros">Outros</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="forma_pagamento_receita">Conta</label>
                                    <select class="form-control" id="forma_pagamento_receita" name="forma_pagamento">
                                        <option selected>Selecione...</option>
                                        <option>Conta Corrente</option>
                                        <option>Poupança</option>
                                        <option>Dinheiro</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status_receita">Status</label>
                                    <select class="form-control" id="status_receita" name="status">
                                        <option>Pendente</option>
                                        <option selected>Efetivada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="observacao_receita">Observações</label>
                                <textarea class="form-control" id="observacao_receita" name="observacao" rows="3" placeholder="Notas ou observações adicionais..."></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="incomeRecurring" name="recorrente" value="sim">
                                        <label class="custom-control-label" for="incomeRecurring">Transação recorrente</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="incomeAttachment" name="comprovante" value="sim">
                                        <label class="custom-control-label" for="incomeAttachment">Adicionar comprovante</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success" name="submit_receita">Salvar</button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- FORMS DE TRANSFERÊNCIA -->
                    <div class="tab-pane fade" id="transfer-form" role="tabpanel">
                        <form id="formTransferencia" method="POST" action="transacoes.php">
                            <!-- Campo oculto para identificar o formulário -->
                            <input type="hidden" name="form_tipo" value="transferencia">
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="titulo_transferencia">Descrição</label>
                                    <input type="text" class="form-control" id="titulo_transferencia" name="titulo" placeholder="Ex: Transferência mensal...">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="valor_transferencia">Valor</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="text" class="form-control" id="valor_transferencia" name="valor" placeholder="0,00">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="data_transferencia">Data</label>
                                    <input type="date" class="form-control" id="data_transferencia" name="data">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="forma_pagamento_origem">Conta de Origem</label>
                                    <select class="form-control" id="forma_pagamento_origem" name="forma_pagamento">
                                        <option selected>Selecione...</option>
                                        <option>Conta Corrente</option>
                                        <option>Poupança</option>
                                        <option>Cartão de Crédito</option>
                                        <option>Dinheiro</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="categoria_transferencia">Categoria</label>
                                    <select class="form-control" id="categoria_transferencia" name="categoria">
                                        <option selected>Transferência</option>
                                        <option>Transferência entre Contas</option>
                                        <option>Pagamento de Cartão</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="status_transferencia">Status</label>
                                    <select class="form-control" id="status_transferencia" name="status">
                                        <option>Pendente</option>
                                        <option selected>Efetivada</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="conta_destino">Conta de Destino</label>
                                    <select class="form-control" id="conta_destino" name="conta_destino">
                                        <option selected>Selecione...</option>
                                        <option>Conta Corrente</option>
                                        <option>Poupança</option>
                                        <option>Cartão de Crédito</option>
                                        <option>Dinheiro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="observacao_transferencia">Observações</label>
                                <textarea class="form-control" id="observacao_transferencia" name="observacao" rows="3" placeholder="Notas ou observações adicionais..."></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="transferRecurring" name="recorrente" value="sim">
                                        <label class="custom-control-label" for="transferRecurring">Transferência recorrente</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="transferAttachment" name="comprovante" value="sim">
                                        <label class="custom-control-label" for="transferAttachment">Adicionar comprovante</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-info" name="submit_transferencia">Salvar</button>
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