<?php
// Conectar ao banco de dados (substitua com suas credenciais)
include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php'; // Conexão com o banco de dados
       
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "nextinvert";

$con = new mysqli($host, $usuario, $senha, $banco);

// Verificar a conexão
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Obter comentários do banco de dados (substitua 'comments' pelo nome da tabela de comentários)
$post_id = $sql = "SELECT * FROM comentarios WHERE post_id";
$result = $con->query($sql);

// Exibir comentários
if ($result === false) {
    die("Erro na consulta: " . $con->error);
} elseif ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='comment'>";
        echo "<p>" . $row["comentarios"] . "</p>";
        echo "</div>";
    }
} else {
    echo "Nenhum comentário encontrado.";
}

$con->close();
?>