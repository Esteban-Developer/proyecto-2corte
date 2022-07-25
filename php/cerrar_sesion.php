<?php
include'conexion_be.php';

$actual = $_REQUEST['contrasena_actual'];
$nueva = $_REQUEST['nueva_contrasena'];
$conf = $_REQUEST['conf_contrasena'];

$sqlVerificando = ("SELECT contrasena FROM users WHERE contrasena ='".$actual."'");
$QueryResul = mysqli_query($conexion,$sqlVerificando);

function validar_clave($clave,&$error_clave){
    if(strlen($clave) < 6){
       $error_clave = "La clave debe tener al menos 6 caracteres";
       return false;
    }
    if(strlen($clave) > 16){
       $error_clave = "La clave no puede tener más de 16 caracteres";
       return false;
    }
    if (!preg_match('`[a-z]`',$clave)){
       $error_clave = "La clave debe tener al menos una letra minúscula";
       return false;
    }
    if (!preg_match('`[A-Z]`',$clave)){
       $error_clave = "La clave debe tener al menos una letra mayúscula";
       return false;
    }
    if (!preg_match('`[0-9]`',$clave)){
       $error_clave = "La clave debe tener al menos un caracter numérico";
       return false;
    }
    $error_clave = "";
    return true;
 }

    $error_encontrado="";
    if($nueva != $conf){
        echo '<meta http-equiv="refresh" content="0;url=../index.php?ErrorContrasena=1">';
    } else {
        if ($row = mysqli_fetch_assoc($QueryResul)) {
            $_SESSION['contrasena']	= $row['contrasena'];
            if(strlen($nueva) < 6){
                echo '<meta http-equiv="refresh" content="0;url=../index.php?caracteres=1">';
             }elseif(strlen($nueva) > 16){
                echo '<meta http-equiv="refresh" content="0;url=../index.php?caracteresMayor=1">';
             }elseif(!preg_match('`[a-z]`',$nueva)){
                echo '<meta http-equiv="refresh" content="0;url=../index.php?letraMin=1">';
             }elseif(!preg_match('`[A-Z]`',$nueva)){
                echo '<meta http-equiv="refresh" content="0;url=../index.php?letraMay=1">';
             }elseif(!preg_match('`[0-9]`',$nueva)){
                echo '<meta http-equiv="refresh" content="0;url=../index.php?numero=1">';
             }else{
                $updateClave    = ("UPDATE users SET contrasena='$nueva' WHERE contrasena_temp='".$actual."' ");
                $queryResult    = mysqli_query($conexion,$updateClave); 
                header("location: ../crud/index1.php");
            }
        }
    }
?>