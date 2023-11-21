<?php
include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $comentario_id = $_GET["id"];

    // Consulta SQL para remover o comentário com base no ID
    $sql = "DELETE FROM comentarios WHERE post_id = ?";
    
    // Preparar a declaração SQL
    $stmt = mysqli_prepare($con, $sql);

    // Vincular os parâmetros
    mysqli_stmt_bind_param($stmt, "i", $comentario_id);

    // Exibir script JavaScript de confirmação
    echo '<script>';
    echo 'if (confirm("Tem certeza de que deseja remover este comentário?")) {';
    echo '  window.location.href = "remover_comentario_confirmado.php?id=' . $comentario_id . '";';
    echo '} else {';
    echo '  window.history.back();';  // Volta uma página se o usuário clicar em "Cancelar"
    echo '}';
    echo '</script>';

    // Fechar a declaração preparada
    mysqli_stmt_close($stmt);
} else {
    // Se não houver um ID válido, exibir uma mensagem de erro
    echo "ID de comentário inválido.";
}

// Fechar a conexão com o banco de dados
mysqli_close($con);
?>
