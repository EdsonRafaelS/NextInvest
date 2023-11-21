<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logando...</title>
</head>

<body>
    <?php
    session_start();
    include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php'; // Conexão com o banco de dados
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Email = $_POST['Email'];
        $Senha = $_POST['Senha'];

        // Consulta ao banco de dados para verificar o login
        $sql = "SELECT ID, Nome, Senha FROM investidores WHERE Email = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $Email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($Senha, $row['Senha'])) {
                // Login bem-sucedido
                $_SESSION['user_id'] = $row['ID'];
                echo "Login realizado com sucesso, Como Investidor!";
                // Você pode adicionar um redirecionamento aqui, se necessário.
                header("Location: http://localhost/nextinvest/1%20Etapa/Principal/Investidor/Investidor.php");

            } else {
                echo "<script>
                        window.location.href = 'http://localhost/nextinvest/1%20Etapa/Login/LoginInvestidor.html';
                        alert('Senha incorreta! Por favor, tente novamente.');
                    </script>";
            }
        } else {
            echo "<script>
                        window.location.href = 'http://localhost/nextinvest/1%20Etapa/Login/LoginInvestidor.html';
                        alert('Email não encontrado. Por favor, tente novamente.');
                    </script>";
        }
        $stmt->close();
    }
    ?>

</body>

</html>
