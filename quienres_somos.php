<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/neuro/css/somos.css">
    <link rel="shortcut icon" href="./neuro/images/ICO.png" type="image/x-icon">
    <?php include './includes/menu_nav.php'; ?>
</head>
<body>
    <header class="hero">
        <div class="hero-content container">
            <div class="hero-content container">
                <div class="hero-txt">
                    <h1>¿QUIÉNES SOMOS?</h1>
                    <section class="contenedor-horizontal">
                        <section class="carrusel-container">
                            <div class="carrusel">
                                <img src="/neuro/images/muestra.jpg" alt="Foto 1">
                                <img src="/neuro/images/muestra.jpg" alt="Foto 2">
                                <img src="/neuro/images/muestra.jpg" alt="Foto 3">
                            </div>
                        </section>
                        <section class="imagenes-hover">
                            <img src="/neuro/images/QuienesSomos.png" alt="Imagen 2" class="imagen-efecto">
                            <img src="/neuro/images/Valores.png" alt="Imagen 1" class="imagen-efecto">
                        </section>
                    </section>

                </div>
            </div>
        </div>
    </header>
    <?php include './includes/footer.php'; ?>
</body>

</html>


<script>
    const carrusel = document.querySelector('.carrusel');
    const images = document.querySelectorAll('.carrusel img');
    let index = 0;

    function runCarousel() {
        index++;
        if (index >= images.length) {
            index = 0;
        }
        carrusel.style.transform = `translateX(${-index * 600}px)`;
    }

    setInterval(runCarousel, 3000); // Cambia de imagen cada 3 segundos
</script>