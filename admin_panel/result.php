<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resultados Estudiante</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
    <link rel="stylesheet" href="./assets/css/resultados/style.css">
    <link rel="stylesheet" href="./assets/css/resultad/style.css">

</head>

<body>
    <div class="main-wrapper">
        <div class="content-wrapper">
            <div class="content-container">

                <div class="main-page">
                    <div class="container-fluid">
                        <h1><span class="blue"></span>Avance del<span class="blue"></span> <span class="yellow"> Estudiante</span></h1>
                    </div>

                    <div class="container my-5">
                        <div class="custom-container text-center">
                            <section class="section" id="exampl">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <div class="container my-4">
                                                        <div class="custom-container text-center">
                                                            <div class="panel-title">
                                                                <hr />
                                                                <?php
                                                                // Code to retrieve student data
                                                                $rollid = $_POST['rollid'];
                                                                $classid = $_POST['class'];
                                                                $_SESSION['rollid'] = $rollid;
                                                                $_SESSION['classid'] = $classid;
                                                                $qery = "SELECT tblstudents.StudentName, tblstudents.RollId, tblstudents.RegDate, tblstudents.StudentId, tblstudents.Status, tblclasses.ClassName, tblclasses.Section, tblstudents.Image FROM tblstudents JOIN tblclasses ON tblclasses.id=tblstudents.ClassId WHERE tblstudents.RollId=:rollid AND tblstudents.ClassId=:classid";
                                                                $stmt = $dbh->prepare($qery);
                                                                $stmt->bindParam(':rollid', $rollid, PDO::PARAM_STR);
                                                                $stmt->bindParam(':classid', $classid, PDO::PARAM_STR);
                                                                $stmt->execute();
                                                                $resultss = $stmt->fetchAll(PDO::FETCH_OBJ);

                                                                if ($stmt->rowCount() > 0) {
                                                                    foreach ($resultss as $row) { ?>
                                                                        <p><b>Nombre de Estudiante:</b> <?php echo htmlentities($row->StudentName); ?></p>
                                                                        <p><b>Cedula:</b> <?php echo htmlentities($row->RollId); ?></p>
                                                                        <p><b>Año Lectivo:</b> <?php echo htmlentities($row->ClassName); ?>(<?php echo htmlentities($row->Section); ?>)</p>
                                                                        <?php
                                                                        // Mostrar la imagen
                                                                        if ($row->Image) { ?>
                                                                            <img src="data:image/jpeg;base64,<?php echo $row->Image; ?>" alt="Imagen del estudiante" style="width:150px;height:150px;border-radius:50%;">
                                                                        <?php }
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="panel-body p-20">
                                                        <table class="table table-hover table-bordered" border="1" width="100%">
                                                            <thead>
                                                                <tr style="text-align: center">
                                                                    <th style="text-align: center">#</th>
                                                                    <th style="text-align: center ">Materia</th>
                                                                    <th style="text-align: center">Calificaciones</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <?php
                                                                    // Code for result
                                                                    $query = "SELECT t.StudentName, t.RollId, t.ClassId, t.marks, SubjectId, tblsubjects.SubjectName FROM (SELECT sts.StudentName, sts.RollId, sts.ClassId, tr.marks, SubjectId FROM tblstudents AS sts JOIN tblresult AS tr ON tr.StudentId=sts.StudentId) AS t JOIN tblsubjects ON tblsubjects.id=t.SubjectId WHERE (t.RollId=:rollid AND t.ClassId=:classid)";
                                                                    $query = $dbh->prepare($query);
                                                                    $query->bindParam(':rollid', $rollid, PDO::PARAM_STR);
                                                                    $query->bindParam(':classid', $classid, PDO::PARAM_STR);
                                                                    $query->execute();
                                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                                    $cnt = 1;
                                                                    $totlcount = 0; // Inicializar la variable
                                                                    if ($countrow = $query->rowCount() > 0) {
                                                                        foreach ($results as $result) {
                                                                ?>
                                                                        <tr>
                                                                            <th scope="row" style="text-align: center"><?php echo htmlentities($cnt); ?></th>
                                                                            <td style="text-align: center"><?php echo htmlentities($result->SubjectName); ?></td>
                                                                            <td style="text-align: center"><?php echo htmlentities($totalmarks = $result->marks); ?></td>
                                                                        </tr>
                                                                    <?php
                                                                            $totlcount += $totalmarks;
                                                                            $cnt++;
                                                                        }
                                                                    ?>
                                                                    <tr>
                                                                        <th scope="row" colspan="2" style="text-align: center">Total</th>
                                                                        <td style="text-align: center"><b><?php echo htmlentities($totlcount); ?></b> de <b><?php echo htmlentities($outof = ($cnt - 1) * 100); ?></b></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" colspan="2" style="text-align: center">Porcentaje</th>
                                                                        <td style="text-align: center"><b><?php echo htmlentities($totlcount * (100) / $outof); ?> %</b></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3" align="center"><i class="fa fa-print fa-2x" aria-hidden="true" style="cursor:pointer" OnClick="CallPrint(this.value)"></i></td>
                                                                    </tr>

                                                                <?php } else { ?>
                                                                    <div class="alert alert-warning left-icon-alert" role="alert">
                                                                        <strong>Importante!</strong> Aun no se han declarado tus resultados
                                                                    </div>
                                                                <?php }
                                                                } else { ?>
                                                                    <div class="alert alert-danger left-icon-alert" role="alert">
                                                                        <strong>Hubo inconvenientes!</strong>
                                                                        <?php echo htmlentities("ID Roll inválido"); ?>
                                                                    </div>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <a href="../index.php" style="color:white;">Volver</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>
    <script src="js/prism/prism.js"></script>
    <script src="js/main.js"></script>
    <script>
        function CallPrint(strid) {
            var prtContent = document.getElementById("exampl");
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }
    </script>

</body>

</html>
