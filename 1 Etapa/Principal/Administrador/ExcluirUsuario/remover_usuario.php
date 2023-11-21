<?php
include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"]) && isset($_GET["tipo"])) {
    $usuario_id = $_GET["id"];
    $tipo_usuario = $_GET["tipo"];

    // Escolha da tabela apropriada com base no tipo de usuário
    $tabela_usuario = ($tipo_usuario == "idealizador") ? "idealizadores" : "investidores";

    $sql_remove_usuario = "DELETE FROM $tabela_usuario WHERE ID = ?";
    $stmt_remove_usuario = mysqli_prepare($con, $sql_remove_usuario);

    mysqli_stmt_bind_param($stmt_remove_usuario, "i", $usuario_id);

    echo '<script>';
    echo 'if (confirm("Tem certeza de que deseja remover este usuário?")) {';
    echo '  window.location.href = "remover_usuario_confirmado.php?id=' . $usuario_id . '&tipo=' . $tipo_usuario . '";';
    echo '} else {';
    echo '  window.history.back();';
    echo '}';
    echo '</script>';

    mysqli_stmt_close($stmt_remove_usuario);
} else {
    echo "ID de usuário ou tipo de usuário inválido.";
}

mysqli_close($con);
?>
