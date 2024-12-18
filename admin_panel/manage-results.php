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

            <style>
                /* Estilos base de la tabla */
                .display.table {
                    width: 100%;
                    margin-bottom: 1rem;
                    background-color: #fff;
                    border-collapse: collapse;
                }

                /* Estilos para escritorio */
                @media screen and (min-width: 769px) {

                    .display.table th,
                    .display.table td {
                        padding: 0.75rem;
                        vertical-align: top;
                        border: 1px solid #dee2e6;
                    }

                    .action-buttons {
                        white-space: nowrap;
                    }
                }

                /* Estilos para móvil */
                @media screen and (max-width: 768px) {
                    .panel-body {
                        overflow-x: auto;
                        -webkit-overflow-scrolling: touch;
                        margin: 0 -15px;
                        padding: 15px !important;
                    }

                    .display.table {
                        display: table;
                        margin: 0;
                    }

                    .display.table th,
                    .display.table td {
                        padding: 0.5rem;
                        font-size: 0.9rem;
                        white-space: nowrap;
                        border: 1px solid #dee2e6;
                    }

                    .action-buttons {
                        display: flex;
                        gap: 0.25rem;
                        justify-content: flex-start;
                    }

                    .action-buttons .btn {
                        padding: 0.25rem 0.5rem;
                        font-size: 0.875rem;
                    }

                    .display.table td[data-label="Nombre de Estudiante"] {
                        min-width: 150px;
                    }

                    .display.table td[data-label="Fecha de Registro"] {
                        min-width: 100px;
                    }
                }

                /* Estilos para los botones de acción */
                .action-buttons .btn {
                    border-radius: 4px;
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                }

                .btn-info {
                    background-color: #17a2b8;
                    border-color: #17a2b8;
                    color: white;
                }

                .btn-danger {
                    background-color: #dc3545;
                    border-color: #dc3545;
                    color: white;
                }

                /* Efectos hover */
                .btn-info:hover {
                    background-color: #138496;
                    border-color: #117a8b;
                }

                .btn-danger:hover {
                    background-color: #c82333;
                    border-color: #bd2130;
                }
            </style>
            <div class="main-page">
                <div class="container-fluid m">
                    <div class="row page-title-div mt-4">
                        <div class="col-sm-6">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Gestionar Resultados</h2>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row breadcrumb-div">
                        <div class="col-md-6">
                            <ul class="breadcrumb">
                                <li><a href="dashboard.php"><i class="fa fa-home"></i> Inicio</a></li>
                                <li> Resultados</li>
                                <li class="active">Gestionar Resultados</li>
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
                                            <h5>Ver Información de Resultados</h5>
                                        </div>
                                    </div>
                                    <?php if ($msg) { ?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Proceso Correcto! </strong><?php echo htmlentities($msg); ?>
                                        </div><?php } else if ($error) { ?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Algo salió mal! </strong> <?php echo htmlentities($error); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="panel-body p-20">
                                        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre de Estudiante</th>
                                                    <th>Cedula</th>
                                                    <th>Año</th>
                                                    <th>Fecha de Registro</th>
                                                    <th>Estado</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT DISTINCT tblstudents.StudentName, tblstudents.RollId, tblstudents.RegDate, tblstudents.StudentId, tblstudents.Status, tblclasses.ClassName, tblclasses.Section 
                                                        FROM tblresult 
                                                        JOIN tblstudents ON tblstudents.StudentId = tblresult.StudentId  
                                                        JOIN tblclasses ON tblclasses.id = tblresult.ClassId";
                                                $query = $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) { ?>
                                                        <tr>
                                                            <td><?php echo htmlentities($cnt); ?></td>
                                                            <td><?php echo htmlentities($result->StudentName); ?></td>
                                                            <td><?php echo htmlentities($result->RollId); ?></td>
                                                            <td><?php echo htmlentities($result->ClassName); ?>(<?php echo htmlentities($result->Section); ?>)</td>
                                                            <td><?php echo htmlentities($result->RegDate); ?></td>
                                                            <td><?php echo $result->Status == 1 ? 'Active' : 'Blocked'; ?></td>
                                                            <td class="action-buttons">
                                                                <a href="edit-result.php?stid=<?php echo htmlentities($result->StudentId); ?>" class="btn btn-info"><i class="fa fa-edit" title="Edit Record"></i> </a>
                                                                <a href="delete-result.php?stid=<?php echo htmlentities($result->StudentId); ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este resultado?');"><i class="fa fa-trash" title="Delete Record"></i></a>
                                                            </td>
                                                        </tr>
                                                <?php $cnt++;
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