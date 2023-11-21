  <!DOCTYPE html>
  <html lang="pt-br">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Widget 1</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="icon" type="image/png" sizes="16x16"  href="http://localhost/nextinvest/1%20Etapa/Img/Oficial.png">
    <link rel="stylesheet" href="stylesInvestidor.css">
  </head>

  <body>
    <nav class="navbar">
      <h1 id="Slogam">NextInvest</h1>
      <div class="tabs">
        <input id="tab-1" type="radio" name="group" />
        <input id="tab-2" type="radio" name="group" />
        <input id="tab-3" type="radio" name="group" />
        <input id="tab-4" type="radio" name="group" checked />

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
        <h1 class="display-4">Configurações Investidor!</h1>
      </div>
    </div>
    
<div class="config-container">
    <h2 class="config-h2">Configurações da Conta</h2>
    <form action="http://localhost/nextinvest/1%20Etapa/PHP%20-%20Funtion/ProcessaConfigInvestidor.php" method="post">
            <!-- Adicione os campos do formulário para telefone e senha -->
            <div class="config-field">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" placeholder="Digite seu telefone">
            </div>
            <div class="config-field">
                <label class="NovaSenha" for="novaSenha">Nova Senha:</label>
                <input type="password" id="novaSenha" name="novaSenha" placeholder="Digite a nova senha" />
            </div>
            <div class="config-field">
                <label class="confirmaSenha" for="confirmaSenha">Confirmar Nova Senha:</label>
                <input type="password" id="confirmaSenha" name="confirmaSenha" placeholder="Confirme a nova senha" />
            </div>
            <button type="submit">Salvar Alterações</button>
        </form>
</div>
<script>
      function validarTelefone() {
          var telefone = document.getElementById('telefone').value;

          // Remove caracteres não numéricos do telefone
          var telefoneNumerico = telefone.replace(/\D/g, '');

          // Verifica se o número de telefone tem entre 11 e 12 dígitos
          if (telefoneNumerico.length < 11 || telefoneNumerico.length > 12) {
              alert('Por favor, digite um número de telefone válido com 11 ou 12 dígitos.');
              return false;
          }

          return true;
      }

      document.addEventListener('DOMContentLoaded', function () {
          const form = document.querySelector('form');

          form.addEventListener('submit', function (event) {
              const novaSenha = document.getElementById('novaSenha').value;
              const confirmaSenha = document.getElementById('confirmaSenha').value;

              if (novaSenha !== confirmaSenha) {
                  alert('A nova senha e a confirmação da senha não coincidem.');
                  event.preventDefault();
              }
          });
      });

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