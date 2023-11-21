<?php
// Inicia a sessão
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    // Se não estiver logado, redirecione para a página de login ou faça qualquer outra ação necessária
    header('Location: http://localhost/nextinvest/1%20Etapa/Login/LoginInvestidor.html');
    exit();
}

// Obtém o ID do usuário da sessão
$id_usuario = $_SESSION['user_id'];

// Inclua o arquivo de conexão com o banco de dados
include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php';

// Consulta SQL para obter as informações do usuário da tabela 'investidores'
$query = "SELECT ID, Nome, IFNULL(Telefone, '00 000000000') AS Telefone, Email FROM investidores WHERE ID = $id_usuario";

// Executa a consulta
$result = mysqli_query($con, $query);

// Inicializa variáveis para armazenar dados do perfil
$perfilNome = $perfilTelefone = $perfilEmail = '';

// Verifica se há resultados da consulta
if ($result && mysqli_num_rows($result) > 0) {
    // Obtém os dados do usuário
    $row = mysqli_fetch_assoc($result);

    // Armazena os dados do perfil em variáveis
    $perfilNome = $row['Nome'];
    $perfilTelefone = $row['Telefone'];
    $perfilEmail = $row['Email'];
} else {
    // Se não houver resultados, você pode lidar com isso de acordo com suas necessidades
    // Por exemplo, exibir uma mensagem de erro ou redirecionar para uma página apropriada
    echo "<p>Nenhum registro encontrado.</p>";
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Widget 1</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/nextinvest/1%20Etapa/Img/Oficial.png">
    <link rel="stylesheet" href="stylesInvestidor.css">
    <style>
    body {
      overflow-y: hidden;
      /* Hide vertical scrollbar */
      overflow-x: hidden;
      /* Hide horizontal scrollbar */
    }
        /* Adicione estilos para o bloco de perfil */
        .perfil-container {
            max-width: 600px;
            margin: 50px auto; /* Centraliza o bloco na tela */
            background-color: white;
            color: black;
            border: 2px solid black;
            border-radius: 8px;
            padding: 20px;
            font-family: Arial, sans-serif;
            font-size: 20px;
            text-align: justify;
            box-shadow: 10px 10px 15px black;
        }

        .Perfil-h2{
          font-size: 30px;
        }
        .msg{
          font-size: 25px;
        }

        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body>
    <nav class="navbar">
        <h1 id="Slogam">NextInvest</h1>
        <div class="tabs">
            <input id="tab-1" type="radio" name="group" />
            <input id="tab-2" type="radio" name="group" checked/>
            <input id="tab-3" type="radio" name="group" />
            <input id="tab-4" type="radio" name="group" />

            <div class="buttons">
                <label class="material-symbols-outlined" for="tab-1">
                    Feed
                </label>
                <label class="material-symbols-outlined" for="tab-2">
                    Person
                </label>
                <label class="material-symbols-outlined" for="tab-3">
                    Chat</a>
                </label>
                <label class="material-symbols-outlined" for="tab-4">
                    Settings
                </label>
                <div class="underline"></div>
            </div>
    </nav>

    <div class="investidor">
    <div class="container">
      <h1 class="display-4">Perfil Investidor!</h1>
    </div>
  </div>
  <div class="perfil-container">
    <h2 class="Perfil-h2">Informações do Perfil</h2>
    <h2 class="msg">Olá <?php echo $perfilNome; ?> </h2>
    <p><strong>ID:</strong> <?php echo $id_usuario; ?></p>
    <p><strong>Nome:</strong> <?php echo $perfilNome; ?></p>
    <p><strong>Telefone:</strong> <?php echo $perfilTelefone; ?></p>
    <p><strong>Email:</strong> <?php echo $perfilEmail; ?></p>

    <!-- Adicione o botão do WhatsApp se o telefone não for o padrão -->
    <?php
    // Verifica se o telefone está definido
    if (!empty($perfilTelefone)) {
        // Remove espaços e caracteres não numéricos do número de telefone
        $telefoneLimpo = preg_replace("/[^0-9]/", "", $perfilTelefone);

        // Adiciona o código do país do Brasil (+55)
        $telefoneCompleto = "+55" . $telefoneLimpo;
        ?>
        <button id="whatsappButton" onclick="redirecionarParaWhatsapp()">Contato via WhatsApp</button>

        <script>
            function redirecionarParaWhatsapp() {
                // Se o número for o padrão "00000000000", exiba o alerta
                if ("<?php echo $telefoneLimpo; ?>" === '00000000000') {
                    alert("Número do usuário não cadastrado.");
                } else {
                    // Redirecione para o WhatsApp com o número formatado corretamente
                    window.open("https://wa.me/<?php echo $telefoneCompleto; ?>", '_blank');
                }
            }
        </script>
    <?php } else {
        // Se o telefone não estiver definido, exiba uma mensagem ou tome outra ação apropriada
        echo "<p>Número de telefone não disponível.</p>";
    }
    ?>
</div>

  <script>
    // Adicione um evento de escuta para os inputs do tipo radio
    const radioInputs = document.querySelectorAll('input[type="radio"]');
    radioInputs.forEach(input => {
      input.addEventListener('change', function() {
        if (this.checked) {
          // Verifique qual input está selecionado e redimensione a tela de acordo
          if (this.id === 'tab-1') {
            window.location.href = "http://localhost/nextinvest/1%20Etapa/Principal/Investidor/Investidor.php"
            console.log('Redimensionar para a tela de Feed');
          } else if (this.id === 'tab-2') {
            window.location.href = "http://localhost/nextinvest/1%20Etapa/Principal/Investidor/PerfilInvestidor/PerfilInvestidor.php"
            console.log('Redimensionar para a tela de Person');
          } else if (this.id === 'tab-3') {
            window.location.href = "http://localhost/nextinvest/1%20Etapa/Principal/Investidor/ChatInvestidor/ChatInvestidor.php"
            console.log('Redimensionar para a tela de Chat');
          } else if (this.id === 'tab-4') {
            window.location.href = "  http://localhost/nextinvest/1%20Etapa/Principal/Investidor/Configura%c3%a7%c3%b5esInvestidor/ConfigInvestidor.php"
            console.log('Redimensionar para a tela de Settings');
          }
        }
      });
    });
  </script>

</body>

</html>