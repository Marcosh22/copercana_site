// Get elements
const openPopup = document.getElementById('open-popup');
const popup = document.querySelector('.popup');
const closePopup = document.querySelector('.close-popup');
const overlay = document.createElement('div'); // Cria o elemento overlay
const body = document.body;

// Adiciona a classe ao overlay e o insere no corpo
overlay.className = 'overlay';
body.appendChild(overlay);

// Function to show the popup and block scroll
function showPopup() {
    popup.style.display = 'block'; // Mostrar o popup
    overlay.style.display = 'block'; // Mostrar o overlay
    body.style.overflow = 'hidden'; // Bloquear rolagem
}

// Function to hide the popup and unblock scroll
function hidePopup() {
    popup.style.display = 'none'; // Ocultar o popup
    overlay.style.display = 'none'; // Ocultar o overlay
    body.style.overflow = ''; // Desbloquear rolagem
}

// Show popup when button is clicked
openPopup.addEventListener('click', function(event) {
    event.preventDefault(); // Prevenir comportamento padrão
    showPopup();
});

// Hide popup when close button is clicked
closePopup.addEventListener('click', function() {
    hidePopup();
});

// Optional: Hide the popup if clicking outside of it
overlay.addEventListener('click', function() {
    hidePopup();
});
