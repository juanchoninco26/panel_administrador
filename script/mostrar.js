function mostrar() {
    document.getElementById('buscador').style.display='block';
}
function ocultar() {
    document.getElementById('buscador').style.display='none';
}

function guardarUsuario() {
  alert('usuario guardado correctamente');
}

function obtener(){
  $("table").on("click",".btn", function() {
    console.log("ID del elemento td: ", $(this).parent().attr("id"));
  });
}


//campo para agregar la foto que va a ser de perfil
const $seleccionArchivos = document.querySelector("#seleccionArchivos"),
  $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");

// Escuchar cuando cambie
$seleccionArchivos.addEventListener("change", () => {
  // Los archivos seleccionados, pueden ser muchos o uno
  const archivos = $seleccionArchivos.files;
  // Si no hay archivos salimos de la función y quitamos la imagen
  if (!archivos || !archivos.length) {
    $imagenPrevisualizacion.src = "";
    return;
  }
  // Ahora tomamos el primer archivo, el cual vamos a previsualizar
  const primerArchivo = archivos[0];
  // Lo convertimos a un objeto de tipo objectURL
  const objectURL = URL.createObjectURL(primerArchivo);
  // Y a la fuente de la imagen le ponemos el objectURL
  $imagenPrevisualizacion.src = objectURL;
});

