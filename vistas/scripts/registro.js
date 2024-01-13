function init() {
  $("#formulario").on("submit", function (e) {
    guardaryeditar(e);
  });

  $.post("../ajax/registro.php?op=identificacion", function (r) {
    $("#cat_id_identificacion").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_id_identificacion").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });

  $.post("../ajax/registro.php?op=provincia", function (r) {
    $("#cat_id_provincia").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_id_provincia").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });

  $.post("../ajax/registro.php?op=canton", function (r) {
    $("#cat_id_canton").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_id_canton").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });

  $.post("../ajax/registro.php?op=parroquia", function (r) {
    $("#cat_id_parroquia").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_id_parroquia").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });

  $.post("../ajax/registro.php?op=sector", function (r) {
    $("#cat_id_sector").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_id_sector").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });
}

$(document).ready(function () {
  // Inicializar Select2
  $(".select2").select2();
  $(".select2bs4").select2({ theme: "bootstrap4" });

  var stepper = new Stepper($(".bs-stepper")[0]);

  $(".btn-next").on("click", function () {
    stepper.next();
  });

  $(".btn-prev").on("click", function () {
    stepper.previous();
  });
});

function guardaryeditar(e) {
  e.preventDefault(); //no se activara la accion predeterminada
  $("#btnGuardar").prop("disabled", true);
  var formData = new FormData($("#formulario")[0]);

  $.ajax({
    url: "../ajax/registro.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function (datos) {
      bootbox.alert(datos);
      //tabla.ajax.reload();
      window.location.href = "loginsol.html";
    },
  });

  limpiar();
}

function limpiar() {
  $("#cat_id_identificacion").val("");
  $("#sol_identificacion").val("");
  $("#sol_correo").val("");

  $("#sol_nombre").val("");
  $("#sol_telefono").val("");
  $("#sol_direccion").val("");
  $("#cat_id_provincia").val("");
  $("#cat_id_canton").val("");
  $("#cat_id_sector").val("");
  $("#sol_clave").val("");
  $("#sol_id").val("");
  $("#claveu").val("");
}

function cancelarform() {
  window.location.href = "loginsol.html";
}

init();
