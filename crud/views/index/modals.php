<div id="addUser" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar nuevo usuario</h4>
      </div>
      <div class="modal-body">
        <form name="formUser" onsubmit="register(); return false">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="name" type="text" class="form-control" name="name" placeholder="Nombres" required autocomplete="off">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="last_name" type="text" class="form-control" name="last_name" placeholder="Apellidos" required autocomplete="off">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input id="email" type="email" class="form-control" name="email" placeholder="Correo electrónico" required autocomplete="off">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required autocomplete="off">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Registrar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div id="updateUser" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Actualizar información de usuario</h4>        
      </div>
      <div class="modal-body">
        <form name="formUserUpdate" onsubmit="update(); return false">
          <input type="text" name="id" id="id" style="display: none;">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="name" type="text" class="form-control" name="name" placeholder="Nombres" required autocomplete="off">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="last_name" type="text" class="form-control" name="last_name" placeholder="Apellidos" required autocomplete="off">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input id="email" type="email" class="form-control" name="email" placeholder="Correo electrónico" required autocomplete="off">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
        </form>
      </div>
    </div>
  </div>
</div>
