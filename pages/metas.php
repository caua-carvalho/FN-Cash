<?php
require_once "../conexao.php";
require_once "../validacao_login.php";
require_once "header.php";
?>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar - Adicionando active para página de metas -->
            <?php 
            // Marcar a página atual como ativa no sidebar
            $pagina_atual = "metas";
            require_once "componentes/sidebar.php"; 
            ?>
<!-- Main Content -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4 main-content">
            <!-- Top Navigation -->
            <?php require_once "componentes/navigation.php"; ?>
            
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3">Minhas Metas</h1>
                    <div>
                        <button type="button" class="btn btn-gradient" data-toggle="modal" data-target="#criarMetaModal">
                            <i class="fas fa-plus mr-2"></i> Nova Meta
                        </button>
                    </div>
                </div>
                
                <!-- Exibir mensagens de erro ou sucesso -->
                <?php if (isset($_SESSION['erro'])): ?>
                <div class="alert alert-danger alert-dismissible fade show animate-shake" role="alert">
                    <?php echo $_SESSION['erro']; unset($_SESSION['erro']); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['sucesso'])): ?>
                <div class="alert alert-success alert-dismissible fade show animate-slide-in" role="alert">
                    <?php echo $_SESSION['sucesso']; unset($_SESSION['sucesso']); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                
                <!-- Estado vazio - será exibido quando não houver metas -->
                <div id="empty-state" class="text-center py-5 my-5 animate-fade-in">
                    <div class="empty-state-icon mb-4">
                        <i class="fas fa-bullseye fa-5x pulse"></i>
                    </div>
                    <h4 class="text-muted typewriter">Você ainda não tem metas financeiras</h4>
                    <p class="text-muted mb-4 fade-in-up delay-200">Que tal criar sua primeira meta?</p>
                    <button type="button" class="btn btn-accent btn-lg fade-in-up delay-400" data-toggle="modal" data-target="#criarMetaModal">
                        <i class="fas fa-plus mr-2"></i> Criar Meta
                    </button>
                </div>

                <!-- Lista de Metas -->
                <div id="metas-list" class="row">
                <?php
                // Consulta para buscar metas do usuário
                $tem_metas = false;
                $usuario_id = $_SESSION['id']; // ID do usuário logado

                // Em um ambiente real, você consultaria o banco de dados
                // Exemplo de consulta SQL:
                // $sql = "SELECT * FROM metas WHERE id_usuario = ?";
                // $stmt = $conexao->prepare($sql);
                // $stmt->bind_param("i", $usuario_id);
                // $stmt->execute();
                // $resultado = $stmt->get_result();
                
                // Para demonstração, usaremos dados fictícios
                $metas_ficticias = [
                    [
                        'id' => 1,
                        'titulo' => 'Reserva de Emergência',
                        'descricao' => 'Guardar dinheiro para imprevistos',
                        'valor_alvo' => 5000.00,
                        'valor_atual' => 1000.00,
                        'categoria' => 'Economia',
                        'tipo' => 'continua',
                        'data_limite' => null,
                        'cor' => 'accent'
                    ],
                    [
                        'id' => 2,
                        'titulo' => 'Viagem de Férias',
                        'descricao' => 'Viagem para a praia em janeiro',
                        'valor_alvo' => 3000.00,
                        'valor_atual' => 1950.00,
                        'categoria' => 'Lazer',
                        'tipo' => 'prazo',
                        'data_limite' => '2025-01-15',
                        'cor' => 'secondary'
                    ],
                    [
                        'id' => 3,
                        'titulo' => 'Celular Novo',
                        'descricao' => 'Comprar celular novo',
                        'valor_alvo' => 2500.00,
                        'valor_atual' => 2500.00,
                        'categoria' => 'Compras',
                        'tipo' => 'continua',
                        'data_limite' => null,
                        'cor' => 'success'
                    ]
                ];

                // Número de metas fictícias para demonstração
                $tem_metas = count($metas_ficticias) > 0;

                // Se não houver metas, exibir estado vazio
                if (!$tem_metas) {
                    echo '<script>$("#metas-list").hide(); $("#empty-state").show();</script>';
                } else {
                    echo '<script>$("#empty-state").hide(); $("#metas-list").show();</script>';
                    
                    // Exibir cada meta
                    foreach ($metas_ficticias as $meta) {
                        // Calcular porcentagem do progresso
                        $porcentagem = ($meta['valor_atual'] / $meta['valor_alvo']) * 100;
                        $porcentagem = min(100, $porcentagem); // Limitar a 100%
                        
                        // Definir classe de cor para o cabeçalho do card
                        $cor_classe = 'bg-' . $meta['cor'];
                        
                        // Definir classe de cor para a barra de progresso
                        $barra_classe = 'bg-';
                        if ($porcentagem < 25) {
                            $barra_classe .= 'danger';
                        } elseif ($porcentagem < 50) {
                            $barra_classe .= 'warning';
                        } elseif ($porcentagem < 75) {
                            $barra_classe .= 'info';
                        } else {
                            $barra_classe .= 'success';
                        }
                        
                        // Definir texto do prazo
                        if ($meta['tipo'] == 'continua') {
                            $texto_prazo = '<small class="text-muted"><i class="far fa-calendar-alt mr-1"></i> Meta contínua</small>';
                        } else {
                            // Calcular dias restantes
                            $data_hoje = new DateTime();
                            $data_limite = new DateTime($meta['data_limite']);
                            $dias_restantes = $data_hoje->diff($data_limite)->days;
                            
                            if ($data_hoje > $data_limite) {
                                $texto_prazo = '                                <small class="badge badge-danger text-white"><i class="far fa-clock mr-1"></i> Prazo expirado</small>';
                            } else {
                                $texto_prazo = '<small class="text-muted"><i class="far fa-clock mr-1"></i> ' . $dias_restantes . ' dias restantes</small>';
                            }
                        }
                        
                        // Texto para meta concluída
                        $texto_conclusao = '';
                        if ($porcentagem >= 100) {
                            $texto_conclusao = '                                <small class="badge badge-success text-white"><i class="fas fa-check-circle mr-1"></i> Meta concluída!</small>';
                        }
                        
                        // Montar o card para esta meta
                        echo '
                        <div class="col-md-4 mb-4">
                            <div class="card card-meta shadow-sm h-100 fade-in-up">
                                <div class="card-header ' . $cor_classe . ' text-white d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">' . htmlspecialchars($meta['titulo']) . '</h5>
                                    <div class="dropdown">
                                        <button class="btn btn-sm text-white" type="button" data-toggle="dropdown" aria-label="Opções">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right animate-slide-in">
                                            <a class="dropdown-item editar-meta" href="#" data-toggle="modal" data-target="#editarMetaModal" data-id="' . $meta['id'] . '">
                                                <i class="fas fa-edit mr-2"></i> Editar
                                            </a>
                                            <a class="dropdown-item text-danger excluir-meta" href="#" data-toggle="modal" data-target="#excluirMetaModal" data-id="' . $meta['id'] . '">
                                                <i class="fas fa-trash mr-2"></i> Excluir
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">' . htmlspecialchars($meta['descricao']) . '</p>
                                    <div class="progress mb-3" style="height: 20px;">
                                        <div class="progress-bar ' . $barra_classe . ' text-white" role="progressbar" style="width: ' . $porcentagem . '%;" 
                                            aria-valuenow="' . $porcentagem . '" aria-valuemin="0" aria-valuemax="100">' . round($porcentagem) . '%</div>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <small class="text-dark">Progresso:</small>
                                        <small class="text-dark"><strong>R$ ' . number_format($meta['valor_atual'], 2, ',', '.') . ' / R$ ' . number_format($meta['valor_alvo'], 2, ',', '.') . '</strong></small>
                                    </div>
                                    <div class="meta-info-separator"></div>
                                    <div class="d-flex justify-content-between">
                                        ' . ($porcentagem >= 100 ? $texto_conclusao : $texto_prazo) . '
                                        <small class="badge badge-light"><i class="fas fa-tag mr-1"></i> ' . htmlspecialchars($meta['categoria']) . '</small>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                }
                ?>
                </div>
            </div>
            
            <footer class="mt-5 text-center text-muted">
                <p class="mb-1">&copy; <?php echo date('Y'); ?> FN Cash. Todos os direitos reservados.</p>
                <p class="mb-0">v1.0.0</p>
            </footer>
        </main>
    </div>
</div>

<!-- Modal de Criar Nova Meta -->
<div class="modal fade" id="criarMetaModal" tabindex="-1" role="dialog" aria-labelledby="criarMetaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-accent text-white">
                <h5 class="modal-title" id="criarMetaModalLabel">Criar Nova Meta</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="novaMeta" method="post" action="processar_meta.php">
                    <div class="form-group">
                        <label for="metaTitulo">Título da Meta</label>
                        <input type="text" class="form-control" id="metaTitulo" name="metaTitulo" placeholder="Ex: Reserva de Emergência" required>
                    </div>
                    <div class="form-group">
                        <label for="metaDescricao">Descrição (opcional)</label>
                        <textarea class="form-control" id="metaDescricao" name="metaDescricao" placeholder="Descreva sua meta" rows="2"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="metaValorAlvo">Valor Alvo (R$)</label>
                            <input type="number" class="form-control" id="metaValorAlvo" name="metaValorAlvo" placeholder="0,00" min="0" step="0.01" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="metaCategoria">Categoria</label>
                            <select class="form-control" id="metaCategoria" name="metaCategoria">
                                <option value="Economia">Economia</option>
                                <option value="Investimento">Investimento</option>
                                <option value="Lazer">Lazer</option>
                                <option value="Compras">Compras</option>
                                <option value="Pagamento de Dívida">Pagamento de Dívida</option>
                                <option value="Educação">Educação</option>
                                <option value="Viagem">Viagem</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tipo de Meta</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="tipoMetaContinua" name="tipoMeta" value="continua" class="custom-control-input" checked>
                                <label class="custom-control-label" for="tipoMetaContinua">Meta contínua (sem data limite)</label>
                            </div>
                            <div class="custom-control custom-radio mt-2">
                                <input type="radio" id="tipoMetaPrazo" name="tipoMeta" value="prazo" class="custom-control-input">
                                <label class="custom-control-label" for="tipoMetaPrazo">Meta com prazo</label>
                            </div>
                        </div>
                        <div class="form-group col-md-6" id="dataLimiteGroup" style="display: none;">
                            <label for="metaDataLimite">Data Limite</label>
                            <input type="date" class="form-control" id="metaDataLimite" name="metaDataLimite">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Cor da Meta</label>
                        <div class="d-flex flex-wrap">
                            <div class="color-option m-1 active" style="background-color: var(--accent); width: 30px; height: 30px; border-radius: 50%; cursor: pointer; border: 2px solid transparent;" data-color="accent"></div>
                            <div class="color-option m-1" style="background-color: var(--success); width: 30px; height: 30px; border-radius: 50%; cursor: pointer; border: 2px solid transparent;" data-color="success"></div>
                            <div class="color-option m-1" style="background-color: var(--info); width: 30px; height: 30px; border-radius: 50%; cursor: pointer; border: 2px solid transparent;" data-color="info"></div>
                            <div class="color-option m-1" style="background-color: var(--warning); width: 30px; height: 30px; border-radius: 50%; cursor: pointer; border: 2px solid transparent;" data-color="warning"></div>
                            <div class="color-option m-1" style="background-color: var(--danger); width: 30px; height: 30px; border-radius: 50%; cursor: pointer; border: 2px solid transparent;" data-color="danger"></div>
                            <div class="color-option m-1" style="background-color: var(--secondary); width: 30px; height: 30px; border-radius: 50%; cursor: pointer; border: 2px solid transparent;" data-color="secondary"></div>
                            <input type="hidden" id="metaCor" name="metaCor" value="accent">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="metaValorAtual">Valor Atual (R$)</label>
                        <input type="number" class="form-control" id="metaValorAtual" name="metaValorAtual" placeholder="0,00" min="0" step="0.01" value="0">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-accent" id="salvarMeta">Salvar Meta</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Editar Meta -->
<div class="modal fade" id="editarMetaModal" tabindex="-1" role="dialog" aria-labelledby="editarMetaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-accent text-white">
                <h5 class="modal-title" id="editarMetaModalLabel">Editar Meta</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editarMetaForm" method="post" action="atualizar_meta.php">
                    <input type="hidden" id="editMetaId" name="metaId">
                    <div class="form-group">
                        <label for="editMetaTitulo">Título da Meta</label>
                        <input type="text" class="form-control" id="editMetaTitulo" name="metaTitulo" placeholder="Ex: Reserva de Emergência" required>
                    </div>
                    <div class="form-group">
                        <label for="editMetaDescricao">Descrição (opcional)</label>
                        <textarea class="form-control" id="editMetaDescricao" name="metaDescricao" placeholder="Descreva sua meta" rows="2"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="editMetaValorAlvo">Valor Alvo (R$)</label>
                            <input type="number" class="form-control" id="editMetaValorAlvo" name="metaValorAlvo" placeholder="0,00" min="0" step="0.01" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="editMetaCategoria">Categoria</label>
                            <select class="form-control" id="editMetaCategoria" name="metaCategoria">
                                <option value="Economia">Economia</option>
                                <option value="Investimento">Investimento</option>
                                <option value="Lazer">Lazer</option>
                                <option value="Compras">Compras</option>
                                <option value="Pagamento de Dívida">Pagamento de Dívida</option>
                                <option value="Educação">Educação</option>
                                <option value="Viagem">Viagem</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tipo de Meta</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="editTipoMetaContinua" name="tipoMeta" value="continua" class="custom-control-input">
                                <label class="custom-control-label" for="editTipoMetaContinua">Meta contínua (sem data limite)</label>
                            </div>
                            <div class="custom-control custom-radio mt-2">
                                <input type="radio" id="editTipoMetaPrazo" name="tipoMeta" value="prazo" class="custom-control-input">
                                <label class="custom-control-label" for="editTipoMetaPrazo">Meta com prazo</label>
                            </div>
                        </div>
                        <div class="form-group col-md-6" id="editDataLimiteGroup">
                            <label for="editMetaDataLimite">Data Limite</label>
                            <input type="date" class="form-control" id="editMetaDataLimite" name="metaDataLimite">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Cor da Meta</label>
                        <div class="d-flex flex-wrap">
                            <div class="edit-color-option m-1" style="background-color: var(--accent); width: 30px; height: 30px; border-radius: 50%; cursor: pointer; border: 2px solid transparent;" data-color="accent"></div>
                            <div class="edit-color-option m-1" style="background-color: var(--success); width: 30px; height: 30px; border-radius: 50%; cursor: pointer; border: 2px solid transparent;" data-color="success"></div>
                            <div class="edit-color-option m-1" style="background-color: var(--info); width: 30px; height: 30px; border-radius: 50%; cursor: pointer; border: 2px solid transparent;" data-color="info"></div>
                            <div class="edit-color-option m-1" style="background-color: var(--warning); width: 30px; height: 30px; border-radius: 50%; cursor: pointer; border: 2px solid transparent;" data-color="warning"></div>
                            <div class="edit-color-option m-1" style="background-color: var(--danger); width: 30px; height: 30px; border-radius: 50%; cursor: pointer; border: 2px solid transparent;" data-color="danger"></div>
                            <div class="edit-color-option m-1" style="background-color: var(--secondary); width: 30px; height: 30px; border-radius: 50%; cursor: pointer; border: 2px solid transparent;" data-color="secondary"></div>
                            <input type="hidden" id="editMetaCor" name="metaCor">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editMetaValorAtual">Valor Atual (R$)</label>
                        <input type="number" class="form-control" id="editMetaValorAtual" name="metaValorAtual" placeholder="0,00" min="0" step="0.01">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-accent" id="atualizarMeta">Salvar Alterações</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Excluir Meta -->
<div class="modal fade" id="excluirMetaModal" tabindex="-1" role="dialog" aria-labelledby="excluirMetaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="excluirMetaModalLabel">Excluir Meta</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja excluir esta meta? Esta ação não pode ser desfeita.</p>
                <form id="excluirMetaForm" method="post" action="excluir_meta.php">
                    <input type="hidden" id="excluirMetaId" name="metaId">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmarExclusao">Excluir</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap & jQuery JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script personalizado para a página de metas -->
<script>
    $(document).ready(function() {
        // Mostrar/esconder campo de data limite baseado no tipo de meta
        $('#tipoMetaPrazo').change(function() {
            if(this.checked) {
                $('#dataLimiteGroup').show();
            }
        });
        
        $('#tipoMetaContinua').change(function() {
            if(this.checked) {
                $('#dataLimiteGroup').hide();
            }
        });
        
        // Similar para o formulário de edição
        $('#editTipoMetaPrazo').change(function() {
            if(this.checked) {
                $('#editDataLimiteGroup').show();
            }
        });
        
        $('#editTipoMetaContinua').change(function() {
            if(this.checked) {
                $('#editDataLimiteGroup').hide();
            }
        });
        
        // Selecionar cor da meta (criar)
        $('.color-option').click(function() {
            $('.color-option').removeClass('active').css('border-color', 'transparent');
            $(this).addClass('active').css('border-color', '#000');
            $('#metaCor').val($(this).data('color'));
        });
        
        // Selecionar cor da meta (editar)
        $('.edit-color-option').click(function() {
            $('.edit-color-option').removeClass('active').css('border-color', 'transparent');
            $(this).addClass('active').css('border-color', '#000');
            $('#editMetaCor').val($(this).data('color'));
        });
        
        // Manipulação do formulário de criar meta
        $('#salvarMeta').click(function() {
            // Em um ambiente de produção, enviaria o formulário
            $('#novaMeta').submit();
        });
        
        // Manipulação do formulário de editar meta
        $('#atualizarMeta').click(function() {
            $('#editarMetaForm').submit();
        });
        
        // Manipulação do formulário de excluir meta
        $('#confirmarExclusao').click(function() {
            $('#excluirMetaForm').submit();
        });
        
        // Carregar dados da meta para o modal de edição
        $('.editar-meta').click(function() {
            var metaId = $(this).data('id');
            $('#editMetaId').val(metaId);
            
            // Em um ambiente real, você faria uma requisição AJAX para obter os dados
            // ou buscaria os dados pré-carregados em um objeto JavaScript
            
            // Para demonstração, usaremos dados fictícios
            var metasFicticias = {
                1: {
                    titulo: 'Reserva de Emergência',
                    descricao: 'Guardar dinheiro para imprevistos',
                    valor_alvo: 5000.00,
                    valor_atual: 1000.00,
                    categoria: 'Economia',
                    tipo: 'continua',
                    data_limite: null,
                    cor: 'accent'
                },
                2: {
                    titulo: 'Viagem de Férias',
                    descricao: 'Viagem para a praia em janeiro',
                    valor_alvo: 3000.00,
                    valor_atual: 1950.00,
                    categoria: 'Lazer',
                    tipo: 'prazo',
                    data_limite: '2025-01-15',
                    cor: 'secondary'
                },
                3: {
                    titulo: 'Celular Novo',
                    descricao: 'Comprar celular novo',
                    valor_alvo: 2500.00,
                    valor_atual: 2500.00,
                    categoria: 'Compras',
                    tipo: 'continua',
                    data_limite: null,
                    cor: 'success'
                }
            };
            
            var meta = metasFicticias[metaId];
            
            // Preenche o formulário com os dados da meta
            $('#editMetaTitulo').val(meta.titulo);
            $('#editMetaDescricao').val(meta.descricao);
            $('#editMetaValorAlvo').val(meta.valor_alvo);
            $('#editMetaValorAtual').val(meta.valor_atual);
            $('#editMetaCategoria').val(meta.categoria);

            // Define o tipo de meta
            if (meta.tipo === 'continua') {
                $('#editTipoMetaContinua').prop('checked', true);
                $('#editDataLimiteGroup').hide();
            } else {
                $('#editTipoMetaPrazo').prop('checked', true);
                $('#editDataLimiteGroup').show();
                $('#editMetaDataLimite').val(meta.data_limite);
            }

            // Define a cor selecionada
            $('.edit-color-option').removeClass('active').css('border-color', 'transparent');
            $('.edit-color-option[data-color="' + meta.cor + '"]').addClass('active').css('border-color', '#000');
            $('#editMetaCor').val(meta.cor);
            });

            // Carregar ID da meta para o modal de exclusão
            $('.excluir-meta').click(function() {
                var metaId = $(this).data('id');
                $('#excluirMetaId').val(metaId);
            });

            // Script para toggling sidebar em dispositivos móveis
            const sidebarToggle = document.querySelector('.navbar-toggler');
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    document.querySelector('.sidebar').classList.toggle('show');
                });
            }
            
            // Inicializa tooltips
            $('[data-toggle="tooltip"]').tooltip();

            // Adição de animação para metas concluídas
            $('.progress-bar[aria-valuenow="100"]').parent().addClass('progress-animate');
            });