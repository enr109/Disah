const ventt = new Vue({
    el: "#appestado",
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
        
    },
    methods:{
        buscarestado: function () {
          if((document.getElementById("buscar").value) == 0) {
              ventt.alertgeneral = 'alert alert-danger',
              ventt.messagealert = 'Campo vacio'
          }else {
              let formdata = new FormData();
              formdata.append("option", "showdata")
              formdata.append("id", document.getElementById("buscar").value)
              axios.post("../controller/estado_controller.php", formdata)
                  .then(function (response) {
                    console.log(response);
                    ventt.ven = response.data.productos;
                  })
          }
      },
      buscarentrada: function () {
        if((document.getElementById("buscar").value) == 0) {
            ventt.alertgeneral = 'alert alert-danger',
            ventt.messagealert = 'Campo vacio2'
        }else {
            let formdata = new FormData();
            formdata.append("option", "showdataen")
            formdata.append("id", document.getElementById("buscar").value)
            axios.post("../controller/estado_controller.php", formdata)
                .then(function (response) {
                  console.log(response);
                  ventt.ven = response.data.productos;
                })
        }
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
