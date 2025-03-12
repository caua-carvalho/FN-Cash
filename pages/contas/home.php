<?php
require_once('../../header.php');
require_once "../../conexao.php";
require_once "../../validacao_login.php";
?>
    <style>
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
            position: sticky;
            top: 0;
        }
        
        .nav-tabs .nav-link {
            color: rgba(33, 33, 33, 0.75);
        }
        
        .nav-link:hover {
            color: black;
        }
        
        .nav-link.active {
            color: white;
            font-weight: bold;
            background-color: rgba(0, 0, 0, 0.1);
        }
        
        .tab-content {
            padding: 20px 0;
        }
        
        .card-header-custom {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }
        
        .currency-symbol {
            position: absolute;
            left: 10px;
            top: 11px;
        }
        
        .currency-input {
            padding-left: 25px !important;
        }
        
        .spinner-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        
        .chart-container {
            height: 300px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php require_once "../navbar.php"; ?>
            
            <!-- Main Content -->
            <main class="col-md-10 ml-sm-auto px-4 py-3">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Gerenciamento de Contas</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-calendar mr-1"></i> Período
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Hoje</a>
                                <a class="dropdown-item" href="#">Esta semana</a>
                                <a class="dropdown-item" href="#">Este mês</a>
                                <a class="dropdown-item" href="#">Este ano</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Período personalizado</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Abas para as diferentes seções -->
                <ul class="nav nav-tabs" id="accountTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="view-tab" data-toggle="tab" href="#view" role="tab" aria-controls="view" aria-selected="true">
                            <i class="fas fa-eye mr-1"></i> Visualização
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">
                            <i class="fas fa-plus-circle mr-1"></i> Cadastro
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">
                            <i class="fas fa-history mr-1"></i> Histórico
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="forecast-tab" data-toggle="tab" href="#forecast" role="tab" aria-controls="forecast" aria-selected="false">
                            <i class="fas fa-chart-line mr-1"></i> Previsão
                        </a>
                    </li>
                </ul>
                
                <div class="tab-content" id="accountTabsContent">
                    <!-- Visualização Tab -->
                    <div class="tab-pane fade show active" id="view" role="tabpanel" aria-labelledby="view-tab">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="card text-white bg-primary mb-3">
                                    <div class="card-header">Saldo Total</div>
                                    <div class="card-body">
                                        <h5 class="card-title">R$ 12.458,90</h5>
                                        <p class="card-text"><small>Atualizado em 12/03/2025</small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-white bg-success mb-3">
                                    <div class="card-header">Receitas do Mês</div>
                                    <div class="card-body">
                                        <h5 class="card-title">R$ 5.230,00</h5>
                                        <p class="card-text"><small>+12% em relação ao mês anterior</small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-white bg-danger mb-3">
                                    <div class="card-header">Despesas do Mês</div>
                                    <div class="card-body">
                                        <h5 class="card-title">R$ 3.876,45</h5>
                                        <p class="card-text"><small>-5% em relação ao mês anterior</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header card-header-custom">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Suas Contas</h5>
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#quickTransferModal">
                                        <i class="fas fa-exchange-alt mr-1"></i> Transferência Rápida
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Nome</th>
                                                <th>Tipo</th>
                                                <th>Instituição</th>
                                                <th>Saldo Atual</th>
                                                <th>Última Atualização</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Conta Corrente</td>
                                                <td><span class="badge badge-info">Corrente</span></td>
                                                <td>Banco Nacional</td>
                                                <td>R$ 3.250,75</td>
                                                <td>12/03/2025</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary"><i class="fas fa-eye"></i></button>
                                                        <button class="btn btn-outline-secondary"><i class="fas fa-edit"></i></button>
                                                        <button class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Poupança</td>
                                                <td><span class="badge badge-success">Poupança</span></td>
                                                <td>Banco Nacional</td>
                                                <td>R$ 8.750,40</td>
                                                <td>10/03/2025</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary"><i class="fas fa-eye"></i></button>
                                                        <button class="btn btn-outline-secondary"><i class="fas fa-edit"></i></button>
                                                        <button class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Carteira Digital</td>
                                                <td><span class="badge badge-warning">Digital</span></td>
                                                <td>PayExpress</td>
                                                <td>R$ 457,75</td>
                                                <td>12/03/2025</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary"><i class="fas fa-eye"></i></button>
                                                        <button class="btn btn-outline-secondary"><i class="fas fa-edit"></i></button>
                                                        <button class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header card-header-custom">
                                <h5 class="mb-0">Resumo de Movimentações</h5>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <img src="/api/placeholder/800/300" alt="Gráfico de movimentações" class="img-fluid" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Cadastro Tab -->
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <div class="card">
                            <div class="card-header card-header-custom">
                                <h5 class="mb-0">Cadastrar Nova Conta</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="accountName">Nome da Conta <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="accountName" placeholder="Ex: Conta Corrente Principal" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="accountType">Tipo de Conta <span class="text-danger">*</span></label>
                                            <select class="form-control" id="accountType" required>
                                                <option value="">Selecione...</option>
                                                <option value="checking">Conta Corrente</option>
                                                <option value="savings">Conta Poupança</option>
                                                <option value="investment">Conta de Investimento</option>
                                                <option value="digital">Carteira Digital</option>
                                                <option value="credit">Cartão de Crédito</option>
                                                <option value="other">Outro</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="institution">Instituição Financeira <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="institution" placeholder="Ex: Banco Nacional" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="initialBalance">Saldo Inicial <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="position-relative w-100">
                                                    <input type="text" class="form-control currency-input" id="initialBalance" placeholder="R$ 0,00" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="accountNumber">Número da Conta</label>
                                            <input type="text" class="form-control" id="accountNumber" placeholder="Ex: 12345-6">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="agency">Agência</label>
                                            <input type="text" class="form-control" id="agency" placeholder="Ex: 0001">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Descrição</label>
                                        <textarea class="form-control" id="description" rows="3" placeholder="Detalhes adicionais sobre esta conta..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="includeInTotal" checked>
                                            <label class="custom-control-label" for="includeInTotal">Incluir no saldo total</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="notifyLowBalance">
                                            <label class="custom-control-label" for="notifyLowBalance">Notificar saldo baixo</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group text-right mb-0">
                                        <button type="reset" class="btn btn-secondary">Limpar</button>
                                        <button type="submit" class="btn btn-primary">Cadastrar Conta</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Histórico Tab -->
                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                        <div class="card">
                            <div class="card-header card-header-custom">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Histórico de Movimentações</h5>
                                    <div>
                                        <div class="input-group">
                                            <select class="custom-select" id="accountFilter">
                                                <option value="all">Todas as contas</option>
                                                <option value="1">Conta Corrente</option>
                                                <option value="2">Poupança</option>
                                                <option value="3">Carteira Digital</option>
                                            </select>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button">
                                                    <i class="fas fa-filter"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle mr-2"></i> Mostrando histórico dos últimos 30 dias.
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Descrição</th>
                                                <th>Conta</th>
                                                <th>Categoria</th>
                                                <th>Valor</th>
                                                <th>Saldo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>12/03/2025</td>
                                                <td>Depósito</td>
                                                <td>Conta Corrente</td>
                                                <td><span class="badge badge-success">Receita</span></td>
                                                <td class="text-success">+R$ 2.500,00</td>
                                                <td>R$ 3.250,75</td>
                                            </tr>
                                            <tr>
                                                <td>10/03/2025</td>
                                                <td>Transferência para Poupança</td>
                                                <td>Conta Corrente</td>
                                                <td><span class="badge badge-primary">Transferência</span></td>
                                                <td class="text-danger">-R$ 1.500,00</td>
                                                <td>R$ 750,75</td>
                                            </tr>
                                            <tr>
                                                <td>10/03/2025</td>
                                                <td>Transferência de Conta Corrente</td>
                                                <td>Poupança</td>
                                                <td><span class="badge badge-primary">Transferência</span></td>
                                                <td class="text-success">+R$ 1.500,00</td>
                                                <td>R$ 8.750,40</td>
                                            </tr>
                                            <tr>
                                                <td>08/03/2025</td>
                                                <td>Supermercado</td>
                                                <td>Conta Corrente</td>
                                                <td><span class="badge badge-danger">Alimentação</span></td>
                                                <td class="text-danger">-R$ 350,25</td>
                                                <td>R$ 2.250,75</td>
                                            </tr>
                                            <tr>
                                                <td>05/03/2025</td>
                                                <td>Pagamento de Conta de Luz</td>
                                                <td>Conta Corrente</td>
                                                <td><span class="badge badge-warning">Utilidades</span></td>
                                                <td class="text-danger">-R$ 185,92</td>
                                                <td>R$ 2.601,00</td>
                                            </tr>
                                            <tr>
                                                <td>02/03/2025</td>
                                                <td>Rendimento Mensal</td>
                                                <td>Poupança</td>
                                                <td><span class="badge badge-info">Rendimentos</span></td>
                                                <td class="text-success">+R$ 42,15</td>
                                                <td>R$ 7.250,40</td>
                                            </tr>
                                            <tr>
                                                <td>01/03/2025</td>
                                                <td>Salário</td>
                                                <td>Conta Corrente</td>
                                                <td><span class="badge badge-success">Receita</span></td>
                                                <td class="text-success">+R$ 5.230,00</td>
                                                <td>R$ 5.230,00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <nav aria-label="Paginação do histórico">
                                    <ul class="pagination justify-content-center mt-4">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                                        </li>
                                        <li class="page-item active" aria-current="page">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Próxima</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Previsão Tab -->
                    <div class="tab-pane fade" id="forecast" role="tabpanel" aria-labelledby="forecast-tab">
                        <div class="card mb-4">
                            <div class="card-header card-header-custom">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Previsão Financeira</h5>
                                    <div>
                                        <select class="custom-select" id="forecastPeriod">
                                            <option value="1">1 mês</option>
                                            <option value="3" selected>3 meses</option>
                                            <option value="6">6 meses</option>
                                            <option value="12">12 meses</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-container mb-4">
                                    <img src="/api/placeholder/800/300" alt="Gráfico de previsão" class="img-fluid" />
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card border-info mb-3">
                                            <div class="card-header bg-info text-white">Previsão de Saldo Final</div>
                                            <div class="card-body">
                                                <h5 class="card-title">R$ 15.325,70</h5>
                                                <p class="card-text">Em 12/06/2025 (3 meses)</p>
                                                <p class="card-text text-success">+23% em relação ao saldo atual</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card border-success mb-3">
                                            <div class="card-header bg-success text-white">Previsão de Receitas</div>
                                            <div class="card-body">
                                                <h5 class="card-title">R$ 15.790,00</h5>
                                                <p class="card-text">Próximos 3 meses</p>
                                                <p class="card-text text-success">+5% em relação ao último trimestre</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card border-danger mb-3">
                                            <div class="card-header bg-danger text-white">Previsão de Despesas</div>
                                            <div class="card-body">
                                                <h5 class="card-title">R$ 12.923,20</h5>
                                                <p class="card-text">Próximos 3 meses</p>
                                                <p class="card-text text-danger">+2% em relação ao último trimestre</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="table-responsive mt-4">
                                    <table class="table table-sm table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Mês</th>
                                                <th>Receitas Previstas</th>
                                                <th>Despesas Previstas</th>
                                                <th>Saldo Líquido</th>
                                                <th>Saldo Acumulado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Abril/2025</td>
                                                <td class="text-success">R$ 5.230,00</td>
                                                <td class="text-danger">R$ 4.280,15</td>
                                                <td>R$ 949,85</td>
                                                <td>R$ 13.408,75</td>
                                            </tr>
                                            <tr>
                                                <td>Maio/2025</td>
                                                <td class="text-success">R$ 5.280,00</td>
                                                <td class="text-danger">R$ 4.315,25</td>
                                                <td>R$ 964,75</td>
                                                <td>R$ 14.373,50</td>
                                            </tr>
                                            <tr>
                                                <td>Junho/2025</td>
                                                <td class="text-success">R$ 5.280,00</td>
                                                <td class="text-danger">R$ 4.327,80</td>
                                                <td>R$ 952,20</td>
                                                <td>R$ 15.325,70</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="alert alert-warning mt-4">
                                    <i class="fas fa-exclamation-triangle mr-2"></i> Esta previsão é baseada em padrões históricos e lançamentos agendados. Valores reais podem variar.
                                </div>
                            </div>
                        </div>
                    <div class="tab-pane fade" id="forecast" role="tabpanel" aria-labelledby="forecast-tab">
                        <!-- Parte anterior do conteúdo de previsão -->
                        
                        <div class="card">
                            <div class="card-header card-header-custom">
                                <h5 class="mb-0">Lançamentos Futuros</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="thead-light">
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
                                                <td>15/03/2025</td>
                                                <td>Aluguel</td>
                                                <td><span class="badge badge-danger">Moradia</span></td>
                                                <td>Conta Corrente</td>
                                                <td class="text-danger">-R$ 1.200,00</td>
                                                <td><span class="badge badge-warning">Pendente</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-secondary"><i class="fas fa-edit"></i></button>
                                                        <button class="btn btn-outline-success"><i class="fas fa-check"></i></button>
                                                        <button class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>20/03/2025</td>
                                                <td>Internet</td>
                                                <td><span class="badge badge-info">Serviços</span></td>
                                                <td>Conta Corrente</td>
                                                <td class="text-danger">-R$ 129,90</td>
                                                <td><span class="badge badge-warning">Pendente</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-secondary"><i class="fas fa-edit"></i></button>
                                                        <button class="btn btn-outline-success"><i class="fas fa-check"></i></button>
                                                        <button class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>01/04/2025</td>
                                                <td>Salário</td>
                                                <td><span class="badge badge-success">Receita</span></td>
                                                <td>Conta Corrente</td>
                                                <td class="text-success">+R$ 5.230,00</td>
                                                <td><span class="badge badge-info">Recorrente</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-secondary"><i class="fas fa-edit"></i></button>
                                                        <button class="btn btn-outline-success"><i class="fas fa-check"></i></button>
                                                        <button class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>05/04/2025</td>
                                                <td>Plano de Saúde</td>
                                                <td><span class="badge badge-danger">Saúde</span></td>
                                                <td>Conta Corrente</td>
                                                <td class="text-danger">-R$ 450,00</td>
                                                <td><span class="badge badge-info">Recorrente</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-secondary"><i class="fas fa-edit"></i></button>
                                                        <button class="btn btn-outline-success"><i class="fas fa-check"></i></button>
                                                        <button class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>10/04/2025</td>
                                                <td>Parcela Empréstimo</td>
                                                <td><span class="badge badge-secondary">Empréstimo</span></td>
                                                <td>Conta Corrente</td>
                                                <td class="text-danger">-R$ 580,45</td>
                                                <td><span class="badge badge-info">Recorrente</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-secondary"><i class="fas fa-edit"></i></button>
                                                        <button class="btn btn-outline-success"><i class="fas fa-check"></i></button>
                                                        <button class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button class="btn btn-primary mt-3">
                                    <i class="fas fa-plus mr-1"></i> Adicionar Lançamento
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <!-- Modal de Transferência Rápida -->
    <div class="modal fade" id="quickTransferModal" tabindex="-1" aria-labelledby="quickTransferModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="quickTransferModalLabel">Transferência Rápida</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="sourceAccount">Conta de Origem</label>
                            <select class="form-control" id="sourceAccount" required>
                                <option value="">Selecione...</option>
                                <option value="1">Conta Corrente (R$ 3.250,75)</option>
                                <option value="2">Poupança (R$ 8.750,40)</option>
                                <option value="3">Carteira Digital (R$ 457,75)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="destinationAccount">Conta de Destino</label>
                            <select class="form-control" id="destinationAccount" required>
                                <option value="">Selecione...</option>
                                <option value="1">Conta Corrente (R$ 3.250,75)</option>
                                <option value="2">Poupança (R$ 8.750,40)</option>
                                <option value="3">Carteira Digital (R$ 457,75)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="transferAmount">Valor</label>
                            <div class="input-group">
                                <div class="position-relative w-100">
                                    <span class="currency-symbol">R$</span>
                                    <input type="text" class="form-control currency-input" id="transferAmount" placeholder="0,00" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="transferDescription">Descrição</label>
                            <input type="text" class="form-control" id="transferDescription" placeholder="Ex: Transferência para emergências">
                        </div>
                        <div class="form-group">
                            <label for="transferDate">Data</label>
                            <input type="date" class="form-control" id="transferDate" value="2025-03-12">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Transferir</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal de Detalhes da Conta -->
    <div class="modal fade" id="accountDetailsModal" tabindex="-1" aria-labelledby="accountDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="accountDetailsModalLabel">Detalhes da Conta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="accountDetailsTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Visão Geral</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="transactions-tab" data-toggle="tab" href="#transactions" role="tab" aria-controls="transactions" aria-selected="false">Transações</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Configurações</a>
                        </li>
                    </ul>
                    <div class="tab-content p-3" id="accountDetailsTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">Conta Corrente</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">Banco Nacional</h6>
                                            <p class="card-text">
                                                <strong>Agência:</strong> 0001<br>
                                                <strong>Conta:</strong> 12345-6<br>
                                                <strong>Saldo atual:</strong> R$ 3.250,75<br>
                                                <strong>Data de cadastro:</strong> 15/01/2025
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="chart-container">
                                        <img src="/api/placeholder/400/200" alt="Gráfico de saldo" class="img-fluid" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h6>Resumo Mensal</h6>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Mês</th>
                                                    <th>Receitas</th>
                                                    <th>Despesas</th>
                                                    <th>Saldo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Janeiro</td>
                                                    <td class="text-success">R$ 5.230,00</td>
                                                    <td class="text-danger">R$ 4.120,80</td>
                                                    <td>R$ 1.109,20</td>
                                                </tr>
                                                <tr>
                                                    <td>Fevereiro</td>
                                                    <td class="text-success">R$ 5.230,00</td>
                                                    <td class="text-danger">R$ 4.350,55</td>
                                                    <td>R$ 879,45</td>
                                                </tr>
                                                <tr>
                                                    <td>Março</td>
                                                    <td class="text-success">R$ 5.230,00</td>
                                                    <td class="text-danger">R$ 3.968,15</td>
                                                    <td>R$ 1.261,85</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="transactions" role="tabpanel" aria-labelledby="transactions-tab">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Descrição</th>
                                            <th>Categoria</th>
                                            <th>Valor</th>
                                            <th>Saldo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>12/03/2025</td>
                                            <td>Depósito</td>
                                            <td><span class="badge badge-success">Receita</span></td>
                                            <td class="text-success">+R$ 2.500,00</td>
                                            <td>R$ 3.250,75</td>
                                        </tr>
                                        <tr>
                                            <td>10/03/2025</td>
                                            <td>Transferência para Poupança</td>
                                            <td><span class="badge badge-primary">Transferência</span></td>
                                            <td class="text-danger">-R$ 1.500,00</td>
                                            <td>R$ 750,75</td>
                                        </tr>
                                        <tr>
                                            <td>08/03/2025</td>
                                            <td>Supermercado</td>
                                            <td><span class="badge badge-danger">Alimentação</span></td>
                                            <td class="text-danger">-R$ 350,25</td>
                                            <td>R$ 2.250,75</td>
                                        </tr>
                                        <tr>
                                            <td>05/03/2025</td>
                                            <td>Pagamento de Conta de Luz</td>
                                            <td><span class="badge badge-warning">Utilidades</span></td>
                                            <td class="text-danger">-R$ 185,92</td>
                                            <td>R$ 2.601,00</td>
                                        </tr>
                                        <tr>
                                            <td>01/03/2025</td>
                                            <td>Salário</td>
                                            <td><span class="badge badge-success">Receita</span></td>
                                            <td class="text-success">+R$ 5.230,00</td>
                                            <td>R$ 5.230,00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="accountNameEdit">Nome da Conta</label>
                                        <input type="text" class="form-control" id="accountNameEdit" value="Conta Corrente">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="institutionEdit">Instituição</label>
                                        <input type="text" class="form-control" id="institutionEdit" value="Banco Nacional">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="accountNumberEdit">Número da Conta</label>
                                        <input type="text" class="form-control" id="accountNumberEdit" value="12345-6">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="agencyEdit">Agência</label>
                                        <input type="text" class="form-control" id="agencyEdit" value="0001">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="includeInTotalEdit" checked>
                                        <label class="custom-control-label" for="includeInTotalEdit">Incluir no saldo total</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="notifyLowBalanceEdit">
                                        <label class="custom-control-label" for="notifyLowBalanceEdit">Notificar saldo baixo</label>
                                    </div>
                                </div>
                                <div class="form-group" id="lowBalanceLimitGroup" style="display: none;">
                                    <label for="lowBalanceLimit">Limite de saldo baixo</label>
                                    <div class="input-group">
                                        <div class="position-relative w-100">
                                            <span class="currency-symbol">R$</span>
                                            <input type="text" class="form-control currency-input" id="lowBalanceLimit" placeholder="0,00">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="accountColor">Cor da Conta</label>
                                    <input type="color" class="form-control" id="accountColor" value="#007bff" style="height: 50px;">
                                </div>
                                <div class="form-group">
                                    <label for="descriptionEdit">Descrição</label>
                                    <textarea class="form-control" id="descriptionEdit" rows="3">Conta corrente principal para despesas diárias.</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="accountActive" checked>
                                        <label class="custom-control-label" for="accountActive">Conta ativa</label>
                                    </div>
                                </div>
                                <hr>
                                <button type="button" class="btn btn-danger float-left">Excluir Conta</button>
                                <button type="submit" class="btn btn-primary float-right">Salvar Alterações</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Loader Overlay -->
    <div class="spinner-overlay" style="display: none;">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Carregando...</span>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
    
    <script>
        // Toggle do switch para mostrar/ocultar limite de saldo baixo
        $(document).ready(function() {
            // Mostrar detalhes da conta ao clicar no botão de visualização
            $('.btn-outline-primary').click(function() {
                $('#accountDetailsModal').modal('show');
            });
            
            // Toggle do campo de limite de saldo baixo
            $('#notifyLowBalanceEdit').change(function() {
                if($(this).is(':checked')) {
                    $('#lowBalanceLimitGroup').slideDown();
                } else {
                    $('#lowBalanceLimitGroup').slideUp();
                }
            });
            
            // Simulação de carregamento ao mudar de aba
            $('#accountTabs .nav-link').click(function() {
                $('.spinner-overlay').fadeIn();
                setTimeout(function() {
                    $('.spinner-overlay').fadeOut();
                }, 500);
            });
            
            // Validação simples para o campo de transferência
            $('#quickTransferModal button.btn-primary').click(function() {
                var sourceAccount = $('#sourceAccount').val();
                var destinationAccount = $('#destinationAccount').val();
                var amount = $('#transferAmount').val();
                
                if(sourceAccount == '' || destinationAccount == '' || amount == '') {
                    alert('Por favor, preencha todos os campos obrigatórios.');
                    return;
                }
                
                if(sourceAccount == destinationAccount) {
                    alert('As contas de origem e destino não podem ser iguais.');
                    return;
                }
                
                // Simular uma transferência bem-sucedida
                $('.spinner-overlay').fadeIn();
                setTimeout(function() {
                    $('.spinner-overlay').fadeOut();
                    $('#quickTransferModal').modal('hide');
                    alert('Transferência realizada com sucesso!');
                    // Limpar o formulário
                    $('#quickTransferModal form')[0].reset();
                }, 1500);
            });
        });
    </script>
</body>
</html>