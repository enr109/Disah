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
    <title>Detalles de Entradas</title>
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
  require("header.html");
  ?>
  <br>
  <div id="appVentas">
    <section class="page-section">
    <div class="container">
      
      <div v-bind:class="alertgeneral" role="alert">
      {{messagealert}}
      </div>
      <div class="row mt-5">
        <div class="col-lg-12">
          <table class="table table-dark">
            <thead>
              <tr class="bg-success text-light">
              <th>ID</th>
              <th>Total</th>
              <th>Fecha</th>
              <th>Pago</th>
              <th>Entrega</th>
              <th>Nombre</th>
              <th>Ap</th>
              <th>Am</th>
              <th>Cantidad</th>
              <th>Producto</th>
              <th>Estado</th>
              <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="entra in entradass">
                <td>{{entra.Id}}</td>
                <td>{{entra.total}}</td>
                <td>{{entra.fecha}}</td>
                <td>{{entra.pago}}</td>
                <td>{{entra.entrega}}</td>
                <td>{{entra.nom}}</td>
                <td>{{entra.ap}}</td>
                <td>{{entra.am}}</td>
                <td>{{entra.cantida}}</td>
                <td>{{entra.producto}}</td>
                <td>{{entra.estado}}</td>
                <td>
                  <div class="btn-group" role="group">
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#editar-productor" @click="pasarDatosEditar(entra)" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                  </div>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
      <!--Modal Editar-->
      <div id="editarProductor">
      <div class="modal fade" id="editar-productor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Editar Estado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body text-center">
                <form action="" id="form-insert" enctype="multipart/form-data">
                <div class="form-row alig-items-start">
                  <div class="col">
                    <div class="form-group col-md-8 m-auto">
                      <label for="inlineFormInput">Tipo Estado:</label>
                      <Select name="combo-estado" id="combo-estado" class="form-control">
                        <option value="0">--Selecciones El Pago--</option>
                        <option v-for="estadoss in estadoss" v-bind:value="estadoss.Id">
                          {{ estadoss.estado }}
                        </option>
                      </Select>
                      <input type="text" style="display: none;" id="codigo-update">
                    </div>
                  </div>
                </div>
                <br>
                </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" @click="editarentrada()">Actualizar</button>
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
    <script type="text/javascript" src="../src/js/muestraEntradas.js"></script>
</body>

</html>
<?php
 }
 else
 {
  header("location: ../index.html");
 }
?>