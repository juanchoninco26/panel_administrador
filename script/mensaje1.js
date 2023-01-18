//alerta que avisa la compativilidad de las contraseñas ingresadas
// editar perfil
function mensaje() {
     if (confirm("error! las contraseñas no conciden") == true) {
         window.location.href = '/usuarios/gerente/editar-perfil.php';
     } else {
         window.location.href = '/usuarios/gerente/editar-perfil.php';
     }
}
mensaje();
