<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (!isset($_SESSION['alogin']) || $_SESSION['alogin'] == '') {
    // Redirige al usuario a la página de inicio de sesión si no está autenticado
    header('Location: admin-login.php');
    exit();
} else {
    // Activar Materia
    if (isset($_GET['acid'])) {
        $acid = intval($_GET['acid']);
        $status = 1;
        $sql = "update tblsubjectcombination set status=:status where id=:acid ";
        $query = $dbh->prepare($sql);
        $query->bindParam(':acid', $acid, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();
        $msg = "Materia activada correctamente";
    }

    // Desactivar Materia
    if (isset($_GET['did'])) {
        $did = intval($_GET['did']);
        $status = 0;
        $sql = "update tblsubjectcombination set status=:status where id=:did ";
        $query = $dbh->prepare($sql);
        $query->bindParam(':did', $did, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();
        $msg = "Materia desactivada correctamente";
    }

    // Eliminar Materia
    if (isset($_GET['deleteid'])) {
        $deleteid = intval($_GET['deleteid']);
        $sql = "DELETE FROM tblsubjectcombination WHERE id=:deleteid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':deleteid', $deleteid, PDO::PARAM_STR);
        $query->execute();
        $msg = "Materia eliminada correctamente";
    }
?>

    <link rel="stylesheet" type="text/css" href="assets/js/DataTables/datatables.min.css" />
    <!-- ========== TOP NAVBAR ========== -->
    <?php include('includes/topbar.php'); ?>
    <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
    <div class="content-wrapper">
        <div class="content-container">
            <?php include('includes/leftbar.php'); ?>

            <div class="main-page">
                <div class="container-fluid">
                    <div class="row page-title-div">
                        <div class="row page-title-div mt-4">
                            <div class="col-sm-6">

                                <div class="col-md-6">
                                    <h2 class="title">Gestionar la Relación de Materia</h2>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row breadcrumb-div">
                        <div class="col-md-6">
                            <ul class="breadcrumb">
                                <li><a href="dashboard.php"><i class="fa fa-home"></i> Inicio</a></li>
                                <li>Materia</li>
                                <li class="active">Gestionar Relación de Materia</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <section class="section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h5>Ver Información de Relación de Materia</h5>
                                        </div>
                                    </div>
                                    <?php if ($msg) { ?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Bien hecho!</strong><?php echo htmlentities($msg); ?>
                                        </div>
                                    <?php } else if ($error) { ?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Hubo inconvenientes!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="panel-body p-20">
                                        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Materia y Sección</th>
                                                    <th>Materia</th>
                                                    <th>Estado</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT tblclasses.ClassName,tblclasses.Section,tblsubjects.SubjectName,tblsubjectcombination.id as scid,tblsubjectcombination.status from tblsubjectcombination join tblclasses on tblclasses.id=tblsubjectcombination.ClassId join tblsubjects on tblsubjects.id=tblsubjectcombination.SubjectId";
                                                $query = $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) { ?>
                                                        <tr>
                                                            <td><?php echo htmlentities($cnt); ?></td>
                                                            <td><?php echo htmlentities($result->ClassName); ?> &nbsp; Section-<?php echo htmlentities($result->Section); ?></td>
                                                            <td><?php echo htmlentities($result->SubjectName); ?></td>
                                                            <td><?php $stts = $result->status;
                                                                if ($stts == '0') {
                                                                    echo htmlentities('Inactivo');
                                                                } else {
                                                                    echo htmlentities('Activo');
                                                                }
                                                                ?></td>
                                                            <td>
                                                                <?php if ($stts == '0') { ?>
                                                                    <a href="manage-subjectcombination.php?acid=<?php echo htmlentities($result->scid); ?>" onclick="return confirm('¿Deseas activar esta materia?');" class="btn btn-success"><i class="fa fa-check" title="Activar Registro"></i> </a>
                                                                <?php } else { ?>
                                                                    <a href="manage-subjectcombination.php?did=<?php echo htmlentities($result->scid); ?>" class="btn btn-danger" onclick="return confirm('¿Deseas desactivar esta materia?');"><i class="fa fa-times" title="Desactivar Registro"></i> </a>
                                                                <?php } ?>
                                                                <a href="manage-subjectcombination.php?deleteid=<?php echo htmlentities($result->scid); ?>" class="btn btn-danger" onclick="return confirm('¿Deseas eliminar esta materia?');"><i class="fa fa-trash" title="Eliminar Registro"></i> </a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                        $cnt = $cnt + 1;
                                                    }
                                                } ?>
                                            </tbody>
                                        </table>
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
<?php } ?>