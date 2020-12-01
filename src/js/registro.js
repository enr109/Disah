const User = new Vue({
    el: "#app-user",
    data: {
        messagealert: null,
        alertaofaccess: null,
        alertgeneral: null,
        clien: []
    },
    mounted: function () {
    },
    methods:{
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
        nuevoCliente: () => {
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
                        (User.messagealert = "La contraseña no debe tener espacios");
                    }else {
                        let formData = User.toFormData(datos,'insert')
                        axios
                        .post("controller/cliente_controller.php", formData)
                        .then(response => {
                            if (response.data == "1") {
                                Swal.fire({
                                  icon: 'success',
                                  title: '¡Registrado!',
                                  text: 'El Cliente se a registrado correctamente'
                                });
                            } else {
                              Swal.fire({
                                icon: 'error',
                                title: '¡ Error al Registrado!',
                                text: 'El Cliente se no se a registrado'
                              });
                            }
                        });
                }
            }
        },
        nuevoproductor: () => {
            var valspace =/\s/;
            let datos = {
                user: document.getElementById("user").value,
                password: document.getElementById("password").value,
                nombre: document.getElementById("nombre").value,
                ap: document.getElementById("apepaterno").value,
                am: document.getElementById("apematerno").value,
                domi: document.getElementById("domicilio").value,
                tel: document.getElementById("telefono").value,
                correo: document.getElementById("correo").value,
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
                        (User.messagealert = "La contraseña no debe tener espacios");
                    }else {
                        let formData = User.toFormData(datos,'insert')
                        axios
                        .post("controller/productores_controller.php", formData)
                        .then(response => {
                            if (response.data == "1") {
                                Swal.fire({
                                  icon: 'success',
                                  title: '¡Registrado!',
                                  text: 'El Productor se a registrado correctamente'
                                });
                            } else {
                              Swal.fire({
                                icon: 'error',
                                title: '¡ Error al Registrado!',
                                text: 'El Productor se no se a registrado'
                              });
                            }
                        });
                }
            }
        }

    }
});
