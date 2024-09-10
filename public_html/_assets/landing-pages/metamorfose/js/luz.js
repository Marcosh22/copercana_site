document.querySelector('.logo a').addEventListener('click', function(e) {
    e.preventDefault();  // Impede a ação padrão de recarregar a página
    window.scrollTo({
        top: 0,
        behavior: 'smooth'  // Faz o scroll suave
    });
});