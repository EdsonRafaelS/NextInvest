<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 24px;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 15px 20px;
            margin: 10px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        Qual o tipo de Usuario?
    </header>

    <main>
        <button onclick="User('http://localhost/nextinvest/1%20Etapa/Principal/Administrador/ExcluirUsuario/pagina_de_idealizadores.php')">
            Idealizadores
        </button>

        <button onclick="User('http://localhost/nextinvest/1%20Etapa/Principal/Administrador/ExcluirUsuario/pagina_de_investidores.php')">
            Investidores
        </button>
    </main>

    <script>
        function User(caminho){
            window.location.href = caminho;
        }
    </script>
</body>
</html>
