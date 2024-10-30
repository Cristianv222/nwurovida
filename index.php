<?php
// index.php
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neurovida</title>
    <link rel="shortcut icon" href="./neuro/images/apple-icon-144x144.png" type="image/x-icon"  sizes="114x114">
    <!-- Optimiza la vista en móviles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Breve descripción del contenido para SEO -->
    <meta name="description" content="El Centro NeuroVida tiene como misión 
    transformar y reconstruir el desarrollo integral 
    de los miembros de la familia">

    <!-- Palabras clave que ayudan al SEO -->
    <meta name="keywords" content="Tulcan,NeuroVida, bienestar, neurociencia, 
    salud mental, Tulcán, desarrollo cognitivo, educación financiera, 
    emprendimiento, sostenibilidad, gimnasia cerebral, yoga prenatal, 
    tareas dirigidas, acompañamiento de doulas, robótica, programación,
    nutrición, fisioterapia, inclusividad, responsabilidad social, resiliencia">


    <!-- Información de Open Graph para redes sociales -->
    <meta property="og:title" content="NeuroVida - Centro Integral para el Bienestar Cognitivo y Emocional">
    <meta property="og:description" content="NeuroVida es el primer centro en Tulcán que
     ofrece servicios enfocados en el bienestar integral familiar, combinando neurociencia,
      salud mental, y educación financiera. ¡Mejora tu calidad de vida con nosotros!">
    <meta property="og:image" content="./neuro/images/logotipo.png">
    <meta property="og:url" content="https://clubneurovida.com/">
    <link rel="stylesheet" href="">
</head>


<body>
<?php include './includes/menu_nav.php'; ?>
<main class="frase_sec1">
       <div class="frase-content_sec1 container">
            <h2>Nuestos servicios</h2>
            <p class="txt-p_sec1">En NeuroVida, creemos que la transformación y reconstrucción constante, es una
                oportunidad para crecer y mejorar.
            </p>
          </div>
            <div class="carousel-container">
    <div class="carousel">
      <div class="card">
        <img src="./neuro/images/manualidades.jpg" alt="Imagen 1">
        <h3>Manualidades</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
      </div>
      <div class="card">
        <img src="./neuro/images/cursos de computacion.jpg" alt="Imagen 2">
        <h3>Cursos de computacion</h3>
        <p>ipsum dolor sit amet consectetur adipisicing elit.</p>
      </div>
      <div class="card">
        <img src="./neuro/images/gimnasia.png" alt="Imagen 3">
        <h3>Gimnasia cerebral</h3>
        <p>ipsum dolor sit amet consectetur adipisicing elit.</p>
      </div>
      <div class="card">
        <img src="./neuro/images/programacion.jpg" alt="Imagen 4">
        <h3>Programación</h3>
        <P>ipsum dolor sit amet consectetur adipisicing elit.</P>
      </div>
      <div class="card">
        <img src="./neuro/images/yoga.jpg" alt="Imagen 5">
        <h3>Salud mental</h3>
        <p>ipsum dolor sit amet consectetur adipisicing elit.</p>
      </div>
      <div class="card">
        <img src="./neuro/images/educacion financiera y emprendimienot.jpg" alt="Imagen 6">
        <h3> Educación Financiera 
        y Emprendimiento</h3>
        <p>ipsum dolor sit amet consectetur adipisicing elit.</p>
      </div>
      <div class="card">
        <img src="./neuro/images/tareas dirigidas.jpg" alt="Imagen 7">
        <h3>Tareas dirigidas</h3>
        <p>ipsum dolor sit amet consectetur adipisicing elit.</p>
      </div>
      <div class="card">
        <img src="./neuro/images/acompañamiento de doulas.jpg" alt="Imagen 9">
        <h3>Acompañamiento de doulas</h3>
        <P>ipsum dolor sit amet consectetur adipisicing elit.</P>
      </div>
      <div class="card">
        <img src="./neuro/images/curso ingles.jpg" alt="Imagen 10">
        <h3>Curso de ingles</h3>
        <p>ipsum dolor sit amet consectetur adipisicing elit.</p>
      </div>
    </div>

    <!-- Flechas de navegación -->
    <img src="./neuro/images/flecha_izquierda.svg" alt="Flecha Izquierda" class="prev" onclick="moveCarousel(-1)">
    <img src="./neuro/images/flecha_derecha.svg" alt="Flecha Derecha" class="next" onclick="moveCarousel(1)">

    <!-- Botón "Ver más" -->
    <div class="ver-mas-container">
    <a href="/servicios.php" class="btn-estud"> Agendar cita</a>
    </div>
  </div>
<main/>

    <?php include './includes/footer.php'; ?>
</body>
</html>

<style>
 .carousel-container {
  position: relative;
  width: 100%;
  max-width: 1200px;
  margin: auto;
  overflow: hidden;
}

.carousel {
  display: flex;
  transition: transform 0.5s ease-in-out;
}

.card {
  min-width: calc(33.333% - 20px); /* Muestra 3 cartas */
  margin: 10px;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 8px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.card img {
    max-width: 100%;
    height: auto;
    margin-bottom: 15px;
}

.card h3 {
  padding: 10px;
  font-size: 18px;
  color: #333;
}
.ver-mas-container {
  text-align: center;
  margin: 30px 0;
}

.prev, .next {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(0, 0, 0, 0);
  color: white;
  border: none;
  padding: 0px;
  cursor: pointer;
}

.prev {
  left: 10px;
}

.next {
  right: 10px;
}

/* Responsive */
@media (max-width: 768px) {
  .card {
    min-width: calc(50% - 20px); /* Muestra 2 cartas */
  }
}

@media (max-width: 480px) {
  .card {
    min-width: 100%; /* Muestra 1 carta */
  }
}
</style>

<script>
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

</script>