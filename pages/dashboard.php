<?php
require_once "../conexao.php";
require_once "../validacao_login.php";
require_once "header.php";
require_once "../funcoes.php"
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
                        <h1 class="h3">Dashboard</h1>
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
                    
                    <!-- Financial Summary Cards -->
                    <div class="row mb-4">
                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                            <div class="card shadow-sm fade-in-up">
                                <div class="finance-card income">
                                    <i class="fas fa-arrow-circle-up icon"></i>
                                    <h3>Receitas</h3>
                                    <p class="value">
                                        <?php exibir_conta("receita"); ?>
                                    </p>
                                    <div class="trend up">
                                        <i class="fas fa-arrow-up"></i> 
                                        <span>12% em relação ao mês anterior</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                            <div class="card shadow-sm fade-in-up delay-200">
                                <div class="finance-card expense">
                                    <i class="fas fa-arrow-circle-down icon"></i>
                                    <h3>Despesas</h3>
                                    <p class="value">
                                        <?php exibir_conta("despesa"); ?>
                                    </p>
                                    <div class="trend down">
                                        <i class="fas fa-arrow-down"></i> 
                                        <span>5% em relação ao mês anterior</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                            <div class="card shadow-sm fade-in-up delay-300">
                                <div class="finance-card balance">
                                    <i class="fas fa-wallet icon"></i>
                                    <h3>Saldo</h3>
                                    <p class="value">
                                        <?php exibir_saldo(); ?>
                                    </p>
                                    <div class="trend up">
                                        <i class="fas fa-arrow-up"></i> 
                                        <span>18% em relação ao mês anterior</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card shadow-sm fade-in-up delay-400">
                                <div class="finance-card savings">
                                    <i class="fas fa-piggy-bank icon"></i>
                                    <h3>Economia</h3>
                                    <p class="value">38.7%</p>
                                    <div class="trend up">
                                        <i class="fas fa-arrow-up"></i> 
                                        <span>7% em relação ao mês anterior</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Chart and Transaction List -->
                    <div class="row">
                        <!-- Chart Section -->
                        <div class="col-lg-8 mb-4">
                            <div class="card shadow-sm h-100 fade-in-left">
                                <div class="card-header d-flex justify-content-between align-items-center bg-white">
                                    <h5 class="card-title mb-0">Fluxo de Caixa</h5>
                                    <div class="btn-group btn-group-sm">
                                        <button type="button" class="btn btn-outline-secondary active">Semana</button>
                                        <button type="button" class="btn btn-outline-secondary">Mês</button>
                                        <button type="button" class="btn btn-outline-secondary">Ano</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="transaction-chart">
                                        <!-- Chart will be rendered here using JS library -->
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <p class="text-muted">Gráfico de fluxo de caixa será renderizado aqui</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Recent Transactions -->
                        <div class="col-lg-4 mb-4">
                            <div class="card shadow-sm h-100 fade-in-right">
                                <div class="card-header d-flex justify-content-between align-items-center bg-white">
                                    <h5 class="card-title mb-0">Transações Recentes</h5>
                                    <a href="transacoes.php" class="btn btn-sm btn-outline-secondary">Ver todas</a>
                                </div>
                                <div class="card-body p-0">
                                    <ul class="transaction-list">
                                        <li class="transaction-item p-3">
                                            <div class="transaction-info">
                                                <div class="transaction-icon expense">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </div>
                                                <div class="transaction-details">
                                                    <h5>Supermercado</h5>
                                                    <p>Hoje, 09:32</p>
                                                </div>
                                            </div>
                                            <div class="transaction-amount expense">- R$ 152,35</div>
                                        </li>
                                        <li class="transaction-item p-3">
                                            <div class="transaction-info">
                                                <div class="transaction-icon expense">
                                                    <i class="fas fa-utensils"></i>
                                                </div>
                                                <div class="transaction-details">
                                                    <h5>Restaurante</h5>
                                                    <p>Ontem, 13:15</p>
                                                </div>
                                            </div>
                                            <div class="transaction-amount expense">- R$ 75,90</div>
                                        </li>
                                        <li class="transaction-item p-3">
                                            <div class="transaction-info">
                                                <div class="transaction-icon income">
                                                    <i class="fas fa-credit-card"></i>
                                                </div>
                                                <div class="transaction-details">
                                                    <h5>Salário</h5>
                                                    <p>12/03/2025</p>
                                                </div>
                                            </div>
                                            <div class="transaction-amount income">+ R$ 4.500,00</div>
                                        </li>
                                        <li class="transaction-item p-3">
                                            <div class="transaction-info">
                                                <div class="transaction-icon expense">
                                                    <i class="fas fa-bolt"></i>
                                                </div>
                                                <div class="transaction-details">
                                                    <h5>Conta de Luz</h5>
                                                    <p>10/03/2025</p>
                                                </div>
                                            </div>
                                            <div class="transaction-amount expense">- R$ 187,32</div>
                                        </li>
                                        <li class="transaction-item p-3">
                                            <div class="transaction-info">
                                                <div class="transaction-icon expense">
                                                    <i class="fas fa-tint"></i>
                                                </div>
                                                <div class="transaction-details">
                                                    <h5>Conta de Água</h5>
                                                    <p>08/03/2025</p>
                                                </div>
                                            </div>
                                            <div class="transaction-amount expense">- R$ 95,47</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- Budget Progress -->
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow-sm fade-in-up">
                                <div class="card-header d-flex justify-content-between align-items-center bg-white">
                                    <h5 class="card-title mb-0">Progresso do Orçamento</h5>
                                    <a href="budgets.html" class="btn btn-sm btn-outline-secondary">Gerenciar</a>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span>Alimentação</span>
                                            <span>R$ 850,25 / R$ 1.200,00</span>
                                        </div>
                                        <div class="progress progress-animate" style="height: 10px;">
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span>Transporte</span>
                                            <span>R$ 430,15 / R$ 500,00</span>
                                        </div>
                                        <div class="progress progress-animate" style="height: 10px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 86%;" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span>Entretenimento</span>
                                            <span>R$ 320,00 / R$ 300,00</span>
                                        </div>
                                        <div class="progress progress-animate" style="height: 10px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 105%;" aria-valuenow="105" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span>Moradia</span>
                                            <span>R$ 1.500,00 / R$ 1.500,00</span>
                                        </div>
                                        <div class="progress progress-animate" style="height: 10px;">
                                            <div class="progress-bar bg-accent" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span>Educação</span>
                                            <span>R$ 350,00 / R$ 600,00</span>
                                        </div>
                                        <div class="progress progress-animate" style="height: 10px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 58%;" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Savings Goals -->
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow-sm fade-in-up delay-200">
                                <div class="card-header d-flex justify-content-between align-items-center bg-white">
                                    <h5 class="card-title mb-0">Metas de Economia</h5>
                                    <a href="goals.html" class="btn btn-sm btn-outline-secondary">Gerenciar</a>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="card border-0 shadow-sm">
                                                <div class="card-body text-center">
                                                    <div class="d-inline-block position-relative mb-3">
                                                        <div style="width: 100px; height: 100px; border-radius: 50%; border: 8px solid #e9ecef; border-top-color: var(--accent); transform: rotate(225deg);" class="mx-auto"></div>
                                                        <span class="position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 20px; font-weight: 700;">75%</span>
                                                    </div>
                                                    <h6>Férias</h6>
                                                    <p class="text-muted mb-0">R$ 7.500 / R$ 10.000</p>
                                                    <small class="text-muted">Meta: Dezembro 2025</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="card border-0 shadow-sm">
                                                <div class="card-body text-center">
                                                    <div class="d-inline-block position-relative mb-3">
                                                        <div style="width: 100px; height: 100px; border-radius: 50%; border: 8px solid #e9ecef; border-top-color: var(--secondary); transform: rotate(90deg);" class="mx-auto"></div>
                                                        <span class="position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 20px; font-weight: 700;">25%</span>
                                                    </div>
                                                    <h6>Novo Carro</h6>
                                                    <p class="text-muted mb-0">R$ 15.000 / R$ 60.000</p>
                                                    <small class="text-muted">Meta: Agosto 2026</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4 mb-md-0">
                                            <div class="card border-0 shadow-sm">
                                                <div class="card-body text-center">
                                                    <div class="d-inline-block position-relative mb-3">
                                                        <div style="width: 100px; height: 100px; border-radius: 50%; border: 8px solid #e9ecef; border-top-color: var(--success); transform: rotate(324deg);" class="mx-auto"></div>
                                                        <span class="position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 20px; font-weight: 700;">90%</span>
                                                    </div>
                                                    <h6>Emergência</h6>
                                                    <p class="text-muted mb-0">R$ 9.000 / R$ 10.000</p>
                                                    <small class="text-muted">Meta: Contínua</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card border-0 shadow-sm">
                                                <div class="card-body text-center">
                                                    <div class="d-inline-block position-relative mb-3">
                                                        <div style="width: 100px; height: 100px; border-radius: 50%; border: 8px solid #e9ecef; border-top-color: var(--info); transform: rotate(180deg);" class="mx-auto"></div>
                                                        <span class="position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 20px; font-weight: 700;">50%</span>
                                                    </div>
                                                    <h6>Curso de MBA</h6>
                                                    <p class="text-muted mb-0">R$ 12.500 / R$ 25.000</p>
                                                    <small class="text-muted">Meta: Março 2026</small>
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

    <!-- Bootstrap & jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Script for toggling sidebar on mobile devices
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.querySelector('.navbar-toggler');
            sidebarToggle.addEventListener('click', function() {
                document.querySelector('.sidebar').classList.toggle('show');
            });
        });
    </script>
</body>
</html>