<?php include('../templates/header.php'); ?>
<?php include('../sections/alumns.php'); ?>

<div class="col-md-5">
    <form action="" method="post">

      <div class="card bg-light">
        <div class="card-header bg-primary text-light">
            <strong>Alumnos</strong>
        </div>
        <div class="card-body">
           <!--se añade d-none para que no se muestre el input, también se podría usar hidden-->
            <div class="mb-3 d-none">
              <label for="id" class="form-label">ID</label>
              <input type="text"
                class="form-control" 
                name="id" 
                value="<?php echo $id; ?>"
                id="id" 
                aria-describedby="helpId" 
                placeholder="ID">
            </div>

            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text"
                class="form-control" 
                name="name" 
                value="<?php echo $name; ?>"
                id="name" 
                aria-describedby="helpId" 
                placeholder="Escriba el nombre">              
            </div>

            <div class="mb-3">
              <label for="lastName" class="form-label">Apellidos</label>
              <input type="text"
                class="form-control" 
                name="lastName" 
                value="<?php echo  $lastName; ?>"
                id="lastName" 
                aria-describedby="helpId" 
                placeholder="Escriba los apellidos">             
            </div>

            <!--se pone "multiple para que permita más opciones"-->
            <div class="mb-3">
                <label for="" class="form-label">Cursos del alumn@:</label> 
                
                <select multiple class="form-control" name="courses[]" id="coursesList">

                    <?php foreach($courses as $course) { ?>
                        <!--cada curso tiene un id relacionado con la BD, le damos los valores a través del value-->
                        <!--si el valor no está vacío, buscamos el id que pertenece al curso y si existe el array "fixCourses entonces imprimimos
                        en el formulario el curso o cursos"-->
                        <option
                         <?php 
                            if(!empty( $fixCourses)):
                                if(in_array($course['id'], $fixCourses)):
                                    echo 'selected';
                                endif;
                            endif;    
                         ?>
                         value="<?php echo $course['id']; ?>">
                         <?php echo $course['id']; ?> - <?php echo $course['nombre_curso']; ?>
                        </option>
                    <?php } ?>
                    
                </select>

            </div>         
            
                <button type="submit" name="action" value="add" class="btn btn-success text-light"><i class="bi bi-plus-square text-light"></i>&nbsp Agregar</button>
                <button type="submit" name="action" value="edit" class="btn btn-warning text-light"><i class="bi bi-pencil-fill text-light"></i>&nbsp Editar</button>
                <button type="submit" name="action" value="delete" class="btn btn-danger text-light"><i class="bi bi-trash3 text-light"></i>&nbsp Borrar</button>
          
        
        </div>
        <div class="card-footer text-muted bg-ligth"></div>   
        
      </div>  

    </form>
</div>

<div class="col-md-7">

        <table class="table">
            <thead>
                <tr>
                    <th class="d-none">ID</th>
                    <th class=" text-primary">Nombre</th>
                    <th class=" text-primary">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <!--se muestran los datos de manera dinámica de la tabla con un foreach-->
            <?php foreach($students as $student): ?>
                <tr>
                    <td class="d-none"><?php echo $student['id']; ?></td>

                    <td>
                        <?php echo $student['nombre']; ?> <?php echo $student['apellidos']; ?>
                        </br>
                        <?php foreach($student["cursos"] as $course){ ?>
                                <!--nos muestra el curso en forma de enlace, con un br para separar los cursos en lineas diferentes. Además le 
                            pasamos href del archivo certificate y los id del curso y del alumno y nos sirve para recuperar los datos-->
                                <a href="certificate.php?id_curso=<?php echo $course['id']; ?>& id_alumno=<?php echo $student['id'];?>"> 
                                <i class="bi bi-filetype-pdf text-danger"></i><?php echo $course['nombre_curso']; ?>
                                </a></br>                              

                        <?php } ?>
                    
                    </td>

                    <td>
                        <!--crear el input para traer el id del alumno y crear el botón seleccionar-->    
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $student['id'];?>">
                            <button type="submit" value="Seleccionar" name="action" class="btn btn-primary text-light"><i class="bi bi-check2-square text-light"></i>&nbsp Seleccionar</button>
                        </form>        

                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
        
</div>

<?php include('../templates/footer.php'); ?>

