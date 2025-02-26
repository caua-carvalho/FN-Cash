<?php
$bancos = [
    [
        'nome' => 'Nubank',
        'tipo' => 'Digital',
        'vantagens' => [
            'Sem taxa de manutenção',
            'Rendimento automático de 100% do CDI',
            'Cartão de crédito sem anuidade',
            'Atendimento 24/7 pelo app'
        ],
        'avaliacao' => 4.8,
        'logo' => '💜',
        'taxas' => [
            'Transferência: Grátis',
            'Saque: 0 a R$4',
            'Manutenção: R$0'
        ]
    ],
    [
        'nome' => 'BTG Pactual',
        'tipo' => 'Investimentos',
        'vantagens' => [
            'Ampla variedade de investimentos',
            'Assessoria personalizada',
            'Mesa de operações própria',
            'Research exclusivo'
        ],
        'avaliacao' => 4.7,
        'logo' => '🔷',
        'taxas' => [
            'Corretagem ações: R$0',
            'Taxa administração: 0,5% a.a.',
            'Manutenção: R$0'
        ]
    ],
    [
        'nome' => 'XP Investimentos',
        'tipo' => 'Investimentos',
        'vantagens' => [
            'Plataforma completa de investimentos',
            'Assessoria especializada',
            'Cursos e conteúdo educacional',
            'Carteira recomendada'
        ],
        'avaliacao' => 4.6,
        'logo' => '📈',
        'taxas' => [
            'Corretagem ações: R$0',
            'Taxa administração: 0,4% a.a.',
            'Manutenção: R$0'
        ]
    ]
];

$emprestimos = [
    [
        'banco' => 'Banco do Brasil',
        'tipo' => 'Pessoal',
        'taxa_juros' => '2,89% a.m.',
        'prazo_maximo' => '72 meses',
        'valor_minimo' => 'R$ 1.000',
        'valor_maximo' => 'R$ 50.000',
        'requisitos' => [
            'Conta no banco',
            'Renda mínima de R$ 1.500',
            'Score acima de 600'
        ]
    ],
    [
        'banco' => 'Caixa',
        'tipo' => 'Habitacional',
        'taxa_juros' => 'A partir de 8% a.a.',
        'prazo_maximo' => '35 anos',
        'valor_minimo' => 'R$ 80.000',
        'valor_maximo' => 'R$ 1.500.000',
        'requisitos' => [
            'Renda familiar comprovada',
            'Entrada mínima de 20%',
            'Imóvel avaliado'
        ]
    ]
];

