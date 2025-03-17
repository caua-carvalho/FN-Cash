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
    <div class="tab-content" id="transactionTypeTabsContent">
    <!-- FORMS DE DESPESA -->
    <div class="tab-pane fade show active" id="expense-form" role="tabpanel">
        <form id="formDespesa" method="POST" action="transacoes.php">
            <!-- Campo oculto para identificar o formulário -->
            <input type="hidden" name="form_tipo" value="despesa">
            <!-- Campo oculto para armazenar o ícone selecionado -->
            <input type="hidden" name="icone_conta" id="icone_conta_selecionado" value="wallet">
            
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
                <div class="form-group col-md-7">
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
                        <textarea class="form-control" id="observacao" name="observacao" rows="4" placeholder="Notas ou observações adicionais..."></textarea>
                    </div>
                </div>
                
                <!-- Seletor vertical de ícones para despesa -->
                <div class="form-group col-md-5">
                    <label>Ícone da Conta</label>
                    <div class="icon-selector-container border rounded p-2 mb-3">
                        <div class="icon-category">Financeiro</div>
                        <div class="icon-grid-container">
                            <button type="button" class="btn btn-outline-danger icon-select-btn active" data-icon="wallet" title="Carteira">
                                <i class="bi bi-wallet"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="credit-card" title="Cartão de Crédito">
                                <i class="bi bi-credit-card"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="credit-card-2-front" title="Cartão Frente">
                                <i class="bi bi-credit-card-2-front"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="cash" title="Dinheiro">
                                <i class="bi bi-cash"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="cash-stack" title="Pilha de Dinheiro">
                                <i class="bi bi-cash-stack"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="bank" title="Banco">
                                <i class="bi bi-bank"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="piggy-bank" title="Cofrinho">
                                <i class="bi bi-piggy-bank"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="safe" title="Cofre">
                                <i class="bi bi-safe"></i>
                            </button>
                        </div>
                        
                        <div class="icon-category">Moedas</div>
                        <div class="icon-grid-container">
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="currency-dollar" title="Dólar">
                                <i class="bi bi-currency-dollar"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="currency-euro" title="Euro">
                                <i class="bi bi-currency-euro"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="currency-bitcoin" title="Bitcoin">
                                <i class="bi bi-currency-bitcoin"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="coin" title="Moeda">
                                <i class="bi bi-coin"></i>
                            </button>
                        </div>
                        
                        <div class="icon-category">Despesas Comuns</div>
                        <div class="icon-grid-container">
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="house" title="Casa">
                                <i class="bi bi-house"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="cart" title="Compras">
                                <i class="bi bi-cart"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="basket" title="Cesta de Compras">
                                <i class="bi bi-basket"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="bag" title="Sacola">
                                <i class="bi bi-bag"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="car-front" title="Carro">
                                <i class="bi bi-car-front"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="bus-front" title="Ônibus">
                                <i class="bi bi-bus-front"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="airplane" title="Avião">
                                <i class="bi bi-airplane"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="hospital" title="Hospital">
                                <i class="bi bi-hospital"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="capsule" title="Remédio">
                                <i class="bi bi-capsule"></i>
                            </button>
                        </div>
                        
                        <div class="icon-category">Outras Despesas</div>
                        <div class="icon-grid-container">
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="book" title="Livro">
                                <i class="bi bi-book"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="mortarboard" title="Educação">
                                <i class="bi bi-mortarboard"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="phone" title="Telefone">
                                <i class="bi bi-phone"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="pc-display" title="Computador">
                                <i class="bi bi-pc-display"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="wifi" title="Internet">
                                <i class="bi bi-wifi"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="droplet" title="Água">
                                <i class="bi bi-droplet"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="lightning" title="Energia">
                                <i class="bi bi-lightning"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="briefcase" title="Trabalho">
                                <i class="bi bi-briefcase"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="gift" title="Presente">
                                <i class="bi bi-gift"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="ticket-perforated" title="Ingresso">
                                <i class="bi bi-ticket-perforated"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="controller" title="Jogos">
                                <i class="bi bi-controller"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger icon-select-btn" data-icon="film" title="Cinema">
                                <i class="bi bi-film"></i>
                            </button>
                        </div>
                    </div>
                </div>
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
            <!-- Campo oculto para armazenar o ícone selecionado -->
            <input type="hidden" name="icone_conta" id="icone_conta_receita_selecionado" value="wallet">
            
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
                <div class="form-group col-md-7">
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
                        <textarea class="form-control" id="observacao_receita" name="observacao" rows="4" placeholder="Notas ou observações adicionais..."></textarea>
                    </div>
                </div>
                
                <!-- Seletor vertical de ícones para receita -->
                <div class="form-group col-md-5">
                    <label>Ícone da Conta</label>
                    <div class="icon-selector-container border rounded p-2 mb-3">
                        <div class="icon-category">Financeiro</div>
                        <div class="icon-grid-container">
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita active" data-icon="wallet" title="Carteira">
                                <i class="bi bi-wallet"></i>
                            </button>
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="credit-card" title="Cartão de Crédito">
                                <i class="bi bi-credit-card"></i>
                            </button>
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="cash" title="Dinheiro">
                                <i class="bi bi-cash"></i>
                            </button>
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="cash-stack" title="Pilha de Dinheiro">
                                <i class="bi bi-cash-stack"></i>
                            </button>
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="bank" title="Banco">
                                <i class="bi bi-bank"></i>
                            </button>
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="piggy-bank" title="Cofrinho">
                                <i class="bi bi-piggy-bank"></i>
                            </button>
                        </div>
                        
                        <div class="icon-category">Moedas</div>
                        <div class="icon-grid-container">
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="currency-dollar" title="Dólar">
                                <i class="bi bi-currency-dollar"></i>
                            </button>
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="currency-euro" title="Euro">
                                <i class="bi bi-currency-euro"></i>
                            </button>
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="currency-bitcoin" title="Bitcoin">
                                <i class="bi bi-currency-bitcoin"></i>
                            </button>
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="coin" title="Moeda">
                                <i class="bi bi-coin"></i>
                            </button>
                        </div>
                        
                        <div class="icon-category">Fontes de Receita</div>
                        <div class="icon-grid-container">
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="briefcase" title="Trabalho">
                                <i class="bi bi-briefcase"></i>
                            </button>
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="person-workspace" title="Freelance">
                                <i class="bi bi-person-workspace"></i>
                            </button>
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="building" title="Empresa">
                                <i class="bi bi-building"></i>
                            </button>
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="shop" title="Loja">
                                <i class="bi bi-shop"></i>
                            </button>
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="cart-check" title="Vendas">
                                <i class="bi bi-cart-check"></i>
                            </button>
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="house" title="Aluguel">
                                <i class="bi bi-house"></i>
                            </button>
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="gift" title="Presente">
                                <i class="bi bi-gift"></i>
                            </button>
                        </div>
                        
                        <div class="icon-category">Investimentos</div>
                        <div class="icon-grid-container">
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="graph-up-arrow" title="Gráfico">
                                <i class="bi bi-graph-up-arrow"></i>
                            </button>
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="bar-chart" title="Gráfico de Barras">
                                <i class="bi bi-bar-chart"></i>
                            </button>
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="pie-chart" title="Gráfico de Pizza">
                                <i class="bi bi-pie-chart"></i>
                            </button>
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="trophy" title="Premiação">
                                <i class="bi bi-trophy"></i>
                            </button>
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="award" title="Prêmio">
                                <i class="bi bi-award"></i>
                            </button>
                            <button type="button" class="btn btn-outline-success icon-select-btn-receita" data-icon="gem" title="Joia">
                                <i class="bi bi-gem"></i>
                            </button>
                        </div>
                    </div>
                </div>
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
            <!-- Campos ocultos para armazenar os ícones selecionados -->
            <input type="hidden" name="icone_conta_origem" id="icone_conta_origem_selecionado" value="wallet">
            <input type="hidden" name="icone_conta_destino" id="icone_conta_destino_selecionado" value="wallet">
            
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
                    <label for="conta_destino">Conta de Destino</label>
                    <select class="form-control" id="conta_destino" name="conta_destino">
                        <option selected>Selecione...</option>
                        <option>Conta Corrente</option>
                        <option>Poupança</option>
                        <option>Cartão de Crédito</option>
                        <option>Dinheiro</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="data_transferencia">Data</label>
                    <input type="date" class="form-control" id="data_transferencia" name="data">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Ícone da Conta de Origem</label>
                    <div class="icon-selector-container border rounded p-2 mb-3">
                        <div class="icon-grid-container">
                            <button type="button" class="btn btn-outline-primary icon-select-btn-origem active" data-icon="wallet" title="Carteira">
                                <i class="bi bi-wallet"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-origem" data-icon="credit-card" title="Cartão de Crédito">
                                <i class="bi bi-credit-card"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-origem" data-icon="cash" title="Dinheiro">
                                <i class="bi bi-cash"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-origem" data-icon="cash-stack" title="Pilha de Dinheiro">
                                <i class="bi bi-cash-stack"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-origem" data-icon="bank" title="Banco">
                                <i class="bi bi-bank"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-origem" data-icon="piggy-bank" title="Cofrinho">
                                <i class="bi bi-piggy-bank"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-origem" data-icon="safe" title="Cofre">
                                <i class="bi bi-safe"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-origem" data-icon="currency-dollar" title="Dólar">
                                <i class="bi bi-currency-dollar"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-origem" data-icon="envelope" title="Envelope">
                                <i class="bi bi-envelope"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-origem" data-icon="phone" title="Telefone">
                                <i class="bi bi-phone"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-origem" data-icon="laptop" title="Laptop">
                                <i class="bi bi-laptop"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-origem" data-icon="house" title="Casa">
                                <i class="bi bi-house"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="form-group col-md-6">
                    <label>Ícone da Conta de Destino</label>
                    <div class="icon-selector-container border rounded p-2 mb-3">
                        <div class="icon-grid-container">
                            <button type="button" class="btn btn-outline-primary icon-select-btn-destino active" data-icon="wallet" title="Carteira">
                                <i class="bi bi-wallet"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-destino" data-icon="credit-card" title="Cartão de Crédito">
                                <i class="bi bi-credit-card"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-destino" data-icon="cash" title="Dinheiro">
                                <i class="bi bi-cash"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-destino" data-icon="cash-stack" title="Pilha de Dinheiro">
                                <i class="bi bi-cash-stack"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-destino" data-icon="bank" title="Banco">
                                <i class="bi bi-bank"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-destino" data-icon="piggy-bank" title="Cofrinho">
                                <i class="bi bi-piggy-bank"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-destino" data-icon="safe" title="Cofre">
                                <i class="bi bi-safe"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-destino" data-icon="currency-dollar" title="Dólar">
                                <i class="bi bi-currency-dollar"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-destino" data-icon="envelope" title="Envelope">
                                <i class="bi bi-envelope"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-destino" data-icon="phone" title="Telefone">
                                <i class="bi bi-phone"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-destino" data-icon="laptop" title="Laptop">
                                <i class="bi bi-laptop"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary icon-select-btn-destino" data-icon="house" title="Casa">
                                <i class="bi bi-house"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="categoria_transferencia">Categoria</label>
                    <select class="form-control" id="categoria_transferencia" name="categoria">
                        <option selected>Transferência</option>
                        <option>Transferência entre Contas</option>
                        <option>Pagamento de Cartão</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="status_transferencia">Status</label>
                    <select class="form-control" id="status_transferencia" name="status">
                        <option>Pendente</option>
                        <option selected>Efetivada</option>
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

