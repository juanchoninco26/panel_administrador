function mensaje() {
  if (confirm("error! las contraseñas no conciden") == true) {
  window.location.href='/usuarios/asesor/editar-perfil.php';
 } else {
  window.location.href='/usuarios/asesor/editar-perfil.php';
 }
}
mensaje();
