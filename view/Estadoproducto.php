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
    <title>Estado del Producto</title>
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

    <script  src="../src/js/bootstrap.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Core theme JS-->
    <script src="../src/js/scripts.js"></script>
</head>

<body>
    <?php
    require("header.php");
    ?>
    <br>
    <div id="appestado">
      <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5 class="text-center">Busqueda del Producto</h5>
                </div>
            </div>
            <div v-bind:class="alertgeneral" role="alert">
                {{messagealert}}
            </div>
            <div id="estado">
                <div class="text-center">
                    <form action="">
                        <div class="form-row alig-items-start">
                            <div class="col">
                                <div class="form-group col-md-8 m-auto">

                                    <input type="text" class="form-control" id="buscar" placeholder="Buscar">

                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                <?php
                    $tipousuario = $_SESSION['rol'];
                    if($tipousuario == "Cliente"){
                ?>
                <button type="button" class="btn btn-primary" data-dismiss="modal" @click="buscarestado()">Buscar</button>
                <?php
                    }elseif($tipousuario == "Productor"){
                ?>
                <button type="button" class="btn btn-primary" data-dismiss="modal" @click="buscarentrada()">Buscar</button>
                <?php
                    }
                ?>
              </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <table class="table table-dark">
                        <thead>
                            <tr class="bg-success text-light">
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Pago</th>
                                <th>Total</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Producto</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody v-for="venta in ven">
                            <td>{{venta.Id}}</td>
                            <td>{{venta.fecha}}</td>
                            <td>{{venta.pago}}</td>
                            <td>{{venta.total}}</td>
                            <td>{{venta.precio}}</td>
                            <td>{{venta.cantidad}}</td>
                            <td>{{venta.nombre}}</td>
                            <td>{{venta.estado}}</td>
                        </tbody>
                    </table>
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
    <script type="text/javascript" src="../src/js/estado.js"></script>
</body>

</html>
<?php
 }
 else
 {
  header("location: ../index.html");
 }
?>