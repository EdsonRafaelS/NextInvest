<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php';

    $sql_ideia = "SELECT * FROM ideia";
    $result_ideia = mysqli_query($con, $sql_ideia);

    if ($result_ideia) {
        echo "<table>";
        echo "<tr><th>Ideia ID</th><th>Título</th><th>Tema</th><th>Descrição</th><th>Idealizadores ID</th><th>Ações</th></tr>";

        while ($row_ideia = mysqli_fetch_assoc($result_ideia)) {
            echo "<tr>";
            echo "<td>" . $row_ideia['IdeiaID'] . "</td>";
            echo "<td>" . $row_ideia['Titulo'] . "</td>";
            echo "<td>" . $row_ideia['Tema'] . "</td>";
            echo "<td>" . $row_ideia['Descricao'] . "</td>";
            echo "<td>" . $row_ideia['idealizadoresID'] . "</td>";

            echo "<td><a href='remover_ideia.php?id=" . $row_ideia['IdeiaID'] . "'>Remover</a></td>";

            echo "</tr>";
        }

        echo "</table>";

        mysqli_free_result($result_ideia);
    } else {
        echo "Erro na consulta SQL: " . mysqli_error($con);
    }

    mysqli_close($con);
    ?>
</body>
</html>
