<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NeuroVida</title>
  <link rel="shortcut icon" href="./neuro/images/ICO.png" type="image/x-icon">
  <meta name="description" content="El Centro NeuroVida tiene como misión transformar y reconstruir el desarrollo integral de los miembros de la familia.">
  <meta name="keywords" content="Tulcan, NeuroVida, bienestar, neurociencia, salud mental, desarrollo cognitivo, educación financiera, emprendimiento, sostenibilidad, gimnasia cerebral, yoga prenatal, nutrición, fisioterapia, inclusividad, responsabilidad social, resiliencia">

  <meta property="og:title" content="NeuroVida - Centro Integral para el Bienestar Cognitivo y Emocional">
  <meta property="og:description" content="NeuroVida es el primer centro en Tulcán que ofrece servicios enfocados en el bienestar integral familiar, combinando neurociencia y salud mental. ¡Mejora tu calidad de vida con nosotros!">
  <meta property="og:image" content="./neuro/images/logotipo.png">
  <meta property="og:url" content="https://clubneurovida.com/">
  <?php include './includes/menu_nav.php'; ?>
  <link rel="stylesheet" href="./neuro/css/style.css">
  <script defer src="./neuro/script.js"></script>
</head>
 
<body>
  <div class="background-image" id="backgroundDiv">
    <div class="content-left">
      <img src="/neuro/images/MARCA NEUROVIDA.svg" alt="Club Neurovida" class="logo-left">
      <a href="servicios.php" class="btn-Inicio">Agendar Cita</a>
    </div>
  </div>

<main class="frase_sec1">
    <div class="frase-content_sec1 container">
      <h2><center>Nuestos servicios</center></h2>
      <p class="txt-p_sec1"><center>En NeuroVida, creemos que la transformación y reconstrucción constante, es una oportunidad para crecer y mejorar.</center></p>
    </div>
    <div class="carousel-container">
      <div class="carousel">
        <div class="card">
          <img src="./neuro/images/manualidades.png" alt="Imagen 1">
          <h3>Manualidades</h3>
        </div>
        <div class="card">
          <img src="./neuro/images/Cursos de Computación.png" alt="Imagen 2">
          <h3>Cursos de computacion</h3>
        </div>
        <div class="card">
          <a href="./neuro/Servicios_individuales/gimnasia_cerebral.php"><img src="./neuro/images/gimnasia.png" alt="Imagen 3"></a>
          <h3>Gimnasia cerebral</h3>
        </div>
        <div class="card">
          <img src="./neuro/images/Programación.png" alt="Imagen 4">
          <h3>Programación</h3>
        </div>
        <div class="card">
          <img src="./neuro/images/Salud mental.png" alt="Imagen 5">
          <h3>Salud mental</h3>
        </div>
        <div class="card">
          <img src="./neuro/images/Educación Financiera y Emprendimiento.png" alt="Imagen 6">
          <h3> Educación Financiera y Emprendimiento</h3>
        </div>
        <div class="card">
          <img src="./neuro/images/Tareas dirigidas.png" alt="Imagen 7">
          <h3>Tareas dirigidas</h3>
        </div>
        <div class="card">
          <img src="./neuro/images/Acompañamiento de las Doulas.png" alt="Imagen 9">
          <h3>Acompañamiento de doulas</h3>
        </div>
        <div class="card">
          <img src="./neuro/images/Inglés.png" alt="Imagen 10">
          <h3>Curso de ingles</h3>
        </div>
      </div>
      <img src="./neuro/images/flecha_izquierda.svg" alt="Flecha Izquierda" class="prev" onclick="moveCarousel(-1)">
      <img src="./neuro/images/flecha_derecha.svg" alt="Flecha Derecha" class="next" onclick="moveCarousel(1)">
      <div class="ver-mas-container">
      </div>
    </div>
    <div class="container-btn">
  <a href="#" class="btn-estud">Agendar cita</a>
</div
  </main>
  <div class="valores-container">
    <img src="./neuro/images/Mision.png" alt="Valor 2" class="valor-img">
    <img src="./neuro/images/Vision.png" alt="Valor 3" class="valor-img">
  </div>
  <div class="contenedor-principal">
    <div class="objetivos-container">
      <img src="./neuro/images/Objetivo2-min.png" alt="Objetivos" class="objetivos-img">
      <div class="objetivos-texto">
        <h2>Objetivos</h2>
        <ul>
  <li><strong>Desarrollar Habilidades Cognitivas:</strong> Fortalecer capacidades mentales mediante gimnasia cerebral </li>
  <li><strong>Promover el Bienestar Emocional:</strong> Proveer herramientas para gestionar emociones.</li>
  <li><strong>Fomentar la Sostenibilidad y el Emprendimiento:</strong> Enseñar principios financieros y sostenibilidad para formar emprendedores conscientes.</li>
 
</ul>

        </ul>

      </div>
    </div>

    <div class="profesionales-container">
      <img src="./neuro/images/Profesiones-min.png" alt="Profesionales" class="profesionales-img">
      <div class="profesionales-texto">
        <h2>Profesionales</h2>
        <ul>
          <li>Neuropsicología y Educación</li>
          <li>Psicología</li>
          <li>Nutrición y Salud</li>
          <li>Educación</li>
          <li>Fisioterapia</li>
          <li>Inglés</li>
          <li>Computación</li>
          <li>Riesgos Financieros</li>
          <li>Personal de apoyo: Estudantes UPEC</li>
        </ul>
      </div>
    </div>
  </div>  


</body>

<?php include './includes/footer.php'; ?>
</html>