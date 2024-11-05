<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Avance del Estudiante</title>

    <!-- Estilos originales y nuevos estilos -->
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="./assets/css/resultados/style.css">

    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('/neuro/images/logo_neuro.jpg');
            background-color: #f5f5f5;
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            background-attachment: fixed;
            position: relative;
            min-height: 100vh;
            width: 100%;
            color: #333;
            display: flex;
            flex-direction: column;
        }

        /* Optional: Overlay semi-transparent to improve readability */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.85);
            z-index: -1;
        }

        /* Ensure containers have the correct semi-transparent background */
        .header,
        .student-details,
        .results,
        .progress-section {
            background-color: rgba(252, 252, 252, 0.9);
            backdrop-filter: blur(5px);
            padding: 30px;
            margin: 25px 50px;
            border-radius: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .header h1 {
            font-size: 32px;
            color: #333;
        }

        .student-details h2,
        .results h2 {
            font-size: 28px;
            color: #474444;
        }

        .results table,
        .progress-section {
            width: 100%;
        }

        .student-info-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .student-info-text {
            flex: 1;
        }

        .student-image {
            margin-left: 20px;
        }

        .student-image img {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .student-image img:hover {
            transform: scale(1.05);
        }

        .alert {
            color: #c33;
            text-align: center;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            /* Increased padding */
            text-align: center;
            font-size: 16px;
            /* Changed to 16px */
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .results h2 {
            font-size: 22px;
            color: #333;
            text-align: center;
            margin-bottom: 15px;
        }

        /* Base styles for the student info container */
        .student-info-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
            padding: 20px;
            flex-wrap: wrap;
            /* Allows elements to wrap on mobile */
        }

        .student-info-text {
            flex: 1;
            min-width: 250px;
            font-size: 1.3em; 
            /* Ensures text has a minimum width */
        }

        /* Styles for the student's image */
        .student-image {
            flex-shrink: 0;
            margin-left: 30px;
        }
        .student-info-text p {
    font-size: 1.2em; /* Incrementa el tamaño de fuente relativo */
}

.student-details h2 {
    font-size: 1.5em; /* Aumenta el tamaño del título */
}

        /* Improvements in the student details section */
        .student-details {
            background-color: #fcfcfce8;
            padding: 30px;
            margin: 25px 50px;
            border-radius: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.438);
        }

        /* Media queries for tablets */
        @media screen and (max-width: 768px) {
            .student-details {
                margin: 15px 25px;
                padding: 20px;
            }

            .student-image img {
                width: 250px;
                /* Changed to 250px */
                height: 250px;
                /* Changed to 250px */
            }

            .header h1 {
                font-size: 28px;
                /* Changed to 28px */
            }

            .student-details h2,
            .results h2 {
                font-size: 24px;
                /* Changed to 24px */
            }

            .student-info-text p {
                font-size: 16px;
                /* Changed to 16px */
            }
        }

        /* Media queries for mobile */
        @media screen and (max-width: 480px) {
            /* Aquí puedes agregar estilos específicos para dispositivos móviles */
        }
    </style>

    <script src="js/modernizr/modernizr.min.js"></script>
</head>

<body>
    <header class="header">
        <h1>Avance del Estudiante</h1>
    </header>

    <div class="main-wrapper">
        <div class="content-wrapper">
            <div class="content-container">
                <section class="student-details">
                    <h2>Descripción del Estudiante</h2>
                    <?php
                    $rollid = $_POST['rollid'];
                    $classid = $_POST['class'];
                    $query = "SELECT tblstudents.StudentName, tblstudents.RollId, tblstudents.ClassId, tblclasses.ClassName, tblclasses.Section, tblstudents.Image FROM tblstudents JOIN tblclasses ON tblclasses.id = tblstudents.ClassId WHERE tblstudents.RollId = :rollid AND tblstudents.ClassId = :classid";
                    $stmt = $dbh->prepare($query);
                    $stmt->bindParam(':rollid', $rollid, PDO::PARAM_STR);
                    $stmt->bindParam(':classid', $classid, PDO::PARAM_STR);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_OBJ);

                    if ($result) { ?>
                        <div class="student-info-container">
                            <div class="student-info-text">
                                <p><strong>Año Lectivo:</strong> <?php echo htmlentities($result->ClassName); ?> (<?php echo htmlentities($result->Section); ?>)</p>
                                <p><strong>Nombre de Estudiante:</strong> <?php echo htmlentities($result->StudentName); ?></p>
                                <p><strong>Cedula:</strong> <?php echo htmlentities($result->RollId); ?></p>
                            </div>
                            <?php if ($result->Image) { ?>
                                <div class="student-image">
                                    <img src="data:image/jpeg;base64,<?php echo $result->Image; ?>" alt="Imagen del estudiante">
                                </div>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <div class="alert">No se encontraron detalles para el ID ingresado.</div>
                    <?php } ?>
                </section>

                <section class="results">
                    <h2>Resultados Académicos</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Materia</th>
                                <th>Calificación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT t.StudentName, t.RollId, t.ClassId, t.marks, SubjectId, tblsubjects.SubjectName FROM (SELECT sts.StudentName, sts.RollId, sts.ClassId, tr.marks, SubjectId FROM tblstudents AS sts JOIN tblresult AS tr ON tr.StudentId = sts.StudentId) AS t JOIN tblsubjects ON tblsubjects.id = t.SubjectId WHERE (t.RollId = :rollid AND t.ClassId = :classid)";
                            $stmt = $dbh->prepare($query);
                            $stmt->bindParam(':rollid', $rollid, PDO::PARAM_STR);
                            $stmt->bindParam(':classid', $classid, PDO::PARAM_STR);
                            $stmt->execute();
                            $results = $stmt->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            $totalMarks = 0;

                            if ($stmt->rowCount() > 0) {
                                foreach ($results as $result) { ?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt); ?></td>
                                        <td><?php echo htmlentities($result->SubjectName); ?></td>
                                        <td><?php echo htmlentities($marks = $result->marks); ?></td>
                                    </tr>
                                <?php
                                    $totalMarks += $marks;
                                    $cnt++;
                                } ?>
                                <tr>
                                    <td colspan="2">Total</td>
                                    <td><b><?php echo htmlentities($totalMarks); ?></b> de <b><?php echo htmlentities(($cnt - 1) * 100); ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Porcentaje</td>
                                    <td><b><?php $percentage = $totalMarks * 100 / (($cnt - 1) * 100);
                                            echo htmlentities($percentage); ?> %</b></td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3" class="alert">No se encontraron resultados para este ID.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
        <footer>
            <a href="../index.php" class="back-button">Volver</a>
        </footer>
    </div>
</body>

</html>