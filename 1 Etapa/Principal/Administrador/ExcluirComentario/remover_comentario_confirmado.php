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

    // Executar a declaração
    if (mysqli_stmt_execute($stmt)) {
        // Comentário removido com sucesso
        echo '<script>';
        echo 'alert("Comentário removido com sucesso.");';
        echo 'window.location.href = "http://localhost/nextinvest/1%20Etapa/Principal/Administrador/ExcluirComentario/Coment.php";';
        echo '</script>';
    } else {
        // Se a execução falhar, exibir uma mensagem de erro
        echo "Erro ao remover o comentário: " . mysqli_error($con);
    }

    // Fechar a declaração preparada
    mysqli_stmt_close($stmt);
} else {
    // Se não houver um ID válido, exibir uma mensagem de erro
    echo "ID de comentário inválido.";
}

// Fechar a conexão com o banco de dados
mysqli_close($con);
?>
