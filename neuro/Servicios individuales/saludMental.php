<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Citas - Neurovida</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Enlaza con el archivo CSS -->
    <link rel="shortcut icon" href="images/favicon-32x32.png" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col items-center justify-center min-h-screen fade-in">

    <!-- Encabezado -->
    <header class="header">
        <div class="menu container">
            <a href="index.html" class="logo">club Neurovida</a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="../images/menu-hamburguesa.png" class="menu-icono" alt="">
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="citas.html">Agendar citas</a></li>
                    <li><a href="quienes_somos.html">¿Quienes somos?</a></li>
                    <li><a href="servicios.html">Servicios</a></li>
                </ul>
            </nav>
        </div>
        <div class="header-content container">
            <h1>Explora nuestros servicios</h1>
            <p>Transformando vidas, impulsando bienestar integral.</p>
        </div>
    </header>

    <section class="hero w-full text-center py-20 slide-in">
        <div class="hero-text">
            <h1 class="text-5xl font-extrabold text-green-700">Agenda tu cita</h1>
            <h2 class="text-3xl text-gray-800 mt-4">Neurovida</h2>
        </div>
    </section>

    <div class="bg-gradient p-10 w-full"> <!-- Fondo degradado -->
        <div class="text-center mb-8 slide-in">
            <h1 class="text-5xl font-extrabold text-green-700">Ver Citas</h1>
            <p class="text-gray-800 text-lg">Aquí puedes ver todas las citas agendadas.</p>
        </div>

        <div class="bg-white p-10 rounded-xl shadow-2xl float-right w-full max-w-lg slide-in"> <!-- Cuadro para agendar citas -->
            <div class="flex justify-center mb-6">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOoP5nwla0jZ5jLUfs-GXoKEuLfV83DUqPOg&s" alt="Servicio de yoga" class="rounded-full shadow-lg" width="100" height="100">
            </div>
            <h2 class="text-4xl font-extrabold text-green-700 text-center mb-6">SALUD MENTAL </h2>
            <p class="text-gray-800 text-center mb-8">Relaja tu mente y cuerpo con nuestras clases de yoga.</p>

            <div class="flex justify-between items-start">
                <form id="appointment-form" class="w-full pr-4">
                    <div class="mt-4">
                        <label for="name" class="block text-gray-800 font-semibold mb-2">Nombre:</label>
                        <input type="text" id="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div class="mt-4">
                        <label for="surname" class="block text-gray-800 font-semibold mb-2">Apellido:</label>
                        <input type="text" id="surname" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div class="mt-4">
                        <label for="email" class="block text-gray-800 font-semibold mb-2">Email:</label>
                        <input type="email" id="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="ejemplo@correo.com">
                    </div>
                    <div class="mt-4">
                        <label for="phone" class="block text-gray-800 font-semibold mb-2">Número de teléfono:</label>
                        <input type="tel" id="phone" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Ej: 123-456-7890">
                    </div>

                    <div class="bg-gray-200 p-4 rounded-lg mt-4"> <!-- Fondo cuadrado -->
                        <label for="select-day" class="block text-gray-800 font-semibold mb-3">Selecciona un día:</label>
                        <select id="select-day" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" onchange="showSchedule()">
                            <option>--Seleccione un día--</option>
                            <option>Lunes y Viernes (8:00 a 9:00)</option>
                            <option>Lunes y Viernes (9:00 a 10:00)</option>
                            <option>Martes y Sábado (8:00 a 9:00)</option>
                            <option>Martes y Sábado (9:00 a 10:00)</option>
                        </select>
                    </div>

                    <button type="button" id="book-button" class="btn-1 mt-6">Agendar cita</button>
                    <p id="success-message" class="text-green-600 mt-4 hidden"></p>
                    <p id="no-slots-message" class="text-red-600 mt-4 hidden">Lo siento, no hay cupo disponible.</p>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <span id="close-modal" class="close">&times;</span>
            <p class="text-gray-800">¿Confirmas la cita agendada?</p>
            <button id="confirm-button" class="btn-1 mt-4">Confirmar</button>
            <button id="cancel-button" class="btn-1 mt-4">Cancelar</button> <!-- Botón Cancelar -->
        </div>
    </div>

    <script>
        const successMessage = document.getElementById("success-message");
        const noSlotsMessage = document.getElementById("no-slots-message");
        const confirmationModal = document.getElementById("confirmationModal");
        const closeModal = document.getElementById("close-modal");
        const cancelButton = document.getElementById("cancel-button");

        function showSchedule() {
            successMessage.classList.add("hidden");
            noSlotsMessage.classList.add("hidden");
        }

        function openModal() {
            confirmationModal.style.display = "block";
        }

        function closeModalFunction() {
            confirmationModal.style.display = "none";
            // Restablecer campos
            document.getElementById("name").value = '';
            document.getElementById("surname").value = '';
            document.getElementById("email").value = '';
            document.getElementById("phone").value = '';
            selectDay.selectedIndex = 0;
            successMessage.classList.add("hidden");
            noSlotsMessage.classList.add("hidden");
        }

        closeModal.onclick = closeModalFunction;

        document.getElementById("book-button").onclick = () => {
            openModal();
        };

        // Acción del botón Confirmar
        document.getElementById("confirm-button").onclick = () => {
            successMessage.classList.remove("hidden");
            successMessage.textContent = "¡Cita agendada exitosamente!";
            closeModalFunction();
        };

        // Acción del botón Cancelar
        cancelButton.onclick = () => {
            closeModalFunction();
        };

        window.onclick = function (event) {
            if (event.target === confirmationModal) {
                closeModalFunction();
            }
        };
    </script>
</body>
</html>