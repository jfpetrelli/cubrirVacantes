<?php require_once("generic/header.php");  ?>

<div class="container">
  <div class="row my-3 justify-content-center text-center">
    <div class="col-12 border bg-light m-2">
      <ul class="nav nav-tabs my-2" id="myTab">
        <li class="nav-item">
          <a href="#profile" class="nav-link active" data-bs-toggle="tab">Perfil</a>
        </li>
        <li class="nav-item">
          <a href="#postulaciones" class="nav-link" data-bs-toggle="tab">Mis Postulaciones</a>
        </li>
        <li class="nav-item">
          <a href="#cv" class="nav-link" data-bs-toggle="tab">Vacantes</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="profile">
          <form action="#">
            <fieldset>
              <div class="row justify-content-center m-2">
                <div class="col-6">
                  <div class="form-group text-start">
                    <label for="user" class="col-form-label">Usuario</label>
                    <input type="text" class="form-control" id="user" disabled>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group text-start">
                    <label for="email" class="col-form-label">Email</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                </div>
              </div>
              <div class="row justify-content-center m-2">
                <div class="col-6">
                  <div class="form-group text-start">
                    <label for="pass" class="col-form-label">Contraseña</label>
                    <input type="password" class="form-control" id="pass">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group text-start">
                    <label for="pass_2" class="col-form-label">Repetir Contraseña</label>
                    <input type="password" class="form-control" id="pass_2">
                  </div>
                </div>
              </div>
              <div class="row justify-content-center m-2">
                <div class="col-6">
                  <div class="form-group text-start">
                    <label for="name" class="col-form-label">Nombre</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group text-start">
                    <label for="surname" class="col-form-label">Apellido</label>
                    <input type="text" class="form-control" id="surname">
                  </div>
                </div>
              </div>
              <div class="row justify-content-center m-2">
                <div class="col-6">
                  <div class="row justify-content-between">
                    <div class="form-group text-start col-5">
                      <label for="tipo" class="col-form-label">Tipo</label>
                      <select class="form-select" id="tipo">
                        <option default>DNI</option>
                        <option>Lib. Civica</option>
                        <option>Lib. Enrolamiento</option>
                      </select>
                    </div>
                    <div class="form-group text-start col-7">
                      <label for="dni" class="col-form-label">Numero</label>
                      <input type="text" class="form-control" id="dni">
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group text-start">
                    <label for="birth" class="col-form-label">Fecha Nacimiento</label>
                    <input type="date" class="form-control" id="birth" value = "<?php echo date('Y-m-d'); ?>">
                  </div>
                </div>
              </div>
              <div class="row justify-content-center m-2">
                <div class="col-6">
                  <div class="row justify-content-between">
                    <div class="form-group text-start col-5">
                      <label for="tipo" class="col-form-label">Provincia</label>
                      <select class="form-select" id="tipo">
                        <option>Buenos Aires</option>
                        <option>Capital Federal</option>
                        <option>Catamarca</option>
                        <option>Chaco</option>
                        <option>Chubut</option>
                        <option>Cordoba</option>
                        <option>Corrientes</option>
                        <option>Entre Rios</option>
                        <option>Formosa</option>
                        <option>Jujuy</option>
                        <option>La Pampa</option>
                        <option>La Rioja</option>
                        <option>Mendoza</option>
                        <option>Misiones</option>
                        <option>Neuquen</option>
                        <option>Rio Negro</option>
                        <option>Salta</option>
                        <option>San Juan</option>
                        <option>San Luis</option>
                        <option>Santa Cruz</option>
                        <option>Santa Fe</option>
                        <option>Santiago del Estero</option>
                        <option>Tierra del Fuego</option>
                        <option>Tucuman</option>
                      </select>
                    </div>
                    <div class="form-group text-start col-7">
                      <label for="dni" class="col-form-label">Localidad</label>
                      <input type="text" class="form-control" id="dni">
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="row justify-content-between">
                    <div class="form-group text-start col-8">
                      <label for="address" class="col-form-label">Direccion</label>
                      <input type="text" class="form-control" id="address">
                    </div>
                    <div class="form-group text-start col-2">
                      <label for="floor" class="col-form-label">Piso</label>
                      <input type="text" class="form-control" id="floor">
                    </div>
                    <div class="form-group text-start col-2">
                      <label for="appart" class="col-form-label">Dpto.</label>
                      <input type="text" class="form-control" id="appart">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row justify-content-end m-3">
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
        <div class="tab-pane fade" id="postulaciones">
          <table class="table">
            <thead>
              <tr class="table-primary">
                <th scope="col">Fecha Inscripcion</th>
                <th scope="col">Fecha Cierre </th>
                <th scope="col">Vacante</th>
              </tr>
            </thead>
            <tbody>
              <tr class="table-secondary">
                <th scope="row">01/01/2023</th>
                <td>31/01/2023</td>
                <td>Titular Administración de Recursos</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="tab-pane fade" id="cv">
          <form class=" border bg-light" action="#">
            <fieldset>
              <div class="row justify-content-center m-2">
                <div class="col-6">
                  <div class="form-group text-start"> 
                    <label for="postulaciones" class="col-form-label">Vacantes</label>
                    <select class="form-select" id="postulaciones">
                      <option>Titular Matematica Superior</option>
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group text-start"> 
                    <label for="cv" class="col-form-label">Cargar CV</label>
                    <input type="file" class="form-control" id="cv">
                  </div>
                </div>
              </div>
              <div class="row justify-content-end m-3">
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Postularme</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once("generic/footer.php");  ?>
