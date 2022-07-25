
 <?php
if(isset($_REQUEST['errorEmail'])){ ?>
         <div class="alert show showAlert" style="color:#fff;">
               <strong> Ops.! </strong>
               El Correo no Existe, por favor Verifique.
        </div>
<?php }

if(isset($_REQUEST['emaiIncorrecto'])){ ?>
    <div class="alert show showAlert" style="color:#fff;">
          <strong> Ops...! </strong>
          Credenciales Incorrectas, por favor verifique.
   </div>
<?php } 

if(isset($_REQUEST['email'])){ ?>
    <div class="alert show showAlert" style="color:#fff;">
          <strong> Felicitaciones! </strong>
          Su clave fue cambiada, revise su correo.
   </div>
<?php }

if(isset($_REQUEST['EmailRep'])){ ?>
    <div class="alert show showAlert" style="color:#fff;">
          <strong> Error! </strong>
          Este correo ya esta registrado, intenta con uno diferente.
   </div>
<?php }

if(isset($_REQUEST['caracteres'])){ ?>
      <div class="alert show showAlert" style="color:#fff;">
            <strong> Error! </strong>
            La clave debe tener al menos 6 caracteres.
     </div>
<?php }

if(isset($_REQUEST['caracteresMayor'])){ ?>
      <div class="alert show showAlert" style="color:#fff;">
            <strong> Error! </strong>
            La clave no puede tener más de 16 caracteres.
     </div>
<?php }

if(isset($_REQUEST['letraMin'])){ ?>
      <div class="alert show showAlert" style="color:#fff;">
            <strong> Error! </strong>
            La clave debe tener al menos una letra minúscula.
     </div>
<?php }

if(isset($_REQUEST['letraMay'])){ ?>
      <div class="alert show showAlert" style="color:#fff;">
            <strong> Error! </strong>
            La clave debe tener al menos una letra mayúscula.
     </div>
<?php }

if(isset($_REQUEST['numero'])){ ?>
      <div class="alert show showAlert" style="color:#fff;">
            <strong> Error! </strong>
            La clave debe tener al menos un caracter numérico.
     </div>
<?php }

if(isset($_REQUEST['ErrorContrasena'])){ ?>
    <div class="alert show showAlert" style="color:#fff;">
          <strong> Ops...! </strong>
            Las contraseñas no son iguales, por favor verificalas!.
   </div>
<?php } ?>