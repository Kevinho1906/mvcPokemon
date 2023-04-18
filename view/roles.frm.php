<?php include_once "header.php"; ?>

<div class="row">
    <h2 class="text-center bg-dark text-white bg-bold">Roles</h2>
</div>
<div class="mb-3 row d-flex justify-content-center">
    <label for="inputPassword" class="col-sm-2 col-form-label align-self-center">Asignación Rol:</label>
    <div class="col-sm-6">
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Nombre Rol</label>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-8">
        <div class="d-grid grap-2">
            <a class="btn btn-success">Crear</a>
        </div>
    </div>
</div>
<div class="row mt-5 justify-content-center">
    <h2 class="text-center bg-dark text-white bg-bold">Datos Roles</h2>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</div>
<?php include_once "footer.php"; ?>
<!-- incluimos el archivo roles.js -->
<script src="../js/roles.js"></script>