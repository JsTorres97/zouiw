<?php
// Crear una conexión
$con = mysqli_connect("localhost","rootzoui","root2018","zoui");
// Check connection
if (mysqli_connect_errno()) {
  echo "Error al establecer la conexión a la base de datos " . mysqli_connect_error();
}
?>