<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neurovida contactanos</title>
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
    <div class="header-content container">
            <img src="./neuro/images/Imagotipo.png" alt="Club Neurovida" class="logo-left">
        </div>
    </header>
        <section>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1410.4706480803052!2d-77.71259786613068!3d0.816259513493242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e2968bae7d5eb4d%3A0x2d2e73b19f33388d!2zVHVsY8Ohbg!5e0!3m2!1ses!2sec!4v1730240853658!5m2!1ses!2sec" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
        <form action="https://formsubmit.co/1029cristianvasquez@gmail.com" method="POST" />
   <section>
   <form action="https://formsubmit.co/1029cristianvasquez@gmail.com" method="POST" />
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
        form {
    padding: 25px 55px;
    box-shadow: 0 20px 230px rgba(0, 0, 0, 0.2);
    border-radius: 20px;
    text-align: center;
    width: 700px;
    margin: -450px 630px;
  }
  
  .input-group {
    display: flex;
    flex-direction: column;
    text-align: left;
  }
  
  h2 {
    color: #283629;
    font-size: 35px;
  }

  label {
    color: #283629;
    font-size: 15px;
    font-weight: 600;
    margin-bottom: 15px;
  }
  
  input, textarea {
    padding: 17px 25px;
    border-radius: 25px;
    margin-bottom: 20px;
    background-color: #ffffff;
    border: 2px solid #48bce0;
    color: #000000;
    outline: none;
  }

  input::placeholder, textarea::placeholder {
    color: #b5cab6;
  }
  
  .form-txt {
    margin-bottom: 30px;
    display: flex;
    justify-content: space-between;
    text-align: center;
  }
  
  .form-txt a {
    color: #76b28e;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
  }
  .btnEnviar {
    font-size: 16px;
    color: #FFFFFF;
    border: 0;
    border-radius: 25px;
    background-color: #36e3f0;
    box-shadow: 0 0 20px rgba(37, 253, 253, 0.4);
    cursor: pointer;
  }
  
  .btn:hover {
    background-color: #48bce0;
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
/*formulario style*/

  
  @media (max-width: 991px) {
    body {
      padding: 30px;
    }
  
    form {
      padding: 50px 30px;
      width: 100%;
    }
    input {
        padding: 15px;
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