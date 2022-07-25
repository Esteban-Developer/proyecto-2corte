<?php
include('php/conexion_be.php');
$id 		    = $_REQUEST['id'];
$tokenUser 		= $_REQUEST['tokenUser'];
$contrasena       = $_REQUEST['contrasena'];

$updateClave    = ("UPDATE users SET contrasena ='$contrasena' WHERE id='".$id."' AND tokenUser='".$tokenUser."' ");
$queryResult    = mysqli_query($conexion,$updateClave); 

?>

<meta http-equiv="refresh" content="0;url=index.php?email=1"/>