<!-- CSS para melhorar a aparência do seletor de ícones -->
<style>
/* Estilos para o seletor de ícones */
.icon-selector-container {
    max-height: 300px;
    overflow-y: auto;
    background-color: #f8f9fa;
    scrollbar-width: thin;
}

.icon-selector-container::-webkit-scrollbar {
    width: 8px;
}

.icon-selector-container::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

.icon-selector-container::-webkit-scrollbar-thumb {
    background: #ccc;
    border-radius: 4px;
}

.icon-selector-container::-webkit-scrollbar-thumb:hover {
    background: #999;
}

.icon-category {
    font-weight: bold;
    margin-top: 10px;
    margin-bottom: 5px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 3px;
}

.icon-category:first-child {
    margin-top: 0;
}

.icon-grid-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 8px;
    margin-bottom: 10px;
}

.icon-select-btn, .icon-select-btn-receita, .icon-select-btn-origem, .icon-select-btn-destino {
    width: 42px;
    height: 42px;
    padding: 8px;
    border-radius: 4px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.icon-select-btn i, .icon-select-btn-receita i, .icon-select-btn-origem i, .icon-select-btn-destino i {
    font-size: 18px;
}

/* Cores específicas para cada tipo de transação */
.icon-select-btn.active {
    background-color: #dc3545;
    color: white;
    border-color: #dc3545;
}

.icon-select-btn-receita.active {
    background-color: #28a745;
    color: white;
    border-color: #28a745;
}

.icon-select-btn-origem.active, .icon-select-btn-destino.active {
    background-color: #0d6efd;
    color: white;
    border-color: #0d6efd;
}
</style>

<!-- JavaScript para o funcionamento do seletor de ícones -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Seletor de ícones para despesas
    const botoesIconesDespesa = document.querySelectorAll('.icon-select-btn');
    const iconeSelecionadoDespesa = document.getElementById('icone_conta_selecionado');
    
    botoesIconesDespesa.forEach(botao => {
        botao.addEventListener('click', function() {
            // Remove a classe 'active' de todos os botões
            botoesIconesDespesa.forEach(b => b.classList.remove('active'));
            // Adiciona a classe 'active' ao botão clicado
            this.classList.add('active');
            // Atualiza o valor do campo oculto
            iconeSelecionadoDespesa.value = this.getAttribute('data-icon');
        });
    });
    
    // Seletor de ícones para receitas
    const botoesIconesReceita = document.querySelectorAll('.icon-select-btn-receita');
    const iconeSelecionadoReceita = document.getElementById('icone_conta_receita_selecionado');
    
    botoesIconesReceita.forEach(botao => {
        botao.addEventListener('click', function() {
            botoesIconesReceita.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            iconeSelecionadoReceita.value = this.getAttribute('data-icon');
        });
    });
    
    // Seletor de ícones para conta de origem da transferência
    const botoesIconesOrigem = document.querySelectorAll('.icon-select-btn-origem');
    const iconeSelecionadoOrigem = document.getElementById('icone_conta_origem_selecionado');
    
    botoesIconesOrigem.forEach(botao => {
        botao.addEventListener('click', function() {
            botoesIconesOrigem.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            iconeSelecionadoOrigem.value = this.getAttribute('data-icon');
        });
    });
    
    // Seletor de ícones para conta de destino da transferência
    const botoesIconesDestino = document.querySelectorAll('.icon-select-btn-destino');
    const iconeSelecionadoDestino = document.getElementById('icone_conta_destino_selecionado');
    
    botoesIconesDestino.forEach(botao => {
        botao.addEventListener('click', function() {
            botoesIconesDestino.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            iconeSelecionadoDestino.value = this.getAttribute('data-icon');
        });
    });
});
</script>
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