$investimentos = [
    [
        'tipo' => 'Renda Fixa',
        'opcoes' => [
            [
                'nome' => 'Tesouro Direto',
                'rentabilidade' => 'IPCA + 5,5% a.a.',
                'risco' => 'Muito Baixo',
                'liquidez' => 'Média',
                'valor_minimo' => 'R$ 30'
            ],
            [
                'nome' => 'CDB',
                'rentabilidade' => '100% a 120% do CDI',
                'risco' => 'Baixo',
                'liquidez' => 'Média/Alta',
                'valor_minimo' => 'R$ 100'
            ]
        ]
    ],
    [
        'tipo' => 'Renda Variável',
        'opcoes' => [
            [
                'nome' => 'Ações',
                'rentabilidade' => 'Variável',
                'risco' => 'Alto',
                'liquidez' => 'Alta',
                'valor_minimo' => 'R$ 100'
            ],
            [
                'nome' => 'FIIs',
                'rentabilidade' => '8% a 12% a.a.',
                'risco' => 'Médio',
                'liquidez' => 'Média',
                'valor_minimo' => 'R$ 100'
            ]
        ]
    ]
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melhores Bancos e Investimentos | FN Cash</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/animations.css">
    <style>
        /* Estilos base */
        :root {
            --primary: #07A262;
            --secondary: #4E997E;
            --accent: #055336;
            --text: #043821;
            --light: #FAFAFA;
            --gradient: linear-gradient(135deg, #07A262, #4E997E);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Estilos específicos */
        .page-header {
            background: var(--gradient);
            color: white;
            padding: 80px 0 40px;
            text-align: center;
        }

        .comparison-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin: 50px 0;
        }

        .bank-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .bank-card:hover {
            transform: translateY(-10px);
        }

        .bank-logo {
            font-size: 40px;
            margin-bottom: 20px;
        }

        .bank-name {
            font-size: 24px;
            margin-bottom: 10px;
            color: var(--text);
        }

        .bank-type {
            color: var(--primary);
            margin-bottom: 20px;
        }

        .advantages-list {
            list-style: none;
            margin-bottom: 20px;
        }

        .advantages-list li {
            margin-bottom: 10px;
            padding-left: 25px;
            position: relative;
        }

        .advantages-list li:before {
            content: '✓';
            color: var(--primary);
            position: absolute;
            left: 0;
        }

        .rating {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .rating-stars {
            color: gold;
        }

        .fees-list {
            background: var(--light);
            padding: 15px;
            border-radius: 8px;
            list-style: none;
        }

        .fees-list li {
            margin-bottom: 8px;
            font-size: 14px;
        }

        .section-title {
            text-align: center;
            margin: 60px 0 30px;
            color: var(--text);
        }

        .loan-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .loan-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .loan-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .loan-detail {
            background: var(--light);
            padding: 15px;
            border-radius: 8px;
        }

        .investment-section {
            margin: 60px 0;
        }

        .investment-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .investment-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .investment-type {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 20px;
        }

        .investment-option {
            border-top: 1px solid #eee;
            padding: 15px 0;
        }

        .investment-option h4 {
            margin-bottom: 10px;
        }

        .investment-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            font-size: 14px;
        }

        .highlight {
            color: var(--primary);
            font-weight: 600;
        }
    </style>
</head>
<body>
    <header class="page-header">
        <div class="container">
            <h1>Melhores Bancos e Investimentos</h1>
            <p>Compare e escolha as melhores opções para seu perfil</p>
        </div>
    </header>

    <main class="container">
        <section>
            <h2 class="section-title">Melhores Bancos</h2>
            <div class="comparison-grid">
                <?php foreach($bancos as $banco): ?>
                    <div class="bank-card">
                        <div class="bank-logo"><?php echo $banco['logo']; ?></div>
                        <h3 class="bank-name"><?php echo $banco['nome']; ?></h3>
                        <div class="bank-type"><?php echo $banco['tipo']; ?></div>
                        <ul class="advantages-list">
                            <?php foreach($banco['vantagens'] as $vantagem): ?>
                                <li><?php echo $vantagem; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="rating">
                            <div class="rating-stars">
                                <?php echo str_repeat('⭐', floor($banco['avaliacao'])); ?>
                            </div>
                            <span><?php echo $banco['avaliacao']; ?>/5</span>
                        </div>
                        <ul class="fees-list">
                            <?php foreach($banco['taxas'] as $taxa): ?>
                                <li><?php echo $taxa; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section>
            <h2 class="section-title">Melhores Empréstimos</h2>
            <?php foreach($emprestimos as $emprestimo): ?>
                <div class="loan-card">
                    <div class="loan-header">
                        <h3><?php echo $emprestimo['banco']; ?></h3>
                        <span class="loan-type"><?php echo $emprestimo['tipo']; ?></span>
                    </div>
                    <div class="loan-details">
                        <div class="loan-detail">
                            <strong>Taxa de Juros:</strong>
                            <div><?php echo $emprestimo['taxa_juros']; ?></div>
                        </div>
                        <div class="loan-detail">
                            <strong>Prazo Máximo:</strong>
                            <div><?php echo $emprestimo['prazo_maximo']; ?></div>
                        </div>
                        <div class="loan-detail">
                            <strong>Valor Mínimo:</strong>
                            <div><?php echo $emprestimo['valor_minimo']; ?></div>
                        </div>
                        <div class="loan-detail">
                            <strong>Valor Máximo:</strong>
                            <div><?php echo $emprestimo['valor_maximo']; ?></div>
                        </div>
                    </div>
                    <div class="requisitos">
                        <strong>Requisitos:</strong>
                        <ul>
                            <?php foreach($emprestimo['requisitos'] as $requisito): ?>
                                <li><?php echo $requisito; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>

        <section class="investment-section">
            <h2 class="section-title">Melhores Investimentos</h2>
            <div class="investment-grid">
                <?php foreach($investimentos as $categoria): ?>
                    <div class="investment-card">
                        <div class="investment-type"><?php echo $categoria['tipo']; ?></div>
                        <?php foreach($categoria['opcoes'] as $opcao): ?>
                            <div class="investment-option">
                                <h4><?php echo $opcao['nome']; ?></h4>
                                <div class="investment-stats">
                                    <div>
                                        <strong>Rentabilidade:</strong>
                                        <div class="highlight"><?php echo $opcao['rentabilidade']; ?></div>
                                    </div>
                                    <div>
                                        <strong>Risco:</strong>
                                        <div><?php echo $opcao['risco']; ?></div>
                                    </div>
                                    <div>
                                        <strong>Liquidez:</strong>
                                        <div><?php echo $opcao['liquidez']; ?></div>
                                    </div>
                                    <div>
                                        <strong>Valor Mínimo:</strong>
                                        <div><?php echo $opcao['valor_minimo']; ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>
</html>
