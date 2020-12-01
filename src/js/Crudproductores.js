const Prod = new Vue({
    el: "#appProductores",
    data: {
        messagealert: null,
        alertaofaccess: null,
        alertgeneral: null,
        produc: []
    },
    mounted: function () {
        this.getDatos();
    },
    methods:{
        getDatos: function () {
            let formdata = new FormData();
            formdata.append("option","showdata")
            formdata.append("id",document.getElementById("idcli").value)
            axios.post("../controller/productores_controller.php", formdata)
            .then(function(response){
                console.log(response);
                Prod.produc = response.data.productores;
            })
        },
        toFormData: (obj, option, fileimg) => {
            let fd = new FormData();
            fd.append('option', option);
            if (fileimg == "0") {
              for (var i in obj) {
                fd.append(i, obj[i]);
              }
            } else {
              fd.append('img', fileimg)
              for (var i in obj) {
                fd.append(i, obj[i]);
              }
            }
            return fd;
        },
        nuevoUsuario: () => {
            var valspace =/\s/;
            let datos = {
                user: document.getElementById("user-insert").value,
                password: document.getElementById("password-insert").value,
                nombre: document.getElementById("nombre-insert").value,
                ap: document.getElementById("apepaterno-insert").value,
                am: document.getElementById("apematerno-insert").value,
                domi: document.getElementById("domicilio-insert").value,
                tel: document.getElementById("telefono-insert").value,
                correo: document.getElementById("correo-insert").value,
            };
            if (datos.user == 0 ||
                datos.password == 0 ||
                datos.nombre == 0 ||
                datos.ap == 0 ||
                datos.am == 0 ||
                datos.domi == 0 ||
                datos.tel == 0 ||
                datos.correo == 0) {
                    (Prod.alertgeneral = "alert alert-danger"),
                    (Prod.messagealert = "Existen Campos Vacios");
                    return false;
                }else{
                    if (valspace.test(datos.password)){
                        (Prod.alertgeneral = "alert alert-danger"),
                        (Prod.messagealert = "La contraseÃ±a no debe tener espacios");
                    }else {
                        let formData = Prod.toFormData(datos,'insert')
                        axios
                        .post("../controller/productores_controller.php", formData)
                        .then(response => {
                            if (response.data == "1") {
                                Prod.getDatos();
                                Prod.alertgeneral = "alert alert-success",
                                Prod.messagealert = "Se ha registrado el cliente exitosamente";
                            } else {
                                (Prod.alertgeneral = "alert alert-danger"),
                                (Prod.messagealert = "El usuario no pudo registrarse " + response.data);
                            }
                        });
                }
            }
        },
        editarClientes: function (){
            var valspace = /\s/;
            let datos = {
                id: document.getElementById("codigo-update").value,
                user: document.getElementById("user-update").value,
                password: document.getElementById("password-update").value,
                nombre: document.getElementById("nombre-update").value,
                ap: document.getElementById("apepaterno-update").value,
                am: document.getElementById("apematerno-update").value,
                domi: document.getElementById("domicilio-update").value,
                tel: document.getElementById("telefono-update").value,
                correo: document.getElementById("correo-update").value,
            };
            if (datos.user == 0 ||
                datos.password == 0 ||
                datos.nombre == 0 ||
                datos.ap == 0 ||
                datos.am == 0 ||
                datos.domi == 0 ||
                datos.tel == 0 ||
                datos.correo == 0) {
                    (Prod.alertgeneral = "alert alert-danger"),
                    (Prod.messagealert = "Existen Campos Vacios");
                    return false;
                } else {
                    if (valspace.test(datos.password)) {
                        (Prod.alertgeneral = "alert alert-danger"),
                        (Prod.messagealert = "La contraseÃ±a no debe tener espacios");
                    }else {
                        let formData = Prod.toFormData(datos,'update')
                        axios
                        .post("../controller/productores_controller.php", formData)
                        .then(response =>{
                            if (response.data == "1") {
                                Prod.getDatos();
                                Swal.fire({
                                  icon: 'success',
                                  title: '¢ÂActualizado!',
                                  text: 'El registro ha sido actualizado.'
                                });
                            } else {
                                (Prod.alertgeneral = "alert alert-danger"),
                                (Prod.messagealert = "El usuario no pudo actualizar " + response.data);
                            }
                        });

                    }
                }
        },
        eliminarCliente: function () {
            if((document.getElementById("nombre-delete").value) == 0) {
                Prod.alertgeneral = 'alert alert-danger',
                Prod.messagealert = 'Campo vacio'
            }else {
                let formdata = new FormData();
                formdata.append("option", "delete")
                formdata.append("id", document.getElementById("codigo-delete").value)
                axios.post("../controller/productores_controller.php", formdata)
                    .then(function (response) {
                        if (response.data == 1){
                            Prod.getDatos();
                            Swal.fire({
                              icon: 'success',
                              title: '¢ÂEliminado!',
                              text: 'El Productor se a eliminado correctamente'
                            });
                        } else if (response.data == "") {
                            Prod.alertgeneral = 'alert alert-danger',
                            Prod.messagealert = 'Error al eliminar'
                        }

                    })
            }
        },
        pasarDatosEliminar: (productores)=> {
            document.getElementById("codigo-delete").value=productores.Id;
            document.getElementById("user-delete").value=productores.user;
            document.getElementById("nombre-delete").value=productores.nombre;
            document.getElementById("apepaterno-delete").value=productores.ap;
            document.getElementById("apematerno-delete").value=productores.am;
            document.getElementById("domicilio-delete").value=productores.domicilio;
            document.getElementById("telefono-delete").value=productores.tele;
            document.getElementById("correo-delete").value=productores.correo;

        },
        pasarDatosEditar: (productores)=> {
            document.getElementById("codigo-update").value=productores.Id;
            document.getElementById("user-update").value=productores.user;
            document.getElementById("nombre-update").value=productores.nombre;
            document.getElementById("apepaterno-update").value=productores.ap;
            document.getElementById("apematerno-update").value=productores.am;
            document.getElementById("domicilio-update").value=productores.domicilio;
            document.getElementById("telefono-update").value=productores.tele;
            document.getElementById("correo-update").value=productores.correo;
        }


    }
});