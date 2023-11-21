<?php
include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $ideia_id = $_GET["id"];

    $sql_remove_ideia_confirmado = "DELETE FROM ideia WHERE IdeiaID = ?";
    $stmt_remove_ideia_confirmado = mysqli_prepare($con, $sql_remove_ideia_confirmado);

    mysqli_stmt_bind_param($stmt_remove_ideia_confirmado, "i", $ideia_id);

    if (mysqli_stmt_execute($stmt_remove_ideia_confirmado)) {
        echo '<script>';
        echo 'alert("Ideia removida com sucesso.");';
        echo 'window.location.href = "http://localhost/nextinvest/1%20Etapa/Principal/Administrador/ExcluirPublicacao/Publi.php";';
        echo '</script>';
    } else {
        echo "Erro ao remover a ideia: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt_remove_ideia_confirmado);
} else {
    echo "ID de ideia inválido.";
}

mysqli_close($con);
?>
