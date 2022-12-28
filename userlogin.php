<?php include("templates/header.php"); ?>

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
          <a href="#listado" class="nav-link" data-bs-toggle="tab">Listado de Postulaciones</a>
        </li>
        <li class="nav-item">
          <a href="#cv" class="nav-link" data-bs-toggle="tab">Enviar CV</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="profile">
          <form action="#">
            <fieldset>
              <div class="row justify-content-center m-2">
                <div class="col-5">
                  <div class="form-group text-start">
                    <label for="user" class="col-form-label">Usuario</label>
                    <input type="text" class="form-control" id="user" disabled>
                  </div>
                </div>
                <div class="col-5">
                  <div class="form-group text-start">
                    <label for="email" class="col-form-label">Email</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                </div>
              </div>
              <div class="row justify-content-center m-2">
                <div class="col-5">
                  <div class="form-group text-start">
                    <label for="pass" class="col-form-label">Contraseña</label>
                    <input type="password" class="form-control" id="pass">
                  </div>
                </div>
                <div class="col-5">
                  <div class="form-group text-start">
                    <label for="pass_2" class="col-form-label">Repetir Contraseña</label>
                    <input type="password" class="form-control" id="pass_2">
                  </div>
                </div>
              </div>
              <div class="row justify-content-center m-2">
                <div class="col-5">
                  <div class="form-group text-start">
                    <label for="name" class="col-form-label">Nombre</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                </div>
                <div class="col-5">
                  <div class="form-group text-start">
                    <label for="surname" class="col-form-label">Apellido</label>
                    <input type="text" class="form-control" id="surname">
                  </div>
                </div>
              </div>
              <div class="row justify-content-center m-2">
                <div class="col-5">
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
                <div class="col-5">
                  <div class="form-group text-start">
                    <label for="birth" class="col-form-label">Fecha Nacimiento</label>
                    <input type="date" class="form-control" id="birth" value = "<?php echo date('Y-m-d'); ?>">
                  </div>
                </div>
              </div>
              <div class="row justify-content-center m-2">
                <div class="col-5">
                  <div class="row justify-content-between">
                    <div class="form-group text-start col-6">
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
                    <div class="form-group text-start col-6">
                      <label for="dni" class="col-form-label">Localidad</label>
                      <input type="text" class="form-control" id="dni">
                    </div>
                  </div>
                </div>
                <div class="col-5">
                  <div class="row justify-content-between">
                    <div class="form-group text-start col-6">
                      <label for="address" class="col-form-label">Direccion</label>
                      <input type="text" class="form-control" id="address">
                    </div>
                    <div class="form-group text-start col-3">
                      <label for="floor" class="col-form-label">Piso</label>
                      <input type="text" class="form-control" id="floor">
                    </div>
                    <div class="form-group text-start col-3">
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
          <h4 class="mt-2">Profile tab content</h4>
          <p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
        </div>
        <div class="tab-pane fade" id="listado">
          <h4 class="mt-2">listado tab content</h4>
          <p>Donec vel placerat quam, ut euismod risus. Sed a mi suscipit, elementum sem a, hendrerit velit. Donec at erat magna. Sed dignissim orci nec eleifend egestas. Donec eget mi consequat massa vestibulum laoreet. Mauris et ultrices nulla, malesuada volutpat ante. Fusce ut orci lorem. Donec molestie libero in tempus imperdiet. Cum sociis natoque penatibus et magnis.</p>
        </div>
        <div class="tab-pane fade" id="cv">
          <form class=" border bg-light" action="#">
            <fieldset>
              <div class="row justify-content-center m-2">
                <div class="col-6">
                  <div class="form-group text-start">
                    
                    <label for="cv" class="col-form-label">Cargar CV</label>
                    <input type="file" class="form-control" id="cv">
                  </div>
                </div>
                <div class="col-4 align-items-end d-flex">
                  <div class="form-group text-start">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
                </div>
                
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include("templates/footer.php"); ?>
