<?php
require "conexao.php";

function cadastro_dispesa(){
    $stmt = $conexao->prepare("SELECT id_usuario FROM usuario WHERE email_usuario = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
}

?>