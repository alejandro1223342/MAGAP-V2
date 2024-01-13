var tabla;

//funcion que se ejecuta al inicio
function init() {
  mostrarform(false);
  listar();

  $("#formulario").on("submit", function (e) {
    guardaryeditar(e);
  });
  //cargamos los items al celect categoria
  $.post("../ajax/inspeccion.php?op=padres", function (r) {
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
    $("#formulariomotivo").show();
    $("#formularioplanmanejo").show();
    $("#btnGuardar").prop("disabled", false);
    $("#btnagregar").hide();
  } else {
    $("#tbllistado").show();
    $("#tbllistado_wrapper").show();
    $("#formulariomotivo").hide();
    $("#formularioplanmanejo").hide();
    $("#btnagregar").show();
  }
}

function listar() {
  tabla = $("#tbllistado")
    .dataTable({
      ajax: {
        url: "../ajax/inspeccion.php?op=listar",
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
  /*   mostrarform(false);
   */
}

//funcion para desactivar
function desactivar(cat_id) {
  bootbox.confirm("¿Esta seguro de desactivar este dato?", function (result) {
    if (result) {
      $.post(
        "../ajax/inspeccion.php?op=desactivar",
        { cat_id: cat_id },
        function (e) {
          bootbox.alert(e);
          tabla.ajax.reload();
        }
      );
    }
  });
}

function activar(cat_id) {
  bootbox.confirm("¿Esta seguro de activar este dato?", function (result) {
    if (result) {
      $.post(
        "../ajax/inspeccion.php?op=activar",
        { cat_id: cat_id },
        function (e) {
          bootbox.alert(e);
          tabla.ajax.reload();
        }
      );
    }
  });
}

//funcion para guardaryeditar
function guardaryeditar(e) {
  e.preventDefault(); // Detiene la acción por defecto del formulario

  $("#btnGuardar").prop("disabled", true);
  var formData = new FormData($("#formulario")[0]);

  $.ajax({
    url: "../ajax/inspeccion.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function (datos) {
      bootbox.alert(datos);
      mostrarform(false);
      tabla.ajax.reload();
    },
  });

  limpiar();
}
init();
