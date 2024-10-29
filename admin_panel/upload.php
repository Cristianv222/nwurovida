<?php
session_start();
include('includes/config.php');

$msg = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si se ha subido un archivo
    if (isset($_FILES['studentImage']) && $_FILES['studentImage']['error'] == 0) {
        $studentId = $_POST['studentId'];
        $fileTmpPath = $_FILES['studentImage']['tmp_name'];
        $fileName = $_FILES['studentImage']['name'];
        $fileSize = $_FILES['studentImage']['size'];
        $fileType = $_FILES['studentImage']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Extensiones permitidas
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Directorio de destino
            $uploadFileDir = 'uploads/';
            $dest_path = $uploadFileDir . $fileName;

            // Mover el archivo a la carpeta de destino
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                // Aquí puedes guardar la ruta de la imagen en la base de datos
                $sql = "UPDATE tblstudents SET Image = :imagePath WHERE StudentId = :studentId";
                $query = $dbh->prepare($sql);
                $query->bindParam(':imagePath', $dest_path);
                $query->bindParam(':studentId', $studentId);
                $query->execute();

                $msg = "Archivo cargado y guardado exitosamente.";
            } else {
                $error = "Ocurrió un error al mover el archivo al directorio de destino.";
            }
        } else {
            $error = "Extensión de archivo no permitida.";
        }
    } else {
        $error = "No se ha cargado ningún archivo o ha ocurrido un error.";
    }
}

// Redirigir de nuevo a la página de gestión de estudiantes con un mensaje
header("Location: manage-students.php?msg=$msg&error=$error");
exit();
?>
