<?php
include('includes/config.php');

if (!empty($_POST["classid"])) {
    $cid = intval($_POST['classid']);
    if (!is_numeric($cid)) {
        echo htmlentities("Invalid Class");
        exit;
    } else {
        $stmt = $dbh->prepare("SELECT StudentName, StudentId FROM tblstudents WHERE ClassId = :id ORDER BY StudentName");
        $stmt->execute(array(':id' => $cid));

        echo '<option value="">Selecciona Estudiante</option>';

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . htmlentities($row['StudentId']) . '">' . htmlentities($row['StudentName']) . '</option>';
        }
    }
}

// Código para asignaturas (si es necesario)
if (!empty($_POST["classid1"])) {
    $cid1 = intval($_POST['classid1']);
    if (!is_numeric($cid1)) {
        echo htmlentities("Invalid Class");
        exit;
    } else {
        $status = 0;
        $stmt = $dbh->prepare("SELECT tblsubjects.SubjectName, tblsubjects.id FROM tblsubjectcombination JOIN tblsubjects ON tblsubjects.id = tblsubjectcombination.SubjectId WHERE tblsubjectcombination.ClassId = :cid AND tblsubjectcombination.status != :stts ORDER BY tblsubjects.SubjectName");
        $stmt->execute(array(':cid' => $cid1, ':stts' => $status));

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<p>' . htmlentities($row['SubjectName']) . '<input type="text" name="marks[]" value="" class="form-control" required="" placeholder="Introducir puntos sobre 100" autocomplete="off"></p>';
        }
    }
}

if (!empty($_POST["studclass"])) {
    $id = $_POST['studclass'];
    $dta = explode("$", $id);
    $id = $dta[0];
    $id1 = $dta[1];
    $query = $dbh->prepare("SELECT StudentId, ClassId FROM tblresult WHERE StudentId = :id1 AND ClassId = :id ");
    $query->bindParam(':id1', $id1, PDO::PARAM_STR);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        echo "<span style='color:red'> Los resultados de este estudiante ya fueron declarados </span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    }
}
?>
