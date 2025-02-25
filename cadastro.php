<?php
include 'conexao.php';
include 'funcoes.php';

$exibirErro = false;

if (isset($_GET['email']) && $_GET['email'] == "existente") {
    $exibirErro = true;
} 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (verificar_email($conn, $email)) {
        header("Location: cadastro.php?email=existente");
        exit();
    } else {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO usuario (nm_user, email_user, senha_user) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $email, $senha_hash);
        
        if ($stmt->execute()) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Overlay escuro */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1050;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        /* Card de erro */
        .error-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            max-width: 300px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transform: translateY(-20px);
            transition: transform 0.3s ease-in-out;
        }

        .overlay.show {
            display: flex;
            opacity: 1;
        }

        .error-card.show {
            transform: translateY(0);
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Cadastro</h5>
                <form action="cadastro.php" method="POST">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome de Usuário</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome">
                    </div>
                    <div class="mb-3">
                        <label for="gmail" class="form-label">Gmail</label>
                        <input type="email" class="form-control" id="gmail" name="email" placeholder="Digite seu Gmail">
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha">
                    </div>
                    <button type="submit" class="btn btn-success w-100">Cadastrar</button>
                    <div class="d-flex justify-content-center mt-3">
                        <a href="index.php" class="text-decoration-none">Já tem uma conta? Faça login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Overlay para erro -->
    <div class="overlay" id="overlay">
        <div class="error-card">
            <h5 class="text-danger">Erro!</h5>
            <p>Email já cadastrado. Tente outro.</p>
            <button class="btn btn-danger" onclick="fecharErro()">Fechar</button>
        </div>
    </div>

    <script>
        function fecharErro() {
            let overlay = document.getElementById('overlay');
            overlay.style.opacity = "0";
            setTimeout(() => { overlay.style.display = "none"; }, 300);
            window.history.pushState({}, "", "cadastro.php"); // Remove o parâmetro da URL
        }

        // Exibir o erro automaticamente com animação
        document.addEventListener("DOMContentLoaded", function() {
            <?php if ($exibirErro): ?>
                let overlay = document.getElementById('overlay');
                overlay.style.display = "flex";
                setTimeout(() => { overlay.classList.add("show"); }, 10);
            <?php endif; ?>
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
