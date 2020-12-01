<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><p class="masthead-subheading">Disah</p></a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ml-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Home</a></li>
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
