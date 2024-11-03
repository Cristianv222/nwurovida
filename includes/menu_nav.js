
const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');
const buttons = document.querySelector('.buttons');
const nav = document.querySelector('nav');

// Al hacer clic en el botón hamburguesa, alternar clases
hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navLinks.classList.toggle('active');
    buttons.classList.toggle('active');
});

// Cambiar el fondo del menú al hacer scroll
window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        nav.classList.add('scrolled');
    } else {
        nav.classList.remove('scrolled');
    }
});

