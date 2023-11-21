
function redirecionarParaWhatsapp() {
    // Se o número for o padrão "00000000000", exiba o alerta
    if ("<?php echo $telefoneLimpo; ?>" === '00000000000') {
        alert("Número do usuário não cadastrado.");
    } else {
        // Redirecione para o WhatsApp com o número formatado corretamente
        window.open("https://wa.me/<?php echo $telefoneCompleto; ?>", '_blank');
    }
}
