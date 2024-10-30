<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neurovida Contáctanos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include './includes/menu_nav.php'; ?>
    <header>
        <div class="header-content container">
            <img src="./neuro/images/Imagotipo.png" alt="Club Neurovida" class="logo-left">
            <a href="servicios.php" class="btn-Inicio">Agendar Cita</a>
        </div>
    </header>
    <section>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1410.4706480803052!2d-77.71259786613068!3d0.816259513493242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e2968bae7d5eb4d%3A0x2d2e73b19f33388d!2zVHVsY8Ohbg!5e0!3m2!1ses!2sec!4v1730240853658!5m2!1ses!2sec" 
            style="border:0; width: 100%; height: 300px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </section>
    <section>
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

    <script>
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
    </script>
    <?php include './includes/footer.php'; ?>
</body>
</html>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
    }

    .logo-left {
        max-width: 800px;
    }

    .btn-Inicio {
        padding: 10px 20px;
        background-color: #36e3f0;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;   
        width: 50% 90%;
    }

    form {
        padding: 20px;
        margin: 20px auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        max-width: 600px;
        width: 90%;
        background-color: #fff;
    }

    .input-group {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    h2 {
        color: #283629;
        font-size: 28px;
        margin-bottom: 20px;
        text-align: center;
    }

    label {
        color: #283629;
        font-size: 14px;
        font-weight: 600;
    }

    input, textarea {
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #48bce0;
        font-size: 16px;
        width: 100%;
        box-sizing: border-box;
    }

    input::placeholder, textarea::placeholder {
        color: #b5cab6;
    }

    .btnEnviar {
        font-size: 16px;
        padding: 10px;
        color: #fff;
        background-color: #36e3f0;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btnEnviar:hover {
        background-color: #48bce0;
    }

    /* Responsivo */
    @media (max-width: 768px) {
        .header-content {
            flex-direction: column;
            gap: 10px;
        }

        iframe {
            height: 250px;
        }

        form {
            padding: 15px;
        }

        .logo-left {
            max-width: 370px;
        }

        .btn-Inicio {
            padding: 8px 15px;
        }
    }
</style>
