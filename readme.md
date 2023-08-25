## APP_DB

- Este proyecto se ha realizado siguiendo un tutorial de Develoteca enfocado a crear una APP de formación
- Permite crear certificados en PDF de cada curso realizado, de manera personalizada
- La dirección del tutorial es: 
    - https://www.youtube.com/watch?v=H7tuBwZyBOg&list=PLpzh_jLMuqxkr9vfq66q44xV5D6l9x6Oa&index=36&t=10413s
- Se han realizado pequeñas modificaciones en el diseño de la APP para darle un toque personal

## Lenguaje y Herramientas

- Xampp:
    - PHP
    - MySQL
- Fpdf
- TomSelect

## Distribución y Funcionalidades

- Está dividido en: 
    - Formulario de registro: 
        - Permite registrarse
        - Impide acceder a la aplicación sin registrarse
        - Se implementa el uso de inicio de sesión   
    - Página intermedia de acceso a la vista alumnos
    - Vista alumnos:
        - Formulario de alumnos, permite:
            -Agregar, modificar y borrar datos
        - Lista de cursos realizados por cada alumno:
            - Botón "seleccionar" para llevar al alumno al formulario
            - Cursos en forma de enlace para obtener certificado correspondiente en pdf 
    - Vista cursos:  
        - Formulario de cursos:
            - Agregar, modificar y borrar datos
        - Lista de cursos:
            - Botón "seleccionar" para llevar al curso al formulario
    - Cierre de sesión

- Cabe destacar el uso de templates para evitar la repetición de código html

## Base De Datos

- Se incluye el archivo con la base de datos para poder recrearla de manera exacta

## Librerías

- FPDF, se ha usado para la creación de los pdf personalizados
- TomSelect, se ha usado para crear el imput select del formulario de la vista estudiantes