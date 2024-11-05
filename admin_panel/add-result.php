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
        $marks = $_POST['marks']; // Se cambiará la estructura de esto

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

            // Aquí se guardarán los resultados en base a las calificaciones
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
                    $msg = "Resultado agregado correctamente.";
                } else {
                    $error = "Algo salió mal. Inténtalo de nuevo.";
                }
            }

            // Procesar las imágenes si se seleccionaron
            // (El código para subir imágenes sigue igual)
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
                                                <select name="studentid" class="form-control stid" id="studentid" required="required" onChange="showImageUpload();">
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <div id="reslt"></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="date" class="control-label">Materia</label>
                                                <div id="subject"></div>
                                            </div>

                                            <!-- Aquí generamos los campos de calificación -->
                                            <div class="form-group">
                                                <label for="marks" class="control-label">Calificaciones</label>
                                                <select name="marks[]" class="form-control" required="required">
                                                    <option value="5">Sobresaliente</option>
                                                    <option value="4">Excelente</option>
                                                    <option value="3">Bueno</option>
                                                    <option value="2">Regular</option>
                                                    <option value="1">Malo</option>
                                                </select>
                                            </div>

                                            <div class="form-group" id="imageUploadSection" style="display: none;">
                                                <label for="images" class="control-label">Imágenes Extra (puedes subir hasta 4 imágenes)</label>
                                                <input type="file" name="images[]" class="form-control" accept="image/*" multiple />
                                                <small class="form-text text-muted">Selecciona hasta 4 imágenes.</small>
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
                data: 'classid=' + val,
                success: function(data) {
                    $("#studentid").html(data);
                }
            });
            $.ajax({
                type: "POST",
                url: "get_student.php",
                data: 'classid1=' + val,
                success: function(data) {
                    $("#subject").html(data);
                }
            });
        }

        function showImageUpload() {
            document.getElementById('imageUploadSection').style.display = 'block';
        }
    </script>

</body>
<?php include('includes/footer.php'); ?>
</html>
