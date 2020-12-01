<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="src/css/styles2.css" rel="stylesheet" />

    <!--Sweet Alert 2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!--<link rel="stylesheet" href="../src/css/all.css">-->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">-->

    <!--Local-->
    <script  src="src/js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="src/css/bootstrap.css">
    <link rel="stylesheet" href="src/css/all.css">

    <script  src="src/js/bootstrap.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Core theme JS-->
    <script src="src/js/scripts.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="#page-top"><p class="masthead-subheading">Disah</p></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav text-uppercase ml-auto">
        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#"  data-toggle="modal" data-target="#nuevo-cliente"> Registro de Clientes</a></li>
        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#"  data-toggle="modal" data-target="#nuevo-productor">Registro de Productores</a></li>
        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.html">Iniciar</a></li>
      </ul>
    </div>
  </div>
</nav>
<div id="app-user">

  <div id="nuevoCliente">
    <div class="modal fade" id="nuevo-cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Nuevo cliente</h5>
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
            <br>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" @click="nuevoCliente()">Guardar</button>
          </div>

        </div>

      </div>

    </div>
  </div>
  <!--Fin cliente-->
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
                  <input type="text" class="form-control" id="user" placeholder="Usuario" maxlength="40">
                  <label  for="inlineFormInput">Password:</label>
                  <input type="text" class="form-control" id="password" placeholder="Usuario" maxlength="40">
                  <label  for="inlineFormInput">Nombre:</label>
                  <input type="text" class="form-control"  id="nombre" name="nombre-insert" placeholder="Nombre" maxlength="40">
                  <label  for="inlineFormInputGroup">Apellido paterno:</label>
                  <input type="text" class="form-control " id="apepaterno" name="apepaterno-insert" placeholder="Apellido paterno" maxlength="50">
                  <label  for="inlineFormInputGroup">Apellido materno:</label>
                  <input type="text" class="form-control  " id="apematerno" name="apematerno-insert"  placeholder="Apellido materno" maxlength="100">
                </div>
              </div>
                <div class="col">
                  <div class="form-group col-md-8  m-auto">
                  <label  for="inlineFormInput">Domicilio:</label>
                  <input type="text" class="form-control" id="domicilio" name="domicilio-inser" placeholder="Domicilio" maxlength="40">
                  <label for="inlineFormInput">Telefono:</label>
                  <input type="text" class="form-control" id="telefono" name="telefono-insert" placeholder="Telefono" maxlength="12">

                  <label for="inlineFormInputGroup">Correo</label>
                  <input type="text" class="form-control" id="correo" name="correo-insert" placeholder="Correo" maxlength="50">
                  </div>
                </div>

            </div>
            <br>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" @click="nuevoproductor()">Guardar</button>
          </div>

        </div>

      </div>

    </div>
  </div>

</div>
</body>
<script src="src/js/axios.min.js"></script>
<script src="src/js/vue.min.js"></script>
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
<script type="text/javascript" src="src/js/registro.js"></script>
</html>
