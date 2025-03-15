<!-- Sidebar -->
<nav class="col-md-3 col-lg-2 d-md-block sidebar">
    <div class="sidebar-sticky">
        <div class="py-4 text-center">
            <h5 class="text-light mb-0">
                <img src="../img/logo_escrita.svg" alt="FN-CASH" style="height:2rem; width:auto;">
            </h5>
        </div>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "dashboard.php"){echo "active";}; ?>" href="dashboard.php">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "transacoes.php"){echo "active";}; ?>" href="transacoes.php">
                    <i class="fas fa-exchange-alt"></i>
                    Transações
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "contas.php"){echo "active";}; ?>" href="contas.php">
                    <i class="fas fa-university"></i>
                    Contas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "relatorios.php"){echo "active";}; ?>"" href="relatorios.php">
                    <i class="fas fa-chart-bar"></i>
                    Relatórios
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="budgets.html">
                    <i class="fas fa-chart-pie"></i>
                    Orçamentos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reports.html">
                    <i class="fas fa-tags"></i>
                    Categorias
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="metas.php">
                    <i class="fas fa-bullseye"></i>
                    Metas
                </a>
            </li>
            <li class="nav-item mt-4">
                <a class="nav-link" href="settings.html">
                    <i class="fas fa-cog"></i>
                    Configurações
                </a>
            </li>
        </ul>
    </div>
</nav>