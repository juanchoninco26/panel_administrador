window.addEventListener('DOMContentLoaded', (e) => {
                
    const busqueda = document.querySelector('#search'); //buscador
    document.getElementById("datos").innerHTML = '';
    let datosUsuarios = [];

    //consultamos los datos al servidor local 
    const buscarDatos = async (url) => {
        const response = await fetch(url);
        const rta = await response.json();
        // console.log(rta);
        return rta
    }

    //mostrar datos 
    buscarDatos('../../llamadosApi/api/listaApiCrearUsuario.php')
        .then((data) => {
        vista(data)
        datosUsuarios = data;
        }
        )
        .catch(error => console.error('2  error:', error))

    const renderUsuarios = parametro => parametro.map(({Nombre,Id_empleado}) =>
        `<ul id='resultado'>${Nombre}<button><a onclick="return confirm('estas seguro de eliminar este dato?')" href="/php/eliminar.php?Id_empleado=${Id_empleado}">x Quitar</a></button></ul>`).join(' ');

    //me muestra los datos filtados en la consola
    busqueda.addEventListener('keyup', event => {
        const criteriosBusqueda = datosUsuarios.filter(data => data.Nombre.toLowerCase().includes(busqueda.value.toLowerCase())) //captura el valor ingresado

        //funciona, hay que arreglar la parte visual
        //https://www.youtube.com/watch?v=6zii2I6LlT0 minuto:57:40

        const htmlUsuarios = renderUsuarios(criteriosBusqueda);
        document.querySelector("#datos").innerHTML = htmlUsuarios;
        event.preventDefault();
    })
    function vista(params) {
        const renderUsuarios = parametro => parametro.map(({Nombre,Id_empleado}) =>
        `<ul id='resultado'>${Nombre}<button><a onclick="return confirm('estas seguro de eliminar este dato?')" href="/php/eliminar.php?Id_empleado=${Id_empleado}">x Quitar</a></button></ul>`).join(' ');

        const htmlUsuarios =renderUsuarios(params)
        document.querySelector("#datos").innerHTML = htmlUsuarios;
    }
    e.preventDefault();
})