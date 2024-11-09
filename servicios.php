<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./neuro/css/estiloServicios.css">
    <title>Neurovida-Servicios</title>


</head>

<body>
    <header>
        <?php include './includes/menu_nav.php'; ?>
    </header>
    <div class="header-content container">
        <div class="header-txt">
            <h1>Conoce sobre nuestros servicios</h1>
        </div>
    </div>
    <div class="container_s">
        <p class="fade-in">Descubre cómo nuestros servicios pueden ayudarte a lograr tus objetivos.</p>
        <div class="gallery">
            <div class="card fade-up">
                <img src="./neuro/images/gimnasia.png" alt="Servicio 1">
                <h3>Gimnasia Cerebral</h3>
                <p>Mejora las habilidades cognitivas, sociales y físicas mediante ejercicios que activan ambos hemisferios del cerebro.</p>
                <button class="quick-view" data-id="./neuro/Servicios_individuales/gimnasia_cerebral.php" onclick="openModal(this)">Vista rápida</button>
                </div>

            <!-- Modal -->
            <div id="myModal" class="modal" onclick="closeModal(event)">
                <div class="modal-content" onclick="event.stopPropagation()">
                    <span class="close" onclick="closeModal(event)">&times;</span>
                    <div id="modal-body"></div>
                </div>
            </div>


            <div class="card fade-up">
                <img src="./neuro/images/Salud mental.png" alt="Servicio 2">
                <h3>Salud mental</h3>
                <p> Sesiones de yoga para embarazadas, niños y adultos, enfocadas en el bienestar físico y emocional.</p>
                <button class="quick-view" data-id="./neuro/Servicios_individuales/saludMental.php" onclick="openModal(this)">Vista rápida</button>

            </div>
            <div class="card fade-up">
                <img src="./neuro/images/Tareas dirigidas.png" alt="Servicio 3">
                <h3>Tareas dirigidas</h3>
                <p> Los niños mejorarán su rendimiento académico, facilitando su progreso y superación de dificultades educativas.</p>
                <button class="quick-view" data-id="./neuro/Servicios_individuales/Tareas_asistidas.php" onclick="openModal(this)">Vista rápida</button>

            </div>
            <div class="card fade-up">
                <img src="./neuro/images/Acompañamiento de las Doulas.png" alt="Servicio 4">
                <h3>Acompañamiento de las Doulas </h3>
                <p>Es crucial para el bienestar de las gestantes, especialmente si enfrentan desafíos, mejorando su experiencia y fomentando vínculos afectivos con sus hijos.</p>
                <button class="quick-view" data-id="./neuro/Servicios_individuales/acompañamientoDoulas.php" onclick="openModal(this)">Vista rápida</button>

            </div>
            <div class="card fade-up">
                <img src="./neuro/images/Educación Financiera y Emprendimiento.png" alt="Servicio 5">
                <h3>Educación Financiera
                    y Emprendimiento</h3>
                <p>
                    ▪ Introducción a los Objetivos de Desarrollo Sostenible (ODS) <br>
                    ▪ Plan de negocios básico (Producto Mínimo Viable) <br>
                    ▪ Campaña básica de marketing <br>
                    ▪ Ventas
                </p>

                <button class="quick-view" data-id="./neuro/Servicios_individuales/EduFinanciero.php" onclick="openModal(this)">Vista rápida</button>


            </div>
            <div class="card fade-up">
                <img src="./neuro/images/Cursos de Computación.png" alt="Servicio 6">
                <h3>Cursos de
                    Computación </h3>
                <p>Manejo de principios básicos:<br>
                    ▪ Word<br>
                    ▪ Excel<br>
                    ▪ PowerPoint<br>
                    Herramientas de diseño gráfico:<br>
                    ▪ Canva<br>
                    ▪ Genially<br>
                    ▪ Paint<br></p>
                    <button class="quick-view" data-id="./neuro/Servicios_individuales/cursos_de_computacion.php" onclick="openModal(this)">Vista rápida</button>

            </div>
            <div class="card fade-up">
                <img src="./neuro/images/Programación.png" alt="Servicio 7">
                <h3>Programación</h3>
                <p>▪ Introducción a la programación<br>
                    ▪ Introducción a la inteligencia artificial<br>
                    ▪ Creación de páginas web<br>
                    ▪ Creación de juegos interactivos en Pyton<br></p>
                    <button class="quick-view" data-id="./neuro/Servicios_individuales/programacion.php" onclick="openModal(this)">Vista rápida</button>

            </div>
            <div class="card fade-up">
                <img src="./neuro/images/Inglés.png" alt="Servicio 8">
                <h3>Inglés </h3>
                <p> Para niños de 7 a 10 años, con juegos, canciones y actividades interactivas que fomentan el aprendizaje divertido y efectivo del inglés.</p>
                <button class="quick-view" data-id="./neuro/Servicios_individuales/ingles.php" onclick="openModal(this)">Vista rápida</button>


            </div>
            <div class="card fade-up">
                <img src="./neuro/images/Robotica.png" alt="Servicio 9">
                <h3>Robótica </h3>
                <p>Curso de robótica para desarrollar habilidades en la construcción y programación de robots mediante proyectos prácticos e innovadores.</p>
                <button class="quick-view" data-id="./neuro/Servicios_individuales/robotica.php" onclick="openModal(this)">Vista rápida</button>

            </div>
            <div class="card fade-up">
                <img src="./neuro/images/manualidades.png" alt="Servicio 10">
                <h3> Manualidades </h3>
                <p> Para crear proyectos originales y desarrollar la creatividad a través de técnicas variadas y materiales diversos.</p>
                <button class="quick-view" data-id="./neuro/Servicios_individuales/manulidades.php" onclick="openModal(this)">Vista rápida</button>

            </div>
        </div>
    </div>
</body>
<?php include './includes/footer.php'; ?>

</html>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const fadeInElements = document.querySelectorAll('.fade-in, .fade-up');
        fadeInElements.forEach((element) => {
            element.style.opacity = '0';
            element.style.transition = 'opacity 1s ease-out, transform 1s ease-out';
            element.style.transform = 'translateY(20px)';
        });

        setTimeout(() => {
            fadeInElements.forEach((element) => {
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            });
        }, 300);
    });

    function openModal(button) {
    var modal = document.getElementById("myModal");
    var modalBody = document.getElementById("modal-body");

    // Obtener la ruta del archivo PHP desde el atributo data-id
    var contentUrl = button.getAttribute("data-id");

    // Realizamos la carga del contenido PHP dentro del modal
    fetch(contentUrl)
        .then(response => response.text())
        .then(data => {
            modalBody.innerHTML = data; // Inserta el contenido dentro del modal
            modal.style.display = "flex"; // Muestra el modal usando flexbox
        })
        .catch(error => {
            console.error('Error cargando el contenido:', error);
        });
}

function closeModal(event) {
    var modal = document.getElementById("myModal");
    if (event.target === modal || event.target.className === "close") {
        modal.style.display = "none"; // Cierra el modal
    }
}


</script>