function mensaje() {
  if (confirm("error! las contraseñas no conciden") == true) {
  window.location.href='/usuarios/contador/editar-perfil.php';
 } else {
  window.location.href='/usuarios/contador/editar-perfil.php';
 }
}
mensaje();
