const imagen = new Vue({
    el: '#appproductos',
    data: {
        urlJPG: '',
        urlPNG: '',
        categorias: [],
        alertgeneral: null,
        messagealert: null,
        nombre: null,
        descripcion: null,
        categoria: null,
        idUser: null,
        imagenPNG: null,
        imagenJPG: null,
        product:[],

    },
    mounted: function () {
        this.cargarTablaFotografias();
    },
    methods: {
        nuevaImagen: function () {
            imagen.recogeValoresDeCajasdeTexto();
            if (imagen.cajasEstanVacias()) {
                imagen.alertgeneral = "alert alert-danger";
                imagen.messagealert = "Existen campos vacios";
                return false;
            } else {
                imagen.cargarDatosNuevos();
            }
        },
        edicionImagen: function () {
            imagen.updateValoresDeCajasdeTexto();
            if (imagen.cajasEstanVacias()) {
                imagen.alertgeneral = "alert alert-danger";
                imagen.messagealert = "Existen campos vacios";
                return false;
            } else {
                imagen.editarproductos();
            }
        },
        cargarTablaFotografias: function () {
            let formdata = new FormData();
            formdata.append("option", "showdata")
            axios.post("../controller/producto_controller.php", formdata)
                .then(function (response) {
                    console.log(response);
                    imagen.product = response.data.producto;
                })
        },
        verImagenPNG: (e) => {
            var filereader = new FileReader();
            filereader.readAsDataURL(e.target.files[0])
            filereader.onload = (e) => {
                imagen.urlPNG = e.target.result;
            }
        },
        verImagenJPG: (e) => {
            var filereader = new FileReader();
            filereader.readAsDataURL(e.target.files[0])
            filereader.onload = (e) => {
                imagen.urlJPG = e.target.result;
            }
        },

        recogeValoresDeCajasdeTexto: function () {
            imagen.nombre = (document.getElementById("nom_insert").value);
            imagen.precio = (document.getElementById("precio_insert").value);
            imagen.imagenJPG = (document.getElementById("fotoJPG").files[0]);
        },
        cajasEstanVacias: function () {
            if (imagen.nombre == 0 || imagen.precio == 0  || imagen.imagenJPG == 0) {
                return true;
            }
            return false;
        },
        updateValoresDeCajasdeTexto: function () {
            imagen.nombre = (document.getElementById("nom_update").value);
            imagen.precio = (document.getElementById("precio_update").value);
            imagen.imagenJPG = (document.getElementById("fotoJPGupdate").files[0]);
        },
        cargarDatosNuevos: function () {
            let datos = {
                nombre: document.getElementById("nom_insert").value,
                precio:  document.getElementById("precio_insert").value,
                imagenJPG:  document.getElementById("fotoJPG").files[0],
            };
            let formData = imagen.toFormData(datos, 'insert', datos.imagenJPG);
            
            axios.post("../controller/producto_controller.php", formData)
                .then(function (response) {
                    if (response.data == 1) {
                        imagen.alertgeneral = "alert alert-success";
                        imagen.messagealert = "Imagenes guardadas con exito!";
                        imagen.cargarTablaFotografias();
                    } else if (response.data == "") {
                        imagen.alertgeneral = 'alert alert-danger';
                        imagen.messagealert = 'Ocurrio un error al subir las imagenes';
                    }else{
                        imagen.alertgeneral = 'alert alert-danger';
                        imagen.messagealert = response.data;
                    }
                }).catch(function (error) {
                    console.log(error);
                });
        },
        editarproductos: function (){
            let datos = {
                Id: document.getElementById("codigo-update").value,
                nombre: document.getElementById("nom_update").value,
                precio:  document.getElementById("precio_update").value,
                imagenJPG:  document.getElementById("fotoJPGupdate").files[0],
            };
            let formData = imagen.toFormData(datos, 'update', datos.imagenJPG);
            
            axios.post("../controller/producto_controller.php", formData)
                .then(function (response) {
                    if (response.data == 1) {
                        imagen.alertgeneral = "alert alert-success";
                        imagen.messagealert = "Imagenes guardadas con exito!";
                        imagen.cargarTablaFotografias();
                    } else if (response.data == "") {
                        imagen.alertgeneral = 'alert alert-danger';
                        imagen.messagealert = 'Ocurrio un error al subir las imagenes';
                    }else{
                        imagen.alertgeneral = 'alert alert-danger';
                        imagen.messagealert = response.data;
                    }
                }).catch(function (error) {
                    console.log(error);
                });
        },
        eliminarProducto: function () {
            if((document.getElementById("nombre-delete").value) == 0) {
                imagen.alertgeneral = 'alert alert-danger',
                imagen.messagealert = 'Campo vacio'
            }else {
                let formdata = new FormData();
                formdata.append("option", "delete")
                formdata.append("id", document.getElementById("codigo-delete").value)
                axios.post("../controller/producto_controller.php", formdata)
                    .then(function (response) {
                        if (response.data == 1){
                            imagen.cargarTablaFotografias();
                            Swal.fire({
                              icon: 'success',
                              title: '¡Eliminado!',
                              text: 'El Producto se a eliminado correctamente'
                            });
                        } else if (response.data == "") {
                            imagen.alertgeneral = 'alert alert-danger',
                            imagen.messagealert = 'Error al eliminar'
                        }

                    })
            }
        },
        pasarDatosEliminar: (producto)=> {
            document.getElementById("codigo-delete").value=producto.Id;
            document.getElementById("nombre-delete").value=producto.nombre;
            document.getElementById("precio-delete").value=producto.precio;


        },
        pasarDatosEditar: (producto)=> {
            document.getElementById("codigo-update").value=producto.Id;
            document.getElementById("nom_update").value=producto.nombre;
            document.getElementById("precio_update").value=producto.costo;
        },
        toFormData: (obj, option, fileimgPNG, fileimgJPG) => {
            let fd = new FormData();
            fd.append('option', option);
            if (fileimgPNG == "0" && fileimgJPG == "0") {
              for (var i in obj) {
                fd.append(i, obj[i]);
              }
            } else {
              fd.append("imagenPNG", fileimgPNG)
              fd.append("imagenJPG", fileimgJPG)
              for (var i in obj) {
                fd.append(i, obj[i]);
              }
            }
            return fd;
          },
          limpiarAlertas: () => {
            imagen.alertgeneral = null;
            imagen.messagealert = null;
        }
    }
});