

/*document.addEventListener('DOMContentLoaded', () => {
    const contadorElement = document.getElementById('contador');
    const videoContainer = document.getElementById('video-container');
    const videoElement = document.getElementById('video');
    const playButton = document.getElementById('play-button');
    const tituloElement = document.querySelector('.Titulo_contador'); // Seleciona o h1

    // Data e hora de teste (ajustar conforme necessário)
    const testDate = new Date();
    testDate.setSeconds(testDate.getSeconds() + 5); // Define a data de teste para 5 segundos a partir de agora

    function updateCountdown() {
        const now = new Date();
        const timeRemaining = testDate - now;

        // Calcula dias, horas, minutos e segundos restantes
        const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

        contadorElement.textContent = `${String(days).padStart(2, '0')} D ${String(hours).padStart(2, '0')} h ${String(minutes).padStart(2, '0')} min ${String(seconds).padStart(2, '0')} s`;

        if (timeRemaining <= 0) {
            contadorElement.style.display = 'none';
            videoContainer.style.display = 'flex';
            playButton.style.display = 'flex'; // Mostra o botão de play
            tituloElement.style.display = 'none'; // Oculta o título ao começar o vídeo
        }
    }

    // Atualiza o contador a cada segundo
    setInterval(updateCountdown, 1000);

    playButton.addEventListener('click', () => {
        console.log('Play button clicked'); // Debugging
        videoElement.play();
        playButton.style.display = 'none'; // Oculta o botão de play quando o vídeo começa
    });

    // Evento para quando o vídeo terminar
    videoElement.addEventListener('ended', () => {
        console.log('Video ended'); // Debugging
        playButton.style.display = 'flex'; // Mostra o botão de play novamente
    });
});*/

document.addEventListener('DOMContentLoaded', () => {
    const contadorElement = document.getElementById('contador');
    const videoContainer = document.getElementById('video-container');
    const videoElement = document.getElementById('video');
    const playButton = document.getElementById('play-button');
    const tituloElement = document.querySelector('.Titulo_contador'); // Seleciona o h1

    // Data e hora de teste: Define o cronômetro para terminar em 2 de setembro do ano atual
    const now = new Date();
    const currentYear = now.getFullYear();
    const targetDate = new Date(currentYear, 0, 0, 0, 0, 0); // 2 de setembro (mês 8 porque janeiro é 0)

    function updateCountdown() {
        const now = new Date();
        const timeRemaining = targetDate - now;

        // Calcula dias, horas, minutos e segundos restantes
        const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

        contadorElement.textContent = `${String(days).padStart(2, '0')} D ${String(hours).padStart(2, '0')} h ${String(minutes).padStart(2, '0')} min ${String(seconds).padStart(2, '0')} s`;

        if (timeRemaining <= 0) {
            contadorElement.style.display = 'none';
            videoContainer.style.display = 'flex';
            playButton.style.display = 'flex'; // Mostra o botão de play
            tituloElement.style.display = 'none'; // Oculta o título ao começar o vídeo
        }
    }

    // Atualiza o contador a cada segundo
    setInterval(updateCountdown, 1000);

    playButton.addEventListener('click', () => {
        console.log('Play button clicked'); // Debugging
        videoElement.play();
        playButton.style.display = 'none';
    });
});


