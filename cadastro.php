<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Preparar e executar a consulta SQL
    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senha);
    $stmt->execute();

    echo 'Usuário cadastrado com sucesso!';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Cadastro</h5>
                <form>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome de Usuário</label>
                        <input type="text" class="form-control" id="nome" name="nome"
                            placeholder="Digite seu nome de usuário">
                    </div>
                    <div class="mb-3">
                        <label for="gmail" class="form-label">Gmail</label>
                        <input type="email" class="form-control" id="gmail" name="email" placeholder="Digite seu Gmail">
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha"
                            placeholder="Digite sua senha">
                    </div>
                    <button type="submit" class="btn btn-success w-100">Cadastrar</button>
                    <div class="d-flex justify-content-center mt-3">
                        <a href="index.php" class="text-decoration-none">Já tem uma conta? Faça login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>