// Seleciona o botão e o menu
const menuBtn_relatorios = document.getElementById('relatorios-btn');
const divisaoRelatorios = document.querySelector('.divisao-relatorios');

// Função para alternar a visibilidade do menu
menuBtn_relatorios.addEventListener('click', () => {
    if (divisaoRelatorios.style.display === 'block') {
        divisaoRelatorios.style.display = 'none'; // Oculta o menu se estiver visível
    } else {
       divisaoRelatorios.style.display = 'block'; // Mostra o menu se estiver oculto
    }
});

// Fechar o menu se clicar fora dele
document.addEventListener('click', function (event) {
    if (!menuBtn_relatorios.contains(event.target) && !divisaoRelatorios.contains(event.target)) {
        divisaoRelatorios.style.display = 'none'; // Fecha o menu ao clicar fora
    }
});