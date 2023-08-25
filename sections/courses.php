<?php

include_once '../config/bd.php';
//es el método para llamar a la conexión con la base de datos
$conectionBD = BD::createInstance();

//recepcionar la información del formulario. Si los campos campos ('name') del formulario traen algún dato la asignamos sino nulo
$id = isset($_POST['id']) ? $_POST['id'] : '';
$courseName = isset($_POST['course_name']) ? $_POST['course_name'] : '';
//recibir la acción ('name') de los botones del formulario
$action = isset($_POST['action']) ? $_POST['action'] : '';

//print_r($_POST);

//si hay algo que hacer hacemos un switch para evaluar que botón presiona el ususario. Si no está vacio hacemos eso...
if ($action!='') {
    //si presionó el botón insertar los datos en los campos 
    switch($action) {

        case 'add':
            //inserta los valores, lo prepara, le pasa un parámetro y lo ejecuta
            $sql = "INSERT INTO cursos (id, nombre_curso) VALUES (NULL, :nombre_curso)";
            $consult = $conectionBD->prepare($sql);
            $consult->bindParam(':nombre_curso', $courseName);
            $consult->execute();

        break;
        
        //botón Editar del formulario
        case 'edit':
            //actualiza el valor nombre_curso con el valo de arriba (add) :nombre_curso cuando id sea igual a id
            $sql = "UPDATE cursos SET  nombre_curso = :nombre_curso  WHERE id=:id";
            $consult = $conectionBD->prepare($sql);
            //hay que pasar dos parámetros para los dos valores reemplazándolos por los nuevos valores introducidos
            $consult->bindParam(':id', $id);
            $consult->bindParam(':nombre_curso', $courseName);
            $consult->execute();

            //echo $sql;   

        break;

        //botón Borrar del formulario
        case 'delete':
            $sql = "DELETE FROM cursos WHERE id = :id";
            $consult = $conectionBD->prepare($sql);
            $consult->bindParam(':id', $id);
            $consult->execute();

        break;
        
        //el nombre del case está en castellano porque ha de ser = al del "value" que muestre el botón de la vista "Seleccionar"
        case 'Seleccionar':
            //los dos puntos son para evitar usar el dolar $. Se busca el registro para poder acceder a la información
            $sql = "SELECT * FROM cursos WHERE id=:id";
            $consult = $conectionBD->prepare($sql);
            //se pasa ese id y se ejecuta la instrucción
            $consult->bindParam(':id', $id);
            //para obtener la información con fetch_assoc
            $consult->execute();
            //para mostrar todos los registros recuperados de la consulta select en el formulario al dar al botón Seleccionar
            $course = $consult->fetch(PDO::FETCH_ASSOC);
            //para recuperar el nombre del curso, se almacena el valor de la consulta en la variable
            $courseName = $course['nombre_curso'];
            
        break;
    }
}

//traer los datos de la tabla cursos a través de una consuta
$query = $conectionBD->prepare("SELECT * FROM cursos");
$query->execute();
//nos retorna todos los datos y los almacena en la variable courseList
$courseList =$query->fetchAll();


?>