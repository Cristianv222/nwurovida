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
    <link rel="stylesheet" href="css/main.css" media="screen">
    <link rel="stylesheet" href="./assets/css/resultados/style.css">
    <link rel="stylesheet" href="./assets/css/resultad/style.css">

    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        header.header {
            background-color: #4CAF50;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        h1, h2 {
            color: #333;
            margin: 0;
            padding-bottom: 10px;
        }
        a {
            text-decoration: none;
            color: #4CAF50;
        }
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            text-align: center;
        }
        
        /* Sección de detalles del estudiante */
        .student-details, .results {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin: 20px auto;
            width: 80%;
        }
        .student-details h2, .results h2 {
            font-size: 20px;
            color: #4CAF50;
        }
        .student-description p {
            margin: 10px 0;
        }
        strong {
            color: #333;
        }
        
        /* Tabla de resultados */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #f2f2f2;
        }
        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        /* Galería de fotos */
        .photo-gallery {
            margin: 20px auto;
            width: 80%;
        }
        .photo-gallery h2 {
            color: #4CAF50;
            text-align: center;
        }
        .gallery {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }
        .gallery img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        
        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
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
                    <div class="student-description">
                        <h2>Descripción del Estudiante</h2>
                        <?php
                        $rollid = $_POST['rollid'];
                        $classid = $_POST['class'];
                        $_SESSION['rollid'] = $rollid;
                        $_SESSION['classid'] = $classid;
                        $qery = "SELECT tblstudents.StudentName, tblstudents.RollId, tblstudents.RegDate, tblstudents.StudentId, tblstudents.Status, tblclasses.ClassName, tblclasses.Section, tblstudents.Image FROM tblstudents JOIN tblclasses ON tblclasses.id=tblstudents.ClassId WHERE tblstudents.RollId=:rollid AND tblstudents.ClassId=:classid";
                        $stmt = $dbh->prepare($qery);
                        $stmt->bindParam(':rollid', $rollid, PDO::PARAM_STR);
                        $stmt->bindParam(':classid', $classid, PDO::PARAM_STR);
                        $stmt->execute();
                        $resultss = $stmt->fetchAll(PDO::FETCH_OBJ);

                        if ($stmt->rowCount() > 0) {
                            foreach ($resultss as $row) { ?>
                                <p><strong>Nombre de Estudiante:</strong> <?php echo htmlentities($row->StudentName); ?></p>
                                <p><strong>ID Roll:</strong> <?php echo htmlentities($row->RollId); ?></p>
                                <p><strong>Año Lectivo:</strong> <?php echo htmlentities($row->ClassName); ?> (<?php echo htmlentities($row->Section); ?>)</p>
                                <?php if ($row->Image) { ?>
                                    <img src="data:image/jpeg;base64,<?php echo $row->Image; ?>" alt="Imagen del estudiante" style="width:150px;height:150px;border-radius:50%;">
                                <?php }
                            }
                        }
                        ?>
                    </div>
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
                            $query = "SELECT t.StudentName, t.RollId, t.ClassId, t.marks, SubjectId, tblsubjects.SubjectName FROM (SELECT sts.StudentName, sts.RollId, sts.ClassId, tr.marks, SubjectId FROM tblstudents AS sts JOIN tblresult AS tr ON tr.StudentId=sts.StudentId) AS t JOIN tblsubjects ON tblsubjects.id=t.SubjectId WHERE (t.RollId=:rollid AND t.ClassId=:classid)";
                            $query = $dbh->prepare($query);
                            $query->bindParam(':rollid', $rollid, PDO::PARAM_STR);
                            $query->bindParam(':classid', $classid, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            $totlcount = 0;

                            if ($countrow = $query->rowCount() > 0) {
                                foreach ($results as $result) { ?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt); ?></td>
                                        <td><?php echo htmlentities($result->SubjectName); ?></td>
                                        <td><?php echo htmlentities($totalmarks = $result->marks); ?></td>
                                    </tr>
                                    <?php
                                    $totlcount += $totalmarks;
                                    $cnt++;
                                } ?>
                                <tr>
                                    <td colspan="2">Total</td>
                                    <td><b><?php echo htmlentities($totlcount); ?></b> de <b><?php echo htmlentities(($cnt - 1) * 100); ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Porcentaje</td>
                                    <td><b><?php echo htmlentities($totlcount * (100) / (($cnt - 1) * 100)); ?> %</b></td>
                                </tr>
                            <?php } else { ?>
                                <div class="alert alert-warning left-icon-alert" role="alert">
                                    <strong>Importante!</strong> Aún no se han declarado tus resultados.
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </section>

                <section class="photo-gallery">
                    <h2>Actividades Realizadas en Clase</h2>
                    <div class="gallery">
                        <img src="fotos/actividad1.jpg" alt="Actividad 1">
                        <img src="fotos/actividad2.jpg" alt="Actividad 2">
                        <img src="fotos/actividad3.jpg" alt="Actividad 3">
                        <img src="fotos/actividad4.jpg" alt="Actividad 4">
                    </div>
                </section>

                <footer>
                    <a href="../index.php" class="back-button">Volver</a>
                </footer>
            </div>
        </div>
    </div>

    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
</body>

</html>
