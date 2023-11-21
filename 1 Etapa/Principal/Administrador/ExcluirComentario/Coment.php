<?php include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php'; // Conexão com o banco de dados
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Comentários</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php

    // Consulta SQL para obter todos os comentários
    $sql = "SELECT * FROM comentarios";
    $result = mysqli_query($con, $sql);

    // Verifique se a consulta foi bem-sucedida
    if ($result) {
        // Exibir cabeçalho da tabela
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Comentário</th><th>Título</th><th>Ações</th></tr>";

        // Loop através dos resultados da consulta
        while ($row = mysqli_fetch_assoc($result)) {
            // Exibir os dados do comentário
            echo "<tr>";
            echo "<td>" . $row['post_id'] . "</td>";
            echo "<td>" . $row['comentarios'] . "</td>";
            echo "<td>" . $row['titulo'] . "</td>";

            // Adicionar um botão para remover o comentário
            echo "<td><a href='remover_comentario.php?id=" . $row['post_id'] . "'>Remover</a></td>";

            echo "</tr>";
        }

        // Fechar a tabela
        echo "</table>";

        // Liberar o resultado da consulta
        mysqli_free_result($result);
    } else {
        // Se a consulta falhou, exibir uma mensagem de erro
        echo "Erro na consulta SQL: " . mysqli_error($con);
    }

    // Fechar a conexão com o banco de dados
    mysqli_close($con);
    ?>

    <script>
        function removerComentario(postId) {
            // Você pode adicionar aqui a lógica para remover o comentário usando AJAX ou PHP
            alert("Comentário com ID " + postId + " será removido!");
        }
    </script>
</body>

</html>