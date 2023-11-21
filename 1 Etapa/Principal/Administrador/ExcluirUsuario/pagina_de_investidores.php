<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Lista de Investidores</h2>
    <?php
    include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php';

    $sql_investidores = "SELECT * FROM investidores";
    $result_investidores = mysqli_query($con, $sql_investidores);

    if ($result_investidores) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Ações</th></tr>";

        while ($row_investidor = mysqli_fetch_assoc($result_investidores)) {
            echo "<tr>";
            echo "<td>" . $row_investidor['ID'] . "</td>";
            echo "<td>" . $row_investidor['Nome'] . "</td>";
            echo "<td>" . $row_investidor['Email'] . "</td>";
            echo "<td>" . $row_investidor['Telefone'] . "</td>";

            echo "<td><a href='remover_usuario.php?id=" . $row_investidor['ID'] . "&tipo=investidor'>Remover</a></td>";

            echo "</tr>";
        }

        echo "</table>";

        mysqli_free_result($result_investidores);
    } else {
        echo "Erro na consulta SQL: " . mysqli_error($con);
    }

    mysqli_close($con);
    ?>
</body>
</html>
