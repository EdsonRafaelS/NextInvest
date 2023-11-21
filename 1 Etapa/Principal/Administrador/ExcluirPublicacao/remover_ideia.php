<?php
include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $ideia_id = $_GET["id"];

    $sql_remove_ideia = "DELETE FROM ideia WHERE IdeiaID = ?";
    $stmt_remove_ideia = mysqli_prepare($con, $sql_remove_ideia);

    mysqli_stmt_bind_param($stmt_remove_ideia, "i", $ideia_id);

    echo '<script>';
    echo 'if (confirm("Tem certeza de que deseja remover esta ideia?")) {';
    echo '  window.location.href = "remover_ideia_confirmado.php?id=' . $ideia_id . '";';
    echo '} else {';
    echo '  window.history.back();';
    echo '}';
    echo '</script>';

    mysqli_stmt_close($stmt_remove_ideia);
} else {
    echo "ID de ideia inválido.";
}

mysqli_close($con);
?>
