<?php
session_start();
include('includes/config.php'); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifica tus Resultados</title>
    <link rel="icon" type="image/x-icon" href="../neuro/images/logo_neuro.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate-css/animate.min.css">
    <link rel="stylesheet" href="assets/css/icheck/skins/flat/blue.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <style>
        /* Estilos personalizados */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
        body {
            background-color: #0a4f62;
            background-image: url(../neuro/images/imagen\ portada.webp);
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-card {
            background: white;
            border-radius: 20px;
            width: 900px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        .illustration {
            background-color: #f0f5ff;
            border-radius: 15px;
            padding: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .illustration img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .login-form {
            padding: 3rem;
        }
        h2 {
            color: #1a237e;
            margin-bottom: 2rem;
            font-size: 1.8rem;
        }
        .input-group {
            margin-bottom: 1.5rem;
        }
        input, select {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        .login-btn {
            width: 100%;
            padding: 0.8rem;
            background-color: #1a237e;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        .login-btn:hover {
            background-color: #2a337e;
        }
        .btn-volver {
            color: #40e0d0;
            border: 2px solid #40e0d0;
            padding: 8px 20px;
            text-decoration: none;
            font-weight: 200;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            text-align: center;
            display: inline-block;
            width: 100%;
        }
        .btn-volver:hover {
            background-color: #40e0d0;
            color: white;
        }
        @media (max-width: 768px) {
            .login-card {
                grid-template-columns: 1fr;
                width: 90%;
                margin: 1rem;
            }
            .illustration {
                display: none;
            }
        }
    </style>
    <script src="assets/js/modernizr/modernizr.min.js"></script>
</head>
<body>
    <div class="login-card">
        <div class="illustration">
        <img src="../neuro/images/logotipo.png" alt="Estudiante">
        </div>
        <div class="login-form">
            <h2>Inicio de sesión estudiante</h2>
            <form action="result.php" method="post" class="admin-login">
                <div class="input-group">
                    <label for="rollid" class="control-label">Ingresa tu cedula</label>
                    <input type="text" id="rollid" name="rollid" placeholder="Ingresa tu cedula" autocomplete="off" required>
                </div>
                <div class="input-group">
                    <label for="class" class="control-label">Año</label>
                    <select name="class" id="class" required>
                        <option value="">Selecciona tu año</option>
                        <?php
                        $sql = "SELECT * FROM tblclasses";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        if ($query->rowCount() > 0) {
                            foreach ($results as $result) {
                                echo '<option value="' . htmlentities($result->id) . '">' . htmlentities($result->ClassName) . ' Section-' . htmlentities($result->Section) . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="login-btn">Buscar</button>
                <a href="../index.php" class="btn-volver">Volver</a>
            </form>
        </div>
    </div>


    

    <!-- Scripts -->
    <script src="assets/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="assets/js/pace/pace.min.js"></script>
    <script src="assets/js/lobipanel/lobipanel.min.js"></script>
    <script src="assets/js/iscroll/iscroll.js"></script>
    <script src="assets/js/icheck/icheck.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        $(function() {
            $('input.flat-blue-style').iCheck({
                checkboxClass: 'icheckbox_flat-blue'
            });
        });
    </script>
</body>
</html>
