<?php include('../templates/header.php'); ?>
<!importamos el archivo que incluye la conexión>
<?php include('../sections/courses.php'); ?>


<div class="col-md-5">

<form action="" method="post">
    <div class="card bg-light">
        <div class="card-header bg-primary text-light"><strong>Cursos</strong></div>
        <div class="card-body">
            <div class="mb-3 d-none">
            <label for="" class="form-label">ID</label>
            <!--se añade value para que imprima el valor del id y del nombre_curso de la base de datos-->
            <input type="text"
                class="form-control" 
                name="id" 
                id="id" 
                value="<?php echo $id; ?>"
                aria-describedby="helpId" placeholder="ID">
            </div>
            <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text"
                class="form-control" 
                name="course_name" 
                id="course_name" 
                value="<?php echo $courseName; ?>"
                aria-describedby="helpId" placeholder="Nombre del curso">
            </div>
                       
                <button type="submit" name="action" value="add" class="btn btn-success text-light"><i class="bi bi-plus-square text-light"></i>&nbsp  Agregar</button>
                <button type="submit" name="action" value="edit" class="btn btn-warning text-light"><i class="bi bi-pencil-fill text-light"></i>&nbsp Editar</button>
                <button type="submit" name="action" value="delete" class="btn btn-danger text-light"><i class="bi bi-trash3 text-light"></i>&nbsp Borrar</button>
            
        </div>
        <div class="card-footer text-muted bg-ligth"></div>   
    </div>
</form>
    

</div &nbsp>

<div class="col-md-7">


    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="d-none">ID</th>
                <th scope="col" class="text-primary">Nombre del curso</th>
                <th scope="col" class="text-primary">Acciones</th>
            </tr>
        </thead>
        <tbody>

        <!--imprimir en la lista los cursos (de uno en uno) de la base de datos cursos, para eso traemos la variable que almacena los cursos-->
        <?php foreach($courseList as $course) {?>
            <tr>
                <td class="d-none"><?php echo $course['id']; ?></td>
                <td><?php echo $course['nombre_curso']; ?></td>
                <td>
                    <form action="" method="post">
                        <!--va a tener el valor id que le corresponde a cada uno de los registros para poder manipularlo desde el formulario de courses.--> 
                        <!--Se añade hidden para que no se vea-->
                        <input type="hidden" name="id" id="id" value="<?php echo $course['id']; ?>" />
                        <!--input para seleccionar la información-->
                        
                        <button type="submit" value="Seleccionar" name="action" class="btn btn-primary text-light"><i class="bi bi-check2-square text-light"></i>&nbsp Seleccionar</button>
                    </form>

                </td>
            </tr>
        <?php } ?>
          
        </tbody>
    </table>
    
</div>

<?php include('../templates/footer.php'); ?>