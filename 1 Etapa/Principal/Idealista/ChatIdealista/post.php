<?php
// Conectar ao banco de dados (substitua com suas credenciais)
include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php'; // Conexão com o banco de dados


$con = new mysqli($host, $usuario, $Senha, $banco);

// Verificar a conexão
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Receber dados do formulário
$titulo = $_POST['title'];
$comentarios = $_POST['content'];

// Inserir postagem no banco de dados
$sql = "INSERT INTO comentarios (titulo, comentarios) VALUES ('$titulo', '$comentarios')";

if ($con->query($sql) === TRUE) {
    echo "<script>
                    window.location.href = 'http://localhost/nextinvest/1%20Etapa/Principal/Idealista/ChatIdealista/ChatIdealista.php';
                    alert('Postagem publicada com sucesso!');
                </script>";
} else {
    echo "Erro ao publicar a postagem: " . $con->error;
}

$con->close();
?>