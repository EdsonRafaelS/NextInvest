<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed de Ideias...</title>
</head>
<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Inclui o arquivo de conexão
    include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php';

    $query = "SELECT idealizadores.Nome as username, idealizadores.Telefone, ideia.Titulo, ideia.Tema, ideia.Descricao 
          FROM ideia 
          LEFT JOIN idealizadores ON ideia.idealizadoresID = idealizadores.ID
          ORDER BY ideia.ideiaID DESC";

    $result = $con->query($query);

    if (!$result) {
        die("Erro na consulta: " . $con->error);
    }

    $ideas = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ideas[] = $row;
        }
    }

    $con->close();
    ?>
</body>
</html>
