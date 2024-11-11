<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/neuro/css/somos.css">
</head>

<body>
    <header class="hero">
    <?php include './includes/menu_nav.php'; ?>
    <div class="hero-content container">
        <?php include './includes/menu_nav.php'; ?>
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
    </header>
</body>



<?php include './includes/footer.php'; ?>
</body>
</html>

<script>
        const canvas = document.getElementById('particleCanvas');
        const ctx = canvas.getContext('2d');
        
        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);

        const colors = {
            particles: '#000000',
            connections: {
                colors: [
                    'rgba(182, 232, 227, ', // Turquesa pastel
                    'rgba(255, 236, 179, ', // Amarillo pastel
                    'rgba(216, 181, 229, '  // Violeta pastel
                ]
            }
        };

        class Particle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = 4; // Aumentado el tamaño de las partículas
                this.speedX = (Math.random() - 0.5) * 0.8;
                this.speedY = (Math.random() - 0.5) * 0.8;
                this.colorIndex = Math.floor(Math.random() * colors.connections.colors.length);
            }

            update() {
                this.x += this.speedX;
                this.y += this.speedY;

                if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
                if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;
            }

            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fillStyle = colors.particles;
                ctx.fill();
            }
        }

        const particles = [];
        const numParticles = 70;
        const maxDistance = 150;

        for (let i = 0; i < numParticles; i++) {
            particles.push(new Particle());
        }

        function connectParticles() {
            for (let i = 0; i < particles.length; i++) {
                for (let j = i + 1; j < particles.length; j++) {
                    const dx = particles[i].x - particles[j].x;
                    const dy = particles[i].y - particles[j].y;
                    const distance = Math.sqrt(dx * dx + dy * dy);

                    if (distance < maxDistance) {
                        const opacity = 1 - (distance / maxDistance);
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        
                        const colorIndex = (particles[i].colorIndex + particles[j].colorIndex) % colors.connections.colors.length;
                        const baseColor = colors.connections.colors[colorIndex];
                        ctx.strokeStyle = baseColor + (opacity * 0.9) + ')'; // Aumentada la opacidad base
                        ctx.lineWidth = opacity * 2.5; // Aumentado el grosor de las líneas
                        ctx.stroke();
                    }
                }
            }
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            particles.forEach(particle => {
                particle.update();
                particle.draw();
            });

            connectParticles();

            requestAnimationFrame(animate);
        }

        animate();

        canvas.addEventListener('click', (event) => {
            const rect = canvas.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;

            for (let i = 0; i < 5; i++) {
                const particle = new Particle();
                particle.x = x;
                particle.y = y;
                particle.speedX = (Math.random() - 0.5) * 2;
                particle.speedY = (Math.random() - 0.5) * 2;
                particles.push(particle);
            }
        });
    </script>

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
        carrusel.style.transform = `translateX(${-index * 700}px)`;
    }

    setInterval(runCarousel, 3000); // Cambia de imagen cada 3 segundos
</script>
