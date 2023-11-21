<?php
include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"]) && isset($_GET["tipo"])) {
    $usuario_id = $_GET["id"];
    $tipo_usuario = $_GET["tipo"];

    // Escolha da tabela apropriada com base no tipo de usuário
    $tabela_usuario = ($tipo_usuario == "idealizador") ? "idealizadores" : "investidores";

    $sql_remove_usuario_confirmado = "DELETE FROM $tabela_usuario WHERE ID = ?";
    $stmt_remove_usuario_confirmado = mysqli_prepare($con, $sql_remove_usuario_confirmado);

    mysqli_stmt_bind_param($stmt_remove_usuario_confirmado, "i", $usuario_id);

    if (mysqli_stmt_execute($stmt_remove_usuario_confirmado)) {
        echo '<script>';
        echo 'alert("Usuário removido com sucesso.");';
        echo 'history.go(-1);'; // Alterado para usar history.go(-1)
        echo 'location.reload(true);'; // Adicionado para forçar o recarregamento da página        
        echo '</script>';
    } else {
        echo "Erro ao remover o usuário: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt_remove_usuario_confirmado);
} else {
    echo "ID de usuário ou tipo de usuário inválido.";
}

mysqli_close($con);
?>
