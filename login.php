<?php
include "conexao.php";

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
        $stmt = $conn->prepare("INSERT INTO usuario (nm_usuario, email_usuario, senha_usuario) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $email, $senha_hash);
        
        if ($stmt->execute()) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário: " . $stmt->error;
        }
    }
}
?>