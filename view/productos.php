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
    <title>Productos</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../src/css/styles2.css" rel="stylesheet" />

    <!--Local-->
    <script  src="../src/js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="../src/css/bootstrap.css">
    <link rel="stylesheet" href="../src/css/all.css">
    <!--Sweet Alert 2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script  src="../src/js/bootstrap.js"></script>
</head>

<body>
    <?php
    require("header.html");
    ?>
    <br>
    <div id="appproductos">
      <section class="page-section">
        <div class="container">
            
            <div v-bind:class="alertgeneral" role="alert">
                {{messagealert}}
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                  <div class="form-group">
                    <h4 class="text-center">Productos</h4>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <form class="" id="form-insert" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Nombre</label>
                              <input type="text" class="form-control" id="nom_insert" placeholder="Nombre">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Precio</label>
                              <input type="text" class="form-control" id="precio_insert" >
                            </div>
                          </div>
                          
                          <div class="col-lg-12">
                          <div class="form-group col-md-8  m-auto">
                              <img v-if="urlJPG" :src="urlJPG" alt="" width="300" height="200" class="mx-auto d-block m-1">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="fotoJPG" @change="verImagenJPG">
                                  <label class="custom-file-label name-img8" for="inputGroupFile03">JPG</label>
                                </div>
                          </div>
                        </div>
                    </div>
                      </form>
                    </div>
                    
                  </div>
                  <!--<input type="text" id="valor">-->
                  <div class="row">
                    <div class="col-lg-6">
                      <label>Acciones</label>
                      <div class="form-group">
                        <a href="#" class="btn btn-primary" id="btn_facturar" @click="nuevaImagen()"><i class="fas fa-save"></i> Guardar</a>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-dark">
                      <thead class="bg-success text-light">
                        <tr>
                          <th>Id</th>
                          <th>Nombre</th>
                          <th>Imagen</th>
                          <th>Precio</th>
                          <th>Costo</th>
                          <th>Existencia</th>
                          <th>Accion</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="producto in product">
                          <td>{{producto.Id}}</td>
                          <td>{{producto.nombre}}</td>
                          <td><img :src="'../src/img/JPG/'+producto.JPG" width="100"></td>
                          <td>{{producto.precio}}</td>
                          <td>{{producto.costo}}</td>
                          <td>{{producto.existencia}}</td>
                          <td>
                            <div class="btn-group" role="group">
                              <button class="btn btn-secondary" data-toggle="modal" data-target="#editar-producto" @click="pasarDatosEditar(producto)" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                              <button class="btn btn-danger" data-toggle="modal" data-target="#eliminar-producto" @click="pasarDatosEliminar(producto)" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                  </div>

                </div>
            </div>
            
        <!--Modal Editar-->
      <div id="editarProducto">
      <div class="modal fade" id="editar-producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Editar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body text-center">
              <form class="" id="form-insert" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Nombre</label>
                              <input type="text" class="form-control" id="nom_update" placeholder="Nombre">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Precio</label>
                              <input type="text" class="form-control" id="precio_update" >
                            </div>
                          </div>
                          
                          <div class="col-lg-12">
                          <div class="form-group col-md-8  m-auto">
                              <img v-if="urlJPG" :src="urlJPG" alt="" width="300" height="200" class="mx-auto d-block m-1">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="fotoJPGupdate" @change="verImagenJPG">
                                  <label class="custom-file-label name-img8" for="inputGroupFile03">JPG</label>
                                </div>
                          </div>
                        </div>
                        <input class="form-control" type="text" id="codigo-update" style="display: none;">
                    </div>
                      </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" @click="edicionImagen()">Actualizar</button>
              </div>

            </div>

          </div>

        </div>
      </div>
      <!--Eliminar-->
      <div id="eliminarProducto">
      <div class="modal fade" id="eliminar-producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body text-center">
              <h5 class="text-center">¿Eliminar Producto?</h5>
                <div class="form-row alig-items-start">
                  <div class="col">
                    <div class="form-group col-md-8 m-auto">
                      <label  for="inlineFormInput">Nombre:</label>
                      <input type="text" class="form-control"  id="nombre-delete" disabled>
                      <label  for="inlineFormInputGroup">Precio:</label>
                      <input type="text" class="form-control " id="precio-delete" disabled>
                    </div>
                    <div class="col">
                      <input class="form-control" type="text" id="codigo-delete" style="display: none;">
                    </div>

                  </div>

                </div>
                <br>


              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal" @click="eliminarProducto()">SI</button>
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
    <!-- Local-->
    <script src="../src/js/axios.min.js"></script>
    <script src="../src/js/vue.min.js"></script>
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
    <!-- codigo custon-->
    <script type="text/javascript" src="../src/js/productos.js"></script>
</body>

</html>
<?php
 }
 else
 {
  header("location: ../index.html");
 }
?>
