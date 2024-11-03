<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Neurovida</title>
  <link rel="shortcut icon" href="./neuro/images/ICO.png" type="image/x-icon" sizes="114x114">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="El Centro NeuroVida tiene como misión transformar y reconstruir el desarrollo integral de los miembros de la familia">
  <meta name="keywords" content="Tulcan, NeuroVida, bienestar, neurociencia, salud mental, Tulcán, desarrollo cognitivo, educación financiera, emprendimiento, sostenibilidad, gimnasia cerebral, yoga prenatal, tareas dirigidas, acompañamiento de doulas, robótica, programación, nutrición, fisioterapia, inclusividad, responsabilidad social, resiliencia">
  <meta property="og:title" content="NeuroVida - Centro Integral para el Bienestar Cognitivo y Emocional">
  <meta property="og:description" content="NeuroVida es el primer centro en Tulcán que ofrece servicios enfocados en el bienestar integral familiar, combinando neurociencia, salud mental, y educación financiera. ¡Mejora tu calidad de vida con nosotros!">
  <meta property="og:image" content="./neuro/images/logotipo.png">
  <meta property="og:url" content="https://clubneurovida.com/">

  <link rel="stylesheet" href="./neuro/style.css">
  <script defer src="./neuro/script.js"></script>
</head>

<body>
  <?php include './includes/menu_nav.php'; ?>
  <div class="header-content container">
    <img src="./neuro/images/MARCA NEUROVIDA.svg" alt="Club Neurovida" class="logo-left">
    <a href="servicios.php" class="btn-Inicio">Agendar Cita</a>
  </div>
  <main class="frase_sec1">
    <div class="frase-content_sec1 container">
      <h2>Nuestos servicios</h2>
      <p class="txt-p_sec1">En NeuroVida, creemos que la transformación y reconstrucción constante, es una oportunidad para crecer y mejorar.</p>
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
      <img src="./neuro/images/flecha_izquierda.svg" alt="Flecha Izquierda" class="prev" onclick="moveCarousel(-1)">
      <img src="./neuro/images/flecha_derecha.svg" alt="Flecha Derecha" class="next" onclick="moveCarousel(1)">
      <div class="ver-mas-container">
        <a href="/servicios.php" class="btn-estud">Agendar cita</a>
      </div>
    </div>
  </main>
  <?php include './includes/footer.php'; ?>
</body>

</html>