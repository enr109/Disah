const User = new Vue({
    el: "#appVentas",
    data: {
        messagealert: null,
        alertaofaccess: null,
        alertgeneral: null,
        vent: [],
        estadoss: [],
        entradass: []
    },
    mounted: function () {
        this.getDatos();
        this.getDatosCombo();
        this.getDatosEntrada();
    },
    methods:{
        getDatos: function () {
            let formdata = new FormData();
            formdata.append("option","showdata")
            axios.post("../controller/muestraventas_controller.php", formdata)
            .then(function(response){
                console.log(response);
                User.vent = response.data.ventas;
            })
        },
        getDatosEntrada: function () {
            let formdata = new FormData();
            formdata.append("option","showentradas")
            axios.post("../controller/muestraventas_controller.php", formdata)
            .then(function(response){
                console.log(response);
                User.entradass = response.data.entradas;
            })
        },
        getDatosCombo: function () {
            let formdata = new FormData();
            formdata.append("option","showcombo")
            axios.post("../controller/muestraventas_controller.php", formdata)
            .then(function(response){
                console.log(response);
                User.estadoss = response.data.esta;
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
        editarventa: function (){
            var valspace = /\s/;
            let datos = {
                id: document.getElementById("codigo-update").value,
                estado: document.getElementById("combo-estado").value,
            };
            if (datos.estado == 0 ) {
                    (User.alertgeneral = "alert alert-danger"),
                    (User.messagealert = "Existen Campos Vacios");
                    return false;
                }
                else{
                    let formData = User.toFormData(datos,'updateVenta')
                    axios
                    .post("../controller/muestraventas_controller.php", formData)
                    .then(response =>{
                        if (response.data == "1") {
                            User.getDatos();
                            Swal.fire({
                                icon: 'success',
                                title: '¡Actualizado!',
                                text: 'El registro ha sido actualizado.'
                            });
                        } else{
                            (User.alertgeneral = "alert alert-danger"),
                            (User.messagealert = "El usuario no pudo actualizar " + response.data);
                        }
                    });

                }
        },
        pasarDatosEditar: (Ventas)=> {
            document.getElementById("codigo-update").value=Ventas.Id;
        }


    }
});
