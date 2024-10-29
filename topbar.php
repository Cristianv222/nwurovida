<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bod_dash">
    <div class="topbar">
        <div class="left-section">
            <img src="./neuro/images/logotipo.png" alt="Logo" class="logo"> <!-- Cambia "logo.png" por la ruta de tu logo -->
            <button id="menu-toggle" class="menu-icon">☰</button>
            <button id="expand-screen" class="expand-icon">⛶</button>
        </div>
        <div class="right-section">
            <button class="logout-btn">Cerrar sesión</button>
        </div>
    </div>

    <div id="leftbar" class="leftbar">
        <!-- Contenido del menú lateral -->
    </div>

    <script src="scripts.js"></script>
</body>
</html>


<style>
    /* General */
body, html {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}
.topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    color: white;
    padding: 10px 20px;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
}

.left-section {
    display: flex;
    align-items: center;
}

.logo {
    height: 40px;
}

.menu-icon, .expand-icon {
    background: none;
    border: none;
    color: white;
    font-size: 24px;
    cursor: pointer;
    margin-left: 20px;
}

.expand-icon {
    margin-left: 10px;
}

.right-section {
    margin-right: 20px;
}

.logout-btn {
    background-color: #ff4b4b;
    border: none;
    color: white;
    padding: 8px 16px;
    cursor: pointer;
    border-radius: 5px;
}

/* Estilos responsive */
@media (max-width: 768px) {
    .topbar {
        padding: 10px;
    }

    .logo {
        height: 30px;
    }

    .menu-icon, .expand-icon {
        font-size: 20px;
    }

    .logout-btn {
        padding: 6px 12px;
        font-size: 14px;
    }
}

/* Leftbar (menú lateral) */
.leftbar {
    width: 250px;
    height: 100%;
    background-color: #444;
    position: fixed;
    top: 0;
    left: 0;
    transform: translateX(-100%);
    transition: transform 0.3s ease-in-out;
}

.leftbar.active {
    transform: translateX(0);
}
</style>

<script>
    const menuToggle = document.getElementById('menu-toggle');
const leftbar = document.getElementById('leftbar');
const expandScreen = document.getElementById('expand-screen');

menuToggle.addEventListener('click', function() {
    leftbar.classList.toggle('active');
});

expandScreen.addEventListener('click', function() {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen();
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        }
    }
});

</script>