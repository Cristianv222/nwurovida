<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (!isset($_SESSION['alogin']) || $_SESSION['alogin'] == '') {
    // Redirige al usuario a la página de inicio de sesión si no está autenticado
    header('Location: admin-login.php');
    exit();
} else {
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
                                    <h2 class="title">Gestionar Materias</h2>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 text-right -->
                    </div>
                    <!-- /.row -->
                    <div class="row breadcrumb-div">
                        <div class="col-md-6">
                            <ul class="breadcrumb">
                                <li><a href="dashboard.php"><i class="fa fa-home"></i> Inicio</a></li>
                                <li> Materias</li>
                                <li class="active">Gestionar Materias</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
                <style>
                    @media (max-width: 768px) {
                        .table-responsive {
                            margin-bottom: 15px;
                            /* Espaciado inferior */
                        }
                        table {
                            width: 100%;
                            /* Asegúrate de que la tabla use el 100% de ancho */
                            table-layout: auto;
                            /* Permite que las columnas se ajusten */
                        }
                        th,
                        td {
                            white-space: nowrap;
                            /* Evita que el texto se divida en varias líneas */
                        }
                        th {
                            font-size: 14px;
                            /* Ajusta el tamaño de la fuente de los encabezados */
                        }
                        td {
                            font-size: 12px;
                            /* Ajusta el tamaño de la fuente de las celdas */
                        }
                        .btn {
                            padding: 5px 10px;
                            /* Reduce el tamaño de los botones en pantallas pequeñas */
                        }
                    }
                </style>

                <section class="section">
                    <div class="container-fluid">



                        <div class="row">
                            <div class="col-md-12">

                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h5>Ver Información de Materia</h5>
                                        </div>
                                    </div>
                                    <?php if ($msg) { ?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Bien hecho!</strong><?php echo htmlentities($msg); ?>
                                        </div><?php } else if ($error) { ?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Hubo un inconveniente!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="panel-body p-20">
                                        <div class="table-responsive">
                                            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nombre Materia</th>
                                                        <th>Código Materia</th>
                                                        <th>Fecha Creación</th>
                                                        <th>Fecha Actualización</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * from tblsubjects";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt = 1;
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $result) {   ?>
                                                            <tr>
                                                                <td><?php echo htmlentities($cnt); ?></td>
                                                                <td><?php echo htmlentities($result->SubjectName); ?></td>
                                                                <td><?php echo htmlentities($result->SubjectCode); ?></td>
                                                                <td><?php echo htmlentities($result->Creationdate); ?></td>
                                                                <td><?php echo htmlentities($result->UpdationDate); ?></td>
                                                                <td>
                                                                    <a href="edit-subject.php?subjectid=<?php echo htmlentities($result->id); ?>" class="btn btn-info">
                                                                        <i class="fa fa-edit" title="Edit Record"></i>
                                                                    </a>
                                                                    <a href="delete-subject.php?id=<?php echo htmlentities($result->id); ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta materia?');">
                                                                        <i class="fa fa-trash" title="Delete Record"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                    <?php
                                                            $cnt++;
                                                        }
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.col-md-6 -->


                        </div>
                        <!-- /.col-md-12 -->
                    </div>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-md-6 -->

    </div>
    <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.section -->

    </div>
    <!-- /.main-page -->



    </div>
    <!-- /.content-container -->
    </div>
    <!-- /.content-wrapper -->
    <?php include('includes/footer.php'); ?>



<?php } ?>