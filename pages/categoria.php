<?php
require_once "../conexao.php";
require_once "../validacao_login.php";
require_once "header.php";
require_once "../funcoes.php";
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
                        <h1 class="h3">Categorias</h1>
                        <div>
                            <button type="button" class="btn btn-gradient" data-toggle="modal" data-target="#addCategoryModal">
                                <i class="fas fa-plus mr-2"></i> Nova Categoria
                            </button>
                        </div>
                    </div>
                    
                    <!-- CATEGORIAS -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <ul class="nav nav-tabs custom-tabs mb-3" id="categoryTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab">Todas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="income-tab" data-toggle="tab" href="#income" role="tab">Receitas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="expense-tab" data-toggle="tab" href="#expense" role="tab">Despesas</a>
                                </li>
                            </ul>

                            <!-- TABELA DE CATEGORIAS -->
                            <div class="tab-content" id="categoryTabsContent">
                                <div class="tab-pane fade show active" id="all" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Tipo</th>
                                                    <th>Ícone</th>
                                                    <th>Cor</th>
                                                    <th>Descrição</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Exemplo de linhas de categoria -->
                                                <tr>
                                                    <td><strong>Alimentação</strong></td>
                                                    <td><span class="badge badge-danger">Despesa</span></td>
                                                    <td><i class="fas fa-utensils" style="color: #ff6347;"></i></td>
                                                    <td><span class="badge" style="background-color: #ff6347; color: white;">#ff6347</span></td>
                                                    <td>Gastos com comida, restaurantes e mercado</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary" title="Editar">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" title="Excluir">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Salário</strong></td>
                                                    <td><span class="badge badge-success">Receita</span></td>
                                                    <td><i class="fas fa-wallet" style="color: #32cd32;"></i></td>
                                                    <td><span class="badge" style="background-color: #32cd32; color: white;">#32cd32</span></td>
                                                    <td>Salário mensal</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary" title="Editar">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" title="Excluir">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Transporte</strong></td>
                                                    <td><span class="badge badge-danger">Despesa</span></td>
                                                    <td><i class="fas fa-car" style="color: #4169e1;"></i></td>
                                                    <td><span class="badge" style="background-color: #4169e1; color: white;">#4169e1</span></td>
                                                    <td>Gastos com combustível, transporte público</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary" title="Editar">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" title="Excluir">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="income" role="tabpanel">
                                    <!-- Conteúdo da aba Receitas -->
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Tipo</th>
                                                    <th>Ícone</th>
                                                    <th>Cor</th>
                                                    <th>Descrição</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Exemplo de linha de receita -->
                                                <tr>
                                                    <td><strong>Salário</strong></td>
                                                    <td><span class="badge badge-success">Receita</span></td>
                                                    <td><i class="fas fa-wallet" style="color: #32cd32;"></i></td>
                                                    <td><span class="badge" style="background-color: #32cd32; color: white;">#32cd32</span></td>
                                                    <td>Salário mensal</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary" title="Editar">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" title="Excluir">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Freelance</strong></td>
                                                    <td><span class="badge badge-success">Receita</span></td>
                                                    <td><i class="fas fa-laptop" style="color: #9370db;"></i></td>
                                                    <td><span class="badge" style="background-color: #9370db; color: white;">#9370db</span></td>
                                                    <td>Trabalhos como freelancer</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary" title="Editar">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" title="Excluir">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="expense" role="tabpanel">
                                    <!-- Conteúdo da aba Despesas -->
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Tipo</th>
                                                    <th>Ícone</th>
                                                    <th>Cor</th>
                                                    <th>Descrição</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Exemplo de linha de despesa -->
                                                <tr>
                                                    <td><strong>Alimentação</strong></td>
                                                    <td><span class="badge badge-danger">Despesa</span></td>
                                                    <td><i class="fas fa-utensils" style="color: #ff6347;"></i></td>
                                                    <td><span class="badge" style="background-color: #ff6347; color: white;">#ff6347</span></td>
                                                    <td>Gastos com comida, restaurantes e mercado</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary" title="Editar">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" title="Excluir">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Transporte</strong></td>
                                                    <td><span class="badge badge-danger">Despesa</span></td>
                                                    <td><i class="fas fa-car" style="color: #4169e1;"></i></td>
                                                    <td><span class="badge" style="background-color: #4169e1; color: white;">#4169e1</span></td>
                                                    <td>Gastos com combustível, transporte público</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary" title="Editar">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" title="Excluir">
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
                </div>
                
                <!-- FOOTER -->
                <footer class="mt-5 text-center text-muted">
                    <p class="mb-1">&copy; 2025 FN-CASH. Todos os direitos reservados.</p>
                    <p class="mb-0">v1.0.0</p>
                </footer>
            </main>
        </div>
    </div>

    <!-- Modal Add Category -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient text-white">
                    <h5 class="modal-title" id="addCategoryModalLabel">Nova Categoria</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formCategoria">
                        <div class="form-group">
                            <label for="nome">Nome da Categoria</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: Alimentação, Salário...">
                        </div>
                        <div class="form-group">
                            <label>Tipo</label>
                            <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                <label class="btn btn-outline-success active">
                                    <input type="radio" name="tipo" value="receita" checked> Receita
                                </label>
                                <label class="btn btn-outline-danger">
                                    <input type="radio" name="tipo" value="despesa"> Despesa
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="icone">Ícone</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-tags"></i></span>
                                </div>
                                <select class="form-control" id="icone" name="icone">
                                    <option value="fa-tags" selected>Tags (Padrão)</option>
                                    <option value="fa-utensils">Alimentação</option>
                                    <option value="fa-home">Moradia</option>
                                    <option value="fa-car">Transporte</option>
                                    <option value="fa-heartbeat">Saúde</option>
                                    <option value="fa-graduation-cap">Educação</option>
                                    <option value="fa-shopping-bag">Compras</option>
                                    <option value="fa-ticket-alt">Lazer</option>
                                    <option value="fa-wallet">Salário</option>
                                    <option value="fa-chart-line">Investimentos</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cor">Cor</label>
                            <select class="form-control" id="cor" name="cor">
                                <option value="#07A262" selected>Verde (Padrão)</option>
                                <option value="#e74c3c">Vermelho</option>
                                <option value="#3498db">Azul</option>
                                <option value="#f39c12">Laranja</option>
                                <option value="#9b59b6">Roxo</option>
                                <option value="#1abc9c">Turquesa</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Descrição da categoria..."></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-accent">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap & jQuery JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>