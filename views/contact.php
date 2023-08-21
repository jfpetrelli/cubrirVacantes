<?php require_once("generic/header.php");

//No programar

?>



<div class="container">
    <div class="row my-3 text-center">
        <h1>Contacto</h1>
        <div class="row justify-content-center">
            <div class="col-8 border bg-light m-2">
                <form>
                      <div class="form-group my-3">
                        <input type="text" title="Nombre" class="form-control" aria-label="Nombre" placeholder="Nombre">
                      </div>
                      <div class="form-group my-3">
                        <input type="email" title="Correo" aria-label="Correo" class="form-control" placeholder="Correo">
                      </div>
                      <div class="form-group my-3">
                        <textarea class="form-control" id="exampleTextarea" aria-label="Mensaje" rows="4" placeholder="Mensaje"></textarea>
                      </div>
                      <button title="Enviar" type="submit" class="btn btn-primary my-2 text-end">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once("generic/footer.php");   ?>
