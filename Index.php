<?php
    $title = "Controle Financeiro | Seu app de finanças pessoais";
    $features = [
        ['icon' => '📊', 'title' => 'Gestão Financeira', 'desc' => 'Controle seus gastos e receitas com gráficos detalhados'],
        ['icon' => '💰', 'title' => 'Orçamentos', 'desc' => 'Planeje seus gastos mensais com metas inteligentes'],
        ['icon' => '📱', 'title' => 'Multiplataforma', 'desc' => 'Use em qualquer dispositivo com sincronização em tempo real'],
        ['icon' => '🎯', 'title' => 'Metas', 'desc' => 'Defina e acompanhe suas metas financeiras'],
        ['icon' => '📈', 'title' => 'Investimentos', 'desc' => 'Acompanhe seus investimentos em um só lugar'],
        ['icon' => '🔔', 'title' => 'Alertas', 'desc' => 'Receba notificações sobre gastos e vencimentos']
    ];
    $plans = [
        [
            'name' => 'Gratuito',
            'price' => '0',
            'features' => ['Controle básico', 'Até 3 contas', 'Relatórios simples', 'Suporte por email']
        ],
        [
            'name' => 'Plus',
            'price' => '9,90',
            'features' => ['Controle avançado', 'Até 10 contas', 'Relatórios detalhados', 'Suporte prioritário']
        ],
        [
            'name' => 'Premium',
            'price' => '19,90',
            'features' => ['Controle ilimitado', 'Contas ilimitadas', 'Relatórios avançados', 'Suporte 24/7']
        ]
    ];
    $stats = [
        ['number' => '100K+', 'label' => 'Usuários ativos'],
        ['number' => '5M+', 'label' => 'Transações processadas'],
        ['number' => '4.8', 'label' => 'Avaliação média']
    ];
    $testimonials = [
        [
            'name' => 'Maria Silva',
            'role' => 'Empreendedora',
            'text' => 'O FN Cash mudou completamente a forma como gerencio minhas finanças. Agora tenho total controle sobre meus gastos.',
            'avatar' => '👩'
        ],
        [
            'name' => 'João Santos',
            'role' => 'Profissional Liberal',
            'text' => 'Interface intuitiva e relatórios detalhados. Exatamente o que eu precisava para organizar meu orçamento.',
            'avatar' => '👨'
        ],
        [
            'name' => 'Ana Costa',
            'role' => 'Investidora',
            'text' => 'O melhor app de finanças que já usei. O acompanhamento de investimentos é excepcional.',
            'avatar' => '👩‍💼'
        ]
    ];

    // Adicionar dados para preços anuais
    $annual_plans = [
        [
            'name' => 'Gratuito',
            'price' => '0',
            'features' => ['Controle básico', 'Até 3 contas', 'Relatórios simples', 'Suporte por email']
        ],
        [
            'name' => 'Plus',
            'price' => '99,90',
            'savings' => '20%',
            'features' => ['Controle avançado', 'Até 10 contas', 'Relatórios detalhados', 'Suporte prioritário']
        ],
        [
            'name' => 'Premium',
            'price' => '199,90',
            'savings' => '25%',
            'features' => ['Controle ilimitado', 'Contas ilimitadas', 'Relatórios avançados', 'Suporte 24/7']
        ]
    ];

    // Dados para FAQ
    $faqs = [
        'começando' => [
            'title' => 'Começando',
            'questions' => [
                [
                    'question' => 'Como começar a usar o FN Cash?',
                    'answer' => 'Basta criar uma conta gratuita e começar a adicionar suas transações. Nosso tutorial interativo irá guiá-lo pelos primeiros passos.'
                ],
                [
                    'question' => 'Preciso cadastrar cartão de crédito?',
                    'answer' => 'Não, você pode começar a usar gratuitamente sem necessidade de cartão de crédito.'
                ]
            ]
        ],
        'funcionalidades' => [
            'title' => 'Funcionalidades',
            'questions' => [
                [
                    'question' => 'Quais são as principais funcionalidades?',
                    'answer' => 'O FN Cash oferece controle de gastos, orçamentos, metas financeiras, relatórios detalhados e muito mais.'
                ],
                [
                    'question' => 'Posso sincronizar com meu banco?',
                    'answer' => 'Sim, oferecemos integração segura com os principais bancos do Brasil.'
                ]
            ]
        ],
        'planos' => [
            'title' => 'Planos e Pagamentos',
            'questions' => [
                [
                    'question' => 'Posso cancelar minha assinatura a qualquer momento?',
                    'answer' => 'Sim, você pode cancelar sua assinatura quando quiser, sem multas ou taxas adicionais.'
                ],
                [
                    'question' => 'Qual a diferença entre os planos?',
                    'answer' => 'Os planos se diferenciam principalmente pelo número de contas, recursos avançados e nível de suporte oferecido.'
                ]
            ]
        ],
        'seguranca' => [
            'title' => 'Segurança',
            'questions' => [
                [
                    'question' => 'Meus dados estão seguros?',
                    'answer' => 'Utilizamos criptografia de ponta a ponta e seguimos os mais rigorosos padrões de segurança do mercado.'
                ],
                [
                    'question' => 'Como protegem minhas informações bancárias?',
                    'answer' => 'Todas as informações são criptografadas e armazenadas em servidores seguros com certificação bancária.'
                ]
            ]
        ]
    ];

    // Dados para parceiros
    $partners = [
        ['name' => 'Banco A', 'logo' => '🏦'],
        ['name' => 'Fintech B', 'logo' => '💳'],
        ['name' => 'Corretora C', 'logo' => '📈'],
        ['name' => 'Seguradora D', 'logo' => '🛡️']
    ];

    // Adicionar dados para o menu superior
    $top_menu = [
        'ferramentas' => [
            'title' => 'Ferramentas',
            'items' => [
                ['name' => 'Calculadora de Juros Compostos', 'url' => '#'],
                ['name' => 'Planejamento de Aposentadoria', 'url' => '#'],
                ['name' => 'Simulador de Investimentos', 'url' => '#'],
                ['name' => 'Controle de Gastos', 'url' => '#']
            ]
        ],
        'melhores' => [
            'title' => 'Os Melhores',
            'items' => [
                ['name' => 'Melhores Cartões de Crédito', 'url' => '#'],
                ['name' => 'Melhores Investimentos', 'url' => '#'],
                ['name' => 'Melhores Contas Digitais', 'url' => '#'],
                ['name' => 'Melhores Apps Financeiros', 'url' => '#']
            ]
        ],
        'guias' => [
            'title' => 'Guias Completos',
            'items' => [
                ['name' => 'Guia de Investimentos', 'url' => '#'],
                ['name' => 'Guia de Economia', 'url' => '#'],
                ['name' => 'Guia de Orçamento Pessoal', 'url' => '#'],
                ['name' => 'Guia de Educação Financeira', 'url' => '#']
            ]
        ]
    ];

    // Adicionar novos destaques
    $highlights = [
        ['icon' => '🔥', 'text' => 'Nova funcionalidade de importação automática'],
        ['icon' => '⚡', 'text' => 'Performance melhorada em 50%'],
        ['icon' => '🎉', 'text' => 'Mais de 1 milhão de usuários']
    ];

    // Adicionar dados de integração
    $integrations = [
        ['name' => 'Google Drive', 'icon' => '📁'],
        ['name' => 'Excel', 'icon' => '📊'],
        ['name' => 'WhatsApp', 'icon' => '💬'],
        ['name' => 'Telegram', 'icon' => '✈️']
    ];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/animations.css">
    <link rel="stylesheet" href="styles/landing.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }
        :root {
            --primary: #07A262;
            --secondary: #4E997E;
            --accent: #055336;
            --text: #043821;
            --light: #FAFAFA;
            --gradient: linear-gradient(135deg, #07A262, #4E997E, #055336);
        }
        body {
            color: var(--text);
            line-height: 1.6;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        header {
            background: white;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: var(--primary);
        }
        nav a {
            text-decoration: none;
            color: var(--text);
            margin-left: 30px;
            font-weight: 500;
            position: relative;
            transition: all 0.3s ease;
            padding: 5px 0;
        }
        nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s ease;
        }
        nav a:hover {
            color: var(--primary);
        }
        nav a:hover::after {
            width: 100%;
        }
        .mobile-menu-btn {
            display: none;
            font-size: 24px;
            background: none;
            border: none;
            cursor: pointer;
            color: var(--primary);
        }
        .mobile-menu {
            display: none;
            position: fixed;
            top: 70px;
            left: 0;
            right: 0;
            background: white;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .mobile-menu.active {
            display: block;
            animation: slideDown 0.3s ease-out;
        }
        .mobile-menu a {
            display: block;
            padding: 15px;
            text-decoration: none;
            color: var(--text);
            transition: all 0.3s ease;
            border-radius: 5px;
        }
        .mobile-menu a:hover {
            background: var(--light);
            color: var(--primary);
            transform: translateX(10px);
        }
        @keyframes slideDown {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .hero {
            background: var(--gradient);
            color: white;
            padding: 160px 0 100px;
            text-align: center;
            overflow: hidden;
            position: relative;
        }
        .hero-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
        }
        .hero-text {
            flex: 1;
            text-align: left;
        }
        .hero-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .hero-image img {
            max-width: 100%;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            transform: perspective(1000px) rotateY(-10deg);
            transition: transform 0.3s ease;
        }
        .hero-image img:hover {
            transform: perspective(1000px) rotateY(0deg);
        }
        @media (max-width: 768px) {
            .hero-content {
                flex-direction: column;
            }
            .hero-text {
                text-align: center;
            }
            .hero-image {
                order: -1;
            }
            .hero-image img {
                max-width: 80%;
                transform: none;
            }
        }
        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        .btn {
            display: inline-block;
            padding: 15px 40px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
            background: var(--primary);
            color: white;
            border: 2px solid transparent;
            cursor: pointer;
        }
        .btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            background: var(--secondary);
        }
        .btn:active {
            transform: translateY(-1px) scale(1.02);
            box-shadow: 0 5px 10px rgba(0,0,0,0.2);
        }
        .btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255,255,255,0.3), transparent);
            transform: translateX(-100%);
            transition: 0.6s;
        }
        .btn:hover::after {
            transform: translateX(100%);
        }
        .btn-primary {
            background: white;
            color: var(--primary);
            border: 2px solid var(--primary);
        }
        .btn-primary:hover {
            background: var(--primary);
            color: white;
            border-color: white;
        }
        .features {
            padding: 100px 0;
            background: var(--light);
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }
        .feature-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .feature-icon {
            font-size: 40px;
            margin-bottom: 20px;
        }
        .plans {
            padding: 100px 0;
            text-align: center;
        }
        .plans-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }
        .plan-card {
            background: var(--light);
            padding: 40px;
            border-radius: 10px;
            transition: transform 0.3s;
            border: 2px solid transparent;
        }
        .plan-card:hover {
            transform: translateY(-10px);
            border-color: var(--primary);
        }
        .price {
            font-size: 36px;
            font-weight: bold;
            color: var (--primary);
            margin: 20px 0;
        }
        .stats {
            padding: 80px 0;
            background: var(--gradient);
            color: white;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }
        .stat-item {
            text-align: center;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .stat-number {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 10px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease-out forwards;
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        footer {
            background: var (--text);
            color: white;
            padding: 50px 0;
            text-align: center;
        }
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 36px;
            }
            .mobile-menu-btn {
                display: block;
            }
            nav {
                display: none;
            }
        }
        .mobile-mockup {
            padding: 80px 0;
            background: white;
            overflow: hidden;
        }
        .mobile-mockup-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
        }
        .mobile-mockup-text {
            flex: 1;
        }
        .mobile-mockup-text h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .mobile-mockup-text p {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
        }
        .phone-wrapper {
            flex: 1;
            position: relative;
            padding: 20px;
        }
        .phone-frame {
            width: 300px;
            height: 600px;
            background: var(--text);
            border-radius: 40px;
            padding: 15px;
            position: relative;
            margin: 0 auto;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .phone-screen {
            background: white;
            height: 100%;
            border-radius: 25px;
            overflow: hidden;
            position: relative;
        }
        .phone-content {
            width: 100%;
            height: 100%;
            background: var(--gradient);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .phone-notch {
            width: 150px;
            height: 25px;
            background: var(--text);
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }
        @media (max-width: 768px) {
            .mobile-mockup-content {
                flex-direction: column;
            }
            .phone-wrapper {
                order: -1;
            }
            .phone-frame {
                width: 280px;
                height: 560px;
            }
        }
        .testimonials {
            padding: 100px 0;
            background: var(--light);
        }
        .testimonials h2 {
            text-align: center;
            margin-bottom: 50px;
        }
        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        .testimonial-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .testimonial-avatar {
            font-size: 40px;
            margin-bottom: 20px;
        }
        .testimonial-text {
            font-style: italic;
            margin-bottom: 20px;
            color: #666;
        }
        .testimonial-author {
            font-weight: bold;
        }
        .testimonial-role {
            color: var(--primary);
            font-size: 0.9em;
        }
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease-out;
        }
        .loading-screen.fade-out {
            opacity: 0;
            pointer-events: none;
        }
        .loader {
            width: 50px;
            height: 50px;
            border: 5px solid #fff;
            border-bottom-color: transparent;
            border-radius: 50%;
            animation: rotate 1s linear infinite;
        }
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .about {
            padding: 100px 0;
            background: white;
        }
        .about-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 50px;
            align-items: center;
        }
        .about-content h2 {
            font-size: 36px;
            margin-bottom: 25px;
            color: var(--text);
        }
        .about-content p {
            margin-bottom: 20px;
            color: #666;
            font-size: 18px;
        }
        .about-image {
            position: relative;
            padding: 20px;
        }
        .about-image img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .about-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 30px;
        }
        .about-stat {
            background: var(--light);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        .about-stat strong {
            display: block;
            font-size: 24px;
            color: var(--primary);
            margin-bottom: 5px;
        }
        @media (max-width: 768px) {
            .about-grid {
                grid-template-columns: 1fr;
            }
        }
        .pricing-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 30px;
        }
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }
        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }
        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        input:checked + .toggle-slider {
            background-color: var(--primary);
        }
        input:checked + .toggle-slider:before {
            transform: translateX(26px);
        }
        .countdown {
            background: var(--gradient);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            text-align: center;
        }
        .countdown-timer {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 15px;
        }
        .countdown-item {
            background: rgba(255,255,255,0.1);
            padding: 15px;
            border-radius: 8px;
            min-width: 80px;
        }
        .faq-item {
            border-bottom: 1px solid #eee;
            margin-bottom: 10px;
        }
        .faq-question {
            padding: 20px;
            cursor: pointer;
            position: relative;
            font-weight: 500;
        }
        .faq-answer {
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .faq-item.active .faq-answer {
            max-height: 200px;
            padding: 20px;
        }
        .partners-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }
        .partner-card {
            text-align: center;
            padding: 20px;
            border: 1px solid #eee;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .partner-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .partner-logo {
            font-size: 40px;
            margin-bottom: 10px;
        }
        .newsletter {
            background: var(--light);
            padding: 60px 0;
            text-align: center;
        }
        .newsletter-form {
            max-width: 500px;
            margin: 30px auto;
            display: flex;
            gap: 10px;
        }
        .newsletter-form input {
            flex: 1;
            padding: 15px;
            border: 2px solid transparent;
            border-radius: 30px;
            font-size: 16px;
        }
        .newsletter-form input:focus {
            border-color: var(--primary);
            outline: none;
        }
        footer {
            background: var(--text);
            color: white;
            padding: 50px 0;
        }
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }
        .footer-section h3 {
            margin-bottom: 20px;
            font-size: 18px;
        }
        .footer-links {
            list-style: none;
            padding: 0;
        }
        .footer-links li {
            margin-bottom: 10px;
        }
        .footer-links a {
            color: #fff;
            text-decoration: none;
            opacity: 0.8;
            transition: opacity 0.3s;
        }
        .footer-links a:hover {
            opacity: 1;
        }
        .footer-bottom {
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }
        .social-links {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-bottom: 20px;
        }
        .social-links a {
            color: white;
            text-decoration: none;
            font-size: 20px;
            opacity: 0.8;
            transition: opacity 0.3s;
        }
        .social-links a:hover {
            opacity: 1;
        }
        .faq-section {
            padding: 80px 0;
            background: var(--light);
        }
        .faq-header {
            text-align: center;
            margin-bottom: 50px;
        }
        .faq-header h2 {
            font-size: 36px;
            color: var(--text);
            margin-bottom: 15px;
        }
        .faq-header p {
            color: #666;
            font-size: 18px;
            max-width: 600px;
            margin: 0 auto;
        }
        .faq-categories {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }
        .faq-category-btn {
            padding: 12px 24px;
            border: none;
            background: white;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 500;
            color: var(--text);
            transition: all 0.3s ease;
        }
        .faq-category-btn.active {
            background: var(--primary);
            color: white;
        }
        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }
        .faq-category-content {
            display: none;
        }
        .faq-category-content.active {
            display: block;
            animation: fadeIn 0.5s ease-out;
        }
        .faq-item {
            background: white;
            border-radius: 10px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .faq-question {
            padding: 20px;
            cursor: pointer;
            position: relative;
            font-weight: 500;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .faq-question::after {
            content: '+';
            font-size: 20px;
            transition: transform 0.3s ease;
        }
        .faq-item.active .faq-question::after {
            transform: rotate(45deg);
        }
        .faq-answer {
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
            opacity: 0;
        }
        .faq-item.active .faq-answer {
            padding: 0 20px 20px;
            max-height: 1000px;
            opacity: 1;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .top-menu-bar {
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
            padding: 10px 0;
        }
        .top-menu {
            display: flex;
            justify-content: center;
            gap: 30px;
        }
        .top-menu-item {
            position: relative;
            padding: 5px 0;
        }
        .top-menu-trigger {
            color: var(--text);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .top-menu-trigger:after {
            content: '▼';
            font-size: 8px;
            margin-top: 2px;
            transition: transform 0.3s ease;
        }
        .top-menu-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            width: 260px;
            padding: 10px 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.3s ease;
            z-index: 1000;
        }
        .top-menu-item:hover .top-menu-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .top-menu-dropdown a {
            display: block;
            padding: 8px 20px;
            color: var(--text);
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s ease;
        }
        .top-menu-dropdown a:hover {
            background: var(--light);
            color: var(--primary);
            padding-left: 25px;
        }
        @media (max-width: 768px) {
            .top-menu-bar {
                display: none;
            }
        }
        .highlights {
            padding: 80px 0;
            background: var(--light);
        }
        .highlights-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            text-align: center;
        }
        .highlight-item {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .highlight-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .highlight-icon {
            font-size: 30px;
            margin-bottom: 10px;
        }
        .integrations {
            padding: 80px 0;
            background: var(--light);
        }
        .integrations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            text-align: center;
        }
        .integration-card {
            background: var(--light);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .integration-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .integration-icon {
            font-size: 30px;
            margin-bottom: 10px;
        }
        .credit-section {
            padding: 100px 0;
            background: var(--light);
        }
        .credit-features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin: 50px 0;
        }
        .credit-feature-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .credit-feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .credit-demo {
            text-align: center;
            margin-top: 50px;
        }
        .credit-demo img {
            max-width: 100%;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .education-section {
            padding: 100px 0;
            background: white;
        }
        .education-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }
        .education-card {
            background: var(--light);
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s ease;
        }
        .education-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .education-icon {
            font-size: 40px;
            margin-bottom: 20px;
        }
        .app-features-section {
            padding: 100px 0;
            background: var(--gradient);
            color: white;
        }
        .app-features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin: 50px 0;
        }
        .app-feature-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        .app-feature-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.2);
        }
        .app-store-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 50px;
        }
        .store-button img {
            height: 60px;
            transition: transform 0.3s ease;
        }
        .store-button:hover img {
            transform: scale(1.05);
        }
        .section-desc {
            text-align: center;
            font-size: 1.2em;
            color: #666;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-screen">
        <div class="loader"></div>
    </div>

    <!-- Top Menu -->
    <div class="top-menu-bar">
        <div class="container">
            <div class="top-menu">
                <?php foreach($top_menu as $key => $menu): ?>
                    <div class="top-menu-item">
                        <span class="top-menu-trigger"><?php echo $menu['title']; ?></span>
                        <div class="top-menu-dropdown">
                            <?php foreach($menu['items'] as $item): ?>
                                <a href="<?php echo $item['url']; ?>"><?php echo $item['name']; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header>
        <div class="container header-content">
            <div class="logo">FN Cash</div>
            <nav>
                <a href="#recursos">Recursos</a>
                <a href="#planos">Planos</a>
                <a href="#sobre">Sobre</a>
                <a href="bancos.php">Bancos</a>
                <a href="#entrar">Entrar</a>
            </nav>
            <button class="mobile-menu-btn">☰</button>
        </div>
        <div class="mobile-menu">
            <a href="#recursos">Recursos</a>
            <a href="#planos">Planos</a>
            <a href="#sobre">Sobre</a>
            <a href="bancos.php">Bancos</a>
            <a href="#entrar">Entrar</a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container hero-content">
            <div class="hero-text">
                <h1>Controle suas finanças<br>de forma inteligente</h1>
                <p>O app de finanças pessoais mais completo do Brasil</p>
                <p class="hero-quote">"Transforme seus sonhos em metas, e suas metas em realidade financeira"</p>
                <div class="security-badge">
                    <span>🔒</span>
                    <p>Seus dados estão protegidos com criptografia de nível bancário</p>
                </div>
                <a href="#comecar" class="btn btn-primary">Começar Gratuitamente</a>
            </div>
            <div class="hero-image">
                <img src="https://placehold.co/400x500" alt="Pessoa usando FN Cash">
            </div>
        </div>
    </section>

    <!-- Navigation Buttons Section -->
    <section class="navigation-buttons" style="padding: 40px 0; background: var(--light);">
        <div class="container">
            <div class="nav-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                <a href="economizar.php" class="nav-button" style="display: block; padding: 20px; text-align: center; background: white; border-radius: 10px; text-decoration: none; color: var(--text); box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                    <div style="font-size: 30px; margin-bottom: 10px;">💰</div>
                    <h3 style="margin-bottom: 10px;">Como Economizar</h3>
                    <p>Aprenda estratégias eficientes para economizar dinheiro</p>
                </a>
                
                <a href="dividas.php" class="nav-button" style="display: block; padding: 20px; text-align: center; background: white; border-radius: 10px; text-decoration: none; color: var(--text); box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                    <div style="font-size: 30px; margin-bottom: 10px;">📊</div>
                    <h3 style="margin-bottom: 10px;">Gestão de Dívidas</h3>
                    <p>Organize e quite suas dívidas de forma inteligente</p>
                </a>
                
                <a href="bancos.php" class="nav-button" style="display: block; padding: 20px; text-align: center; background: white; border-radius: 10px; text-decoration: none; color: var(--text); box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                    <div style="font-size: 30px; margin-bottom: 10px;">🏦</div>
                    <h3 style="margin-bottom: 10px;">Bancos e Investimentos</h3>
                    <p>Compare bancos e encontre as melhores opções</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="recursos">
        <div class="container">
            <h2>Recursos Principais</h2>
            <div class="features-grid">
                <?php foreach($features as $feature): ?>
                    <div class="feature-card">
                        <div class="feature-icon"><?php echo $feature['icon']; ?></div>
                        <h3><?php echo $feature['title']; ?></h3>
                        <p><?php echo $feature['desc']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <?php foreach($stats as $stat): ?>
                    <div class="stat-item">
                        <div class="stat-number"><?php echo $stat['number']; ?></div>
                        <div class="stat-label"><?php echo $stat['label']; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="plans" id="planos">
        <div class="container">
            <h2>Escolha seu plano</h2>
            <div class="pricing-toggle">
                <span>Mensal</span>
                <label class="toggle-switch">
                    <input type="checkbox" id="billing-toggle">
                    <span class="toggle-slider"></span>
                </label>
                <span>Anual</span>
            </div>
            
            <!-- Countdown Timer -->
            <div class="countdown">
                <h3>Promoção especial! Termina em:</h3>
                <div class="countdown-timer">
                    <div class="countdown-item">
                        <span id="days">00</span>
                        <p>Dias</p>
                    </div>
                    <div class="countdown-item">
                        <span id="hours">00</span>
                        <p>Horas</p>
                    </div>
                    <div class="countdown-item">
                        <span id="minutes">00</span>
                        <p>Minutos</p>
                    </div>
                    <div class="countdown-item">
                        <span id="seconds">00</span>
                        <p>Segundos</p>
                    </div>
                </div>
            </div>

            <div class="plans-grid" id="plans-container">
                <!-- Plans will be dynamically populated -->
            </div>
        </div>
    </section>

    <!-- Mobile Mockup Section -->
    <section class="mobile-mockup">
        <div class="container">
            <div class="mobile-mockup-content">
                <div class="mobile-mockup-text">
                    <h2>Seu dinheiro na palma da mão</h2>
                    <p>Acesse suas finanças de qualquer lugar, a qualquer momento. Nossa interface responsiva garante a melhor experiência em qualquer dispositivo.</p>
                </div>
                <div class="phone-wrapper">
                    <div class="phone-frame">
                        <div class="phone-screen">
                            <div class="phone-notch"></div>
                            <div class="phone-content">
                                <h3>FN Cash</h3>
                                <p>Suas finanças simplificadas</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="sobre">
        <div class="container">
            <div class="about-grid">
                <div class="about-content">
                    <h2>Sobre o FN Cash</h2>
                    <p>Somos uma empresa dedicada a transformar a maneira como as pessoas gerenciam suas finanças pessoais. Fundada em 2020, nossa missão é simplificar o controle financeiro e ajudar nossos usuários a alcançarem seus objetivos.</p>
                    <p>Com uma equipe especializada em tecnologia e finanças, desenvolvemos soluções inovadoras que já ajudaram mais de 100 mil pessoas a conquistarem sua independência financeira.</p>
                    <div class="about-stats">
                        <div class="about-stat">
                            <strong>2020</strong>
                            <span>Ano de fundação</span>
                        </div>
                        <div class="about-stat">
                            <strong>50+</strong>
                            <span>Profissionais</span>
                        </div>
                    </div>
                    <div style="margin-top: 30px;">
                        <a href="#contato" class="btn btn-primary">Entre em Contato</a>
                    </div>
                </div>
                <div class="about-image">
                    <img src="https://placehold.co/600x400" alt="Equipe FN Cash">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <h2>O que nossos clientes dizem</h2>
            <div class="testimonials-grid">
                <?php foreach($testimonials as $testimonial): ?>
                    <div class="testimonial-card">
                        <div class="testimonial-avatar"><?php echo $testimonial['avatar']; ?></div>
                        <p class="testimonial-text"><?php echo $testimonial['text']; ?></p>
                        <div class="testimonial-author"><?php echo $testimonial['name']; ?></div>
                        <div class="testimonial-role"><?php echo $testimonial['role']; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section" id="faq">
        <div class="container">
            <div class="faq-header">
                <h2>Encontre respostas para suas perguntas</h2>
                <p>Tudo que você precisa saber sobre o FN Cash e como ele pode ajudar você a alcançar seus objetivos financeiros.</p>
            </div>
            
            <div class="faq-categories">
                <?php foreach($faqs as $key => $category): ?>
                    <button class="faq-category-btn" data-category="<?php echo $key; ?>">
                        <?php echo $category['title']; ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <div class="faq-container">
                <?php foreach($faqs as $key => $category): ?>
                    <div class="faq-category-content" id="<?php echo $key; ?>">
                        <?php foreach($category['questions'] as $item): ?>
                            <div class="faq-item">
                                <div class="faq-question">
                                    <?php echo $item['question']; ?>
                                </div>
                                <div class="faq-answer">
                                    <?php echo $item['answer']; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="partners">
        <div class="container">
            <h2>Nossos Parceiros</h2>
            <div class="partners-grid">
                <?php foreach($partners as $partner): ?>
                    <div class="partner-card">
                        <div class="partner-logo"><?php echo $partner['logo']; ?></div>
                        <h3><?php echo $partner['name']; ?></h3>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter">
        <div class="container">
            <h2>Fique por dentro das novidades</h2>
            <p>Receba dicas financeiras e atualizações do FN Cash</p>
            <form class="newsletter-form" id="newsletter-form">
                <input type="email" placeholder="Seu melhor e-mail" required>
                <button type="submit" class="btn">Inscrever-se</button>
            </form>
        </div>
    </section>

    <!-- Highlights Section -->
    <section class="highlights">
        <div class="container">
            <div class="highlights-grid">
                <?php foreach($highlights as $highlight): ?>
                    <div class="highlight-item animate-float">
                        <span class="highlight-icon"><?php echo $highlight['icon']; ?></span>
                        <p><?php echo $highlight['text']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Integrations Section -->
    <section class="integrations">
        <div class="container">
            <h2>Integrações Disponíveis</h2>
            <div class="integrations-grid">
                <?php foreach($integrations as $integration): ?>
                    <div class="integration-card">
                        <div class="integration-icon"><?php echo $integration['icon']; ?></div>
                        <h3><?php echo $integration['name']; ?></h3>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>FN Cash</h3>
                    <p>Transformando sua relação com o dinheiro através da tecnologia e educação financeira.</p>
                </div>
                <div class="footer-section">
                    <h3>Links Úteis</h3>
                    <ul class="footer-links">
                        <li><a href="#recursos">Recursos</a></li>
                        <li><a href="#planos">Planos</a></li>
                        <li><a href="#sobre">Sobre</a></li>
                        <li><a href="#contato">Contato</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contato</h3>
                    <ul class="footer-links">
                        <li><a href="mailto:contato@fncash.com">contato@fncash.com</a></li>
                        <li><a href="tel:+5511999999999">+55 11 99999-9999</a></li>
                    </ul>
                    <div class="social-links">
                        <a href="#">📱</a>
                        <a href="#">💻</a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> FN Cash. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="js/main.js"></script>
    <script src="js/landing.js"></script>
    <script>
        // Mobile Menu Toggle
        document.querySelector('.mobile-menu-btn').addEventListener('click', () => {
            document.querySelector('.mobile-menu').classList.toggle('active');
        });

        // Animação dos números
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationDelay = entry.target.dataset.delay;
                    entry.target.style.animationPlayState = 'running';
                }
            });
        });

        document.querySelectorAll('.stat-number').forEach((stat, index) => {
            stat.dataset.delay = `${index * 0.2}s`;
            observer.observe(stat);
        });

        // Loading Screen
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                document.querySelector('.loading-screen').classList.add('fade-out');
            }, 1500);

            // Inicializa FAQ
            initializeFAQ();
        });

        // Pricing Toggle
        const billingToggle = document.getElementById('billing-toggle');
        const plansContainer = document.getElementById('plans-container');

        function updatePlans(isAnnual) {
            const currentPlans = isAnnual ? <?php echo json_encode($annual_plans); ?> : <?php echo json_encode($plans); ?>;
            plansContainer.innerHTML = currentPlans.map(plan => `
                <div class="plan-card">
                    <h3>${plan.name}</h3>
                    <div class="price">R$ ${plan.price}</div>
                    ${plan.savings ? `<div class="savings">Economia de ${plan.savings}</div>` : ''}
                    <ul>
                        ${plan.features.map(feature => `<li>${feature}</li>`).join('')}
                    </ul>
                    <a href="#assinar" class="btn btn-primary">Escolher Plano</a>
                </div>
            `).join('');
        }

        billingToggle.addEventListener('change', (e) => {
            updatePlans(e.target.checked);
        });

        // Initialize plans
        updatePlans(false);

        // Countdown Timer
        function updateCountdown() {
            const endDate = new Date();
            endDate.setDate(endDate.getDate() + 3);
            const now = new Date().getTime();
            const distance = endDate.getTime() - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('days').innerHTML = String(days).padStart(2, '0');
            document.getElementById('hours').innerHTML = String(hours).padStart(2, '0');
            document.getElementById('minutes').innerHTML = String(minutes).padStart(2, '0');
            document.getElementById('seconds').innerHTML = String(seconds).padStart(2, '0');
        }

        // Update countdown every second
        setInterval(updateCountdown, 1000);
        updateCountdown();

        // FAQ Functionality
        function initializeFAQ() {
            const categoryButtons = document.querySelectorAll('.faq-category-btn');
            const categoryContents = document.querySelectorAll('.faq-category-content');
            const faqItems = document.querySelectorAll('.faq-item');

            // Set initial active category
            categoryButtons[0].classList.add('active');
            categoryContents[0].classList.add('active');

            // Category switching
            categoryButtons.forEach(button => {
                button.addEventListener('click', () => {
                    categoryButtons.forEach(btn => btn.classList.remove('active'));
                    categoryContents.forEach(content => content.classList.remove('active'));

                    button.classList.add('active');
                    const category = button.dataset.category;
                    document.getElementById(category).classList.add('active');
                });
            });

            // FAQ accordion
            faqItems.forEach(item => {
                item.querySelector('.faq-question').addEventListener('click', () => {
                    const isActive = item.classList.contains('active');
                    
                    faqItems.forEach(faqItem => {
                        faqItem.classList.remove('active');
                    });

                    if (!isActive) {
                        item.classList.add('active');
                    }
                });
            });
        }

        // Newsletter Form
        document.getElementById('newsletter-form').addEventListener('submit', (e) => {
            e.preventDefault();
            const email = e.target.querySelector('input[type="email"]').value;
            alert(`Obrigado por se inscrever! Em breve você receberá nossas novidades em ${email}`);
            e.target.reset();
        });

        // Navigation buttons hover effect
        document.querySelectorAll('.nav-button').forEach(button => {
            button.addEventListener('mouseenter', () => {
                button.style.transform = 'translateY(-5px)';
            });
            button.addEventListener('mouseleave', () => {
                button.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>
