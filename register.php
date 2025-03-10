<?php
session_start();
require 'conexao.php';

$error = "";
$sucesso = "";
$nome = "";
$email = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($nome) || empty($email) || empty($password)) {
        $error = "Todos os campos são obrigatórios.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "E-mail inválido.";
    } else {
        // Verifica se o email já existe
        $stmt = $conexao->prepare("SELECT id_usuario FROM usuario WHERE email_usuario = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "Este e-mail já está cadastrado.";
        } else {
            // Insere novo usuário
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conexao->prepare("INSERT INTO usuario (nm_usuario, email_usuario, senha_usuario) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nome, $email, $hashed_password);
            
            if ($stmt->execute()) {
                $sucesso = "Registro realizado com sucesso!";
                $nome = $email = '';
            } else {
                $error = "Erro ao registrar usuário.";
            }
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro - FN Cash</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/auth.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-image">
            <img src="img/financas.jpg" alt="Finanças Ilustração">
        </div>
        <div class="auth-box">
            <div class="logo">
                <a href="Index.php">
                    <img src="img/logo.jpg" alt="FN Cash Logo">
                </a>
            </div>
            
            <?php if ($error): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <?php if ($sucesso): ?>
                <div class="success"><?php echo $sucesso; ?></div>
            <?php endif; ?>

            <h2>Crie sua conta grátis</h2>
            <p class="auth-subtitle">Comece a controlar suas finanças hoje mesmo</p>
            
            <form method="POST">
                <div class="form-group">
                    <label for="name">Nome completo</label>
                    <input type="text" id="name" name="name" 
                           value="<?php echo htmlspecialchars($nome); ?>" 
                           placeholder="Digite seu nome completo">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" id="email" name="email" 
                           value="<?php echo htmlspecialchars($email); ?>" 
                           placeholder="Digite seu melhor email">
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" 
                           placeholder="Mínimo 6 caracteres">
                </div>

                <button type="submit" class="btn">Criar conta gratuita</button>
            </form>
            
            <div class="register-link">
                <a href="login.php">Já tem uma conta? Faça login</a>
            </div>
        </div>
    </div>
</body>
</html>
