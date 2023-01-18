//selecionamos el id click para agregarle un evento de funcion
document.getElementById('click').onclick = function(){ click(),desplegar_paquete()};

function click(){
  //seleccionamos el id del html
  var x = document.getElementById("sub-b");

  //se compara con la clase
  if (x.className === "sub-a") {
    x.className = "responsive";
  } else {
    x.className = "sub-a";
  }
}
function desplegar_paquete() {

  var a = document.getElementById("cajaInicial");

  if (a.className === "displayCaja") {
    a.className = "cajaInicial";
  } else {
    a.className == "displayCaja";
  }
}

