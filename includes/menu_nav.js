const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');
const buttons = document.querySelector('.buttons');
const nav = document.querySelector('nav');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navLinks.classList.toggle('active');
    buttons.classList.toggle('active');
});

window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        nav.classList.add('scrolled');
    } else {
        nav.classList.remove('scrolled');
    }
});
// Obtén todos los enlaces del menú
const navLinks = document.querySelectorAll('.nav-links li a');

// Función para establecer la clase 'active' en el enlace actual
function setActiveLink() {
    // Elimina la clase 'active' de todos los enlaces
    navLinks.forEach(link => link.classList.remove('active'));
    
    // Agrega la clase 'active' al enlace actual
    this.classList.add('active');
}

// Añadir el evento de clic a cada enlace
navLinks.forEach(link => link.addEventListener('click', setActiveLink));

// Establecer el enlace activo por defecto cuando la página se carga
document.addEventListener('DOMContentLoaded', () => {
    const currentUrl = window.location.href;
    navLinks.forEach(link => {
        if (link.href === currentUrl) {
            link.classList.add('active');
        }
    });
});
