<?php
session_start();

// Verifica se o usuário está autenticado, caso contrário, redireciona para a página de login
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: http://localhost/nextinvest/1%20Etapa/Login/LoginAdministrador.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa</title>
    <link rel="stylesheet" href="Adm.css">
</head>
<body>
    <div class="admin-panel">
        <h1>Bem-vindo à Área Administrativa</h1>
        <p>Coloque aqui o conteúdo da sua área administrativa.</p>
        <form action="http://localhost/nextinvest/1%20Etapa/Login/LoginAdministrador.html" method="post">
            <button type="submit" class="logout-btn">Sair</button>
        </form>
    </div>


    <div id="opcoes">
        <button id="ExcluirPublicacao" onclick="Excluir('http://localhost/nextinvest/1%20Etapa/Principal/Administrador/ExcluirPublicacao/Publi.php')">
            ExcluirPublicacao
        </button>

        <button id="ExcluirUsuario" onclick="Excluir('http://localhost/nextinvest/1%20Etapa/Principal/Administrador/ExcluirUsuario/User.php')">
            ExcluirUsuario
        </button>

        <button id="ExcluirComentario" onclick="Excluir('http://localhost/nextinvest/1%20Etapa/Principal/Administrador/ExcluirComentario/Coment.php')">
            ExcluirComentario
        </button>
    </div>

    <script>
        function Excluir(caminho){
            window.location.href = caminho;
        }
    </script>


</body>
</html>
