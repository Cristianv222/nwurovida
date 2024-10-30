<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neurovida contactanos</title>
</head>
<body>
<?php include './includes/menu_nav.php'; ?>
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