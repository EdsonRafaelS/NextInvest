<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processando...</title>
</head>

<body>
    <?php
    include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php'; // Conexão com o banco de dados
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Nome = $_POST['Nome'];
        $Email = $_POST['Email'];
        $Senha = $_POST['Senha'];

        // Verificar se o Email já existe
        $sql = "SELECT ID FROM idealizadores WHERE Email = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $Email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>
                    window.location.href = 'http://localhost/nextinvest/1%20Etapa/Login/LoginIdealista.html';
                    alert('Email já em uso. Escolha outro!');
                </script>";
        } else {
            $hashedSenha = password_hash($Senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO idealizadores (Nome, Email, Senha) VALUES (?, ?, ?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sss", $Nome, $Email, $hashedSenha);
            if ($stmt->execute()) {
                echo "<script>
                    window.location.href = 'http://localhost/nextinvest/1%20Etapa/Login/LoginIdealista.html';
                    alert('Cadastro Realizado com sucesso! Realize o Login.');
                </script>";
            } else {
                echo "<script>
                    window.location.href = 'http://localhost/nextinvest/1%20Etapa/Login/LoginIdealista.html';
                    alert('Erro ao cadastrar o usuário. Tente novamente!');
                </script>";
            }   
        }
        $stmt->close();
    }
    ?>
</body>

</html>
