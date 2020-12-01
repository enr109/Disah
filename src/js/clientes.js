const User = new Vue({
    el: "#appClientes",
    data: {
        messagealert: null,
        alertaofaccess: null,
        alertgeneral: null,
        clien: []
    },
    mounted: function () {
        this.getDatos();
    },
    methods:{
        getDatos: function () {
            let formdata = new FormData();
            formdata.append("option","showdata")
            formdata.append("id",document.getElementById("idcli").value)
            axios.post("../controller/cliente_controller.php", formdata)
            .then(function(response){
                console.log(response);
                User.clien = response.data.clientes;
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
                    (User.alertgeneral = "alert alert-danger"),
                    (User.messagealert = "Existen Campos Vacios");
                    return false;
                }else{
                    if (valspace.test(datos.password)){
                        (User.alertgeneral = "alert alert-danger"),
                        (User.messagealert = "La contraseÃ±a no debe tener espacios");
                    }else {
                        let formData = User.toFormData(datos,'insert')
                        axios
                        .post("../controller/cliente_controller.php", formData)
                        .then(response => {
                            if (response.data == "1") {
                                User.getDatos();
                                User.alertgeneral = "alert alert-success",
                                User.messagealert = "Se ha registrado el cliente exitosamente";
                            } else {
                                (User.alertgeneral = "alert alert-danger"),
                                (User.messagealert = "El usuario no pudo registrarse " + response.data);
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
                    (User.alertgeneral = "alert alert-danger"),
                    (User.messagealert = "Existen Campos Vacios");
                    return false;
                } else {
                    if (valspace.test(datos.password)) {
                        (User.alertgeneral = "alert alert-danger"),
                        (User.messagealert = "La contraseÃ±a no debe tener espacios");
                    }else {
                        let formData = User.toFormData(datos,'update')
                        axios
                        .post("../controller/cliente_controller.php", formData)
                        .then(response =>{
                            if (response.data == "1") {
                                User.getDatos();
                                Swal.fire({
                                  icon: 'success',
                                  title: '¢ÂActualizado!',
                                  text: 'El registro ha sido actualizado.'
                                });
                            } else {
                                (User.alertgeneral = "alert alert-danger"),
                                (User.messagealert = "El usuario no pudo actualizar " + response.data);
                            }
                        });

                    }
                }
        },
        eliminarCliente: function () {
            if((document.getElementById("nombre-delete").value) == 0) {
                User.alertgeneral = 'alert alert-danger',
                User.messagealert = 'Campo vacio'
            }else {
                let formdata = new FormData();
                formdata.append("option", "delete")
                formdata.append("id", document.getElementById("codigo-delete").value)
                axios.post("../controller/cliente_controller.php", formdata)
                    .then(function (response) {
                        if (response.data == 1){
                            User.getDatos()
                            Swal.fire({
                              icon: 'success',
                              title: '¢ÂEliminado!',
                              text: 'El Cliente se a eliminado correctamente'
                            });
                        } else if (response.data == "") {
                            User.alertgeneral = 'alert alert-danger',
                            User.messagealert = 'Error al eliminar'
                        }

                    })
            }
        },
        pasarDatosEliminar: (clientes)=> {
            document.getElementById("codigo-delete").value=clientes.Id;
            document.getElementById("user-delete").value=clientes.user;
            document.getElementById("nombre-delete").value=clientes.nombre;
            document.getElementById("apepaterno-delete").value=clientes.ap;
            document.getElementById("apematerno-delete").value=clientes.am;
            document.getElementById("domicilio-delete").value=clientes.domicilio;
            document.getElementById("telefono-delete").value=clientes.tele;
            document.getElementById("correo-delete").value=clientes.correo;

        },
        pasarDatosEditar: (clientes)=> {
            document.getElementById("codigo-update").value=clientes.Id;
            document.getElementById("user-update").value=clientes.user;
            document.getElementById("nombre-update").value=clientes.nombre;
            document.getElementById("apepaterno-update").value=clientes.ap;
            document.getElementById("apematerno-update").value=clientes.am;
            document.getElementById("domicilio-update").value=clientes.domicilio;
            document.getElementById("telefono-update").value=clientes.tele;
            document.getElementById("correo-update").value=clientes.correo;
        }


    }
});