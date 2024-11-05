<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (!isset($_SESSION['alogin']) || $_SESSION['alogin'] == '') {
    header('Location: admin-login.php');
    exit();
}

if (isset($_GET['classid'])) {
    $classid = intval($_GET['classid']);
    $sql = "DELETE FROM tblclasses WHERE id = :classid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':classid', $classid, PDO::PARAM_INT);
    
    if ($query->execute()) {
        $msg = "Año eliminado correctamente.";
    } else {
        $error = "Hubo un problema al eliminar el año.";
    }
    header("Location: manage-classes.php?msg=$msg");
    exit();
}
?>
