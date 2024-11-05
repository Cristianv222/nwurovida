<?php
session_start();
include('includes/config.php');

if (!isset($_SESSION['alogin']) || $_SESSION['alogin'] == '') {
    // Redirige al usuario a la página de inicio de sesión si no está autenticado
    header('Location: admin-login.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM tblsubjects WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    if ($query->execute()) {
        $msg = "Materia eliminada con éxito";
    } else {
        $error = "Error al eliminar la materia";
    }
}

header('Location: manage-subjects.php'); // Redirige a la página de gestión de materias
exit();
?>
