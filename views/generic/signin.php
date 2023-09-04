





<!-- Modal -->
<div class="modal fade" id="signinModal" tabindex="-1" aria-labelledby="signinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="signinModalLabel">Iniciar Sesión</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="../controllers/c_users.php">
                
                    <div class="modal-body">
                        <div class="form-group my-3">
                          <input type="text" class="form-control" placeholder="Usuario" name="user_id" aria-label="Usuario" minlength=4 maxlength=16 required>
                        </div>
                        <div class="form-group my-3">
                            <input type="password" class="form-control" placeholder="Contraseña" name="password" aria-label="Contraseña" minlength=8 maxlength=12 required>
                        </div>
                        <div class="form-group my-2 text-end">
                            <a class= "text-align-end" href="signup.php"><small>Registrarse</small></a>
                            <a class= "text-align-end" href="index.php"><small>Recuperar contraseña</small></a>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button title="Cerrar pantalla" alt type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button title="Ingresar usuario" type="submit" class="btn btn-primary" name="signin" value="ok">Ingresar</button>
                    </div>
                
            </form>
        </div>
    </div>
</div>