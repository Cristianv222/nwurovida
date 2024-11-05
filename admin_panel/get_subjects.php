<?php
// Archivo get_subjects.php
include('includes/config.php');

if (!empty($_POST['classid'])) {
    $classId = $_POST['classid'];

    // Consulta para obtener las materias asociadas a la clase seleccionada
    $sql = "SELECT tblsubjects.SubjectName, tblsubjects.id 
            FROM tblsubjectcombination 
            JOIN tblsubjects ON tblsubjects.id = tblsubjectcombination.SubjectId 
            WHERE tblsubjectcombination.ClassId = :classid 
            ORDER BY tblsubjects.SubjectName";

    $query = $dbh->prepare($sql);
    $query->bindParam(':classid', $classId, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            echo "<div class='form-group'>
                      <label>{$result->SubjectName}</label>
                      <select name='marks[]' class='form-control' required='required'>
                          <option value='5'>Sobresaliente</option>
                          <option value='4'>Excelente</option>
                          <option value='3'>Bueno</option>
                          <option value='2'>Regular</option>
                          <option value='1'>Malo</option>
                      </select>
                  </div>";
        }
    } else {
        echo "<div class='alert alert-warning'>No hay materias disponibles para esta clase.</div>";
    }
}
?>
