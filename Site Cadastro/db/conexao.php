<?php
    // variáveis de conexão para o banco de dados
    $host = "10.68.45.25";
    $user = "senac";
    $pass = "senac123";
    $bd = "atividades";
    $conexao = new mysqli($host, $user, $pass, $bd);
    if ($conexao->connect_error) {
        die("Conexão falhou: ". $conexao->connect_error);
    }
?>