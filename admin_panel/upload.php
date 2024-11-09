<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('includes/config.php');

$msg = '';
$error = '';

if (!isset($_SESSION['alogin']) || $_SESSION['alogin'] == '') {
    header('Location: admin-login.php');
    exit();
} else {
    if (isset($_POST['submit'])) {
        $class = $_POST['class'];
        $studentid = $_POST['studentid'];
        $marks = $_POST['marks'];

        // Verificar si ya existe un registro
        $checkQuery = $dbh->prepare("SELECT * FROM tblresult WHERE StudentId=:studentid AND ClassId=:class");
        $checkQuery->bindParam(':studentid', $studentid, PDO::PARAM_STR);
        $checkQuery->bindParam(':class', $class, PDO::PARAM_STR);
        $checkQuery->execute();

        if ($checkQuery->rowCount() > 0) {
            $error = "Este estudiante ya tiene resultados registrados para esta clase.";
        } else {
            // Iniciar transacción para asegurar la integridad de los datos
            $dbh->beginTransaction();
            try {
                // Obtener materias
                $stmt = $dbh->prepare("SELECT tblsubjects.SubjectName, tblsubjects.id FROM tblsubjectcombination 
                                     JOIN tblsubjects ON tblsubjects.id=tblsubjectcombination.SubjectId 
                                     WHERE tblsubjectcombination.ClassId=:cid ORDER BY tblsubjects.SubjectName");
                $stmt->execute(array(':cid' => $class));
                $sid1 = array();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    array_push($sid1, $row['id']);
                }

                // Insertar resultados y manejar imágenes
                foreach ($marks as $index => $mark) {
                    $sid = $sid1[$index];
                    $sql = "INSERT INTO tblresult(StudentId, ClassId, SubjectId, marks, PostingDate) 
                           VALUES(:studentid, :class, :sid, :marks, NOW())";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':studentid', $studentid, PDO::PARAM_STR);
                    $query->bindParam(':class', $class, PDO::PARAM_STR);
                    $query->bindParam(':sid', $sid, PDO::PARAM_STR);
                    $query->bindParam(':marks', $mark, PDO::PARAM_STR);
                    $query->execute();
                    $resultId = $dbh->lastInsertId();

                    // Verificar si se han subido imágenes
                    if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
                        $allowedTypes = array('image/jpeg', 'image/png', 'image/gif');
                        $maxFileSize = 5 * 1024 * 1024; // 5MB
                        $uploadDir = "uploads/results/";

                        // Crear directorio si no existe
                        if (!file_exists($uploadDir)) {
                            mkdir($uploadDir, 0777, true);
                        }

                        // Limitar a 4 imágenes máximo
                        $imageCount = min(count($_FILES['images']['name']), 4);

                        for ($i = 0; $i < $imageCount; $i++) {
                            if ($_FILES['images']['error'][$i] === UPLOAD_ERR_OK) {
                                $fileType = $_FILES['images']['type'][$i];
                                $fileSize = $_FILES['images']['size'][$i];

                                // Validar tipo y tamaño
                                if (in_array($fileType, $allowedTypes) && $fileSize <= $maxFileSize) {
                                    // Generar nombre único
                                    $extension = pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION);
                                    $uniqueName = uniqid('result_' . $resultId . '_') . '.' . $extension;
                                    $targetPath = $uploadDir . $uniqueName;

                                    // Depurar el nombre de la imagen y la ruta de destino
                                    var_dump($targetPath); // Verifica la ruta de destino

                                    if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $targetPath)) {
                                        // Confirmar que el archivo se movió correctamente
                                        echo "Imagen movida con éxito!<br>";

                                        // Guardar referencia en la base de datos
                                        $imageSql = "INSERT INTO tblimages(ResultId, ImagePath) VALUES(:resultId, :imagePath)";
                                        $imageQuery = $dbh->prepare($imageSql);
                                        $imageQuery->bindParam(':resultId', $resultId, PDO::PARAM_INT);
                                        $imageQuery->bindParam(':imagePath', $uniqueName, PDO::PARAM_STR);
                                        $imageQuery->execute();
                                    } else {
                                        throw new Exception("Error al mover el archivo $i");
                                    }
                                } else {
                                    throw new Exception("Tipo de archivo no válido o tamaño excedido para imagen $i");
                                }
                            }
                        }
                    }
                }

                // Confirmar transacción
                $dbh->commit();
                $msg = "Resultado e imágenes agregados correctamente.";

            } catch (Exception $e) {
                // Revertir cambios si hay error
                $dbh->rollBack();
                $error = "Error: " . $e->getMessage();
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
                                                <label for="subject" class="control-label ">Calificaciones por Actividad</label>
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
</body>

</html>
