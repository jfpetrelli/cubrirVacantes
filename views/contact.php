<?php require_once("generic/header.php");

//No programar

?>



<div class="container">
    <div class="row my-3 text-center">
        <h1>Contacto</h1>
        <div class="row justify-content-center">
            <div class="col-8 border bg-light m-2">
                <form>
                    <fieldset>
                      <div class="form-group my-3">
                        <input type="text" class="form-control" placeholder="Nombre">
                      </div>
                      <div class="form-group my-3">
                        <input type="email" class="form-control" placeholder="Correo">
                      </div>
                      <div class="form-group my-3">
                        <textarea class="form-control" id="exampleTextarea" rows="4" placeholder="Mensaje"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary my-2 text-end">Enviar</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once("generic/footer.php");   ?>
