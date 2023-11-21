<?php
// Inclua o arquivo de conexão com o banco de dados
include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php';

// Restante do código permanece o mesmo...


// Consulta SQL para obter as informações do usuário da tabela 'idealizadores'
$query = "SELECT ID, Nome, IFNULL(Telefone, '00 000000000') AS Telefone, Email FROM idealizadores";

// Executa a consulta
$result = mysqli_query($con, $query);

// Verifica se a consulta foi bem-sucedida
if ($result) {
    // Verifica se há pelo menos uma linha retornada
    if (mysqli_num_rows($result) > 0) {
        // Obtém os dados do usuário
        $row = mysqli_fetch_assoc($result);

        // Exibe as informações do usuário
        echo "ID: " . $row['ID'] . "<br>";
        echo "Nome: " . $row['Nome'] . "<br>";
        echo "Telefone: " . $row['Telefone'] . "<br>";
        echo "Email: " . $row['Email'] . "<br>";
    } else {
        echo "Nenhum registro encontrado.";
    }
} else {
    // Exibe uma mensagem de erro se a consulta falhar
    echo "Erro na consulta: " . mysqli_error($con);
}

// Fecha a conexão com o banco de dados
mysqli_close($con);
?>
