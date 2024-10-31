<?php
session_start();
error_reporting(E_ALL); // Muestra todos los errores
ini_set('display_errors', 1); // Muestra los errores en la página
include('includes/config.php');

if (!isset($_SESSION['alogin']) || $_SESSION['alogin'] == '') {
    // Redirige al usuario a la página de inicio de sesión si no está autenticado
    header('Location: admin-login.php');
    exit();
}else {
    // Comprobar si se pasó el StudentId
    if (isset($_GET['stid'])) {
        $stid = intval($_GET['stid']); // Convierte a entero para mayor seguridad
        $sql = "DELETE FROM tblresult WHERE StudentId = :stid";
        
        // Preparar y ejecutar la consulta
        $query = $dbh->prepare($sql);
        $query->bindParam(':stid', $stid, PDO::PARAM_INT);
        
        try {
            $query->execute(); // Intenta ejecutar la consulta
            $_SESSION['msg'] = "Resultado eliminado con éxito"; // Mensaje de éxito
        } catch (PDOException $e) {
            $_SESSION['error'] = "Error al eliminar el resultado: " . $e->getMessage(); // Mensaje de error
        }
    } else {
        $_SESSION['error'] = "ID de estudiante no especificado."; // Mensaje si no se pasó el StudentId
    }
    
    // Redirige de nuevo a la página de gestión de resultados
    header("Location: manage-results.php");
    exit;
}
?>
