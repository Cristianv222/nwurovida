<?php
session_start();
include('includes/config.php');

if (!isset($_SESSION['alogin']) || $_SESSION['alogin'] == '') {
    header('Location: admin-login.php');
    exit();
}

if (isset($_GET['stid'])) {
    $stid = intval($_GET['stid']);
    $sql = "DELETE FROM tblstudents WHERE StudentId = :stid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':stid', $stid, PDO::PARAM_INT);
    
    if ($query->execute()) {
        $msg = "Estudiante eliminado correctamente.";
    } else {
        $error = "Ocurrió un error al eliminar al estudiante.";
    }
}
header('Location: manage-students.php'); // Redirige de vuelta a la página de gestión de estudiantes
exit();
?>
