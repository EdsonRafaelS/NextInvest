<?php

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifica se o email e a senha correspondem aos valores esperados
    $emailEsperado = "administrador@gmail.com";
    $senhaEsperada = "adm1234";

    $email = $_POST["username"];
    $senha = $_POST["password"];

    // Verifica as credenciais do administrador
    if ($email === $emailEsperado && $senha === $senhaEsperada) {
        // Credenciais corretas, redireciona para a página de administração
        session_start();
        $_SESSION['authenticated'] = true;
        var_dump($_SESSION);
        header("Location: http://localhost/nextinvest/1%20Etapa/Principal/Administrador/Adm.php");
        exit();
    } else {
        // Credenciais incorretas, redireciona para a página de login com uma mensagem de erro
        header("Location: http://localhost/nextinvest/1%20Etapa/Login/LoginAdministrador.html");
        exit();
    }
} else {
    // Se o formulário não foi enviado, redireciona para a página de login
    header("Location: http://localhost/nextinvest/1%20Etapa/Login/LoginAdministrador.html");
    exit();
}
