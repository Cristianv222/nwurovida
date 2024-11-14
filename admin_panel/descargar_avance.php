<?php
require('fpdf/fpdf.php');
include('includes/config.php');

class PDF extends FPDF
{
    function Header()
    {
        // Fondo de imagen (ajusta la ruta a tu imagen de fondo)
        $this->Image('../neuro/images/imagenfondo.jpg', 0, 0, 210, 297); // Ajusta el tamaño según el A4 (210x297 mm)
    }
}

if (isset($_POST['rollid']) && isset($_POST['class'])) {
    $rollid = $_POST['rollid'];
    $classid = $_POST['class'];

    $pdf = new PDF();
    $pdf->AddPage();

    // Establecer margen superior
    $pdf->SetY(20);

    // Logo y Encabezado
    $pdf->Image('../neuro/images/logotipo.png', 10, 20, 30); // Reemplaza 'path/to/logo.png' con la ruta real del logo
    $pdf->SetFont('Times', 'B', 20);
    $pdf->SetTextColor(50, 140, 50); // Color basado en cromática (ajusta según tu preferencia)
    $pdf->Cell(0, 10, 'Neurovida', 0, 1, 'C');
    $pdf->SetFont('Times', 'I', 12);
    $pdf->Cell(0, 10, 'Calle Inventada #123, Ciudad Ejemplo | Tel: +593 123 456 789', 0, 1, 'C');
    $pdf->Ln(15);

    // Información del estudiante
    $query = "SELECT tblstudents.StudentName, tblstudents.RollId, tblclasses.ClassName, tblclasses.Section, tblstudents.Image
    FROM tblstudents
    JOIN tblclasses ON tblclasses.id = tblstudents.ClassId
    WHERE tblstudents.RollId = :rollid AND tblstudents.ClassId = :classid";

    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':rollid', $rollid, PDO::PARAM_STR);
    $stmt->bindParam(':classid', $classid, PDO::PARAM_STR);
    $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_OBJ);

    if ($student) {
        $pdf->SetFont('Times', 'B', 16);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(0, 10, 'Avance del Estudiante', 0, 1, 'C');
        $pdf->Ln(10);

        // Información básica
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(0, 10, 'Nombre: ' . utf8_decode($student->StudentName), 0, 1);
        $pdf->Cell(0, 10, 'Cedula: ' . $student->RollId, 0, 1);
        $pdf->Cell(0, 10, 'Curso: ' . utf8_decode($student->ClassName) . ' ' . $student->Section, 0, 1);
        $pdf->Ln(5);

        // Imagen principal del estudiante (a la derecha)
        if ($student->Image) {
            $imageData = base64_decode($student->Image) ?: $student->Image;
            $image = @imagecreatefromstring($imageData);
            if ($image) {
                $tempImageFile = tempnam(sys_get_temp_dir(), 'image') . '.jpg';
                imagejpeg($image, $tempImageFile);
                $pdf->Image($tempImageFile, 150, 50, 40, 40);
                imagedestroy($image);
                unlink($tempImageFile);
            }
        }

        $pdf->Ln(15);

        // Resultados académicos en tabla centrada y estilizada
        $pdf->SetX(25); // Centrar tabla
        $pdf->SetFillColor(210, 230, 210); // Fondo encabezado
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(80, 10, 'Materia', 1, 0, 'C', true);
        $pdf->Cell(50, 10, 'Calificacion', 1, 1, 'C', true);

        $pdf->SetFont('Times', '', 10);
        $pdf->SetFillColor(255, 255, 255); // Fondo blanco para celdas alternas
        $query = "SELECT tblsubjects.SubjectName, tr.marks
                  FROM tblresult AS tr
                  JOIN tblsubjects ON tblsubjects.id = tr.SubjectId
                  WHERE tr.StudentId = (SELECT StudentId FROM tblstudents WHERE RollId = :rollid)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':rollid', $rollid, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach ($results as $result) {
            $calificacion = $result->marks >= 5 ? "Sobresaliente" : ($result->marks == 4 ? "Excelente" : ($result->marks == 3 ? "Bueno" : ($result->marks == 2 ? "Regular" : "Malo")));
            $pdf->SetX(25);
            $pdf->Cell(80, 10, utf8_decode($result->SubjectName), 1, 0, 'L', true);
            $pdf->Cell(50, 10, $calificacion, 1, 1, 'C', true);
        }

        $pdf->Ln(15);

        // Imágenes adicionales más abajo en el PDF
        $imageQuery = "SELECT image1, image2, image3, image4 FROM tblimages WHERE StudentId = (SELECT StudentId FROM tblstudents WHERE RollId = :rollid) LIMIT 1";
        $imageStmt = $dbh->prepare($imageQuery);
        $imageStmt->bindParam(':rollid', $rollid, PDO::PARAM_STR);
        $imageStmt->execute();
        $images = $imageStmt->fetch(PDO::FETCH_OBJ);

        if ($images) {
            $positions = [
                ['x' => 30, 'y' => 200],
                ['x' => 80, 'y' => 200],
                ['x' => 130, 'y' => 200],
                ['x' => 180, 'y' => 200]
            ];

            $index = 0;
            foreach (['image1', 'image2', 'image3', 'image4'] as $imgColumn) {
                if (!empty($images->$imgColumn)) {
                    $imageData = $images->$imgColumn;
                    $image = @imagecreatefromstring($imageData);
                    if ($image) {
                        $tempImageFile = tempnam(sys_get_temp_dir(), 'image') . '.jpg';
                        imagejpeg($image, $tempImageFile);
                        $pdf->Image($tempImageFile, $positions[$index]['x'], $positions[$index]['y'], 40, 40);
                        imagedestroy($image);
                        unlink($tempImageFile);
                    }
                }
                $index++;
            }
        }
    } else {
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(0, 10, 'No se encontraron detalles para el ID ingresado.', 0, 1, 'C');
    }

    // Descargar PDF
    $pdf->Output('D', 'Avance_' . $rollid . '.pdf');
}
?>