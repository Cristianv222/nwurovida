<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neurovida Contáctanos</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./neuro/css/Contacto.css">
</head>
<body>

<header>
<?php include './includes/menu_nav.php'; ?>
<header class="hero_contac">
    <div class="hero_contac-content container">
            <div class="hero-txt">
                <h1>Contactanos</h1>
                <a href="">Agenda tu cita</a>
                </div>

    </header>

    <div class="contact-container">
        <section class="contact-info">
            <form action="https://formsubmit.co/1029cristianvasquez@gmail.com" method="POST">
                <h2>Contacto</h2>
                <div class="input-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" placeholder="Nombre">
                    
                    <label for="phone">Teléfono</label>
                    <input type="tel" name="phone" id="phone" placeholder="Teléfono">
                    
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email">
                    
                    <label for="message">Mensaje</label>
                    <textarea name="message" id="message" cols="30" rows="5" placeholder="Mensaje"></textarea>
                    
                    <input class="btnEnviar" type="submit" value="Enviar">
                </div>
            </form>
        </section>
    </div>
    <section class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1410.4706480803052!2d-77.71259786613068!3d0.816259513493242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e2968bae7d5eb4d%3A0x2d2e73b19f33388d!2zVHVsY8Ohbg!5e0!3m2!1ses!2sec!4v1730240853658!5m2!1ses!2sec" 
                style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
    <?php include './includes/footer.php'; ?>
</body>

</html>
