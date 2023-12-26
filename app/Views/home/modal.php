<!-- Modal recuperar clave -->
<div class="modal fade" id="modal-recuperar-clave" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-recuperar-clave-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-recuperar-clave-label">Recuperar contraseña</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form autocomplete="off" id="formulario-recuperar-clave">
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input class="form-control" id="correo-recuperacion" type="text" placeholder="correo" />
            <label for="correo">Ingrese su correo de recuperación</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Enviar correo</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal registrar usuario -->
<div class="modal fade" id="modal-registrar-usuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-registrar-usuario-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-registrar-usuario-label">Registro de usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form autocomplete="off" id="formulario-registrar-usuario">
        <div class="modal-body">
          <div class="form-floating mb-3">
            <select class="form-select" id="tipo-usuario-registrar">
              <option value="">Tipo de usuario</option>
              <option value="2">Colegio</option>
              <option value="3">Apoderado</option>
            </select>
            <label for="tipo-usuario-registrar">Seleccione el tipo de usuario</label>
          </div>
          <div class="form-floating mb-3">
            <input class="form-control" id="nombre-registrar" type="text" placeholder="nombre" />
            <label for="nombre-registrar">Nombre del usuario</label>
          </div>
          <div class="form-floating mb-3">
            <input class="form-control" id="rut-registrar" type="text" placeholder="rut" />
            <label for="rut-registrar">Rut del usuario</label>
          </div>
          <div class="form-floating mb-3">
            <input class="form-control" id="telefono-registrar" type="text" placeholder="telefono" />
            <label for="telefono-registrar">Telefono del usuario</label>
          </div>
          <div class="form-floating mb-3">
            <input class="form-control" id="correo-registrar" type="text" placeholder="correo" />
            <label for="correo-registrar">Correo del usuario</label>
          </div>
          <div class="form-floating mb-3">
            <input class="form-control" id="clave-registrar" type="text" placeholder="clave" />
            <label for="clave-registrar">Clave del usuario</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
      </form>
    </div>
  </div>
</div>