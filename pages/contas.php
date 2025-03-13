<?php
require_once "../conexao.php";
require_once "../conexao.php";
require_once "../validacao_login.php";
require_once "header.php";
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
                        <h1 class="h3">Contas</h1>
                        <div>
                            <button type="button" class="btn btn-gradient" data-toggle="modal" data-target="#addAccountModal">
                                <i class="fas fa-plus mr-2"></i> Nova Conta
                            </button>
                        </div>
                    </div>
                    
                    <!-- Account Summary -->
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="card shadow-sm text-center fade-in-up">
                                <div class="card-body">
                                    <h5 class="mb-1">Saldo Total</h5>
                                    <h3 class="mb-0 text-accent">R$ 37.982,15</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="card shadow-sm text-center fade-in-up delay-200">
                                <div class="card-body">
                                    <h5 class="mb-1">Dívidas Totais</h5>
                                    <h3 class="mb-0 text-danger">R$ 12.457,78</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm text-center fade-in-up delay-300">
                                <div class="card-body">
                                    <h5 class="mb-1">Patrimônio Líquido</h5>
                                    <h3 class="mb-0 text-info">R$ 25.524,37</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Accounts Cards -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h4 class="mb-3">Contas Bancárias</h4>
                        </div>
                        
                        <!-- Conta Corrente -->
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card shadow-sm h-100 fade-in-up">
                                <div class="card-header d-flex align-items-center bg-white">
                                    <i class="fas fa-university text-accent mr-2 fa-lg"></i>
                                    <h5 class="card-title mb-0">Conta Corrente</h5>
                                    <div class="dropdown ml-auto">
                                        <button class="btn btn-sm btn-link text-muted" type="button" data-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editAccountModal">
                                                <i class="fas fa-edit mr-2"></i> Editar
                                            </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#transactionModal">
                                                <i class="fas fa-exchange-alt mr-2"></i> Transação
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-sync-alt mr-2"></i> Atualizar Saldo
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#">
                                                <i class="fas fa-trash-alt mr-2"></i> Excluir
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted mb-1">Banco do Brasil</p>
                                    <h3 class="font-weight-bold mb-3">R$ 4.872,35</h3>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted small">Agência: 1234-5</span>
                                        <span class="text-muted small">Conta: 12345-6</span>
                                    </div>
                                </div>
                                <div class="card-footer bg-white d-flex justify-content-between">
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-history mr-1"></i> Extrato
                                    </button>
                                    <button class="btn btn-sm btn-accent">
                                        <i class="fas fa-plus mr-1"></i> Transação
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Poupança -->
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card shadow-sm h-100 fade-in-up delay-200">
                                <div class="card-header d-flex align-items-center bg-white">
                                    <i class="fas fa-piggy-bank text-success mr-2 fa-lg"></i>
                                    <h5 class="card-title mb-0">Poupança</h5>
                                    <div class="dropdown ml-auto">
                                        <button class="btn btn-sm btn-link text-muted" type="button" data-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editAccountModal">
                                                <i class="fas fa-edit mr-2"></i> Editar
                                            </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#transactionModal">
                                                <i class="fas fa-exchange-alt mr-2"></i> Transação
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-sync-alt mr-2"></i> Atualizar Saldo
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#">
                                                <i class="fas fa-trash-alt mr-2"></i> Excluir
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted mb-1">Banco do Brasil</p>
                                    <h3 class="font-weight-bold mb-3">R$ 15.732,80</h3>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted small">Rendimento: 0,5% a.m.</span>
                                        <span class="text-success small">+R$ 78,66 este mês</span>
                                    </div>
                                </div>
                                <div class="card-footer bg-white d-flex justify-content-between">
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-history mr-1"></i> Extrato
                                    </button>
                                    <button class="btn btn-sm btn-accent">
                                        <i class="fas fa-plus mr-1"></i> Transação
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Investimentos -->
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card shadow-sm h-100 fade-in-up delay-300">
                                <div class="card-header d-flex align-items-center bg-white">
                                    <i class="fas fa-chart-line text-info mr-2 fa-lg"></i>
                                    <h5 class="card-title mb-0">Investimentos</h5>
                                    <div class="dropdown ml-auto">
                                        <button class="btn btn-sm btn-link text-muted" type="button" data-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editAccountModal">
                                                <i class="fas fa-edit mr-2"></i> Editar
                                            </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#transactionModal">
                                                <i class="fas fa-exchange-alt mr-2"></i> Transação
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-sync-alt mr-2"></i> Atualizar Saldo
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#">
                                                <i class="fas fa-trash-alt mr-2"></i> Excluir
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted mb-1">XP Investimentos</p>
                                    <h3 class="font-weight-bold mb-3">R$ 17.377,00</h3>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted small">Retorno: +12,8% a.a.</span>
                                        <span class="text-success small">+R$ 187,23 este mês</span>
                                    </div>
                                </div>
                                <div class="card-footer bg-white d-flex justify-content-between">
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-history mr-1"></i> Extrato
                                    </button>
                                    <button class="btn btn-sm btn-accent">
                                        <i class="fas fa-plus mr-1"></i> Transação
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-12">
                            <h4 class="mb-3">Cartões de Crédito</h4>
                        </div>
                        
                        <!-- Cartão de Crédito Nubank -->
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card shadow-sm h-100 fade-in-up">
                                <div class="card-header d-flex align-items-center bg-white">
                                    <i class="fas fa-credit-card text-primary mr-2 fa-lg"></i>
                                    <h5 class="card-title mb-0">Nubank</h5>
                                    <div class="dropdown ml-auto">
                                        <button class="btn btn-sm btn-link text-muted" type="button" data-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editAccountModal">
                                                <i class="fas fa-edit mr-2"></i> Editar
                                            </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#transactionModal">
                                                <i class="fas fa-exchange-alt mr-2"></i> Transação
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-sync-alt mr-2"></i> Atualizar Saldo
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#">
                                                <i class="fas fa-trash-alt mr-2"></i> Excluir
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-1">
                                        <p class="text-muted mb-0">Crédito disponível</p>
                                        <p class="mb-0">R$ 6.852,33</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <p class="text-muted mb-0">Fatura atual</p>
                                        <p class="text-danger mb-0">R$ 1.147,67</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <p class="text-muted mb-0">Limite total</p>
                                        <p class="mb-0">R$ 8.000,00</p>
                                    </div>
                                    <div class="progress mb-1" style="height: 6px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 14%;" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted small">Fechamento: 27/03</span>
                                        <span class="text-danger small">Vencimento: 05/04</span>
                                    </div>
                                </div>
                                <div class="card-footer bg-white d-flex justify-content-between">
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-file-invoice-dollar mr-1"></i> Ver Fatura
                                    </button>
                                    <button class="btn btn-sm btn-accent">
                                        <i class="fas fa-plus mr-1"></i> Compra
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Cartão de Crédito Itaú -->
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card shadow-sm h-100 fade-in-up delay-200">
                                <div class="card-header d-flex align-items-center bg-white">
                                    <i class="fas fa-credit-card text-warning mr-2 fa-lg"></i>
                                    <h5 class="card-title mb-0">Itaú</h5>
                                    <div class="dropdown ml-auto">
                                        <button class="btn btn-sm btn-link text-muted" type="button" data-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editAccountModal">
                                                <i class="fas fa-edit mr-2"></i> Editar
                                            </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#transactionModal">
                                                <i class="fas fa-exchange-alt mr-2"></i> Transação
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-sync-alt mr-2"></i> Atualizar Saldo
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#">
                                                <i class="fas fa-trash-alt mr-2"></i> Excluir
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-1">
                                        <p class="text-muted mb-0">Crédito disponível</p>
                                        <p class="mb-0">R$ 12.310,11</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <p class="text-muted mb-0">Fatura atual</p>
                                        <p class="text-danger mb-0">R$ 2.689,89</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <p class="text-muted mb-0">Limite total</p>
                                        <p class="mb-0">R$ 15.000,00</p>
                                    </div>
                                    <div class="progress mb-1" style="height: 6px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 18%;" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted small">Fechamento: 20/03</span>
                                        <span class="text-danger small">Vencimento: 02/04</span>
                                    </div>
                                </div>
                                <div class="card-footer bg-white d-flex justify-content-between">
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-file-invoice-dollar mr-1"></i> Ver Fatura
                                    </button>
                                    <button class="btn btn-sm btn-accent">
                                        <i class="fas fa-plus mr-1"></i> Compra
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Adicionar Novo Cartão -->
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card shadow-sm h-100 fade-in-up delay-300 border-dashed d-flex align-items-center justify-content-center" style="border: 2px dashed #e9ecef; background-color: #f8f9fa;">
                                <div class="card-body text-center py-5">
                                    <i class="fas fa-plus-circle fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">Adicionar Cartão</h5>
                                    <button class="btn btn-outline-secondary mt-2" data-toggle="modal" data-target="#addAccountModal">
                                        Cadastrar Novo Cartão
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-12">
                            <h4 class="mb-3">Outras Contas</h4>
                        </div>
                        
                        <!-- Dinheiro em Espécie -->
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card shadow-sm h-100 fade-in-up">
                                <div class="card-header d-flex align-items-center bg-white">
                                    <i class="fas fa-money-bill-wave text-success mr-2 fa-lg"></i>
                                    <h5 class="card-title mb-0">Dinheiro em Espécie</h5>
                                    <div class="dropdown ml-auto">
                                        <button class="btn btn-sm btn-link text-muted" type="button" data-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editAccountModal">
                                                <i class="fas fa-edit mr-2"></i> Editar
                                            </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#transactionModal">
                                                <i class="fas fa-exchange-alt mr-2"></i> Transação
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-sync-alt mr-2"></i> Atualizar Saldo
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#">
                                                <i class="fas fa-trash-alt mr-2"></i> Excluir
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted mb-1">Carteira</p>
                                    <h3 class="font-weight-bold mb-3">R$ 327,50</h3>
                                </div>
                                <div class="card-footer bg-white d-flex justify-content-between">
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-history mr-1"></i> Movimentações
                                    </button>
                                    <button class="btn btn-sm btn-accent">
                                        <i class="fas fa-plus mr-1"></i> Transação
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Financiamento (Dívida) -->
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card shadow-sm h-100 fade-in-up delay-200">
                                <div class="card-header d-flex align-items-center bg-white">
                                    <i class="fas fa-home text-danger mr-2 fa-lg"></i>
                                    <h5 class="card-title mb-0">Financiamento Imóvel</h5>
                                    <div class="dropdown ml-auto">
                                        <button class="btn btn-sm btn-link text-muted" type="button" data-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editAccountModal">
                                                <i class="fas fa-edit mr-2"></i> Editar
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-file-contract mr-2"></i> Detalhes do Contrato
                                            </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#transactionModal">
                                                <i class="fas fa-exchange-alt mr-2"></i> Registrar Pagamento
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#">
                                                <i class="fas fa-trash-alt mr-2"></i> Excluir
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted mb-1">Banco Imobiliário</p>
                                    <h3 class="font-weight-bold text-danger mb-3">- R$ 8.620,22</h3>
                                    <div class="d-flex justify-content-between mb-1">
                                        <p class="text-muted mb-0">Valor original</p>
                                        <p class="mb-0">R$ 250.000,00</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <p class="text-muted mb-0">Parcelas restantes</p>
                                        <p class="mb-0">218/360</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <p class="text-muted mb-0">Próxima parcela</p>
                                        <p class="text-danger mb-0">R$ 1.354,87 (01/04)</p>
                                    </div>
                                </div>
                                <div class="card-footer bg-white d-flex justify-content-between">
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-file-invoice-dollar mr-1"></i> Ver Parcelas
                                    </button>
                                    <button class="btn btn-sm btn-accent">
                                        <i class="fas fa-money-bill-wave mr-1"></i> Amortizar
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Adicionar Nova Conta -->
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card shadow-sm h-100 fade-in-up delay-300 border-dashed d-flex align-items-center justify-content-center" style="border: 2px dashed #e9ecef; background-color: #f8f9fa;">
                                <div class="card-body text-center py-5">
                                    <i class="fas fa-plus-circle fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">Adicionar Conta</h5>
                                    <button class="btn btn-outline-secondary mt-2" data-toggle="modal" data-target="#addAccountModal">
                                        Cadastrar Nova Conta
                                    </button>
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

    <!-- Modal Adicionar Conta -->
    <div class="modal fade" id="addAccountModal" tabindex="-1" role="dialog" aria-labelledby="addAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient text-white">
                    <h5 class="modal-title" id="addAccountModalLabel">Nova Conta</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="accountType">Tipo de Conta</label>
                            <select class="form-control" id="accountType">
                                <option selected>Selecione...</option>
                                <option>Conta Corrente</option>
                                <option>Conta Poupança</option>
                                <option>Cartão de Crédito</option>
                                <option>Investimentos</option>
                                <option>Dinheiro em Espécie</option>
                                <option>Empréstimo</option>
                                <option>Financiamento</option>
                                <option>Outro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="accountName">Nome da Conta</label>
                            <input type="text" class="form-control" id="accountName" placeholder="Ex: Conta Corrente Bradesco">
                        </div>
                        <div class="form-group">
                            <label for="financialInstitution">Instituição Financeira</label>
                            <input type="text" class="form-control" id="financialInstitution" placeholder="Ex: Banco do Brasil, Nubank...">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="accountNumber">Número da Conta</label>
                                <input type="text" class="form-control" id="accountNumber" placeholder="Opcional">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="agency">Agência</label>
                                <input type="text" class="form-control" id="agency" placeholder="Opcional">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="initialBalance">Saldo Inicial</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input type="text" class="form-control" id="initialBalance" placeholder="0,00">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="accountColor">Cor</label>
                            <div class="d-flex justify-content-between">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="colorBlue" name="accountColor" class="custom-control-input">
                                    <label class="custom-control-label" for="colorBlue">
                                        <i class="fas fa-circle text-primary"></i>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="colorGreen" name="accountColor" class="custom-control-input">
                                    <label class="custom-control-label" for="colorGreen">
                                        <i class="fas fa-circle text-success"></i>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="colorOrange" name="accountColor" class="custom-control-input">
                                    <label class="custom-control-label" for="colorOrange">
                                        <i class="fas fa-circle text-warning"></i>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="colorRed" name="accountColor" class="custom-control-input">
                                    <label class="custom-control-label" for="colorRed">
                                        <i class="fas fa-circle text-danger"></i>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="colorPurple" name="accountColor" class="custom-control-input">
                                    <label class="custom-control-label" for="colorPurple">
                                        <i class="fas fa-circle text-purple"></i>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="colorTeal" name="accountColor" class="custom-control-input">
                                    <label class="custom-control-label" for="colorTeal">
                                        <i class="fas fa-circle text-info"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="accountNotes">Observações</label>
                            <textarea class="form-control" id="accountNotes" rows="2" placeholder="Observações opcionais..."></textarea>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="includeInTotals" checked>
                            <label class="custom-control-label" for="includeInTotals">Incluir esta conta nos totais</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-accent">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar Conta -->
    <div class="modal fade" id="editAccountModal" tabindex="-1" role="dialog" aria-labelledby="editAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-accent text-white">
                    <h5 class="modal-title" id="editAccountModalLabel">Editar Conta</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Conteúdo similar ao formulário de adicionar conta, mas preenchido -->
                    <p class="text-center text-muted py-5">Formulário para editar os detalhes da conta selecionada.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-accent">Salvar Alterações</button>
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
            sidebarToggle.addEventListener('click', function() {
                document.querySelector('.sidebar').classList.toggle('show');
            });
        });
    </script>
</body>
</html>