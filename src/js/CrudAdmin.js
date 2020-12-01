const User = new Vue({
  el: "#app-user",
  data: {
    titlelog: "Login",
    messagealert: null,
    alertaofaccess: null,
    alertgeneral: null,
    alertavalidregister: null,
    messagealertregister: null,
    btniniciartext: "Iniciar",
    usuarios: [],
    roles: [],
    elegido: {},
    url: '',
    url2: ''
  },
  methods: {
    accesoUser: () => {
      if (
        document.getElementById("user").value == 0 ||
        document.getElementById("password").value == 0
      ) {
        User.alertaofaccess = "alert alert-danger",
          User.messagealert = "Campos vacios";
      } else {
        User.btniniciartext = "Iniciando..";
        let formd = new FormData();
        formd.append("option", "access");
        formd.append("user", document.getElementById("user").value);
        formd.append("password", document.getElementById("password").value);

        axios.post("controller/admin_controller.php", formd)
          .then(response => {
            if (response.data == "1") {

              window.location.href = "view/ventadetalle.php";
            } else {
              (User.alertaofaccess = "alert alert-danger"),
              (User.messagealert = "Error al iniciar sesion");
              User.btniniciartext = "Iniciando";

            }
          });
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
    }
  }
});
/*
//todos los botones
let botones = document.querySelectorAll("button");

//cada vez que el valor del select cambia
exampleFormControlSelect1.addEventListener("change",()=>{
  //recupera el valor de la opción seleccionada
  let valorSeleccionado = exampleFormControlSelect1.options[exampleFormControlSelect1.selectedIndex].value;
  // para todos los botones elimina la clese visible
  botones.forEach(b =>{b.classList.remove("visible")})
  //selecciona el boton que tiene que ser visible

  let elBoton = document.querySelector(`.btn_${valorSeleccionado}`)
  //y si el boton existe
  if(elBoton){
  //y le añade la clase visible
  elBoton.classList.add("visible");
  }
})*/
