<div class="shadow p-4 mb-2 bg-SUCCESS d-flex justify-content-center">
  <h1 class="text-white text-decoration-underline">ROL</h1>
</div>

<?php include_once "header.php"; ?>
<!-- Inicio del body -->
<form id="roles.frm">
  <div class="my-3 row d-flex justify-content-center">
    <label for="inputPassword" class="col-2 col-form-label align-self-center">Asignación Rol:</label>
    <div class="col-6">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="txtRol" placeholder="Administrador">
        <label for="txtRol">Nombre Rol</label>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-5">
        <div class="d-grid grap-2">
          <a class="btn btn-outline-success" onclick="create()">Crear <i
              class="fas fa-sharp fa-light fa-circle-plus"></i></a>
        </div>
      </div>
    </div>
    <div class="row mt-5 justify-content-center">
      <h2 class="text-center bg-success text-white bg-bold w-100">Datos De Roles</h2>
      <div class="col-8 my-3">
        <table class="table bg-dark text-white text-center table-bordered table-dark table-striped" id="rolesT">
          <thead class="table text-white">
            <tr>
              <th scope="col" class="w-bold text-center">#</th>
              <th scope="col" class="w-bold text-center">NOMBRE</th>
              <th scope="col" class="w-bold text-center">ESTADO</th>
              <th scope="col" class="w-bold text-center">FECHA CREACIÓN</th>
              <th scope="col" class="w-bold text-center">OPCIONES</th>
            </tr>
          </thead>
          <tbody id="tableRol">
          </tbody>
        </table>
      </div>
    </div>
    <div>
      <!-- Modal -->
      <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5 text-center" id="updateModalLabel">Modificar Rol</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="">
                <label for="" class="">Modificación Rol</label><br>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="txtRolM" name="txtRolM" placeholder="Digite el rol">
                  <label for="txtRolM">Nombre del Rol</label>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal" onclick="Update()">Editar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal Eliminar-->
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5 text-center" id="deleteModalLabel">Eliminar Rol</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                  <h3 id="mensajeEliminar"></h3>
                  <!-- <form action="">
                    <label for="" class="">Eliminar Rol</label><br>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="txtRolMEliminar" name="txtRolMEliminar" placeholder="Digite el rol" disabled>
                      <label for="txtRolMEliminar">Nombre del Rol</label>
                    </div>
                  </form> -->
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" onclick="Delete()">Eliminar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- Termina el body -->
<?php include_once "footer.php"; ?>
<!-- incluimos el archivo roles.js -->
<script src="assets/js/roles.js"></script>