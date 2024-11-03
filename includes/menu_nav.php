
<!-- menu.php -->
<header class="header">
    <nav class="navbar">
        <a href="index.php" class="logo">
            <img src="/neuro/images/headBanner.png" alt="">
        </a>
        
        <button class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </button>

        <ul class="nav-links">
            <li><a href="/index.php">Inicio</a></li>
            <li><a href="/quienres_somos.php">Quiénes Somos</a></li>
            <li><a href="/contactanos.php">Contáctanos</a></li>
            <li><a href="/servicios.php">Servicios</a></li>
        </ul>

        <div class="buttons">
            <a href="../admin_panel/find-result.php"><button class="btn btn-outline">Estudiante</button></a>
            <a href="../admin_panel/admin-login.php"><button class="btn btn-solid">Maestro</button></a>
    </nav>
    </header>



    
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
max-width: 40px;
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
    top: 10;
    left: 10;
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

    height: 10px; /* Ajusta esto al tamaño que necesites */
    display: flex;
    align-items: center;
}
.logo img {
    height: 70%;
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