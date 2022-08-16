<div class="tengah">
  <div class="col-sm-5">
    <div class="box box-danger box-solid">
      <div class="box-header">
        <h4 class="box-title"><i class="fa fa-lock"></i> Por favor Iniciar sesión</h4>
      </div>
      <div class="box-body">
        <h5 class="text-center text-muted">Usar nombre de usuario y contraseña para iniciar sesión</h5>
        <form action="<?= base_url('Auth/actlogin') ?>" method="POST">
          <div class="form-group">
            <label for="Username">Username :</label>
            <input type="text" name="username" class="form-control" placeholder="Insertar Username">
          </div>
          <div class="form-group">
            <label for="Password">Password :</label>
            <input type="password" name="password" class="form-control" placeholder="Insertar Password">
          </div>
          <button class="btn btn-danger btn-flat btn-block"><i class="fa fa-sign-in"></i> Login</button>
        </form>
      </div>
    </div>
  </div>
</div>