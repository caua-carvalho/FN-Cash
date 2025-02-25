<?php
include "conexao.php";

function verificar_email($conn, $email) {
    $sql = "SELECT id_user FROM usuario WHERE email_user = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die("Erro na preparação da query: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows > 0; // Retorna true se o email já existir
}
?>
