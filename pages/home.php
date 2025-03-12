<?php
require "../conexao.php";
require "../header.php";
require_once "../validacao_login.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Financeiro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar {
            min-height: 100vh;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .card-dashboard {
            transition: transform 0.3s;
        }
        
        .card-dashboard:hover {
            transform: translateY(-5px);
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
            <div class="col-lg-2 bg-dark text-white p-0 sidebar">
                <div class="d-flex flex-column p-3">
                    <div class="logo d-flex align-items-center justify-content-center">
                        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none" style="margin-right: 0 !important;">
                            <img src="../img/logo.svg" class="fas fa-chart-line fs-4 me-2 my" style="width:auto; height:100px;"></img>
                        </a>
                    </div>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link active text-white" aria-current="page">
                                <i class="fas fa-home me-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <i class="fas fa-exchange-alt me-2"></i>
                                Transações
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <i class="fas fa-wallet me-2"></i>
                                Contas
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <i class="fas fa-chart-pie me-2"></i>
                                Relatórios
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <i class="fas fa-calendar-alt me-2"></i>
                                Planejamento
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <i class="fas fa-cog me-2"></i>
                                Configurações
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/api/placeholder/32/32" alt="usuário" width="32" height="32" class="rounded-circle me-2">
                            <strong>Usuário</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li><a class="dropdown-item" href="#">Configurações</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-10 p-4">
                <!-- Header -->
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard Financeiro</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="input-group me-2">
                            <input type="text" class="form-control" placeholder="Buscar...">
                            <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                        </div>
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Compartilhar</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus me-1"></i> Nova Transação
                        </button>
                    </div>
                </div>

                <!-- Cards -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-4">
                        <div class="card card-dashboard border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-muted mb-1">Saldo Total</h6>
                                        <h3 class="mb-0">R$ 12.580,45</h3>
                                    </div>
                                    <div class="bg-primary bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-wallet text-primary fs-4"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success"><i class="fas fa-arrow-up me-1"></i>2.5%</span>
                                    <span class="text-muted ms-2">Desde o mês passado</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card card-dashboard border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-muted mb-1">Receitas</h6>
                                        <h3 class="mb-0">R$ 8.450,20</h3>
                                    </div>
                                    <div class="bg-success bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-arrow-up text-success fs-4"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success"><i class="fas fa-arrow-up me-1"></i>3.7%</span>
                                    <span class="text-muted ms-2">Desde o mês passado</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card card-dashboard border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-muted mb-1">Despesas</h6>
                                        <h3 class="mb-0">R$ 4.320,75</h3>
                                    </div>
                                    <div class="bg-danger bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-arrow-down text-danger fs-4"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-danger"><i class="fas fa-arrow-up me-1"></i>1.2%</span>
                                    <span class="text-muted ms-2">Desde o mês passado</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card card-dashboard border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-muted mb-1">Economia</h6>
                                        <h3 class="mb-0">R$ 3.850,00</h3>
                                    </div>
                                    <div class="bg-info bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-piggy-bank text-info fs-4"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success"><i class="fas fa-arrow-up me-1"></i>5.3%</span>
                                    <span class="text-muted ms-2">Desde o mês passado</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="row mb-4">
                    <div class="col-md-8 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Fluxo Financeiro</h5>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Últimos 6 meses
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
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
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Distribuição de Despesas</h5>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Este mês
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
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
                                <div class="mt-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span>Moradia</span>
                                        <span>35%</span>
                                    </div>
                                    <div class="progress mb-3" style="height: 6px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span>Alimentação</span>
                                        <span>25%</span>
                                    </div>
                                    <div class="progress mb-3" style="height: 6px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span>Transporte</span>
                                        <span>20%</span>
                                    </div>
                                    <div class="progress mb-3" style="height: 6px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Transactions Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Transações Recentes</h5>
                                <button class="btn btn-sm btn-outline-primary">Ver Todas</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Data</th>
                                                <th scope="col">Descrição</th>
                                                <th scope="col">Categoria</th>
                                                <th scope="col">Valor</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#TR-0001</td>
                                                <td>10/03/2025</td>
                                                <td>Salário</td>
                                                <td><span class="badge bg-light text-dark">Receita</span></td>
                                                <td class="text-success">+ R$ 4.500,00</td>
                                                <td><span class="badge bg-success">Concluído</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                                            <li><a class="dropdown-item" href="#">Detalhes</a></li>
                                                            <li><a class="dropdown-item" href="#">Editar</a></li>
                                                            <li><a class="dropdown-item text-danger" href="#">Excluir</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#TR-0002</td>
                                                <td>08/03/2025</td>
                                                <td>Aluguel</td>
                                                <td><span class="badge bg-light text-dark">Moradia</span></td>
                                                <td class="text-danger">- R$ 1.200,00</td>
                                                <td><span class="badge bg-success">Concluído</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm" type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                                            <li><a class="dropdown-item" href="#">Detalhes</a></li>
                                                            <li><a class="dropdown-item" href="#">Editar</a></li>
                                                            <li><a class="dropdown-item text-danger" href="#">Excluir</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#TR-0003</td>
                                                <td>05/03/2025</td>
                                                <td>Supermercado</td>
                                                <td><span class="badge bg-light text-dark">Alimentação</span></td>
                                                <td class="text-danger">- R$ 450,75</td>
                                                <td><span class="badge bg-success">Concluído</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm" type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                                                            <li><a class="dropdown-item" href="#">Detalhes</a></li>
                                                            <li><a class="dropdown-item" href="#">Editar</a></li>
                                                            <li><a class="dropdown-item text-danger" href="#">Excluir</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#TR-0004</td>
                                                <td>03/03/2025</td>
                                                <td>Investimento</td>
                                                <td><span class="badge bg-light text-dark">Economia</span></td>
                                                <td class="text-danger">- R$ 1.000,00</td>
                                                <td><span class="badge bg-success">Concluído</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm" type="button" id="dropdownMenuButton6" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                                                            <li><a class="dropdown-item" href="#">Detalhes</a></li>
                                                            <li><a class="dropdown-item" href="#">Editar</a></li>
                                                            <li><a class="dropdown-item text-danger" href="#">Excluir</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#TR-0005</td>
                                                <td>02/03/2025</td>
                                                <td>Conta de Luz</td>
                                                <td><span class="badge bg-light text-dark">Utilidades</span></td>
                                                <td class="text-danger">- R$ 210,35</td>
                                                <td><span class="badge bg-warning text-dark">Pendente</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm" type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                                            <li><a class="dropdown-item" href="#">Detalhes</a></li>
                                                            <li><a class="dropdown-item" href="#">Editar</a></li>
                                                            <li><a class="dropdown-item text-danger" href="#">Excluir</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>