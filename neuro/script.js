let currentIndex = 0;
const cards = document.querySelectorAll('.card');
const totalCards = cards.length;
const cardsToShow = 3; // Muestra 3 cartas a la vez

// Clonamos las primeras cartas para el efecto infinito
const carousel = document.querySelector('.carousel');
for (let i = 0; i < cardsToShow; i++) {
  const clone = cards[i].cloneNode(true);
  carousel.appendChild(clone);
}

// Agregamos un evento para que el carrusel sea infinito
function moveCarousel(direction) {
  currentIndex += direction;

  // Cambia la posición del carrusel
  const offset = currentIndex * (100 / cardsToShow);
  carousel.style.transform = `translateX(-${offset}%)`;

  // Al llegar al final del conjunto original, se reinicia el índice
  if (currentIndex >= totalCards) {
    currentIndex = 0; // Reinicia el índice
    setTimeout(() => {
      carousel.style.transition = 'none'; // Desactiva la transición para evitar el "salto"
      carousel.style.transform = `translateX(0%)`; // Vuelve al inicio
    }, 500); // Espera a que se complete la transición
  } else if (currentIndex < 0) {
    currentIndex = totalCards - 1; // Ajusta al último conjunto
    setTimeout(() => {
      carousel.style.transition = 'none'; // Desactiva la transición para evitar el "salto"
      const lastOffset = (totalCards - 1) * (100 / cardsToShow);
      carousel.style.transform = `translateX(-${lastOffset}%)`; // Muestra el último conjunto
    }, 500); // Espera a que se complete la transición
  }

  // Activa la transición
  carousel.style.transition = 'transform 0.5s ease-in-out';
}

// Auto avance del carrusel
setInterval(() => {
  moveCarousel(1);
}, 2000); // Cada 3 segundos

// imagen de fondo

document.addEventListener('DOMContentLoaded', () => {
  const backgroundDiv = document.getElementById('backgroundDiv');
  const imageUrl = './neuro/images/imagen portada.jpg';

  // Crea un nuevo objeto de imagen para comprobar la carga
  const img = new Image();
  img.src = imageUrl;

  img.onload = () => {
      // Si la imagen se carga correctamente, la establece como fondo
      backgroundDiv.style.backgroundImage = `url('${imageUrl}')`;
  };

  img.onerror = () => {
      // Si hay un error en la carga de la imagen, puedes ocultar el div
      console.error('La imagen de fondo no se pudo cargar.');
      backgroundDiv.classList.add('hidden'); // O puedes cambiar el fondo a un color sólido
      // backgroundDiv.style.backgroundColor = '#f00'; // Por ejemplo, rojo
  };
});



const images = document.querySelectorAll('.valor-img');

images.forEach(img => {
    img.addEventListener('click', () => {
        alert(`Has seleccionado ${img.alt}`);
    });
});


// Obtener el botón y el formulario (si es necesario)
const btnInicio = document.querySelector('.btn-Inicio');
const logForm = document.querySelector('#logForm'); // Asegúrate de tener un formulario con este ID si lo estás usando

// Agregar evento de clic al botón
btnInicio.addEventListener('click', (event) => {
  event.preventDefault(); // Evita la acción por defecto (si el botón está dentro de un formulario)

  // Aquí puedes definir qué hacer cuando se hace clic en el botón
  console.log("Botón presionado, subiendo log...");

  // Si estás enviando un formulario para subir el log, puedes usar fetch o XMLHttpRequest para hacerlo de manera automática
  const logData = new FormData(logForm); // Recoge los datos del formulario si los tienes

  // Usar Fetch para enviar los datos al servidor (ajustar la URL según sea necesario)
  fetch('/ruta/donde/subir/log', {
    method: 'POST',
    body: logData
  })
  .then(response => response.json()) // Asumiendo que el servidor responde con JSON
  .then(data => {
    console.log("Log subido con éxito:", data);
  })
  .catch(error => {
    console.error("Error al subir el log:", error);
  });

  // Opcionalmente, cambiar algo en la interfaz para indicar que el log está siendo subido
  btnInicio.textContent = 'Subiendo log...'; // Cambia el texto del botón, por ejemplo
  btnInicio.disabled = true; // Deshabilita el botón mientras se sube el log
});

// Si estás utilizando un input file para seleccionar el log, puedes añadir un evento adicional para manejarlo
const logInput = document.querySelector('#logFileInput'); // Asegúrate de tener un input con este ID

logInput.addEventListener('change', (event) => {
  const file = event.target.files[0];
  if (file) {
    console.log("Log seleccionado:", file.name);
    // Aquí puedes hacer algo con el archivo, como prepararlo para el envío
  }
});
