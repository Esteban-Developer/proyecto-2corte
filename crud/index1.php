<script>
window.onload = function(){killerSession();}
function killerSession(){
setTimeout("window.open('../php/desconectar.php','_top');",60000);
}
</script>
<?php
require_once 'core/core.php';

$c = isset($_GET['c']) ? $_GET['c'] : 'administrator';
$m = isset($_GET['m']) ? $_GET['m'] : 'index';
$c .= 'Controller';

if(file_exists('controllers/' . $c . '.php')){
    require_once 'controllers/' . $c . '.php';
    if(method_exists($c, $m)){
        $c = new $c;
        call_user_func([$c,$m]);
    }else{
        die("Error : El metodo o funcion [{$m}()] no existe");
    }    
}else{
    die("Error : El controlador [{$c}] no existe.");
}
?>


