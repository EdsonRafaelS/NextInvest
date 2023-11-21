<?php
session_start();
include_once '/xampp/htdocs/nextinvest/1 Etapa/Banco de Dados/BancoDeDados.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_SESSION['idealizador_logado_id'];

    // Inicializa a variável do telefone
    $telefone = null;

    // Verifica se o telefone foi fornecido e contém dígitos
    if (isset($_POST['telefone']) && preg_match('/\d/', $_POST['telefone'])) {
        $telefone = $_POST['telefone'];

        // Remove caracteres não numéricos do telefone
        $telefoneNumerico = preg_replace('/\D/', '', $telefone);

        // Verifica se o número de telefone tem entre 11 e 12 dígitos
        if (strlen($telefoneNumerico) < 11 || strlen($telefoneNumerico) > 12) {
            echo "<script>
                    alert('Por favor, digite um número de telefone válido com 11 ou 12 dígitos.');
                    window.location.href = 'http://localhost/nextinvest/1%20Etapa/Principal/Idealista/Configura%c3%a7%c3%b5esIdealista/ConfigIdealista.php';
                    </script>";
                    exit();
        }
    }

    // Verifica se a nova senha foi fornecida
    if (isset($_POST['novaSenha']) && $_POST['novaSenha'] !== '') {
        // Verifica se a confirmação da senha foi fornecida
        if (isset($_POST['confirmaSenha']) && $_POST['confirmaSenha'] !== '') {
            $novaSenha = isset($_POST['novaSenha']) ? $_POST['novaSenha'] : '';
            $confirmaSenha = isset($_POST['confirmaSenha']) ? $_POST['confirmaSenha'] : '';

            if ($novaSenha !== $confirmaSenha) {
                echo "<script>
                alert('A nova senha e a confirmação da senha não coincidem.');
                window.location.href = 'http://localhost/nextinvest/1%20Etapa/Principal/Idealista/Configura%c3%a7%c3%b5esIdealista/ConfigIdealista.php';
                </script>";
                exit();
            }

            // Atualiza a senha no banco de dados
            $updateSenha = "UPDATE idealizadores SET Senha = ? WHERE ID = ?";
            $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
            $stmtSenha = $con->prepare($updateSenha);
            $stmtSenha->bind_param("si", $novaSenhaHash, $id_usuario);
            $stmtSenha->execute();
            $stmtSenha->close();
        }
    }

    // Atualiza o telefone no banco de dados, apenas se um telefone foi fornecido
    if ($telefone !== null) {
        $updateTelefone = "UPDATE idealizadores SET Telefone = ? WHERE ID = ?";
        $stmtTelefone = $con->prepare($updateTelefone);
        $stmtTelefone->bind_param("si", $telefone, $id_usuario);

        if ($stmtTelefone->execute()) {
            echo "<script>
                    Telefone atualizado com sucesso!
                    </script>";
                    // Atualiza a variável de sessão com o novo número de telefone
                    $_SESSION['telefone_usuario'] = $telefone;
        } else {
            echo "Erro ao atualizar telefone: " . $stmtTelefone->error;
        }

        $stmtTelefone->close();
    }

    // Redireciona após as atualizações
    header("Location: http://localhost/nextinvest/1%20Etapa/Principal/Idealista/PerfilIdealista/PerfilIdealista.php");
    exit();
}
