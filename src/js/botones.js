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
})