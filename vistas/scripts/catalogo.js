var tabla;

//funcion que se ejecuta al inicio
function init() {
  mostrarform(false);
  listar();

  $("#formulario").on("submit", function (e) {
    guardaryeditar(e);
  });
  //cargamos los items al celect categoria
  $.post("../ajax/catalogo.php?op=padres", function (r) {
    $("#cat_padre").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_padre").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });
}

$(document).ready(function () {
  // Inicializar Select2
  $(".select2").select2();
  $(".select2bs4").select2({ theme: "bootstrap4" });
});

//funcion limpiar
function limpiar() {
  $("#cat_id").val("");
  $("#cat_nombre").val("");
  $("#cat_descripcion").val("");
  $("#cat_padre").val("");
}

//funcion mostrar formulario
function mostrarform(flag) {
  limpiar();
  if (flag) {
    $("#tbllistado").hide();
    $("#tbllistado_wrapper").hide();
    $("#formularioregistros").show();
    $("#btnGuardar").prop("disabled", false);
    $("#btnagregar").hide();
  } else {
    $("#tbllistado").show();
    $("#tbllistado_wrapper").show();
    $("#formularioregistros").hide();
    $("#btnagregar").show();
  }
}

function listar() {
  tabla = $("#tbllistado")
    .dataTable({
      ajax: {
        url: "../ajax/catalogo.php?op=listar",
        type: "get",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
      },
    })
    .DataTable();
}

function cancelarform() {
  limpiar();
  mostrarform(false);
}

init();
