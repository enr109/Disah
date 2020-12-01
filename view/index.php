<?php
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES')
  {?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Disah</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../src/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><p class="masthead-subheading">Disah</p></a>

                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#home">Home</a></li>
                        <?php
                            $tipousuario = $_SESSION['rol'];
                            if($tipousuario == "Cliente"){
                        ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="personas.php">Clientes</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="ventas.php">Compras</a></li>
                        <?php
                            }elseif($tipousuario == "Productor"){
                        ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="productores.php">Productores</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="entradas.php">Entradas</a></li>
                        <?php
                            }
                        ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="Estadoproducto.php">Estado del Producto</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../model/destroysesion.php">Cerrar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container" id="home">

                <div class="masthead-heading text-uppercase">Bienvenidos</div>
                <div class="masthead-subheading">Disah Es una empresa distribuidora Agricola se dedica a la compra y venta de productos agricolas</div>
            </div>
        </header>
        <div id="appproductos">
        <!-- Services-->
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Productos</h2>
                    
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4" v-for="producto in product">
                        <div class="portfolio-item">
                                <img class="img-fluid" :src="'../src/img/JPG/'+producto.JPG" alt="" />
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">{{producto.nombre}}</div>
                                <div class="portfolio-caption-subheading text-muted">Cantidad disponible: {{producto.existencia}}</div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                </div>
            </div>
        </section>

        <!-- Team-->

        <!-- Clients-->

        <!-- Contact-->

        <!-- Footer-->
        <?php
        require('footer.html');
        ?>
        </div>
        <!-- Portfolio Modals-->
        
        
        
        
        
        
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Local-->
        <script src="../src/js/axios.min.js"></script>
        <script src="../src/js/vue.min.js"></script>
        <!-- Core theme JS-->
        <script src="../src/js/scripts.js"></script>
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
