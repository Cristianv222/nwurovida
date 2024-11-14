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
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Gestionar Años</title>
        <link rel="stylesheet" type="text/css" href="assets/js/DataTables/datatables.min.css" />
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

            .btn-info:hover {
                background-color: #138496;
                border-color: #117a8b;
            }

            .btn-danger:hover {
                background-color: #c82333;
                border-color: #bd2130;
            }

            .table-primary {
                background-color: #007bff;
                color: white;
            }

            .table-secondary {
                background-color: #6c757d;
                color: white;
            }

            .table-light {
                background-color: #f8f9fa;
                color: black;
            }

            .table-hover tbody tr:hover {
                background-color: #f1f1f1;
            }
        </style>
    </head>

    <body>
        <!-- ========== TOP NAVBAR ========== -->
        <?php include('includes/topbar.php'); ?>
        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
        <div class="content-wrapper">
            <div class="content-container">
                <?php include('includes/leftbar.php'); ?>
                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title">Gestionar Años</h2>
                            </div>
                        </div>
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Inicio</a></li>
                                    <li>Años</li>
                                    <li class="active">Gestionar Años</li>
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
                                                <h5>Ver información de Año</h5>
                                            </div>
                                        </div>
                                        <?php if ($msg) { ?>
                                            <div class="alert alert-success left-icon-alert" role="alert">
                                                <strong>Bien hecho</strong> <?php echo htmlentities($msg); ?>
                                            </div>
                                        <?php } else if ($error) { ?>
                                            <div class="alert alert-danger left-icon-alert" role="alert">
                                                <strong>Inconvenientes</strong> <?php echo htmlentities($error); ?>
                                            </div>
                                        <?php } ?>
                                        <div class="panel-body p-20">
                                            <table id="example" class="table table-striped table-bordered table-hover table-responsive">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nombre de Año</th>
                                                        <th>Año en número</th>
                                                        <th>Sección</th>
                                                        <th>Fecha de Creación</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * FROM tblclasses";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt = 1;
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $result) { ?>
                                                            <tr class="<?php echo $cnt % 2 == 0 ? 'table-secondary' : 'table-light'; ?>">
                                                                <td><?php echo htmlentities($cnt); ?></td>
                                                                <td><?php echo htmlentities($result->ClassName); ?></td>
                                                                <td><?php echo htmlentities($result->ClassNameNumeric); ?></td>
                                                                <td><?php echo htmlentities($result->Section); ?></td>
                                                                <td><?php echo htmlentities($result->CreationDate); ?></td>
                                                                <td class="action-buttons">
                                                                    <a href="edit-class.php?classid=<?php echo htmlentities($result->id); ?>" class="btn btn-info btn-sm">
                                                                        <i class="bi bi-pencil-square" title="Editar Registro"></i>
                                                                    </a>
                                                                    <a href="delete-class.php?classid=<?php echo htmlentities($result->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este año?');">
                                                                        <i class="bi bi-trash" title="Eliminar Registro"></i>
                                                                    </a>
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
    </body>

    </html>
<?php } ?>