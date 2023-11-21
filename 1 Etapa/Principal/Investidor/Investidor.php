<?php
include_once '/xampp/htdocs/nextinvest/1 Etapa/PHP - Funtion/ProcessaFeedInv.php';

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
</head>

<body>
  <nav class="navbar">
    <h1 id="Slogam">NextInvest</h1>
    <div class="tabs">
      <input id="tab-1" type="radio" name="group" checked onclick="" />
      <input id="tab-2" type="radio" name="group" />
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
      <h1 class="display-4">Bem-Vindo Investidor!</h1>
      <p class="lead">"O melhor momento para investir foi ontem. O segundo melhor momento é agora."</p>
    </div>
  </div>

  <div class="observation">
        <p>Entre em contato com o idealizador <br> tocando no nome do usuário.</p>
    </div>


  <div class="feed" id="feed-content">
    <?php foreach ($ideas as $idea) : ?>
      <div class="idea-item">
        <button class="ButtonPerfil" onclick="redirecionarParaWhatsapp('<?php echo $idea['Telefone']; ?>')">
          <p><?php echo $idea['username']; ?></p>
        </button>
        <!--<p><strong>Telefone:</strong> <?php echo $idea['Telefone']; ?></p>-->
        <p><strong>Titulo:</strong> <?php echo $idea['Titulo']; ?></p>
        <p><strong>Tema:</strong> <?php echo $idea['Tema']; ?></p>
        <p><strong>Descrição:</strong><br> <?php echo $idea['Descricao']; ?></p>
        <!-- Adicione isso no lugar da linha onde você exibe o telefone -->
        <!--<p><strong>Telefone:</strong>
          <?php echo !empty($idea['Telefone']) ? $idea['Telefone'] : 'Telefone não disponível'; ?>
        </p>-->

      </div>

    <?php endforeach; ?>
    <br><br>
  </div>

  <script>
    function redirecionarParaWhatsapp(telefone) {
        // Verifica se o telefone é 'Telefone não disponível'
        if (telefone.trim() === 'Telefone não disponível' || telefone.trim() === '') {
            alert("Número de telefone não disponível.");
        } else {
            // Formata o telefone para "00 000000000" se for vazio ou null
            var telefoneFormatado = telefone || '00 000000000';

            console.log("Telefone formatado:", telefoneFormatado);

            // Remove espaços e caracteres não numéricos do número de telefone
            var telefoneLimpo = telefoneFormatado.replace(/\D/g, '');

            // Adiciona o código do país do Brasil (+55)
            var telefoneCompleto = "+55" + telefoneLimpo;

            console.log("Telefone formatado para WhatsApp:", telefoneCompleto);

            // Redirecione para o WhatsApp com o número formatado corretamente
            window.open("https://wa.me/" + telefoneCompleto, '_blank');
        }
    }
</script>

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