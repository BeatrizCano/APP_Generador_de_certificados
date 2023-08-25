<?php
//nos va a enviar al login y cerrar sesión "destruyendo" la sesión.(se abre la sesión, se destruye y nos redirecciona)
session_start();
session_destroy();
header('Location: ../index.php');
?>