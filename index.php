<?php
include "conexao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Verificação se é email
    if (strpos($nome, "@") !== false) {
        // Preparar a consulta para email
        $stmt = $conn->prepare("SELECT email_usuario, senha_usuario FROM usuario WHERE email_usuario = ?;");
        $stmt->bind_param("s", $nome);
    } else {
        // Preparar a consulta para nome de usuário
        $stmt = $conn->prepare("SELECT nm_usuario, senha_usuario FROM usuario WHERE nm_usuario = ?;");
        $stmt->bind_param("s", $nome);
    }

    // Executar e obter o resultado
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verificar a senha com password_verify (caso a senha esteja criptografada)
        if ($row['senha_usuario'] == $senha) {
            echo "Usuário autenticado com sucesso!";
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Usuário não encontrado!";
    }
    
    $stmt->close();  // Fechar a declaração
    $conn->close();  // Fechar a conexão
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Login</h5>
                <form action="index.php" method="POST">
                    <div class="mb-3">
                        <label for="gmail" class="form-label">Gmail</label>
                        <input class="form-control" id="gmail" name="usuario" placeholder="Digite seu Gmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    <div class="d-flex justify-content-center mt-3">
                        <a href="cadastro.php" class="text-decoration-none">Ainda não tem uma conta? Cadastre-se</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
