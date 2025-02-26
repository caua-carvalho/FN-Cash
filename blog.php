<?php
require_once 'config.php';

$blog_categories = [
    'Finanças Pessoais',
    'Investimentos',
    'Economia',
    'Dicas',
    'Educação Financeira'
];

$blog_posts = [
    [
        'image' => 'https://placehold.co/600x400',
        'category' => 'Finanças Pessoais',
        'title' => 'Como organizar suas finanças em 5 passos',
        'excerpt' => 'Aprenda as principais estratégias para organizar sua vida financeira e conquistar seus objetivos.',
        'author' => 'João Silva',
        'date' => '10/03/2024',
        'author_image' => 'https://placehold.co/100x100'
    ],
    [
        'image' => 'https://placehold.co/600x400',
        'category' => 'Investimentos',
        'title' => 'Guia completo sobre investimentos para iniciantes',
        'excerpt' => 'Descubra como começar a investir seu dinheiro de forma inteligente e segura.',
        'author' => 'Maria Santos',
        'date' => '09/03/2024',
        'author_image' => 'https://placehold.co/100x100'
    ],
    // Add more blog posts here
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog FN Cash - Educação Financeira</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="blog-header">
        <div class="container">
            <h1>Blog FN Cash</h1>
            <p>Aprenda a cuidar melhor do seu dinheiro</p>
        </div>
    </header>

    <main class="container">
        <div class="blog-layout" style="display: grid; grid-template-columns: 1fr 300px; gap: 30px; padding: 40px 0;">
            <div class="blog-grid">
                <?php foreach($blog_posts as $post): ?>
                    <article class="blog-card">
                        <img src="<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>" class="blog-image">
                        <div class="blog-content">
                            <div class="blog-category"><?php echo $post['category']; ?></div>
                            <h2 class="blog-title"><?php echo $post['title']; ?></h2>
                            <p class="blog-excerpt"><?php echo $post['excerpt']; ?></p>
                            <div class="blog-meta">
                                <img src="<?php echo $post['author_image']; ?>" alt="<?php echo $post['author']; ?>">
                                <span><?php echo $post['author']; ?> • <?php echo $post['date']; ?></span>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <aside class="blog-sidebar">
                <div class="blog-search">
                    <input type="text" placeholder="Pesquisar no blog...">
                </div>
                
                <h3>Categorias</h3>
                <ul class="blog-categories">
                    <?php foreach($blog_categories as $category): ?>
                        <li><?php echo $category; ?></li>
                    <?php endforeach; ?>
                </ul>
            </aside>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
