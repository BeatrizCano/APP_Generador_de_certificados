<?php
/*para instalar la librería fpdf, se descarga el zip de la última versión, y lo abrimos. Vamos a la carpeta del proyecto y en "library"
creamos una carpeta "fpdf" y dentro pegamos todos los archivos que están en el archivo comprimido (copiarlos antes). Luego ya hacemos el require.*/
require('../library/fpdf/fpdf.php');

//conectar con la base de datos
include_once('../config/bd.php');
//es el método para llamar a la conexión con la base de datos
$conectionBD = BD::createInstance();

//fucnción para crear texto del certificado, el texto, la posición, el tamaño, la alineación...los colores del texto son rgb ($r, $g, $b)
//se crea de manera agnóstica para poder reutilizar las funciones
function addText($pdf, $text, $x, $y, $align='L', $font, $size=10, $r=0, $g=0, $b=0) {
    $pdf->SetFont($font, "", $size);
    $pdf->SetXY($x, $y);
    $pdf->SetTextColor($r, $g, $b);
    //align: posición del texto primero, luego el ancho, el alto y la alineación
    $pdf->Cell(0, 10, $text, 0, 0, $align);
}

//función para agregar imagen
function addImg($pdf, $img, $x, $y) {
    $pdf->Image($img, $x, $y, 0);
}

$idCourse = isset($_GET['id_curso']) ? $_GET['id_curso'] : '';
$idStudent = isset($_GET['id_alumno']) ? $_GET['id_alumno'] : '';

/*sacar los datos necesarios de la tabla alumnos y cursos*/ 
$sql = "SELECT alumnos.nombre, alumnos.apellidos, cursos.nombre_curso 
FROM alumnos, cursos WHERE alumnos.id=:id_alumno AND cursos.id=:id_curso";
$consult = $conectionBD->prepare($sql);
$consult->bindParam(':id_alumno', $idStudent);
$consult->bindParam(':id_curso', $idCourse);
$consult->execute();
$student = $consult->fetch(PDO::FETCH_ASSOC);


//dar las propiedades al pdf
//lo saca de la doc. Tamaño L, milímetros, tamaño adecuado para que se muestre en pantalla

$pdf = new FPDF("L", "mm", array(320, 192));
//agregar el texto y la imagen
$pdf ->AddPage();
$pdf ->setFont("Arial", "B", 16);
//agregar imagen del certificado
addImg($pdf, "../src/certificate.jpg",0 ,0);
//agregar texto, convertir en mayúsculas con "ucwords" y traer los datos para que se rellene de forma dinámica
addText($pdf, ucwords(utf8_decode($student['nombre'] . " " . $student['apellidos'])), -360, 80, 'C', "Helvetica", 30, 169, 50, 38);
addText($pdf, $student['nombre_curso'], -290, 128, 'C', "Helvetica", 28, 169, 50, 38);
addText($pdf, date("d/m/Y"), -285, 151, 'C', "Helvetica", 12, 169, 50, 38);
//orden estandar, saca el pdf
$pdf->Output();



?>