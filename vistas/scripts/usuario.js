$.post("../ajax/usuario.php?op=permisos&id=", function (r) {
  // Suponiendo que r contiene el estado del permiso (true/false)
  // Puedes usar la respuesta de la solicitud AJAX para marcar o desmarcar el checkbox
  if (r === "true") {
    $("#permiso").prop("checked", true); // Marcar el checkbox
  } else {
    $("#permiso").prop("checked", false); // Desmarcar el checkbox
  }
});
