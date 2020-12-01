<?php
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES')
  {?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productores</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../src/css/styles2.css" rel="stylesheet" />
    <!--Sweet Alert 2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--Local-->
    <script  src="../src/js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="../src/css/bootstrap.css">
    <link rel="stylesheet" href="../src/css/all.css">

    <script  src="../src/js/bootstrap.js"></script>

</head>

<body>
  <?php
  require("header.php");
  ?>
  <br>
  <div id="appProductores">
    <section class="page-section">
    <div class="container">
        <?php $ID = $_SESSION['ID'];?>
      <input type="hidden" id="idcli" value="<?php  echo $ID; ?>">
      <div class="row">
        <div class="col">
          <!--<button  class="btn btn-success" data-toggle="modal" data-target="#nuevo-productor" title="Nuevo"><i class="fas fa-plus-circle fa-2x"></i></button>-->
        </div>
      </div>
      <div v-bind:class="alertgeneral" role="alert">
      {{messagealert}}
      </div>
      <div class="row mt-5">
        <div class="col-lg-12">
          <table class="table table-dark">
            <thead>
              <tr class="bg-success text-light">
              <th>ID</th>
              <th>Usuario</th>
              <th>Nombre</th>
              <th>Ap</th>
              <th>Am</th>
              <th>Domicilio</th>
              <th>Correo</th>
              <th>Telefono</th>
              <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="productores in produc">
                <td>{{productores.Id}}</td>
                <td>{{productores.user}}</td>
                <td>{{productores.nombre}}</td>
                <td>{{productores.ap}}</td>
                <td>{{productores.am}}</td>
                <td>{{productores.domicilio}}</td>
                <td>{{productores.correo}}</td>
                <td>{{productores.tele}}</td>
                <td>
                  <div class="btn-group" role="group">
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#editar-productor" @click="pasarDatosEditar(productores)" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#eliminar-productor" @click="pasarDatosEliminar(productores)" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                  </div>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
      <!-- Modal Nuevo -->
      <div id="nuevoproductor">
        <div class="modal fade" id="nuevo-productor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Productor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body text-center">
                <form action="" id="form-insert" enctype="multipart/form-data">
                <div class="form-row alig-items-start">
                  <div class="col">
                    <div class="form-group col-md-8 m-auto">
                      <label for="inlineFormInput">Usuario:</label>
                      <input type="text" class="form-control" id="user-insert" placeholder="Usuario" maxlength="40">
                      <label  for="inlineFormInput">Password:</label>
                      <input type="text" class="form-control" id="password-insert" placeholder="Usuario" maxlength="40">
                      <label  for="inlineFormInput">Nombre:</label>
                      <input type="text" class="form-control"  id="nombre-insert" name="nombre-insert" placeholder="Nombre" maxlength="40">
                      <label  for="inlineFormInputGroup">Apellido paterno:</label>
                      <input type="text" class="form-control " id="apepaterno-insert" name="apepaterno-insert" placeholder="Apellido paterno" maxlength="50">
                      <label  for="inlineFormInputGroup">Apellido materno:</label>
                      <input type="text" class="form-control  " id="apematerno-insert" name="apematerno-insert"  placeholder="Apellido materno" maxlength="100">
                    </div>
                    <div class="col">
                      <div class="form-group col-md-8  m-auto">
                      <label  for="inlineFormInput">Domicilio:</label>
                      <input type="text" class="form-control" id="domicilio-insert" name="domicilio-inser" placeholder="Domicilio" maxlength="40">
                      <label for="inlineFormInput">Telefono:</label>
                      <input type="text" class="form-control" id="telefono-insert" name="telefono-insert" placeholder="Telefono" maxlength="12">

                      <label for="inlineFormInputGroup">Correo</label>
                      <input type="text" class="form-control" id="correo-insert" name="correo-insert" placeholder="Correo" maxlength="50">
                      </div>
                    </div>

                  </div>

                </div>
                <br>
                </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" @click="nuevoUsuario()">Guardar</button>
              </div>

            </div>

          </div>

        </div>
      </div>
      <!--Modal Editar-->
      <div id="editarProductor">
      <div class="modal fade" id="editar-productor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Editar productor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body text-center">
                <form action="" id="form-insert" enctype="multipart/form-data">
                <div class="form-row alig-items-start">
                  <div class="col">
                    <div class="form-group col-md-8 m-auto">
                      <label for="inlineFormInput">Usuario:</label>
                      <input type="text" class="form-control" id="user-update" placeholder="Usuario" maxlength="40">
                      <label  for="inlineFormInput">Password:</label>
                      <input type="text" class="form-control" id="password-update" placeholder="Usuario" maxlength="40">
                      <label  for="inlineFormInput">Nombre:</label>
                      <input type="text" class="form-control"  id="nombre-update" name="nombre-insert" placeholder="Nombre" maxlength="40">
                      <label  for="inlineFormInputGroup">Apellido paterno:</label>
                      <input type="text" class="form-control " id="apepaterno-update" name="apepaterno-insert" placeholder="Apellido paterno" maxlength="50">
                      <label  for="inlineFormInputGroup">Apellido materno:</label>
                      <input type="text" class="form-control  " id="apematerno-update" name="apematerno-insert"  placeholder="Apellido materno" maxlength="100">
                    </div>
                    <div class="col">
                      <div class="form-group col-md-8  m-auto">
                      <label  for="inlineFormInput">Domicilio:</label>
                      <input type="text" class="form-control" id="domicilio-update" name="domicilio-inser" placeholder="Domicilio" maxlength="40">
                      <label for="inlineFormInput">Telefono:</label>
                      <input type="text" class="form-control" id="telefono-update" name="telefono-insert" placeholder="Telefono" maxlength="12">

                      <label for="inlineFormInputGroup">Correo</label>
                      <input type="text" class="form-control" id="correo-update" name="correo-insert" placeholder="Correo" maxlength="50">
                      <input type="text" style="display: none;" id="codigo-update">
                      </div>
                    </div>

                  </div>

                </div>
                <br>
                </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" @click="editarClientes()">Actualizar</button>
              </div>

            </div>

          </div>

        </div>
      </div>
      <!--Eliminar-->
      <div id="eliminarProductor">
      <div class="modal fade" id="eliminar-productor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Productor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body text-center">
              <h5 class="text-center">¿Eliminar Cliente?</h5>
                <div class="form-row alig-items-start">
                  <div class="col">
                    <div class="form-group col-md-8 m-auto">
                      <label for="inlineFormInput">Usuario:</label>
                      <input type="text" class="form-control" id="user-delete" disabled>
                      <label  for="inlineFormInput">Nombre:</label>
                      <input type="text" class="form-control"  id="nombre-delete" disabled>
                      <label  for="inlineFormInputGroup">Apellido paterno:</label>
                      <input type="text" class="form-control " id="apepaterno-delete" disabled>
                      <label  for="inlineFormInputGroup">Apellido materno:</label>
                      <input type="text" class="form-control  " id="apematerno-delete" disabled>
                    </div>
                    <div class="col">
                      <div class="form-group col-md-8  m-auto">
                      <label  for="inlineFormInput">Domicilio:</label>
                      <input type="text" class="form-control" id="domicilio-delete" disabled>
                      <label for="inlineFormInput">Telefono:</label>
                      <input type="text" class="form-control" id="telefono-delete" disabled>

                      <label for="inlineFormInputGroup">Correo</label>
                      <input type="text" class="form-control" id="correo-delete" disabled>
                      </div>
                      <input class="form-control" type="text" id="codigo-delete" style="display: none;">
                    </div>

                  </div>

                </div>
                <br>


              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal" @click="eliminarCliente()">SI</button>
              </div>

            </div>

          </div>

        </div>
      </div>
    </div>
    </section>
  </div>
  <?php
  require('footer.html');
  ?>



    </div>
    <!-- Local-->
    <script src="../src/js/axios.min.js"></script>
    <script src="../src/js/vue.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!--Hosting-->
    <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/aa1202e6fc.js" crossorigin="anonymous"></script>
    <script src="sweetalert2.all.min.js"></script>-->
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <!--<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>-->
    <!-- vue-->
    <!--<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>-->
    <!--axios -->
    <!--<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>-->
    <!-- Core theme JS-->
    <script src="src/js/scripts.js"></script>
    <!-- codigo custon-->
    <script type="text/javascript" src="../src/js/Crudproductores.js"></script>
</body>

</html>
<?php
  }
  else
  {
      header("location: ../index.html");
  }
?>