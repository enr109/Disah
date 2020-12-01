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
    <title>Ventas</title>
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
    require("header.php");
    ?>
    <br>
    <div id="appventa">
      <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col">
                <button  class="btn btn-success" data-toggle="modal" data-target="#nuevo-venta" title="Nuevo">Compra</button>
                </div>
            </div>
            <div v-bind:class="alertgeneral" role="alert">
                {{messagealert}}
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                  <div class="form-group">
                    <h4 class="text-center">Datos del Cliente</h4>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <form class="" id="form-insert" enctype="multipart/form-data">
                        <input type="hidden" id="idcliente" v-for="mem in members" v-bind:value="mem.idcliente">
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label>Nombre</label>
                              <input type="text" class="form-control" id="nom_cliente" placeholder="Nombre"v-on:keyup="searchMonitor" v-model="search.keyword" maxlength="40">
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label>Apellido Paterno</label>
                              <input type="text" class="form-control" id="ap_cliente" v-for="mem in members" v-bind:value="mem.cliap"  disabled>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label>Apellido Materno</label>
                              <input type="text" class="form-control" id="am_cliente" v-for="mem in members" v-bind:value="mem.cliam" disabled>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label>Direccion</label>
                              <input type="text" class="form-control" id="dir_cliente" v-for="mem in members" v-bind:value="mem.clidomicilio" disabled>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label>Telefono</label>
                              <input type="text" class="form-control" id="tel_cliente" v-for="mem in members" v-bind:value="mem.clitelefono" disabled>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label>Lugar de entrega</label>
                              <input type="text" class="form-control" id="entrega_cliente">

                            </div>

                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label for="inlineFormInput">Tipo pago:</label>
                              <Select name="combo-pago" id="combo-pago-insert" class="form-control">
                                <option value="0">--Selecciones El Pago--</option>
                                <option v-for="pago in pagoss" v-bind:value="pago.Id">
                                      {{ pago.npago }}
                                </option>
                              </Select>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label  for="inlineFormInput">Tipo de Entrega:</label>
                              <Select name="combo-entrega" id="combo-entrega-insert" class="form-control">
                                <option value="0">--Selecciones El Tipo de Entrega--</option>
                                <option v-for="Entrega in entree" v-bind:value="Entrega.Id">
                                      {{ Entrega.entr }}
                                </option>
                              </Select>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>

                  </div>
                  <h4 class="text-center">Datos Venta</h4>
                  <!--<input type="text" id="valor">-->
                  <div class="row">
                    <div class="col-lg-6">
                      <label>Acciones</label>
                      <div class="form-group">
                        <a href="#" class="btn btn-danger" id="btn_anular_venta">Anular</a>
                        <a href="#" class="btn btn-primary" id="btn_facturar" @click="nuevaVenta()"><i class="fas fa-save"></i> Generar Venta</a>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-dark">
                      <thead class="bg-success text-light">
                        <tr>
                          <th width="100px">Codigo</th>
                          <th>Des.</th>
                          <th>Stock</th>
                          <th width="100px">Cantidad</th>
                          <th class="textright">Precio</th>
                          <th class="textright">Precio Total</th>

                        </tr>
                        <div class="form-group">
                          <label>Buscar producto</label>
                          <input type="text"  id="txt_nombre" v-on:keyup="searchProducto" v-model="search2.keyword">
                        </div>
                        <br>
                        <tr v-for="pro in productos">
                          <input id="txt_idpro" type="hidden" v-bind:value="pro.idproductos">
                          <input id="txt_precio" type="hidden" v-bind:value="pro.Proprecio">
                          <td >{{pro.idproductos}}</td>
                          <td id="txt_descripcion">{{pro.vchnomproduct}}</td>
                          <td id="txt_existencia">{{pro.existencia}}</td>
                          <td> <input type="text" name="txt_cant_producto" id="txt_cant_producto" value="0" min="1" v-on:keyup="calcular"></td>
                          <td class="textright">{{pro.Proprecio}}</td>
                          <td id="txt_precio_total" class="textright">{{pro.Proprecio}}</td>
                        </tr>
                      </thead>
                      <tbody id="detalles_venta">
                        <tr v-for="datoagre in pasar">
                          <td>{{datoagre.id}}</td>
                        </tr>
                      </tbody>
                    </table>
                    <label>Total</label>
                    <input type="text" id="total" disabled>

                  </div>

                </div>
            </div>
            <!-- Modal Nuevo -->
            <div id="nuevoventa">
                <div class="modal fade" id="nuevo-venta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Venta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <form action="" id="form-insert" enctype="multipart/form-data">
                                <div class="form-row alig-items-start">
                                    <div class="col">
                                        <div class="form-group col-md-8 m-auto">
                                            <label for="inlineFormInput">Tipo pago:</label>
                                            <Select name="combo-pago" id="combo-pago-insert" class="form-control">
                                              <option value="0">--Selecciones El Pago--</option>
                                              <option v-for="pago in pagoss" v-bind:value="pago.Id">
                                                    {{ pago.npago }}
                                              </option>
                                            </Select>

                                            <label  for="inlineFormInput">Tipo de Entrega:</label>
                                            <Select name="combo-entrega" id="combo-entrega-insert" class="form-control">
                                              <option value="0">--Selecciones El Tipo de Entrega--</option>
                                              <option v-for="Entrega in entree" v-bind:value="Entrega.Id">
                                                    {{ Entrega.entr }}
                                              </option>
                                            </Select>
                                            <label  for="inlineFormInput">Cliente:</label>
                                            <Select name="combo-entrega" id="combo-cliente-insert" class="form-control">
                                              <option value="0">--Selecciones El Cliente--</option>
                                              <option v-for="clientes in client" v-bind:value="clientes.Id">
                                                {{clientes.nombre}} {{" "}} {{clientes.ap}} {{" "}} {{clientes.am}}

                                              </option>
                                            </Select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" >Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal Editar-->
      <div id="editarCliente">
      <div class="modal fade" id="editar-cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Editar cliente</h5>
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
      <div id="eliminarCliente">
      <div class="modal fade" id="eliminar-cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Eliminar cliente</h5>
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
    <!-- codigo custon-->
    <script type="text/javascript" src="../src/js/CrudVentas.js"></script>
</body>

</html>
<?php
  }
  else
  {
      header("location: ../index.html");
  }
?>