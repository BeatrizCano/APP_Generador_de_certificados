<?php

include_once '../config/bd.php';
//es el método para llamar a la conexión con la base de datos
$conectionBD = BD::createInstance();

//Validar las acciones de los botones añadir, editar y borrar
//datos de los alumnos
$id = isset($_POST['id']) ? $_POST['id'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
//datos de los cursos y la acción que se llevó a cabo
$courses = isset($_POST['courses']) ? $_POST['courses'] : '';
$action = isset($_POST['action']) ? $_POST['action'] : '';

if($action!='') {
    switch($action) {
        case 'add':

            $sql = "INSERT INTO alumnos (id, nombre, apellidos) VALUES (NULL, :nombre, :apellidos)";
            $consult = $conectionBD->prepare($sql);
            $consult->bindParam(':nombre', $name);
            $consult->bindParam(':apellidos', $lastName);
            $consult->execute();
            //id del alumno insertado, recupera el id cuando se inserte un nuevo registro
            $idStudent = $conectionBD->lastInsertId();

            //insertamos los cursos relacionándolos con el id del alumno
            foreach($courses as $course) {
                $sql = "INSERT INTO alumnos_cursos (id, id_alumno, id_curso) VALUES (NULL, :id_alumno, :id_curso)";
                $consult = $conectionBD->prepare($sql);
                $consult->bindParam(':id_alumno', $idStudent);
                $consult->bindParam(':id_curso', $course);
                $consult->execute();
            }

        case 'Seleccionar':

            //echo "Presionaste seleccionar";
            
            $sql = "SELECT * FROM alumnos WHERE id=:id";
            $consult = $conectionBD->prepare($sql);
            $consult->bindParam(':id', $id);
            $consult->execute();
            $student = $consult->fetch(PDO::FETCH_ASSOC);

            $name = $student['nombre'];
            $lastName= $student['apellidos'];
            
            //incluir el id del curso de la tabla alumnos_cursos en el formulario
            $sql = "SELECT cursos.id FROM alumnos_cursos
            INNER JOIN cursos ON cursos.id=alumnos_cursos.id_curso
            WHERE alumnos_cursos.id_alumno=:id_alumno";
            
             $consult = $conectionBD->prepare($sql);
             $consult->bindParam(':id_alumno', $id);
             $consult->execute();
             $studentCourses = $consult->fetchAll(PDO::FETCH_ASSOC);

             //print_r($studentCourses);

             foreach($studentCourses as $course) {
                $fixCourses[] = $course['id'];
             }

        break;    

        case "delete":

            $sql = "DELETE FROM alumnos WHERE id = :id";
            $consult = $conectionBD->prepare($sql);
            $consult->bindParam(':id', $id);
            $consult->execute();

        break;

        case 'edit':

            $sql = "UPDATE alumnos SET  nombre = :nombre, apellidos = :apellidos  WHERE id=:id";
            $consult = $conectionBD->prepare($sql);
            //hay que pasar dos parámetros para los tres valores reemplazándolos por los nuevos valores introducidos
            $consult->bindParam(':nombre', $name);
            $consult->bindParam(':apellidos', $lastName);
            $consult->bindParam(':id', $id);
            $consult->execute();

           

            //si existen cursos borrarlos de la tabla relacianoda alumnos_cursos respetando el id del alumno
            if(isset($courses)) {

                $sql = "DELETE FROM alumnos_cursos WHERE id_alumno=:id_alumno";
                $consult = $conectionBD->prepare($sql);
                $consult->bindParam(':id_alumno', $id);
                $consult->execute();

                //leer todos los datos que están relacionados, id_alumno e id_curso e insertarlos
                foreach($courses as $course) {

                    $sql = "INSERT INTO alumnos_cursos (id, id_alumno, id_curso) 
                    VALUES (NULL, :id_alumno, :id_curso)";
                    $consult = $conectionBD->prepare($sql);
                    $consult->bindParam(':id_alumno', $id);
                    $consult->bindParam(':id_curso', $course);
                    $consult->execute();
                }

                $fixCourses = $courses;
            }

            break;
    }
}

//traer datos de la tabla alumnos
$sql = "SELECT * FROM alumnos";
$studentsList = $conectionBD->query($sql);
$students = $studentsList->fetchAll();

//para leer todos los datos de la tabla alumnos y saber los cursos que le pertenece a cada alumno
//se le añade una clave "clue" que permita reescribir la parte de alumnos del foreach
foreach($students as $clue => $student) {
    //selecciona todos los cursos cuando el id pertenezca a alguno de estos id que provienen de esta tabla
    $sql = "SELECT * FROM cursos 
    WHERE id IN (SELECT id_curso FROM alumnos_cursos WHERE id_alumno = :id_alumno)";
    $consult = $conectionBD->prepare($sql);
    $consult->bindParam(':id_alumno', $student['id']);
    $consult->execute();
    //recuperar los cursos que tiene y mostrarlos, se almacenan en la variable $students
    $studentCourses = $consult->fetchAll();
    $students[$clue]['cursos'] = $studentCourses;
}

//recuperar la lista de cursos 
$sql = "SELECT * FROM cursos";
$coursesList = $conectionBD->query($sql);
$courses = $coursesList->fetchAll();

?>
