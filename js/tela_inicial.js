// Seleciona o botão e o menu
const menuBtn = document.querySelector('.menu-btn');
const divisaoMetas = document.querySelector('.divisao-metas');

// Função para alternar a visibilidade do menu
menuBtn.addEventListener('click', () => {
    if (divisaoMetas.style.display === 'block') {
        divisaoMetas.style.display = 'none'; // Oculta o menu se estiver visível
    } else {
       divisaoMetas.style.display = 'block'; // Mostra o menu se estiver oculto
    }
});

// Fechar o menu se clicar fora dele
document.addEventListener('click', function (event) {
    if (!menuBtn.contains(event.target) && !divisaoMetas.contains(event.target)) {
        divisaoMetas.style.display = 'none'; // Fecha o menu ao clicar fora
    }
});