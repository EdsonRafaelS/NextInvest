<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserindo Ideia...</title>
</head>

<body>
    <?php
    session_start();

    include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = mysqli_real_escape_string($con, $_POST["titulo"]);
        $tema = mysqli_real_escape_string($con, $_POST["tema"]);
        $descricao = mysqli_real_escape_string($con, $_POST["descricao"]);

        if (!isset($_SESSION['idealizador_logado_id'])) {
            echo "<script>
                    window.location.href = 'http://localhost/nextinvest/1%20Etapa/Principal/Idealista/Idealista.html';
                    alert('Erro: Não foi possível identificar o idealizador logado.');
                </script>";
            exit();
        }

        $idealizadoresID = $_SESSION['idealizador_logado_id'];
        $sql = "INSERT INTO ideia (Titulo, Tema, Descricao, idealizadoresID) VALUES ('$titulo', '$tema', '$descricao', '$idealizadoresID')";

        if (mysqli_query($con, $sql)) {
            echo "<script>
                    window.location.href = 'http://localhost/nextinvest/1%20Etapa/Principal/Idealista/Idealista.html';
                    alert('Ideia inserida com sucesso!');
                </script>";
        } else {
            echo "<script>
                    window.location.href = 'http://localhost/nextinvest/1%20Etapa/Principal/Idealista/Idealista.html';
                    alert('Erro ao inserir ideia: ');
                </script>";
        }
    }
    mysqli_close($con);
    ?>

</body>
</html>