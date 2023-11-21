<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ideia Chegando</title>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="icon" type="image/png" sizes="16x16"  href="http://localhost/nextinvest/1%20Etapa/Img/Oficial.png">
    <link rel="stylesheet" href="stylesIdealista.css"/>
</head>

<body style="overflow-x: auto">
  <nav class="navbar" >
    <h1 id="Slogam">NextInvest</h1>
    <div class="tabs">
      <input id="tab-1" type="radio" name="group" />
      <input id="tab-2" type="radio" name="group" />
      <input id="tab-3" type="radio" name="group" checked/>
      <input id="tab-4" type="radio" name="group" />

      <div class="buttons">
        <label class="material-symbols-outlined" for="tab-1">
            Feed
        </label>
        <label class="material-symbols-outlined" for="tab-2">
            Person
        </label>
        <label class="material-symbols-outlined" for="tab-3">
            Chat
        </label>
        <label class="material-symbols-outlined" for="tab-4">
            Settings
        </label>
        <div class="underline"></div>
    </div>
  </nav>

  <div class="idealista">
    <div class="container">
      <h1 class="display-4">Comentarios!</h1>
    </div>
  </div>

  <div class="Post">
        <h1 id='Post'>Comentarios</h1>

        <!-- Formulário de Postagem -->
        <form action="post.php" method="post" id="Post">
            <label for="title" id='Post'>Nome</label>
            <input type="text" name="title" required id='Post'>

            <label for="content" id='Post'>Comentar:</label>
            <textarea name="content" rows="4" required id='Post'></textarea>

            <button type="submit" id='Post'>enviar</button>
        </form>

       <!-- Exibir Postagens -->
       <?php include 'get_posts.php'; ?>

        
    </div>
    <br><br><br>

  <script>
    // Adicione um evento de escuta para os inputs do tipo radio
    const radioInputs = document.querySelectorAll('input[type="radio"]');
    radioInputs.forEach(input => {
      input.addEventListener('change', function() {
        if (this.checked) {
          // Verifique qual input está selecionado e redimensione a tela de acordo
          if (this.id === 'tab-1') {
            window.location.href = "http://localhost/nextinvest/1%20Etapa/Principal/Idealista/Idealista.html"
            console.log('Redimensionar para a tela de Feed');
          } else if (this.id === 'tab-2') {
            window.location.href = "http://localhost/nextinvest/1%20Etapa/Principal/Idealista/PerfilIdealista/PerfilIdealista.php"
            console.log('Redimensionar para a tela de Person');
          } else if (this.id === 'tab-3') {
            window.location.href = "http://localhost/nextinvest/1%20Etapa/Principal/Idealista/ChatIdealista/ChatIdealista.php"
            console.log('Redimensionar para a tela de Chat');
          } else if (this.id === 'tab-4') {
            window.location.href = "http://localhost/nextinvest/1%20Etapa/Principal/Idealista/Configura%c3%a7%c3%b5esIdealista/ConfigIdealista.php"
            console.log('Redimensionar para a tela de Settings');
          }
        }
      });
    });
  </script>

</body>

</html>