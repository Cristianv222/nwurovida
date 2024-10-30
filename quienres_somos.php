<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header class="header">
    <nav class="navbar">
        <a href="index.php" class="logo">
            <img src="/neuro/images/logotipo.png" alt="">
        </a>
        
        <button class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </button>

        <ul class="nav-links">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Quiénes Somos</a></li>
            <li><a href="#">Contáctanos</a></li>
            <li><a href="#">Servicios</a></li>
        </ul>

        <div class="buttons">
            <a href=""><button class="btn btn-outline">Estudiante</button></a>
            <a href=""><button class="btn btn-solid">Maestro</button></a>
    </nav>
    </header>
    <section>
    <div class="quote-container">
        <p class="quote">"Somos nuestros sueños, si no soñamos estamos muertos"</p>
        <p class="quote-author">Kilian Jornet</p>
    </div>
    </section>
    <footer class="footer">
        <div class="footer-content">
            <!-- Logo -->
            <div class="logo-container">
                <svg class="logo" viewBox="0 0 100 100">
                    <circle cx="50" cy="50" r="45" fill="none" stroke="currentColor" stroke-width="2"/>
                    <path d="M25 50 L75 50" stroke="currentColor" stroke-width="2"/>
                    <path d="M50 25 L50 75" stroke="currentColor" stroke-width="2"/>
                </svg>
            </div>

            <!-- Mini Explorers -->
            <div class="footer-section">
                <h3>mini EXPLORERS</h3>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Escapadas</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Tienda online</a></li>
                    <li><a href="#">Mercadillo</a></li>
                </ul>
            </div>

            <!-- Información -->
            <div class="footer-section">
                <h3>INFORMACIÓN</h3>
                <ul>
                    <li><a href="#">Sobre Mini Explorers</a></li>
                    <li><a href="#">Guía de tallas</a></li>
                    <li><a href="#">Cómo comprar</a></li>
                    <li><a href="#">Envío y pago seguro</a></li>
                    <li><a href="#">Cambios y devoluciones</a></li>
                </ul>
            </div>

            <!-- Contacto -->
            <div class="footer-section">
                <h3>CONTACTO</h3>
                <ul>
                    <li><a href="#">Rivas (Madrid)</a></li>
                    <li><a href="#">¿Quieres contarnos algo?</a></li>
                    <li><a href="#">Hazlo aquí</a></li>
                    <li><a href="#">Atención al cliente</a></li>
                    <li><a href="#">¿Quieres colaborar con nosotros?</a></li>
                </ul>
                <div class="social-icons">
                    <a href="#" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            font-family:'Poppins', 'sans-serif';
        }
        .header{
            position: relative;
            background-image: linear-gradient(
            rgba(255, 255, 255, 0),
            rgba(255, 255, 255, 0)
            ),
        url(/neuro/images/imagen\ portada.jpg);
        background-position: center bottom;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        min-height: 100vh;  /* Cambiado a 100vh para cubrir toda la pantalla */
        width: 100%;
        }
        .logo-left {
        max-width: 800px;
        height: auto;
        display: block;
        position: absolute;
        top: 50%;
        left: 35%;
        transform: translate(-50%, -50%);
        margin-top: 0px;
        }  
        nav {
            position: fixed; /* Cambiado a absolute en lugar de fixed */
            top: 0;
            left: 0;
            width: 100%;
            padding: 0 35px;
            display: flex;
            justify-content: space-between;
            font-weight: 200;
            align-items: center;
            z-index: 1000;
            transition: background-color 0.3s ease; /* Agregado para suavizar la transición */
        }
         .navbar ul li a:hover {
            color: rgb(203, 156, 247);
        }
        nav.scrolled {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .logo {

            height: 80px; /* Ajusta esto al tamaño que necesites */
            display: flex;
            align-items: center;
        }
        .logo img {
            height: 100%;
            width: auto;
            object-fit: contain;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
        }
        .btn {
            padding: 8px 24px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: Arial, sans-serif;
            min-width: 120px;
            text-align: center;
        }

        /* Botón sólido */
        .btn-solid {
            background-color: #40e0d0;
            color: #000000;
            padding: 8px 20px;
            text-decoration: none;
            font-weight: 200;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn-solid:hover {
            background-color: #38c9b8;
            transform: translateY(-5px);
        }

        /* Botón outline */
        .btn-outline {
            background-color: transparent;
            font-weight: 200;
            color: black;
            border: 2px solid #40e0d0;
        }

        .btn-outline:hover {
            background-color: #40e0d0;
            color: white;
            transform: translateY(-5px);
        }

        /* Contenedor para demostración */
        .button-container {
            display: flex;
            flex-direction: column;
            gap: 16px;
            padding: 20px;
        }
        .hamburger {
            display: none;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0.5rem;
        }

        .hamburger div {
            width: 25px;
            height: 3px;
            background: #333;
            margin: 5px 0;
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .hamburger {
                display: block;
                z-index: 101;
            }

            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                height: 100vh;
                width: 100%;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                background: white;
                transition: right 0.3s ease;
            }

            .nav-links.active {
                right: 0;
            }

            .buttons {
                position: fixed;
                bottom: 5rem;
                right: -100%;
                transition: right 0.3s ease;
            }

            .buttons.active {
                right: 45%;
                transform: translateX(50%);
            }

            /* Animación del menú hamburguesa */
            .hamburger.active div:nth-child(1) {
                transform: rotate(45deg) translate(8px, 6px);
            }

            .hamburger.active div:nth-child(2) {
                opacity: 0;
            }

            .hamburger.active div:nth-child(3) {
                transform: rotate(-45deg) translate(7px, -6px);
            }
        }

        /* Ajustes para pantallas móviles */
@media (max-width: 768px) {
    .logo-left {
        max-width: 400px; /* Reducimos el tamaño del logo en móviles */
        top: 60%; /* Bajamos un poco más el logo en pantallas pequeñas */
        left: 50%;
        transform: translate(-50%, -50%);
    }

    nav {
        padding: 1rem; /* Reducimos el padding del menú para que se vea mejor */
    }

    .nav-links {
        gap: 1rem; /* Reducimos el espacio entre enlaces del menú */
    }
}

/*foteer ##############################*/
.quote-container {
            background-color: #fef9c3;
            padding: 20px;
            text-align: center;
        }

        .quote {
            font-style: italic;
            color: #4a4a4a;
            margin-bottom: 5px;
        }

        .quote-author {
            color: #666;
        }

        .footer {
            background-color: #ecfdf5;
            padding: 40px 20px;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .logo_footer-container {
            text-align: center;
        }

        .logo_footer {
            width: 120px;
            height: 120px;
        }

        .footer-section h3 {
            color: #4a4a4a;
            text-transform: uppercase;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section ul li a {
            color: #666;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: #333;
        }

        .social-icons {
            display: flex;
            gap: 15px;
            justify-content: flex-start;
            margin-top: 20px;
        }

        .social-icons a {
            color: #666;
            text-decoration: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .footer-content {
                grid-template-columns: repeat(2, 1fr);
            }

            .logo_footer-container {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 480px) {
            .footer-content {
                grid-template-columns: 1fr;
            }

            .footer-section {
                text-align: center;
            }

            .social-icons {
                justify-content: center;
            }
        }
</style>

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