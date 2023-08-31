## APP_DB

- Este proyecto se ha enfocado a crear una APP de formación para administrar a los alumnos y su evolución, mediante la utilización de CRUDS.
- Permite crear certificados en PDF de cada curso realizado de manera personalizada.

## Lenguaje y Herramientas:

- Xampp:
    - PHP
    - MySQL
- Fpdf
- TomSelect

## Distribución y Funcionalidades:

- Está dividido en: 
    - Formulario de registro: 
        - Permite registrarse.
        - Impide acceder a la aplicación sin registrarse.
        - Se implementa el uso de inicio de sesión. 
    - Página intermedia de acceso a la vista alumnos.
    - Vista alumnos:
        - Formulario de alumnos, permite:
            -Agregar, modificar y borrar datos.
        - Lista de cursos realizados por cada alumno:
            - Botón "seleccionar" para llevar el alumno seleccionado al formulario.
            - Cursos en forma de enlace para obtener certificado correspondiente en pdf.
    - Vista cursos:  
        - Formulario de cursos:
            - Agregar, modificar y borrar datos.
        - Lista de cursos:
            - Botón "seleccionar" para llevar el curso seleccionado al formulario.
    - Cierre de sesión

- Cabe destacar el uso de templates para evitar la repetición de código html.

## Base De Datos

- Se incluye el archivo con la base de datos para poder recrearla de manera exacta.

## Librerías

- FPDF, se ha usado para la creación de los pdf personalizados.
- TomSelect, se ha usado para crear el imput select del formulario de la vista estudiantes.
