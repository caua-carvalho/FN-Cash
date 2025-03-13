<?php
require "../conexao.php";
require "../header.php";
require "../validacao_login.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Financeiro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        :root {
            --dark-green-primary: #043821;
            --dark-green-secondary: #055336;
            --medium-green: #07A262;
            --light-green: #4E997E;
            --background-light: #FAFAFA;
            
            /* Tema escuro */
            --bg-dark: #121212;
            --bg-dark-secondary: #1E1E1E;
            --bg-dark-tertiary: #2D2D2D;
            --text-primary: #E0E0E0;
            --text-secondary: #A0A0A0;
            --border-color: #333333;
            --card-bg: #1E1E1E;
            --hover-bg: #2A2A2A;
        }
        
        body {
            background-color: var(--bg-dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-primary);
        }
        
        .sidebar {
            background-color: var(--dark-green-primary) !important;
            min-height: 100vh;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }
        
        .nav-link {
            color: var(--text-primary) !important;
            margin-bottom: 5px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            background-color: var(--medium-green) !important;
        }
        
        .nav-link.active {
            background-color: var(--medium-green) !important;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.4);
        }
        
        .card-dashboard {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            background-color: var(--card-bg);
        }
        
        .card-dashboard:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }
        
        .chart-container {
            height: 300px;
            position: relative;
        }
        
        .btn-primary {
            background-color: var(--medium-green);
            border-color: var(--medium-green);
        }
        
        .btn-primary:hover, .btn-primary:focus {
            background-color: var(--dark-green-secondary);
            border-color: var(--dark-green-secondary);
        }
        
        .btn-outline-primary {
            color: var(--medium-green);
            border-color: var(--medium-green);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--medium-green);
            border-color: var(--medium-green);
            color: var(--text-primary);
        }
        
        .btn-outline-secondary {
            color: var(--text-secondary);
            border-color: var(--border-color);
        }
        
        .btn-outline-secondary:hover {
            background-color: var(--hover-bg);
            border-color: var(--border-color);
            color: var(--text-primary);
        }
        
        .text-primary {
            color: var(--medium-green) !important;
        }
        
        .bg-primary, .badge-primary {
            background-color: var(--medium-green) !important;
        }
        
        .dropdown-menu {
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            background-color: var(--bg-dark-secondary);
            border-color: var(--border-color);
        }
        
        .dropdown-item {
            color: var(--text-primary);
        }
        
        .dropdown-item:hover {
            background-color: var(--hover-bg);
            color: var(--text-primary);
        }
        
        .dropdown-divider {
            border-top-color: var(--border-color);
        }
        
        .progress {
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
            background-color: var(--bg-dark-tertiary);
        }
        
        .card {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            border: none;
            background-color: var(--card-bg);
        }
        
        .card-header {
            background-color: var(--card-bg);
            border-bottom: 1px solid var(--border-color);
        }
        
        .table {
            vertical-align: middle;
            color: var(--text-primary);
        }
        
        .table-light {
            background-color: var(--bg-dark-secondary) !important;
            color: var(--text-primary) !important;
        }
        
        .table tbody tr {
            border-color: var(--border-color);
        }
        
        .table tbody tr:hover {
            background-color: var(--hover-bg);
        }
        
        .table-hover tbody tr:hover {
            background-color: var(--hover-bg);
        }
        
        .icon-container {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            margin-right: 15px;
        }
        
        .bg-success-soft {
            background-color: rgba(7, 162, 98, 0.2);
        }
        
        .bg-danger-soft {
            background-color: rgba(220, 53, 69, 0.2);
        }
        
        .bg-info-soft {
            background-color: rgba(78, 153, 126, 0.2);
        }
        
        .text-success {
            color: var(--medium-green) !important;
        }
        
        .badge.bg-success {
            background-color: var(--medium-green) !important;
        }
        
        .badge.bg-light {
            background-color: var(--bg-dark-tertiary) !important;
            color: var(--text-primary) !important;
            border: 1px solid var(--border-color);
        }
        
        .pagination .page-item.active .page-link {
            background-color: var(--medium-green);
            border-color: var(--medium-green);
            color: var(--text-primary);
        }
        
        .pagination .page-link {
            color: var(--text-primary);
            background-color: var(--bg-dark-secondary);
            border-color: var(--border-color);
        }
        
        .pagination .page-link:hover {
            background-color: var(--hover-bg);
            border-color: var(--border-color);
        }
        
        .pagination .page-item.disabled .page-link {
            color: var(--text-secondary);
            background-color: var(--bg-dark-secondary);
            border-color: var(--border-color);
        }
        
        .form-control {
            background-color: var(--bg-dark-tertiary);
            border-color: var(--border-color);
            color: var(--text-primary);
        }
        
        .form-control:focus {
            background-color: var(--bg-dark-tertiary);
            border-color: var(--medium-green);
            color: var(--text-primary);
            box-shadow: 0 0 0 0.25rem rgba(7, 162, 98, 0.25);
        }
        
        .input-group-text {
            background-color: var(--bg-dark-tertiary);
            border-color: var(--border-color);
            color: var(--text-primary);
        }
        
        .bg-light {
            background-color: var(--bg-dark-tertiary) !important;
        }
        
        .text-dark {
            color: var(--text-primary) !important;
        }
        
        .dropdown-menu-dark {
            background-color: var(--bg-dark-tertiary);
        }
        
        @media (max-width: 992px) {
            .sidebar {
                min-height: auto;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 text-white p-0 sidebar">
                <div class="d-flex flex-column p-3">
                    <a href="#" class="d-flex align-items-center mb-4 me-md-auto text-white text-decoration-none">
                        <i class="bi bi-graph-up me-2 fs-4"></i>
                        <span class="fs-4 fw-bold">FinançasPRO</span>
                    </a>
                    <hr class="text-white-50">
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item mb-1">
                            <a href="#" class="nav-link active d-flex align-items-center" aria-current="page">
                                <i class="bi bi-house-door me-3"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item mb-1">
                            <a href="#" class="nav-link d-flex align-items-center">
                                <i class="bi bi-arrow-left-right me-3"></i>
                                <span>Transações</span>
                            </a>
                        </li>
                        <li class="nav-item mb-1">
                            <a href="#" class="nav-link d-flex align-items-center">
                                <i class="bi bi-wallet2 me-3"></i>
                                <span>Contas</span>
                            </a>
                        </li>
                        <li class="nav-item mb-1">
                            <a href="#" class="nav-link d-flex align-items-center">
                                <i class="bi bi-pie-chart me-3"></i>
                                <span>Relatórios</span>
                            </a>
                        </li>
                        <li class="nav-item mb-1">
                            <a href="#" class="nav-link d-flex align-items-center">
                                <i class="bi bi-calendar3 me-3"></i>
                                <span>Planejamento</span>
                            </a>
                        </li>
                        <li class="nav-item mb-1">
                            <a href="#" class="nav-link d-flex align-items-center">
                                <i class="bi bi-gear me-3"></i>
                                <span>Configurações</span>
                            </a>
                        </li>
                    </ul>
                    <hr class="text-white-50">
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="rounded-circle bg-white text-dark d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                <i class="bi bi-person"></i>
                            </div>
                            <strong><?php echo $_SESSION['nome']; ?></strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle me-2"></i>Perfil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear-fill me-2"></i>Configurações</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2"></i>Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-10 p-4">
                <!-- Header -->
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom border-secondary">
                    <h1 class="h2 fw-bold" style="color: var(--medium-green);">Dashboard Financeiro</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="input-group me-2">
                            <input type="text" class="form-control border-0" placeholder="Buscar..." style="border-radius: 20px 0 0 20px;">
                            <button class="btn btn-primary" type="button" style="border-radius: 0 20px 20px 0;"><i class="bi bi-search"></i></button>
                        </div>
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-outline-secondary"><i class="bi bi-share me-1"></i> Compartilhar</button>
                            <button type="button" class="btn btn-outline-secondary"><i class="bi bi-download me-1"></i> Exportar</button>
                        </div>
                        <button type="button" class="btn btn-primary">
                            <i class="bi bi-plus me-1"></i> Nova Transação
                        </button>
                    </div>
                </div>

                <!-- Cards -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-4">
                        <div class="card card-dashboard h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-container bg-success-soft">
                                        <i class="bi bi-wallet2 text-success fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="text-secondary mb-0">Saldo Total</h6>
                                        <h3 class="mb-0 fw-bold">R$ 12.580,45</h3>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-success rounded-pill"><i class="bi bi-arrow-up me-1"></i>2.5%</span>
                                    <span class="text-secondary ms-2">Desde o mês passado</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card card-dashboard h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-container bg-success-soft">
                                        <i class="bi bi-arrow-up-circle text-success fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="text-secondary mb-0">Receitas</h6>
                                        <h3 class="mb-0 fw-bold">R$ 8.450,20</h3>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-success rounded-pill"><i class="bi bi-arrow-up me-1"></i>3.7%</span>
                                    <span class="text-secondary ms-2">Desde o mês passado</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card card-dashboard h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-container bg-danger-soft">
                                        <i class="bi bi-arrow-down-circle text-danger fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="text-secondary mb-0">Despesas</h6>
                                        <h3 class="mb-0 fw-bold">R$ 4.320,75</h3>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-danger rounded-pill"><i class="bi bi-arrow-up me-1"></i>1.2%</span>
                                    <span class="text-secondary ms-2">Desde o mês passado</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card card-dashboard h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-container bg-info-soft">
                                        <i class="bi bi-piggy-bank text-success fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="text-secondary mb-0">Economia</h6>
                                        <h3 class="mb-0 fw-bold">R$ 3.850,00</h3>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-success rounded-pill"><i class="bi bi-arrow-up me-1"></i>5.3%</span>
                                    <span class="text-secondary ms-2">Desde o mês passado</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="row mb-4">
                    <div class="col-md-8 mb-4">
                        <div class="card border-0 shadow">
                            <div class="card-header border-0 d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0 fw-bold" style="color: var(--medium-green);">Fluxo Financeiro</h5>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-calendar3 me-1"></i> Últimos 6 meses
                                    </button>
                                    <ul class="dropdown-menu shadow border-0" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">Último mês</a></li>
                                        <li><a class="dropdown-item" href="#">Últimos 3 meses</a></li>
                                        <li><a class="dropdown-item" href="#">Este ano</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <img src="/api/placeholder/800/300" alt="Gráfico de Fluxo Financeiro" class="img-fluid" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow">
                            <div class="card-header border-0 d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0 fw-bold" style="color: var(--medium-green);">Distribuição de Despesas</h5>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-calendar3 me-1"></i> Este mês
                                    </button>
                                    <ul class="dropdown-menu shadow border-0" aria-labelledby="dropdownMenuButton2">
                                        <li><a class="dropdown-item" href="#">Último mês</a></li>
                                        <li><a class="dropdown-item" href="#">Últimos 3 meses</a></li>
                                        <li><a class="dropdown-item" href="#">Este ano</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <img src="/api/placeholder/400/300" alt="Gráfico de Pizza" class="img-fluid" />
                                </div>
                                <div class="mt-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="d-flex align-items-center">
                                            <span class="badge p-2 me-2" style="background-color: var(--dark-green-primary);">&nbsp;</span>
                                            <span>Moradia</span>
                                        </div>
                                        <span class="fw-bold">35%</span>
                                    </div>
                                    <div class="progress mb-3">
                                        <div class="progress-bar" role="progressbar" style="width: 35%; background-color: var(--dark-green-primary);" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="d-flex align-items-center">
                                            <span class="badge p-2 me-2" style="background-color: var(--medium-green);">&nbsp;</span>
                                            <span>Alimentação</span>
                                        </div>
                                        <span class="fw-bold">25%</span>
                                    </div>
                                    <div class="progress mb-3">
                                        <div class="progress-bar" role="progressbar" style="width: 25%; background-color: var(--medium-green);" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="d-flex align-items-center">
                                            <span class="badge p-2 me-2" style="background-color: var(--light-green);">&nbsp;</span>
                                            <span>Transporte</span>
                                        </div>
                                        <span class="fw-bold">20%</span>
                                    </div>
                                    <div class="progress mb-3">
                                        <div class="progress-bar" role="progressbar" style="width: 20%; background-color: var(--light-green);" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Transactions Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 shadow">
                            <div class="card-header border-0 d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0 fw-bold" style="color: var(--medium-green);">Transações Recentes</h5>
                                <button class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                    <i class="bi bi-eye me-1"></i> Ver Todas
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Data</th>
                                                <th scope="col">Descrição</th>
                                                <th scope="col">Categoria</th>
                                                <th scope="col">Valor</th>
                                                <th scope="col">Status</th>
                                                <th scope="col" class="text-end">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><span class="badge bg-light">#TR-0001</span></td>
                                                <td>10/03/2025</td>
                                                <td>Salário</td>
                                                <td><span class="badge bg-light">Receita</span></td>
                                                <td class="text-success fw-bold">+ R$ 4.500,00</td>
                                                <td><span class="badge bg-success rounded-pill">Concluído</span></td>
                                                <td class="text-end">
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="dropdownMenuButton3">
                                                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Detalhes</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Editar</a></li>
                                                            <li><hr class="dropdown-divider"></li>
                                                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Excluir</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge bg-light">#TR-0002</span></td>
                                                <td>08/03/2025</td>
                                                <td>Aluguel</td>
                                                <td><span class="badge bg-light">Moradia</span></td>
                                                <td class="text-danger fw-bold">- R$ 1.200,00</td>
                                                <td><span class="badge bg-success rounded-pill">Concluído</span></td>
                                                <td class="text-end">
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm" type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="dropdownMenuButton4">
                                                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Detalhes</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Editar</a></li>
                                                            <li><hr class="dropdown-divider"></li>
                                                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Excluir</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge bg-light">#TR-0003</span></td>
                                                <td>05/03/2025</td>
                                                <td>Supermercado</td>
                                                <td><span class="badge bg-light">Alimentação</span></td>
                                                <td class="text-danger fw-bold">- R$ 450,75</td>
                                                <td><span class="badge bg-success rounded-pill">Concluído</span></td>
                                                <td class="text-end">
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm" type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="dropdownMenuButton5">
                                                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Detalhes</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Editar</a></li>
                                                            <li><hr class="dropdown-divider"></li>
                                                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Excluir</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge bg-light">#TR-0004</span></td>
                                                <td>03/03/2025</td>
                                                <td>Investimento</td>
                                                <td><span class="badge bg-light">Economia</span></td>
                                                <td class="text-danger fw-bold">- R$ 1.000,00</td>
                                                <td><span class="badge bg-success rounded-pill">Concluído</span></td>
                                                <td class="text-end">
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm" type="button" id="dropdownMenuButton6" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="dropdownMenuButton6">
                                                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Detalhes</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Editar</a></li>
                                                            <li><hr class="dropdown-divider"></li>
                                                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Excluir</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge bg-light">#TR-0005</span></td>
                                                <td>02/03/2025</td>
                                                <td>Conta de Luz</td>
                                                <td><span class="badge bg-light">Utilidades</span></td>
                                                <td class="text-danger fw-bold">- R$ 210,35</td>
                                                <td><span class="badge bg-warning text-dark rounded-pill">Pendente</span></td>
                                                <td class="text-end">
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm" type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="dropdownMenuButton7">
                                                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>Detalhes</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Editar</a></li>
                                                            <li><hr class="dropdown-divider"></li>
                                                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Excluir</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                                <i class="bi bi-chevron-left"></i>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">
                                                <i class="bi bi-chevron-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>