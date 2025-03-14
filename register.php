<?php
session_start();
require 'conexao.php';
require 'header.php';

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

<style>
    :root {
        --primary: #07A262;
        --secondary: #4E997E;
        --accent: #055336;
        --text: #043821;
        --light: #FAFAFA;
        --gradient: linear-gradient(135deg, #07A262, #4E997E, #055336);
    }
    body {
        font-family: Arial, sans-serif;
        background: var(--gradient);
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
    .register-container {
        background: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0,0,0,0.2);
        width: 100%;
        max-width: 400px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: var(--text);
    }
    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }
    .btn-register {
        width: 100%;
        padding: 12px;
        background-color: var(--primary);
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .btn-register:hover {
        background-color: var(--secondary);
        transform: translateY(-2px);
    }
    .login-link {
        text-align: center;
        margin-top: 20px;
    }
    .login-link a {
        color: var(--primary);
        text-decoration: none;
    }
    .login-link a:hover {
        color: var(--secondary);
    }
</style>

<body>
    <div class="register-container m-5">
        <a href="index.php" style="display: block; text-align: center; margin-bottom: 20px;" class="d-flex justify-content-center align-items-center">
            <img src="img/logo.svg" alt="FN Cash Logo" style="height: 90px; width: auto;">
        </a>
        <h2 style="text-align: center;">Criar Conta</h2>

        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <?php if ($sucesso): ?>
            <div class="success"><?php echo $sucesso; ?></div>
        <?php endif; ?>

        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="name">Nome Completo</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn-register">Criar Conta</button>
        </form>
        <div class="login-link">
            <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
        </div>
    </div>
</body>
</html>
