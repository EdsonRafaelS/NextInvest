<?php
// Conectar ao banco de dados (substitua com suas credenciais)
include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php'; // Conexão com o banco de dados


// Verificar a conexão
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Receber dados do formulário
$post_id = isset($_POST['post_id']) ? $_POST['post_id'] : null;
$comentarios = isset($_POST['comentarios']) ? $_POST['comentarios'] : null;

// Verificar se os campos obrigatórios foram preenchidos
if ($post_id === null || $comentarios === null) {
    echo "Erro: Post_id ou Comentários não foram fornecidos.";
    exit();
}

// Inserir comentário no banco de dados
$sql = "INSERT INTO comentarios (post_id, comentarios) VALUES ('$post_id', '$comentarios')";

if ($con->query($sql) === TRUE) {
    echo "Comentário adicionado com sucesso!";
} else {
    echo "Erro ao adicionar comentário: " . $con->error;
}

$con->close();
?>