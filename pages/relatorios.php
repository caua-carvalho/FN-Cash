<?php
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
                        <h1 class="h3">Relatórios</h1>
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-secondary">
                                <i class="fas fa-calendar-alt mr-1"></i> Março 2025
                            </button>
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Fevereiro 2025</a>
                                <a class="dropdown-item" href="#">Janeiro 2025</a>
                                <a class="dropdown-item" href="#">Dezembro 2024</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Personalizado...</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Report Types Tabs -->
                    <div class="card shadow-sm mb-4 fade-in-up">
                        <div class="card-body">
                            <ul class="nav nav-tabs custom-tabs" id="reportsTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab">Visão Geral</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="income-expense-tab" data-toggle="tab" href="#income-expense" role="tab">Receitas x Despesas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="categories-tab" data-toggle="tab" href="#categories" role="tab">Categorias</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="trends-tab" data-toggle="tab" href="#trends" role="tab">Tendências</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="budget-tab" data-toggle="tab" href="#budget" role="tab">Orçamento</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tax-tab" data-toggle="tab" href="#tax" role="tab">Impostos</a>
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
                            
                            <div class="tab-content mt-4" id="reportsTabsContent">
                                <!-- Overview Tab -->
                                <div class="tab-pane fade show active" id="overview" role="tabpanel">
                                    <div class="row mb-4">
                                        <!-- Financial Summary Cards -->
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <div class="card shadow-sm">
                                                <div class="card-body">
                                                    <h5 class="text-success mb-1">Receitas</h5>
                                                    <h3 class="mb-2">R$ 8.549,32</h3>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-arrow-up text-success mr-2"></i>
                                                        <span>12% vs mês anterior</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <div class="card shadow-sm">
                                                <div class="card-body">
                                                    <h5 class="text-danger mb-1">Despesas</h5>
                                                    <h3 class="mb-2">R$ 5.238,17</h3>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-arrow-down text-success mr-2"></i>
                                                        <span>5% vs mês anterior</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card shadow-sm">
                                                <div class="card-body">
                                                    <h5 class="text-info mb-1">Saldo</h5>
                                                    <h3 class="mb-2">R$ 3.311,15</h3>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-arrow-up text-success mr-2"></i>
                                                        <span>18% vs mês anterior</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-4">
                                        <!-- Income vs Expense Chart -->
                                        <div class="col-md-8 mb-4 mb-md-0">
                                            <div class="card shadow-sm h-100">
                                                <div class="card-header d-flex justify-content-between align-items-center bg-white">
                                                    <h5 class="card-title mb-0">Receitas vs Despesas</h5>
                                                    <div class="btn-group btn-group-sm">
                                                        <button type="button" class="btn btn-outline-secondary active">Mensal</button>
                                                        <button type="button" class="btn btn-outline-secondary">Anual</button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="chart-container" style="height: 300px;">
                                                        <!-- Chart will be rendered here -->
                                                        <div class="d-flex justify-content-center align-items-center h-100">
                                                            <p class="text-muted">Gráfico de barras comparativo será renderizado aqui</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Income Categories Pie Chart -->
                                        <div class="col-md-4">
                                            <div class="card shadow-sm h-100">
                                                <div class="card-header d-flex justify-content-between align-items-center bg-white">
                                                    <h5 class="card-title mb-0">Receitas por Categoria</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="chart-container" style="height: 300px;">
                                                        <!-- Chart will be rendered here -->
                                                        <div class="d-flex justify-content-center align-items-center h-100">
                                                            <p class="text-muted">Gráfico de pizza será renderizado aqui</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-4">
                                        <!-- Expense Categories Pie Chart -->
                                        <div class="col-md-4 mb-4 mb-md-0">
                                            <div class="card shadow-sm h-100">
                                                <div class="card-header d-flex justify-content-between align-items-center bg-white">
                                                    <h5 class="card-title mb-0">Despesas por Categoria</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="chart-container" style="height: 300px;">
                                                        <!-- Chart will be rendered here -->
                                                        <div class="d-flex justify-content-center align-items-center h-100">
                                                            <p class="text-muted">Gráfico de pizza será renderizado aqui</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Cash Flow Line Chart -->
                                        <div class="col-md-8">
                                            <div class="card shadow-sm h-100">
                                                <div class="card-header d-flex justify-content-between align-items-center bg-white">
                                                    <h5 class="card-title mb-0">Fluxo de Caixa</h5>
                                                    <div class="btn-group btn-group-sm">
                                                        <button type="button" class="btn btn-outline-secondary active">6 meses</button>
                                                        <button type="button" class="btn btn-outline-secondary">12 meses</button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="chart-container" style="height: 300px;">
                                                        <!-- Chart will be rendered here -->
                                                        <div class="d-flex justify-content-center align-items-center h-100">
                                                            <p class="text-muted">Gráfico de linha será renderizado aqui</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <!-- Top Spending Categories Table -->
                                        <div class="col-md-6 mb-4 mb-md-0">
                                            <div class="card shadow-sm h-100">
                                                <div class="card-header bg-white">
                                                    <h5 class="card-title mb-0">Maiores Gastos por Categoria</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Categoria</th>
                                                                    <th>Valor</th>
                                                                    <th>% do Total</th>
                                                                    <th>Vs. Mês Anterior</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Moradia</td>
                                                                    <td>R$ 1.750,00</td>
                                                                    <td>33.4%</td>
                                                                    <td>
                                                                        <span class="text-success">
                                                                            <i class="fas fa-arrow-down mr-1"></i> 0%
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Alimentação</td>
                                                                    <td>R$ 850,25</td>
                                                                    <td>16.2%</td>
                                                                    <td>
                                                                        <span class="text-danger">
                                                                            <i class="fas fa-arrow-up mr-1"></i> 12%
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Transporte</td>
                                                                    <td>R$ 430,15</td>
                                                                    <td>8.2%</td>
                                                                    <td>
                                                                        <span class="text-danger">
                                                                            <i class="fas fa-arrow-up mr-1"></i> 5%
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lazer</td>
                                                                    <td>R$ 387,50</td>
                                                                    <td>7.4%</td>
                                                                    <td>
                                                                        <span class="text-success">
                                                                            <i class="fas fa-arrow-down mr-1"></i> 15%
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Saúde</td>
                                                                    <td>R$ 320,00</td>
                                                                    <td>6.1%</td>
                                                                    <td>
                                                                        <span class="text-danger">
                                                                            <i class="fas fa-arrow-up mr-1"></i> 25%
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Top Spending Merchants Table -->
                                        <div class="col-md-6">
                                            <div class="card shadow-sm h-100">
                                                <div class="card-header bg-white">
                                                    <h5 class="card-title mb-0">Maiores Gastos por Estabelecimento</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Estabelecimento</th>
                                                                    <th>Categoria</th>
                                                                    <th>Valor</th>
                                                                    <th>% do Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Imobiliária Central</td>
                                                                    <td>Moradia</td>
                                                                    <td>R$ 1.500,00</td>
                                                                    <td>28.6%</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Supermercado Extra</td>
                                                                    <td>Alimentação</td>
                                                                    <td>R$ 452,35</td>
                                                                    <td>8.6%</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ENEL</td>
                                                                    <td>Moradia</td>
                                                                    <td>R$ 187,32</td>
                                                                    <td>3.6%</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Academia Smart Fit</td>
                                                                    <td>Saúde</td>
                                                                    <td>R$ 99,90</td>
                                                                    <td>1.9%</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>SABESP</td>
                                                                    <td>Moradia</td>
                                                                    <td>R$ 95,47</td>
                                                                    <td>1.8%</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Income vs Expense Tab -->
                                <div class="tab-pane fade" id="income-expense" role="tabpanel">
                                    <div class="text-center py-5">
                                        <h5 class="text-muted mb-3">Análise detalhada de Receitas e Despesas</h5>
                                        <p class="text-muted">Este relatório mostrará análises detalhadas comparando receitas e despesas ao longo do tempo.</p>
                                    </div>
                                </div>
                                
                                <!-- Categories Tab -->
                                <div class="tab-pane fade" id="categories" role="tabpanel">
                                    <div class="text-center py-5">
                                        <h5 class="text-muted mb-3">Análise por Categorias</h5>
                                        <p class="text-muted">Este relatório mostrará análises detalhadas de gastos e receitas por categoria.</p>
                                    </div>
                                </div>
                                
                                <!-- Trends Tab -->
                                <div class="tab-pane fade" id="trends" role="tabpanel">
                                    <div class="text-center py-5">
                                        <h5 class="text-muted mb-3">Tendências Financeiras</h5>
                                        <p class="text-muted">Este relatório mostrará tendências de crescimento ou redução de receitas e despesas ao longo do tempo.</p>
                                    </div>
                                </div>
                                
                                <!-- Budget Tab -->
                                <div class="tab-pane fade" id="budget" role="tabpanel">
                                    <div class="text-center py-5">
                                        <h5 class="text-muted mb-3">Análise de Orçamento</h5>
                                        <p class="text-muted">Este relatório mostrará comparações entre orçamentos planejados e gastos reais.</p>
                                    </div>
                                </div>
                                
                                <!-- Tax Tab -->
                                <div class="tab-pane fade" id="tax" role="tabpanel">
                                    <div class="text-center py-5">
                                        <h5 class="text-muted mb-3">Relatório para Impostos</h5>
                                        <p class="text-muted">Este relatório mostrará informações relevantes para declaração de impostos.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Saved Reports -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4>Relatórios Salvos</h4>
                                <button class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-plus mr-1"></i> Novo Relatório
                                </button>
                            </div>
                            
                            <div class="card shadow-sm fade-in-up">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Tipo</th>
                                                    <th>Período</th>
                                                    <th>Última Geração</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Relatório Mensal</td>
                                                    <td>Visão Geral</td>
                                                    <td>Fevereiro 2025</td>
                                                    <td>01/03/2025</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Visualizar">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Exportar">
                                                                <i class="fas fa-download"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Editar">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" title="Excluir">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Análise de Categorias</td>
                                                    <td>Categorias</td>
                                                    <td>Q1 2025</td>
                                                    <td>02/03/2025</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Visualizar">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Exportar">
                                                                <i class="fas fa-download"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Editar">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" title="Excluir">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Declaração de IR</td>
                                                    <td>Impostos</td>
                                                    <td>Ano 2024</td>
                                                    <td>01/02/2025</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Visualizar">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Exportar">
                                                                <i class="fas fa-download"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Editar">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" title="Excluir">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Comparativo Anual</td>
                                                    <td>Tendências</td>
                                                    <td>2024 vs 2025</td>
                                                    <td>05/03/2025</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Visualizar">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Exportar">
                                                                <i class="fas fa-download"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" title="Editar">
                                                                <i class="fas fa-edit"></i>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Export Options -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card shadow-sm fade-in-up">
                                <div class="card-header bg-white">
                                    <h5 class="card-title mb-0">Exportar Relatórios</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 mb-3 mb-md-0">
                                            <div class="card text-center py-3">
                                                <div class="card-body">
                                                    <i class="far fa-file-pdf fa-3x text-danger mb-3"></i>
                                                    <h5>PDF</h5>
                                                    <p class="text-muted small mb-3">Exporte seus relatórios em formato PDF.</p>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-download mr-1"></i> Exportar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3 mb-md-0">
                                            <div class="card text-center py-3">
                                                <div class="card-body">
                                                    <i class="far fa-file-excel fa-3x text-success mb-3"></i>
                                                    <h5>Excel</h5>
                                                    <p class="text-muted small mb-3">Exporte seus relatórios em formato Excel.</p>
                                                    <button class="btn btn-sm btn-outline-success">
                                                        <i class="fas fa-download mr-1"></i> Exportar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3 mb-md-0">
                                            <div class="card text-center py-3">
                                                <div class="card-body">
                                                    <i class="far fa-file-csv fa-3x text-primary mb-3"></i>
                                                    <h5>CSV</h5>
                                                    <p class="text-muted small mb-3">Exporte seus relatórios em formato CSV.</p>
                                                    <button class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-download mr-1"></i> Exportar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card text-center py-3">
                                                <div class="card-body">
                                                    <i class="fas fa-print fa-3x text-secondary mb-3"></i>
                                                    <h5>Imprimir</h5>
                                                    <p class="text-muted small mb-3">Imprima seus relatórios diretamente.</p>
                                                    <button class="btn btn-sm btn-outline-secondary">
                                                        <i class="fas fa-print mr-1"></i> Imprimir
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

    <!-- Modal para Novo Relatório -->
    <div class="modal fade" id="newReportModal" tabindex="-1" role="dialog" aria-labelledby="newReportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient text-white">
                    <h5 class="modal-title" id="newReportModalLabel">Novo Relatório</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Conteúdo do formulário para criar novo relatório -->
                    <p class="text-center text-muted py-5">Formulário para criar um novo relatório personalizado.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-accent">Criar Relatório</button>
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