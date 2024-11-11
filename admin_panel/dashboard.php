<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {

    // Verifica si el usuario ha iniciado sesión
    if (!isset($_SESSION['alogin']) || $_SESSION['alogin'] == '') {
        header('Location: admin-login.php');
        exit();
    }
?>

    <style>
        /* Fondo con imagen */
        body {
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: center;

            margin: 0;
            font-family: Arial, sans-serif;
            color: #333;
        }

        /* Contenedor para centrar la imagen */
        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
        }

        /* Imagen responsive */
        .image-container img {
            max-width: 100%;
            height: auto;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            /* Fondo semi-transparente */
            border-radius: 8px;
        }

        .content-wrapper,
        .content-container {
            display: flex;
            flex-direction: column;
        }

        .dashboard-stat {
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            text-align: center;
        }

        /* Responsivo para dispositivos pequeños */
        @media (max-width: 768px) {
            .content {
                margin-left: 0;
                padding: 10px;
            }

            .row {
                flex-direction: column;
                align-items: center;
            }

            .dashboard-stat {
                width: 90%;
                margin: 5px 0;
            }

            .table-responsive {
                overflow-x: auto;
            }
        }
    </style>

    <body>
        <?php include('includes/topbar.php'); ?>
        <div class="content-wrapper">
            <div class="content-container">
                <?php include('includes/leftbar.php'); ?>
                <div class="main-page">
                    <div class="row page-title-div">
                        <div class="col-md-12">
                            <div class="container-fluid">
                                <div class="row page-title-div">
                                    <div class="col-sm-6">
                                        <h2 class="title">Dashboard</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <section class="section">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center">
                                    <a class="dashboard-stat bg-white" href="manage-students.php">
                                        <?php
                                        $sql1 = "SELECT StudentId from tblstudents ";
                                        $query1 = $dbh->prepare($sql1);
                                        $query1->execute();
                                        $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                                        $totalstudents = $query1->rowCount();
                                        ?>
                                        <span class="number counter"><?php echo htmlentities($totalstudents); ?></span>
                                        <span class="name">Usuarios Registrados</span>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center">
                                    <a class="dashboard-stat bg-white" href="manage-subjects.php">
                                        <?php
                                        $sql = "SELECT id from tblsubjects ";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $totalsubjects = $query->rowCount();
                                        ?>
                                        <span class="number counter"><?php echo htmlentities($totalsubjects); ?></span>
                                        <span class="name">Listado de Materias</span>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat bg-white" href="manage-classes.php">
                                        <?php
                                        $sql2 = "SELECT id from tblclasses ";
                                        $query2 = $dbh->prepare($sql2);
                                        $query2->execute();
                                        $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
                                        $totalclasses = $query2->rowCount();
                                        ?>
                                        <span class="number counter"><?php echo htmlentities($totalclasses); ?></span>
                                        <span class="name">Total de Años Listados</span>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center">
                                    <a class="dashboard-stat bg-white" href="manage-results.php">
                                        <?php
                                        $sql3 = "SELECT distinct StudentId from tblresult ";
                                        $query3 = $dbh->prepare($sql3);
                                        $query3->execute();
                                        $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
                                        $totalresults = $query3->rowCount();
                                        ?>
                                        <span class="number counter"><?php echo htmlentities($totalresults); ?></span>
                                        <span class="name">Resultados Publicados</span>
                                    </a>
                                </div>
                            </div>

                            <section class="section">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <div class="panel-title">
                                                        <h5>Resultados Publicados Recientemente</h5>
                                                    </div>
                                                </div>
                                                <?php if ($msg) { ?>
                                                    <div class="alert alert-success left-icon-alert" role="alert">
                                                        <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                                                    </div>
                                                <?php } else if ($error) { ?>
                                                    <div class="alert alert-danger left-icon-alert" role="alert">
                                                        <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                                    </div>
                                                <?php } ?>
                                                <div class="panel-body p-20">
                                                    <div class="table-responsive">
                                                        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Nombre Estudiante</th>
                                                                    <th>ID Roll</th>
                                                                    <th>Año</th>
                                                                    <th>Fecha de Registro</th>
                                                                    <th>Estado</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $sql = "SELECT distinct tblstudents.StudentName, tblstudents.RollId, tblstudents.RegDate, tblstudents.StudentId, tblstudents.Status, tblclasses.ClassName, tblclasses.Section
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
                                                                            <td><?php echo htmlentities($result->Status == 1 ? 'Active' : 'Blocked'); ?></td>
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
                                </div>
                            </section>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <?php include('includes/footer.php'); ?>
    <?php } ?>
    </body>