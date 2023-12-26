<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 contenedor-login">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Lista de espera</h3>
                            </div>
                            <div class="card-body">
                                <form autocomplete="off" id="formulario-inicio-sesion">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="correo" type="text" placeholder="correo" />
                                        <label for="correo">Correo</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="clave" type="password" placeholder="Contraseña" />
                                        <label for="clave">Contraseña</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <div class="small">
                                            <button type="button" class="btn btn-link" id="recuperar-clave">
                                                ¿Olvidaste tu contraseña?
                                            </button>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Ingresar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small">
                                    <button type="button" class="btn btn-link" id="registrar-usuario">
                                        ¿Quieres una cuenta? Registrate aquí
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-dark mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Lista de espera <?= date('Y') ?></div>
                </div>
            </div>
        </footer>
    </div>
</div>