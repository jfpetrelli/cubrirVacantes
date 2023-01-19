<?php require_once("generic/header.php"); 


?>

<div class="container">
  <div class="row my-3 text-center">
    <h1>Registrarse</h1>
    <form class=" border bg-light" method="POST" action="../controllers/c_users.php">
      <fieldset>
      <div class="row justify-content-center m-2">
          <div class="col-6">
            <div class="form-group text-start">
              <label for="user_id" class="col-form-label">Usuario</label>
              <input type="text" class="form-control" id="user_id" name="user_id" required>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group text-start">
              <label for="email" class="col-form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
          </div>
        </div>
        <div class="row justify-content-center m-2">
          <div class="col-6">
            <div class="form-group text-start">
              <label for="password" class="col-form-label">Contraseña</label>
              <input type="password" class="form-control" id="pass" name="password" required minlength=8>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group text-start">
              <label for="password2" class="col-form-label">Repetir Contraseña</label>
              <input type="password" class="form-control" id="password2" name="password2" required minlength=8>
            </div>
          </div>
        </div>
        <div class="row justify-content-center m-2">
          <div class="col-6">
            <div class="form-group text-start">
              <label for="name" class="col-form-label">Nombre</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group text-start">
              <label for="surname" class="col-form-label">Apellido</label>
              <input type="text" class="form-control" id="surname" name="surname" required>
            </div>
          </div>
        </div>
        <div class="row justify-content-center m-2">
          <div class="col-6">
            <div class="row justify-content-between">
              <div class="form-group text-start col-5">
                <label for="tipo" class="col-form-label">Tipo</label>
                <select class="form-select" id="tipo" name="document_type" required>
                  <option default value="DNI">DNI</option>
                  <option value="Libreta Civica">Lib. Civica</option>
                  <option value="Libreta Enrolamiento">Lib. Enrolamiento</option>
                </select>
              </div>
              <div class="form-group text-start col-7">
                <label for="dni" class="col-form-label">Numero</label>
                <input type="text" class="form-control" id="dni" name="document_number" required>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group text-start">
              <label for="birth" class="col-form-label">Fecha Nacimiento</label>
              <input type="date" class="form-control" id="birth" value = "<?php echo date('Y-m-d'); ?>" name="date_of_birth" required>
            </div>
          </div>
        </div>
        <div class="row justify-content-center m-2">
          <div class="col-6">
            <div class="row justify-content-between">
              <div class="form-group text-start col-6">
                <label for="tipo" class="col-form-label">Provincia</label>
                <select class="form-select" id="tipo" name="state" required>
                  <option value = "Buenos Aires">Buenos Aires</option>
                  <option value = "Capital Federal">Capital Federal</option>
                  <option value = "Catamarca">Catamarca</option>
                  <option value = "Chaco">Chaco</option>
                  <option value = "Chubut">Chubut</option>
                  <option value = "Cordoba">Cordoba</option>
                  <option value = "Corrientes">Corrientes</option>
                  <option value = "Entre Rios">Entre Rios</option>
                  <option value = "Formosa">Formosa</option>
                  <option value = "Jujuy">Jujuy</option>
                  <option value = "La Pampa">La Pampa</option>
                  <option value = "La Rioja">La Rioja</option>
                  <option value = "Mendoza">Mendoza</option>
                  <option value = "Misiones">Misiones</option>
                  <option value = "Neuquen">Neuquen</option>
                  <option value = "Rio Negro">Rio Negro</option>
                  <option value = "Salta">Salta</option>
                  <option value = "San Juan">San Juan</option>
                  <option value = "San Luis">San Luis</option>
                  <option value = "Santa Cruz">Santa Cruz</option>
                  <option value = "Santa Fe">Santa Fe</option>
                  <option value = "Santiago del Estero">Santiago del Estero</option>
                  <option value = "Tierra del Fuego">Tierra del Fuego</option>
                  <option value = "Tucuman">Tucuman</option>
                </select>
              </div>
              <div class="form-group text-start col-6">
                <label for="dni" class="col-form-label">Localidad</label>
                <input type="text" class="form-control" id="dni" name="city" required>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="row justify-content-between">
              <div class="form-group text-start col-6">
                <label for="address" class="col-form-label">Direccion</label>
                <input type="text" class="form-control" id="address" name="address" required>
              </div>
              <div class="form-group text-start col-3">
                <label for="floor" class="col-form-label">Piso</label>
                <input type="text" class="form-control" id="floor" name="floor">
              </div>
              <div class="form-group text-start col-3">
                <label for="appart" class="col-form-label">Dpto.</label>
                <input type="text" class="form-control" id="appart" name="appart">
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center m-3">
          <div class="col-12">
            <button type="submit" class="btn btn-primary" name="register" value = "ok">Registrarse</button>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</div>

<?php require_once("generic/footer.php");  ?>
