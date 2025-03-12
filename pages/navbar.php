<div class="col-lg-2 bg-dark text-white p-0 sidebar">
    <div class="d-flex flex-column p-3">
        <div class="logo d-flex align-items-center justify-content-center">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"
                style="margin-right: 0 !important;">
                <img src="<?php echo ($_SERVER['DOCUMENT_ROOT'] . '/FN-CASH/img/logo.svg'); ?>" class="fas fa-chart-line fs-4 me-2 my"
                    style="width:auto; height:100px;"></img>
            </a>
        </div>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="home.php" class="nav-link text-white" aria-current="page">
                    <i class="fas fa-home me-2"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="../pages/contas/home.php" class="nav-link text-white">
                    <i class="fas fa-exchange-alt me-2"></i>
                    Contas
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="fas fa-wallet me-2"></i>
                    Transações
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
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle"></i>
                <strong>
                    <?php echo $_SESSION['nome']; ?>
                </strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li><a class="dropdown-item" href="#">Configurações</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sair</a></li>
            </ul>
        </div>
    </div>
</div>