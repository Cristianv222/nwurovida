<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./neuro/css/estilo.css">
    <title>Neurovida-Servicios</title>
    <?php include './includes/menu_nav.php'; ?>

</head>
<body>
    <div class="container_s">
        <h1 class="fade-in">Nuestros Servicios</h1>
        <p class="fade-in">Descubre los mejores servicios que ofrecemos para ti.</p>
        <div class="gallery">
            <div class="card fade-up">
                <img src="./neuro/images/gimnasia.png"alt="Servicio 1">
                <h3>Gimansia Cerebral</h3>
                <p>Mejora las habilidades cognitivas, sociales y físicas mediante 
                ejercicios que activan ambos hemisferios del cerebro.</p>
                <a href="./neuro/Servicios_individuales/gimnasia_cerebral.php">
                <button class="quick-view">Vista rápida</button>
                </a>
            </div>
            <div class="card fade-up">
                <img src="./neuro/images/yoga.jpg" alt="Servicio 2">
                <h3>Salud mental</h3>
                <p>Descripción del servicio 2.</p>
                <a href="./neuro/Servicios_individuales/saludMental.php">
                <button class="quick-view">Vista rápida</button>
                </a>
            </div>
            <div class="card fade-up">
                <img src="./neuro/images/tareas dirigidas.jpg" alt="Servicio 3">
                <h3>Tareas dirigidas</h3>
                <p> Los niños tendrán un rendimiento 
                académico más sólido.</p>
                <a href="./neuro/Servicios_individuales/Tareas_asistidas.php">
                    <button class="quick-view">Vista rápida</button>
                </a>
            </div>
            <div class="card fade-up">
                <img src="./neuro/images/acompañamiento de doulas.jpg" alt="Servicio 4">
                <h3>Acompañamiento de 
                las Doulas </h3>
                <p>Mejora las experiencias 
                durante el embarazo.</p>
                <a href="./neuro/Servicios_individuales/acompañamientoDoulas.php">
                <button class="quick-view">Vista rápida</button>
                </a>
            </div>
            <div class="card fade-up">
                <img src="./neuro/images/educacion financiera y emprendimienot.jpg" alt="Servicio 5">
                <h3>Educación Financiera 
                y Emprendimiento</h3>
                <p>Descripción del servicio 5.</p>
                <a href="./neuro/Servicios_individuales/EduFinanciero.php">
                <button class="quick-view">Vista rápida</button>
                </a>
                
            </div>
            <div class="card fade-up">
                <img src="./neuro/images/cursos de computacion.jpg" alt="Servicio 6">
                <h3>Cursos de 
                Computación </h3>
                <p>Descripción del servicio 6.</p>
                <a href="./neuro/Servicios_individuales/cursos_de_computacion.php">
                <button class="quick-view">Vista rápida</button>
                </a>
            </div>
            <div class="card fade-up">
                <img src="./neuro/images/programacion.jpg" alt="Servicio 7">
                <h3>Programación</h3>
                <p>Descripción del servicio 7.</p>
                <a href="./neuro/Servicios_individuales/programacion.php">
                <button class="quick-view" >Vista rápida</button>
                </a>
            </div>
            <div class="card fade-up">
                <img src="./neuro/images/curso ingles.jpg" alt="Servicio 8">
                <h3>Inglés </h3>
                <p>Descripción del servicio 8.</p>
           <button class="quick-view">Vista rápida</button>
                
            </div>
            <div class="card fade-up">
                <img src="./neuro/images/robotica.jpg" alt="Servicio 9">
                <h3>Robótica </h3>
                <p>Descripción del servicio 9.</p>
                <button class="quick-view">Vista rápida</button>
                </a>
            </div>
            <div class="card fade-up">
                <img src="./neuro/images/manualidades.jpg" alt="Servicio 9">
                <h3> Manualidades  </h3>
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


<style>
.container_s {
    max-width: 1200px;
    margin: 0 auto;
    text-align: center;
    background-color: #ffffff00; 
}

h1 {
    font-size: 36px;
    margin-bottom: 20px;
}

p {
    font-size: 18px;
    margin-bottom: 40px;
}

.gallery {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

/* Estilos para las tarjetas */
.card {
    position: relative; /* Importante para posicionar el botón de forma absoluta */
    background-color: white;
    border: 1px solid #ddd;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.card img {
    max-width: 100%;
    height: auto;
    margin-bottom: 15px;
}

.card:hover {
    transform: translateY(-10px);
}

/* Botón de Vista Rápida */
.quick-view {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #333;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    opacity: 0;
    transition: opacity 0.3s ease, transform 0.3s ease;
}

/* Mostrar botón al hacer hover en la tarjeta */
.card:hover .quick-view {
    opacity: 1;
    transform: translate(-50%, 0);
}

.quick-view:hover {
    background-color: #555;
}

/* Animaciones de entrada */
.fade-in, .fade-up {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 1s forwards;
}

.fade-in {
    animation-delay: 0.5s;
}

.fade-up {
    animation-delay: 1s;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive: Ajustes para pantallas más pequeñas */

/* Tablets en orientación vertical y horizontal */
@media (max-width: 992px) {
    .gallery {
        grid-template-columns: repeat(2, 1fr); /* 2 columnas en tabletas */
    }

    h1 {
        font-size: 30px;
    }

    p {
        font-size: 16px;
    }
}

/* Móviles: ajustar a una sola columna */
@media (max-width: 768px) {
    .gallery {
        grid-template-columns: 1fr; /* 1 columna en dispositivos móviles */
    }

    h1 {
        font-size: 26px;
    }

    p {
        font-size: 14px;
    }

    .card {
        padding: 15px;
    }
}

/* Ajustes adicionales para pantallas más pequeñas */
@media (max-width: 576px) {
    h1 {
        font-size: 22px;
    }

    p {
        font-size: 12px;
    }
}
</style>

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