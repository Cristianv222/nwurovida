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
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            width: 100%;
        }

        /* Overlay for readability */
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

        /* Container Styling */
        .header,
        .student-details,
        .results,
        .progress-section,
        .student-images {
            background-color: rgba(252, 252, 252, 0.9);
            backdrop-filter: blur(5px);
            padding: 30px;
            margin: 25px 50px;
            border-radius: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .header h1,
        .student-details h2,
        .results h2,
        .student-images h2 {
            font-size: 28px;
            color: #333;
            text-align: center;
        }

        .student-info-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
            flex-wrap: wrap;
            padding: 20px;
        }

        .student-info-text {
            flex: 1;
            min-width: 250px;
            font-size: 1.2em;
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

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
            font-size: 16px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .alert {
            color: #c33;
            text-align: center;
            font-weight: bold;
        }

        /* Additional Images Section */
        .student-images-container {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .image-item {
            flex: 1 1 150px;
            max-width: 150px;
            text-align: center;
        }

        .image-item img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .image-item img:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
        }

        /* Lightbox for Additional Images */
        .lightbox {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .lightbox-content {
            max-width: 80%;
            max-height: 80%;
            margin: auto;
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            font-size: 40px;
            color: white;
            cursor: pointer;
        }

        /* Responsive Adjustments */
        @media screen and (max-width: 768px) {
            .student-details {
                margin: 15px 25px;
                padding: 20px;
            }

            .student-image img {
                width: 250px;
                height: 250px;
            }

            .header h1,
            .student-details h2,
            .results h2,
            .student-images h2 {
                font-size: 24px;
            }

            .student-info-text p {
                font-size: 16px;
            }
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

                            if ($stmt->rowCount() > 0) {
                                foreach ($results as $result) {
                                    // Convertir la calificación a la categoría correspondiente
                                    if ($result->marks >= 5) {
                                        $calificacion = "Sobresaliente";
                                    } elseif ($result->marks == 4) {
                                        $calificacion = "Excelente";
                                    } elseif ($result->marks == 3) {
                                        $calificacion = "Bueno";
                                    } elseif ($result->marks == 2) {
                                        $calificacion = "Regular";
                                    } else {
                                        $calificacion = "Malo";
                                    }
                            ?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt); ?></td>
                                        <td><?php echo htmlentities($result->SubjectName); ?></td>
                                        <td><?php echo htmlentities($calificacion); ?></td>
                                    </tr>
                                <?php
                                    $cnt++;
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="3" class="alert">No se encontraron resultados para este ID.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </section>

                <!-- Mostrar imágenes de la tabla tblimages -->
                <section class="student-images">
                    <h2>Imágenes Adicionales</h2>
                    <div class="student-images-container">
                        <?php
                        $imageQuery = "SELECT image1, image2, image3, image4 FROM tblimages WHERE StudentId = (SELECT StudentId FROM tblstudents WHERE RollId = :rollid GROUP BY StudentId) LIMIT 1";
                        $imageStmt = $dbh->prepare($imageQuery);
                        $imageStmt->bindParam(':rollid', $rollid, PDO::PARAM_STR);
                        $imageStmt->execute();
                        $images = $imageStmt->fetch(PDO::FETCH_OBJ);

                        if ($images) {
                            foreach (['image1', 'image2', 'image3', 'image4'] as $imgColumn) {
                                if (!empty($images->$imgColumn)) {
                                    $imageData = base64_encode($images->$imgColumn);
                                    echo '<div class="image-item">
                            <a href="#" onclick="openLightbox(\'' . $imageData . '\')">
                                <img src="data:image/jpeg;base64,' . $imageData . '" alt="Imagen adicional">
                            </a>
                          </div>';
                                }
                            }
                        } else {
                            echo '<p>No se encontraron imágenes adicionales.</p>';
                        }
                        ?>
                    </div>
                </section>

                <!-- Lightbox Modal -->
                <div id="lightbox" class="lightbox">
                    <span class="close" onclick="closeLightbox()">&times;</span>
                    <img class="lightbox-content" id="lightbox-img" src="" alt="Imagen ampliada">
                </div>




            </div>
        </div>
        <footer>
            <a href="../index.php" class="back-button">Volver</a>
        </footer>
    </div>
</body>
<script>
    // Script para abrir y cerrar el modal con la imagen
    document.querySelectorAll('.img-preview').forEach(img => {
        img.addEventListener('click', function() {
            document.getElementById('modalImage').src = this.src;
            document.getElementById('imageModal').style.display = 'flex';
        });
    });

    document.querySelector('.close').addEventListener('click', function() {
        document.getElementById('imageModal').style.display = 'none';
    });

    // Cerrar el modal si se hace clic fuera de la imagen
    window.onclick = function(event) {
        if (event.target == document.getElementById('imageModal')) {
            document.getElementById('imageModal').style.display = 'none';
        }
    };
</script>

</html>