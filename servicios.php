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
                <h3>Gimansia Cerebral</h3>
                <p>Mejora las habilidades cognitivas, sociales y físicas mediante
                    ejercicios que activan ambos hemisferios del cerebro.</p>
                <a href="./neuro/Servicios_individuales/gimnasia_cerebral.php">
                    <button class="quick-view">Vista rápida</button>
                </a>
            </div>
            <div class="card fade-up">
                <img src="./neuro/images/Salud mental.png" alt="Servicio 2">
                <h3>Salud mental</h3>
                <p>Sesiones de yoga adaptadas a diferentes públicos: embarazadas, niños y adultos, con el objetivo de promover el bienestar físico y emocional.</p>
                <a href="./neuro/Servicios_individuales/saludMental.php">
                    <button class="quick-view">Vista rápida</button>
                </a>
            </div>
            <div class="card fade-up">
                <img src="./neuro/images/Tareas dirigidas.png" alt="Servicio 3">
                <h3>Tareas dirigidas</h3>
                <p> Los niños tendrán un rendimiento
                    académico más sólido, lo que les permitirá progresar en su
                    educación y superar las dificultades relacionadas con la
                    disrupción en su formación.</p>
                <a href="./neuro/Servicios_individuales/Tareas_asistidas.php">
                    <button class="quick-view">Vista rápida</button>
                </a>
            </div>
            <div class="card fade-up">
                <img src="./neuro/images/Acompañamiento de las Doulas.png" alt="Servicio 4">
                <h3>Acompañamiento de las Doulas </h3>
                <p>es fundamental para el bienestar
                    de las mujeres en gestación, especialmente aquellas que enfrentan
                    desafíos emocionales, físicos o sociales. Mejora las experiencias
                    durante el embarazo, sino que también facilitaría la creación de
                    vínculos afectivos positivos con sus hijos</p>
                <a href="./neuro/Servicios_individuales/acompañamientoDoulas.php">
                    <button class="quick-view">Vista rápida</button>
                </a>
            </div>
            <div class="card fade-up">
                <img src="./neuro/images/Educación Financiera y Emprendimiento.png" alt="Servicio 5">
                <h3>Educación Financiera
                    y Emprendimiento</h3>
                <p>▪ Introducción a los Objetivos de Desarrollo Sostenible (ODS)
                ▪ Plan de negocios básico (Producto Mínimo Viable)
                    ▪ Campaña básica de marketing
                    ▪ Ventas</p>
                <a href="./neuro/Servicios_individuales/EduFinanciero.php">
                    <button class="quick-view">Vista rápida</button>
                </a>

            </div>
            <div class="card fade-up">
                <img src="./neuro/images/Cursos de Computación.png" alt="Servicio 6">
                <h3>Cursos de
                    Computación </h3>
                <p>Manejo de principios básicos (Paquete Office):
                    ▪ Word
                    ▪ Excel
                    ▪ PowerPoint
                    Herramientas de diseño gráfico:
                    ▪ Canva
                    ▪ Genially
                    ▪ Paint</p>
                <a href="./neuro/Servicios_individuales/cursos_de_computacion.php">
                    <button class="quick-view">Vista rápida</button>
                </a>
            </div>
            <div class="card fade-up">
                <img src="./neuro/images/Programación.png" alt="Servicio 7">
                <h3>Programación</h3>
                <p>▪ Introducción a la programación
▪ Introducción a la inteligencia artificial
▪ Creación de páginas web
▪ Creación de juegos interactivos en Pyton</p>
                <a href="./neuro/Servicios_individuales/programacion.php">
                    <button class="quick-view">Vista rápida</button>
                </a>
            </div>
            <div class="card fade-up">
                <img src="./neuro/images/Inglés.png" alt="Servicio 8">
                <h3>Inglés </h3>
                <p>Descripción del servicio 8.</p>
                <a href="/neuro/Servicios_individuales/ingles.php">
                    <button class="quick-view">Vista rápida</button>
                </a>

            </div>
            <div class="card fade-up">
                <img src="./neuro/images/Robotica.png" alt="Servicio 9">
                <h3>Robótica </h3>
                <p>Descripción del servicio 9.</p>
                <a href="./neuro/Servicios_individuales/robotica.php">
                    <button class="quick-view">Vista rápida</button>
                </a>
            </div>
            <div class="card fade-up">
                <img src="./neuro/images/manualidades.png" alt="Servicio 10">
                <h3> Manualidades </h3>
                <p>Descripción del servicio 10.</p>
                <a href="./neuro/Servicios_individuales/manulidades.php">
                    <button class="quick-view">Vista rápida</button>
                </a>
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
</script>