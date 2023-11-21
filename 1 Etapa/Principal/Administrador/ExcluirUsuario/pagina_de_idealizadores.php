<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Lista de Idealizadores</h2>
    <?php
    include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php';

    $sql_idealizadores = "SELECT * FROM idealizadores";
    $result_idealizadores = mysqli_query($con, $sql_idealizadores);

    if ($result_idealizadores) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Ações</th></tr>";

        while ($row_idealizador = mysqli_fetch_assoc($result_idealizadores)) {
            echo "<tr>";
            echo "<td>" . $row_idealizador['ID'] . "</td>";
            echo "<td>" . $row_idealizador['Nome'] . "</td>";
            echo "<td>" . $row_idealizador['Email'] . "</td>";
            echo "<td>" . $row_idealizador['Telefone'] . "</td>";

            echo "<td><a href='remover_usuario.php?id=" . $row_idealizador['ID'] . "&tipo=idealizador'>Remover</a></td>";
            
            echo "</tr>";
        }

        echo "</table>";

        mysqli_free_result($result_idealizadores);
    } else {
        echo "Erro na consulta SQL: " . mysqli_error($con);
    }

    mysqli_close($con);
    ?>
</body>
</html>
