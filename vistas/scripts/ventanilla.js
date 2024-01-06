var tabla;

//funcion que se ejecuta al inicio
function init() {
  mostrarform(false);
  listar();

  $("#formulario").on("submit", function (e) {
    guardaryeditar(e);
  });
  //cargamos los items al celect categoria
  $.post("../ajax/ventanilla.php?op=estado", function (r) {
    $("#cat_id_estado").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_id_estado").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
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
        url: "../ajax/ventanilla.php?op=listar",
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

//funcion para guardaryeditar
function guardaryeditar(e) {
  e.preventDefault(); // Detiene la acción por defecto del formulario

  $("#btnGuardar").prop("disabled", true);
  var formData = new FormData($("#formulario")[0]);

  $.ajax({
    url: "../ajax/ventanilla.php?op=guardaryeditar",
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

function mostrar(tra_id) {
  $.post(
    "../ajax/ventanilla.php?op=mostrar",
    { tra_id: tra_id },
    function (data, status) {
      data = JSON.parse(data);
      mostrarform(true);
      $("#tra_id").val(data.tra_id);
      $("#sol_nombre").val(data.sol_nombre);
      $("#doc_url").val(data.doc_url);
      $("#tra_id").val(data.tra_id);
    }
  );
}
init();
