const ventt = new Vue({
    el: "#appventa",
    data: {
        messagealert: null,
        alertaofaccess: null,
        alertgeneral: null,
        ven: [],
        pagoss: [],
        client: [],
        entree: [],
        members: [],
        productos: [],
        search: {keyword: ''},
        search2: {keyword2: ''},
        noMember: false,
        noproductos: false,
        clientessss:{},
        pasar: []
    },
    mounted: function () {
        this.cargarComboPago();
        this.cargarComboEntrega();
        this.cargarComboCliente();
    },
    methods:{
        getDatos: function () {
            let formdata = new FormData();
            formdata.append("option","showdata")
            axios.post("../controller/ventas_controller.php", formdata)
            .then(function(response){
                console.log(response);
                ventt.ven = response.data.Ventas;
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
        nuevaVenta: () => {
            var valspace =/\s/;
            let datos = {
                idcliente: document.getElementById("idcliente").value,
                idtipopago: document.getElementById("combo-pago-insert").value,
                idtipoentrega: document.getElementById("combo-entrega-insert").value,
                cantidad: document.getElementById("txt_cant_producto").value,
                lugarentrega: document.getElementById("entrega_cliente").value,
                idproducto: document.getElementById("txt_idpro").value,
                precio: document.getElementById("txt_precio").value,
                total: document.getElementById("total").value
            };
            if (datos.idcliente == 0 ||
                datos.idtipopago == 0 ||
                datos.idtipoentrega == 0 ||
                datos.cantidad == 0 ||
                datos.lugarentrega == 0 ||
                datos.idproducto == 0 ||
                datos.precio == 0 ) {
                    (ventt.alertgeneral = "alert alert-danger"),
                    (ventt.messagealert = "Existen Campos Vacios");
                    return false;
                }else{
                    let formData = ventt.toFormData(datos,'insert')
                        axios
                        .post("../controller/ventas_controller.php", formData)
                        .then(response => {
                            if (response.data == "1") {
                              Swal.fire({
                                icon: 'success',
                                title: '¡Registrado!',
                                text: 'la compra se realizo correctamente'
                              });
                            } else {
                                (ventt.alertgeneral = "alert alert-danger"),
                                (ventt.messagealert = "El usuario no pudo registrarse " + response.data);
                            }
                        });
            }
        },

        cargarComboPago: function () {
            let formdata = new FormData();
            formdata.append("option", "showdata")
            axios.post("../controller/pago_controller.php", formdata)
            .then(function (response) {
                console.log(response);
                ventt.pagoss = response.data.pago;
            })
        },

        cargarComboEntrega: function () {
            let formdata = new FormData();
            formdata.append("option", "showdata")
            axios.post("../controller/entrega_controller.php", formdata)
            .then(function (response) {
                console.log(response);
                ventt.entree = response.data.Entrega;
            })
        },
        cargarComboCliente: function () {
            let formdata = new FormData();
            formdata.append("option", "showdata")
            axios.post("../controller/cliente_controller.php", formdata)
            .then(function (response) {
                console.log(response);
                ventt.client = response.data.clientes;
            })
        },
        searchMonitor: function(){
          var keyword = ventt.toFormData2(ventt.search);
          axios.post("../controller/action.php?action=search", keyword)
            .then(function(response){
              ventt.members = response.data.clientes;
              //document.getElementById("ap_cliente").value=ventt.members;
              if(response.data.members == ''){
                ventt.noMember = true;
              }
              else{
                ventt.noMember = false;
              }
            });
        },
        searchProducto: function(){
          var keyword2 = ventt.toFormData2(ventt.search2);
          //document.getElementById("valor").value=ventt.search2;
          axios.post("../controller/action2.php?action=search", keyword2)
            .then(function(response){
              ventt.productos = response.data.productos;
              //document.getElementById("valor").value=datos.Proprecio;
              if(response.data.productos == ''){
                ventt.noproductos = true;
              }
              else{
                ventt.noproductos = false;
              }
            });
        },

        calcular: function(){
          let cantidad = document.getElementById("txt_cant_producto").value;
          let precio = document.getElementById("txt_precio").value;
          let total = parseFloat(cantidad * precio);
          document.getElementById("total").value=total;

        },

        toFormData2: function(obj){
          var form_data= new FormData();
          for(var key in obj){
            form_data.append(key, obj[key]);
          }
          return form_data;
        },

    }
});


// javascript
