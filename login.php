<?php
session_start();
require 'conexao.php'; // Inclua seu arquivo de conexão

$error = '';
$success = '';
$user_input = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_input = trim($_POST['user_input'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($user_input) || empty($password)) {
        $error = "Todos os campos são obrigatórios.";
    } else {
        $stmt = $conexao->prepare("SELECT * FROM usuario WHERE email_usuario = ? OR nm_usuario = ?");
        $stmt->bind_param("ss", $user_input, $user_input);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();

        if ($usuario && password_verify($password, $usuario['senha_usuario'])) { // Verifique o nome correto da coluna
            $_SESSION['id'] = $usuario['id_usuario'];
            $_SESSION['nome'] = $usuario['nm_usuario'];
            header("Location: pages/home.php"); // Redirecionamento corrigido
            exit();
        } else {
            $error = "Credenciais inválidas.";
        }
        $stmt->close();
    }
}
?>

<?php require_once "header.php"; ?>

<head>
    <title>Login - FN Cash</title>
</head>
<body class="bg-light">
    <div class="auth-container">
        <div class="auth-image">
            <img src="img/financas.jpg" alt="Finanças Ilustração" class="img-fluid">
        </div>
        <?php require_once "navbar.php"; ?>
        <div class="auth-box shadow-sm">
            
            
            <?php if ($error): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>

            <h2>Bem-vindo de volta!</h2>
            <p class="auth-subtitle">Faça login para continuar</p>
            
            <form method="POST">
                <div class="form-group">
                    <label for="user_input">Email ou Nome de Usuário</label>
                    <input type="text" id="user_input" name="user_input" 
                           value="<?php echo htmlspecialchars($user_input); ?>" 
                           placeholder="Digite seu email ou nome">
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" 
                           placeholder="Digite sua senha">
                </div>

                <button type="submit" class="btn">Entrar</button>
            </form>
            
            <div class="register-link">
                <a href="register.php">Ainda não tem uma conta? Cadastre-se gratuitamente</a>
            </div>
        </div>
    </div>
</body>
</html>
