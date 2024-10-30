<!-- .php -->
<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h4>Sobre mí</h4>
            <ul>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Autores Invitados</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>Digital</h4>
            <ul>
                <li><a href="/index.php">Inicio</a></li>
                <li><a href="/servicios.php">Servicios</a></li>
                <li><a href="/contactanos.php">Contacto</a></li>
                <li><a href="/quienres_somos.php">¿Quines somos?</a></li>
                
            </ul>
        </div>

        <div class="footer-section">
            <h4>Todos nuestros servicios</h4>
            <ul>
                <li><a href="/neuro/Servicios_individuales/manulidades.php">Manualidades</a></li>
                <li><a href="/neuro/Servicios_individuales/programacion.php">Programación</a></li>
                <li><a href="/neuro/Servicios_individuales/EduFinanciero.php">Educacion financiera</a></li>
                <li><a href="/neuro/Servicios_individuales/saludMental.php">Salud Mental</a></li>
                <li><a href="/neuro/Servicios_individuales/cursos_de_computacion.php">Curso de Computación</a></li>
                <li><a href="/neuro/Servicios_individuales/gimnasia_cerebral.php">Gimnasia cerebral</a></li>
                <li><a href="/neuro/Servicios_individuales/EduFinanciero.php">Educacion financiera</a></li>
                <li><a href="/neuro/Servicios_individuales/meditaciones.php">Meditación</a></li>
                <li><a href="/neuro/Servicios_individuales/acompañamientoDoulas.php">Acompañamiento de doulas</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>Mi Comunidad</h4>
            <div class="social-icons">
                <a href="#"><img src="/neuro/images/facebook.png" alt="Facebook"></a>
                <a href="#"><img src="/neuro/images/instagram..png" alt="Instagram"></a>
                <a href="#"><img src="/neuro/images/X.png" alt="Twitter"></a>
                <a href="#"><img src="/neuro/images/whatsapp.png" alt="WhatsApp"></a>
            </div>
        </div>
        <a href="index.php" class="logo">
            <img src="/neuro/images/logotipo.png" alt="">
        </a>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024. Todos los derechos reservados <a href="/index.php">NeuroVida</a></p>  | Desarrollado por <a href="#">PixelByte</a></p>
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

/* Estilos generales para el footer */
footer {
    background-color: #016064;
    color: black;
    padding: 20px 0;
    font-family: Poppins, sans-serif;
}

.footer-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    padding: 0 20px;
}

.footer-section {
    flex: 1;
    min-width: 200px;
    margin: 10px;
}

.footer-section h4 {
    font-size: 18px;
    margin-bottom: 10px;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 8px;
}

.footer-section ul li a {
    color: #c3b5d2;
    text-decoration: none;
    font-weight: 300;
    transition: color 0.3s;
}

.footer-section ul li a:hover {
    color: #ffcc00;
}

.social-icons a {
    margin-right: 10px;
}

.social-icons img {
    width: 24px;
    height: 24px;
    transition: transform 0.3s;
}

.social-icons a:hover img {
    transform: scale(1.1);
}

.footer-bottom {
    text-align: center;
    padding: 20px 0;
    border-top: 2px solid rgba(78, 47, 99, 0.705);
    margin-top: 20px;
}

.footer-bottom p {
    margin: 0;
    font-size: 14px;
}

.footer-bottom a {
    color: #ffcc00;
    text-decoration: none;
}

.footer-bottom a:hover {
    text-decoration: underline;
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


/* Estilos responsive para dispositivos móviles */
@media (max-width: 768px) {
    .footer-container {
        flex-direction: column;
        text-align: center;
    }

    .footer-section {
        margin-bottom: 20px;
    }

    .social-icons {
        display: flex;
        justify-content: center;
    }
}

</style>