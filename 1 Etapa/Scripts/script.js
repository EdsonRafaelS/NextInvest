const acceptTermsCheckbox = document.getElementById("acceptTerms");
const actionButtons = document.getElementById("actionButtons");
const body = document.body;

// Adiciona um ouvinte de evento para mudanças no checkbox de aceitar termos
acceptTermsCheckbox.addEventListener("change", function () {
  const termsAccepted = acceptTermsCheckbox.checked;

  // Verifica se os termos foram aceitos e se a rolagem está no final da página
  if (termsAccepted && isScrolledToBottom()) {
    actionButtons.classList.add("visible");
  } else {
    actionButtons.classList.remove("visible");
  }
});

// Adiciona um ouvinte de evento para mudanças nos radio buttons
const acceptTermsRadio = document.getElementById("acceptTerms");
const declineTermsRadio = document.getElementById("declineTerms");
acceptTermsRadio.addEventListener("change", toggleButtonsVisibility);
declineTermsRadio.addEventListener("change", toggleButtonsVisibility);

// Adiciona um ouvinte de evento para o scroll da página
window.addEventListener("scroll", toggleButtonsVisibility);

// Função para verificar se a rolagem está no final da página
function isScrolledToBottom() {
  return window.innerHeight + window.scrollY >= body.offsetHeight;
}

// Função para alternar a visibilidade do botão com base nos termos aceitos e na rolagem
function toggleButtonsVisibility() {
  const isTermsAccepted = acceptTermsRadio.checked;

  // Verifica se os termos foram aceitos e se a rolagem está no final da página
  if (isTermsAccepted && isScrolledToBottom()) {
    actionButtons.classList.add("visible");
  } else {
    actionButtons.classList.remove("visible");
  }
}

// Inicialmente oculta o botão
actionButtons.classList.remove("visible");
