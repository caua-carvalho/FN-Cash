<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4 rounded">
    <button class="navbar-toggler d-md-none" type="button" data-toggle="collapse" data-target="#sidebarMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="input-group w-25">
        <div class="input-group-prepend">
            <span class="input-group-text bg-light border-0">
                <i class="fas fa-search text-muted"></i>
            </span>
        </div>
        <input type="text" class="form-control border-0 bg-light" placeholder="Pesquisar...">
    </div>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown mr-3">
            <a class="nav-link" href="#" id="notificationsDropdown" role="button" data-toggle="dropdown">
                <i class="fas fa-bell"></i>
                <span class="badge badge-danger badge-pill">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationsDropdown">
                <a class="dropdown-item" href="#">
                    <small class="text-muted">Há 2 minutos</small>
                    <p class="mb-0">Fatura do cartão de crédito vence amanhã</p>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <small class="text-muted">Há 1 hora</small>
                    <p class="mb-0">Orçamento de Alimentação excedido</p>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <small class="text-muted">Há 1 dia</small>
                    <p class="mb-0">Novo relatório mensal disponível</p>
                </a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                <i class="bi bi-person-circle"></i>
                <span><?php echo $_SESSION['nome']; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.html">
                    <i class="fas fa-user mr-2"></i> Perfil
                </a>
                <a class="dropdown-item" href="settings.html">
                    <i class="fas fa-cog mr-2"></i> Configurações
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="login.html">
                    <i class="fas fa-sign-out-alt mr-2"></i> Sair
                </a>
            </div>
        </li>
    </ul>
</nav>