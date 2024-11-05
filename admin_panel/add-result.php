<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (!isset($_SESSION['alogin']) || $_SESSION['alogin'] == '') {
    header('Location: admin-login.php');
    exit();
} else {
    if (isset($_POST['submit'])) {
        $class = $_POST['class'];
        $studentid = $_POST['studentid'];
        $marks = $_POST['marks']; // Ahora es un array de selecciones

        // Verificar si ya existe un registro de resultados para este estudiante y clase
        $checkQuery = $dbh->prepare("SELECT * FROM tblresult WHERE StudentId=:studentid AND ClassId=:class");
        $checkQuery->bindParam(':studentid', $studentid, PDO::PARAM_STR);
        $checkQuery->bindParam(':class', $class, PDO::PARAM_STR);
        $checkQuery->execute();

        if ($checkQuery->rowCount() > 0) {
            $error = "Este estudiante ya tiene resultados registrados para esta clase.";
        } else {
            // Obtener las materias asociadas a la clase
            $stmt = $dbh->prepare("SELECT tblsubjects.SubjectName, tblsubjects.id FROM tblsubjectcombination JOIN tblsubjects ON tblsubjects.id=tblsubjectcombination.SubjectId WHERE tblsubjectcombination.ClassId=:cid ORDER BY tblsubjects.SubjectName");
            $stmt->execute(array(':cid' => $class));
            $sid1 = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($sid1, $row['id']);
            }

            // Guardar los resultados en la base de datos para cada materia
            foreach ($marks as $index => $mark) {
                $sid = $sid1[$index];
                $sql = "INSERT INTO tblresult(StudentId, ClassId, SubjectId, marks) VALUES(:studentid, :class, :sid, :marks)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':studentid', $studentid, PDO::PARAM_STR);
                $query->bindParam(':class', $class, PDO::PARAM_STR);
                $query->bindParam(':sid', $sid, PDO::PARAM_STR);
                $query->bindParam(':marks', $mark, PDO::PARAM_STR);
                $query->execute();
                $lastInsertId = $dbh->lastInsertId();

                if ($lastInsertId) {
                    // Manejo de imágenes
                    if (isset($_FILES['images']) && count($_FILES['images']['name']) > 0) {
                        for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
                            $targetDir = "uploads/"; // Asegúrate de que este directorio exista y tenga permisos adecuados
                            $fileName = basename($_FILES['images']['name'][$i]);
                            $targetFilePath = $targetDir . $fileName;

                            // Solo procesar si la imagen es válida
                            if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $targetFilePath)) {
                                // Guardar la ruta de la imagen en la base de datos si es necesario
                                $imageSql = "INSERT INTO tblimages(ResultId, ImagePath) VALUES(:resultId, :imagePath)";
                                $imageQuery = $dbh->prepare($imageSql);
                                $imageQuery->bindParam(':resultId', $lastInsertId, PDO::PARAM_STR);
                                $imageQuery->bindParam(':imagePath', $fileName, PDO::PARAM_STR);
                                $imageQuery->execute();
                            }
                        }
                    }
                    $msg = "Resultado agregado correctamente.";
                } else {
                    $error = "Algo salió mal. Inténtalo de nuevo.";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Agregar Resultado</title>
    <link rel="stylesheet" href="path/to/your/css/bootstrap.min.css">
    <script src="path/to/your/js/jquery.min.js"></script>
</head>

<body>
    <style>
        /* Estilos base de la tabla y otros elementos */
    </style>

    <?php include('includes/topbar.php'); ?>
    <div class="content-wrapper">
        <div class="content-container">
            <?php include('includes/leftbar.php'); ?>

            <div class="main-page">
                <div class="container-fluid">
                    <div class="row page-title-div">
                        <div class="col-md-6">
                            <h2 class="title">Agregar Resultado</h2>
                        </div>
                    </div>
                    <div class="row breadcrumb-div">
                        <div class="col-md-6">
                            <ul class="breadcrumb">
                                <li><a href="dashboard.php"><i class="fa fa-home"></i> Inicio</a></li>
                                <li class="active">Agregar Resultado</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel">
                                    <div class="panel-body">
                                        <?php if ($msg) { ?>
                                            <div class="alert alert-success left-icon-alert" role="alert">
                                                <strong>Proceso Correcto! </strong><?php echo htmlentities($msg); ?>
                                            </div>
                                        <?php } else if ($error) { ?>
                                            <div class="alert alert-danger left-icon-alert" role="alert">
                                                <strong>Algo salió mal! </strong> <?php echo htmlentities($error); ?>
                                            </div>
                                        <?php } ?>
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="default" class="control-label">Año</label>
                                                <select name="class" class="form-control clid" id="classid" onChange="getStudent(this.value);" required="required">
                                                    <option value="">Seleccionar Año</option>
                                                    <?php
                                                    $sql = "SELECT * from tblclasses";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $result) { ?>
                                                            <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="date" class="control-label">Nombre del Estudiante</label>
                                                <select name="studentid" class="form-control stid" id="studentid" required="required" onChange="showSubjects();">
                                                </select>
                                            </div>

                                            <div class="form-group" id="subjectsSection" style="display: none;">
                                                <label for="subject" class="control-label">Calificaciones por Actividad</label>
                                                <div id="subjectsContainer"></div>
                                            </div>

                                            <div class="form-group">
                                                <div id="imageUploadSection" style="display: none;">
                                                    <label for="images" class="control-label">Imágenes Extra (puedes subir hasta 4 imágenes)</label>
                                                    <input type="file" name="images[]" class="form-control" accept="image/*" multiple />
                                                    <small class="form-text text-muted">Selecciona hasta 4 imágenes.</small>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" name="submit" id="submit" class="btn btn-success">Agregar Resultado</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>

    <script>
        function getStudent(val) {
            $.ajax({
                type: "POST",
                url: "get_student.php",
                data: {
                    classid: val
                },
                success: function(data) {
                    $("#studentid").html(data);
                    $("#subjectsSection").hide(); // Oculta la sección de materias inicialmente
                }
            });
        }

        function showSubjects() {
            const classId = document.getElementById('classid').value;
            const studentId = document.getElementById('studentid').value;

            if (classId && studentId) {
                $.ajax({
                    type: "POST",
                    url: "get_subjects.php",
                    data: {
                        classid: classId
                    },
                    success: function(data) {
                        $("#subjectsContainer").html(data);
                        $("#subjectsSection").show(); // Muestra la sección de materias
                        document.getElementById('imageUploadSection').style.display = 'block'; // Muestra la sección de carga de imágenes
                    }
                });
            } else {
                $("#subjectsSection").hide(); // Oculta la sección si no hay clase o estudiante seleccionado
                document.getElementById('imageUploadSection').style.display = 'none'; // Oculta la sección de carga de imágenes
            }
        }
    </script>

</body>

</html>