//Voltar para o Topo
let mybutton = document.getElementById("topBtn");

// Quando o usuário rolar para baixo 20px do topo, mostre o botão
window.onscroll = function () {
	scrollFunction()
};

function scrollFunction() {
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		mybutton.style.display = "block";
	} else {
		mybutton.style.display = "none";
	}
}

// Quando o usuário clicar no botão, role para o topo 
function topFunction() {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}