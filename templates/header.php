<?php 
//Limitar el acceso a la app a través del login, bloqueando otras maneras de acceder, como copiando el enlace de alumnos y pegándolo en el navegador, 
//mediante una validación
session_start();
//si hay contenido en el inicio de sesión, redirigir a index.php
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
}

?>


<!doctype html>
<html lang="en">

<head>
  <title>APP_DB</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!--boostrap 5 icons coger el enlace cdn de la opción "icons"-> "install" de la página "boostrap icons". 
Si coges el enlace de doc, no es el de iconos y no salen-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>
<nav class="navbar navbar-expand navbar-light bg-light">
                <div class="nav navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Inicio</a>
                    <a class="nav-item nav-link" href="view_alumns.php">Alumnos</a>
                    <a class="nav-item nav-link" href="view_courses.php">Cursos</a>
                    <a class="nav-item nav-link" href="close.php">Cerrar sesión</a>
                </div>
            </nav>
    <div class="container">
        <br/>
        <div class="row">
            <div class="col-12">
                <br/>
                <div class="row">