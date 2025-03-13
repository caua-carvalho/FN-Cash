<?php
session_start();
require 'conexao.php';

$error = '';
$success = '';
$user_input = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_input = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($user_input) || empty($password)) {
        $error = "Todos os campos são obrigatórios.";
    } else {
        $stmt = $conexao->prepare("SELECT * FROM usuario WHERE email_usuario = ? OR nm_usuario = ?");
        $stmt->bind_param("ss", $user_input, $user_input);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();

        if ($usuario && password_verify($password, $usuario['senha_usuario'])) {
            $_SESSION['id'] = $usuario['id_usuario'];
            $_SESSION['nome'] = $usuario['nm_usuario'];
            header("Location: pages/dashboard.php");
            exit();
        } else {
            $error = "Credenciais inválidas.";
        }
        $stmt->close();
    }
}
?>

<?php require_once "header.php"; ?>
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
    .login-container {
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
    .btn-login {
        width: 100%;
        padding: 12px;
        background-color: var(--primary);
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .btn-login:hover {
        background-color: var(--secondary);
        transform: translateY(-2px);
    }
    .register-link {
        text-align: center;
        margin-top: 20px;
    }
    .register-link a {
        color: var(--primary);
        text-decoration: none;
    }
    .register-link a:hover {
        color: var(--secondary);
    }
    .error {
        color: red;
        margin-bottom: 15px;
        text-align: center;
        padding: 8px;
        background-color: #ffebee;
        border-radius: 4px;
    }
</style>

<body>
    <div class="login-container">
        <a href="index.php" style="display: block; text-align: center; margin-bottom: 20px;" class="d-flex justify-content-center align-items-center">
            <img src="img/logo.svg" alt="FN Cash Logo" style="height: 90px; width: auto;">
        </a>

        <h2 style="text-align: center;">Login</h2>

        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email ou Nome de Usuário</label>
                <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($user_input); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn-login">Entrar</button>
        </form>
        <div class="register-link">
            <p>Não tem uma conta? <a href="register.php">Registre-se</a></p>
        </div>
    </div>
</body>
</html>