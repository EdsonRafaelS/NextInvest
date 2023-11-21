<link rel="stylesheet" href="stylesInvestidor.css">

<?php
// Conectar ao banco de dados (substitua com suas credenciais)
include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php'; // Conexão com o banco de dados
     
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
// Verificar a conexão
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Obter postagens do banco de dados
$sql = "SELECT * FROM comentarios";
$result = $con->query($sql);

// Exibir postagens
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='post'>";
        echo "<br><h2 id='Post'>","User: " . $row["titulo"]. "</h2>";
        echo "<p>", "Coment<br>" . $row["comentarios"]. "</p>";
        echo "</div>";
    }
} else {
    echo "Nenhuma postagem encontrada.";
}

$con->close();
?>