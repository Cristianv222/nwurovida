<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (!isset($_SESSION['alogin']) || $_SESSION['alogin'] == '') {
    // Redirige al usuario a la página de inicio de sesión si no está autenticado
    header('Location: admin-login.php');
    exit();
} else {
    //For Deleting the notice

    if ($_GET['id']) {
        $id = $_GET['id'];
        $sql = "delete from tblnotice where id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        echo '<script>alert("Comunicado Eliminado")</script>';
        echo "<script>window.location.href ='manage-notices.php'</script>";
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
                        <div class="col-md-6">
                            <div class="row page-title-div mt-4">
                                <div class="col-sm-6">
                                    <h2 class="title">Gestionar Comunicado</h2>
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
                                <li> Años</li>
                                <li class="active">Gestionar Comunicados</li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->

                <section class="section">
                    <div class="container-fluid">



                        <div class="row">
                            <div class="col-md-12">

                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h5>Ver Información de Comunicados</h5>
                                        </div>
                                    </div>

                                    <div class="panel-body p-20">

                                        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Título de Comunicado</th>
                                                    <th>Información de Comunicado</th>
                                                    <th>Fecha Creación</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sql = "SELECT * from tblnotice";
                                                $query = $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {   ?>
                                                        <tr>
                                                            <td><?php echo htmlentities($cnt); ?></td>
                                                            <td><?php echo htmlentities($result->noticeTitle); ?></td>
                                                            <td><?php echo htmlentities($result->noticeDetails); ?></td>
                                                            <td><?php echo htmlentities($result->postingDate); ?></td>
                                                            <td>
                                                                <a href="manage-notices.php?id=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Deseas eliminar este comunicado?');" class="btn btn-danger">
                                                                    <i class="fa fa-trash" title="Delete this Record"></i> </a>

                                                            </td>
                                                        </tr>
                                                <?php $cnt = $cnt + 1;
                                                    }
                                                } ?>


                                            </tbody>
                                        </table>


                                        <!-- /.col-md-12 -->
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