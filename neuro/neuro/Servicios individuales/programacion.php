<?php
// manualidades.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Neurovida</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="login-container">
        <div class="login-left">
            <div class="background-pattern"></div>
        </div>
        
        <div class="login-right">
            <div class="login-form">
                <div class="logo">
                    <!-- Aquí puedes insertar un logo si tienes -->
                    <h1>Bienvenido a Neurovida</h1>
                </div>
                
                <form action="/login" method="POST">
                    <div class="input-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" name="email" placeholder="Correo electrónico" required>
                    </div>
                    
                    <div class="input-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" placeholder="Contraseña" required>
                        <span class="show-password" onclick="togglePassword()">👁️</span>
                    </div>
                    <button type="submit" class="btn-login">Ingresar</button>
                    
                </form>
            </div>
        </div>
    </div>


</body>
</html>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    display: flex;
    width: 900px;
    height: 500px;
    background-color: white;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.login-left {
    width: 50%;
    background-color: #e9f1f7;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.background-pattern {
    background-image: url(/neuro/images/vecteezy_vector-technology-concept-connected-lines-and-dots-network_15258828.jpg); /* Aquí puedes agregar la imagen de fondo */
    background-size: cover;
    background-position: center;
    height: 100%;
    width: 100%;
}

.login-right {
    width: 50%;
    padding: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.login-form {
    width: 100%;
    max-width: 350px;
}

h1 {
    font-size: 24px;
    color: #4d626f;
    margin-bottom: 20px;
}

.input-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    color: #4d626f;
}

input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.show-password {
    position: absolute;
    right: 10px;
    top: 35px;
    cursor: pointer;
    color: #777;
}

.options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.forgot-password {
    font-size: 12px;
    color: #6b4ce5;
    text-decoration: none;
}

.btn-login {
    width: 100%;
    background-color: #4d626f;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-login:hover {
    background-color: #354c57;
}

.register {
    text-align: center;
    margin-top: 20px;
}

.register a {
    color: #6b4ce5;
    text-decoration: none;
}

</style>