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

        axios.post("controller/user_controller.php", formd)
          .then(response => {
            if (response.data == "1") {

              window.location.href = "view/index.php";
            } else {
              (User.alertaofaccess = "alert alert-danger"),
              (User.messagealert = "Error al iniciar sesion");
              User.btniniciartext = "Iniciando";

            }
          });
      }
    },
    accesoPro: () => {
      if (
        document.getElementById("user").value == 0 ||
        document.getElementById("password").value == 0
      ) {
        User.alertaofaccess = "alert alert-danger",
          User.messagealert = "Campos vacios";
      } else {
        let formd = new FormData();
        formd.append("option", "accessP");
        formd.append("user", document.getElementById("user").value);
        formd.append("password", document.getElementById("password").value);

        axios.post("controller/user_controller.php", formd)
          .then(response => {
            if (response.data == "1") {

              window.location.href = "view/index.php";
            } else {
              (User.alertaofaccess = "alert alert-danger"),
              (User.messagealert = "Error al iniciar sesion");

            }
          });
      }
    },
    registerUserAccount: () => {
      //variables iniciales para  registro de cuenta y validacion
      let password = document.getElementById("pass").value;
      let password2 = document.getElementById("pass2").value;
      var valspace = /\s/;
      let datos = {
        nombre: document.getElementById("nombre").value,
        appaterno: document.getElementById("ap-paterno").value,
        apmaterno: document.getElementById("ap-materno").value,
        correo: document.getElementById("correo").value,
        usuario: document.getElementById("usuario").value,
        password: password,
      };

      if (
        datos.nombre == 0 ||
        datos.appaterno == 0 ||
        datos.apmaterno == 0 ||
        datos.correo == 0 ||
        datos.usuario == 0 ||
        password == 0 ||
        password2 == 0
      ) {
        (User.alertavalidregister = "alert alert-danger"),
        (User.messagealertregister = "Existen campos vacios");
        return false;
      } else {
        if (valspace.test(password)) {
          (User.alertavalidregister = "alert alert-danger"),
          (User.messagealertregister =
            "La contraseña no debe tener espacios");
        } else {
          if (password == password2) {
            let formData = User.toFormData(datos, 'register', '0')
            axios
              .post("controller/user_controller.php", formData)
              .then(response => {
                if (response.data == "1") {
                  User.limpiarcajasRegistroAccount();
                  User.alertavalidregister = "alert alert-success",
                    User.messagealertregister = "Se ha registrado su cuenta exitosamente";
                } else {
                  (User.alertavalidregister = "alert alert-danger"),
                  (User.messagealertregister =
                    "Su cuenta no pudo registrarse " + response.data);
                }
              });

          } else {
            User.alertavalidregister = "alert alert-danger",
              User.messagealertregister = "Las contraseñas no coinciden";
          }
        }
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
