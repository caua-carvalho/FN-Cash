<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

// Configurações do banco de dados
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'fn_cash';

// Inicializa variáveis
$error = '';
$success = '';
$user_input = '';

// Processa o formulário quando enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_input = trim($_POST['user_input'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validação
    if (empty($user_input) || empty($password)) {
        $error = "Todos os campos são obrigatórios.";
    } else {
        try {
            $conn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Verifica se o input é email ou nome
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR name = ?");
            $stmt->execute([$user_input, $user_input]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Credenciais inválidas.";
            }
        } catch(PDOException $e) {
            $error = "Erro de conexão: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - FN Cash</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/auth.css">
    <link rel="stylesheet" href="css/animations.css">  <!-- Adicionar esta linha -->
</head>
<body class="bg-light">
    <div class="auth-container">
        <div class="auth-image">
            <img src="img/financas.jpg" alt="Finanças Ilustração" class="img-fluid">
        </div>
        <div class="auth-box shadow-sm">
            <div class="logo">
                <a href="Index.php">
                    <img src="img/logo.jpg" alt="FN Cash Logo">
                </a>
            </div>
            
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
