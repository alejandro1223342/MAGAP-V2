var tabla;

//funcion que se ejecuta al inicio
function init() {
  mostrarform(false);
  listar();

  $("#formulario").on("submit", function (e) {
    guardaryeditar(e);
  });

  $.post("../ajax/usuario.php?op=permisos&id=", function (r) {
    $("#permiso").html(r);
  });
}

function mostrarform(flag) {
  limpiar();
  if (flag) {
    $("#tbllistado").show();
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
        url: "../ajax/usuario.php?op=listar",
        type: "get",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
      },
    })
    .DataTable();
}

function limpiar() {
  $("#usu_nombre").val("");
  $("#usu_cedula").val("");
  $("#usu_telefono").val("");
  $("#usu_correo").val("");
  $("#usu_cargo").val("");
  $("#usu_login").val("");
  $("#usu_clave").val("");
  $("#usu_id").val("");
  $("#claveu").val("");
}

function cancelarform() {
  limpiar();
  mostrarform(false);
}

//funcion para desactivar
function desactivar(usu_id) {
  bootbox.confirm("¿Esta seguro de desactivar este dato?", function (result) {
    if (result) {
      $.post(
        "../ajax/usuario.php?op=desactivar",
        { usu_id: usu_id },
        function (e) {
          bootbox.alert(e);
          tabla.ajax.reload();
        }
      );
    }
  });
}

function activar(usu_id) {
  bootbox.confirm("¿Esta seguro de activar este dato?", function (result) {
    if (result) {
      $.post(
        "../ajax/usuario.php?op=activar",
        { usu_id: usu_id },
        function (e) {
          bootbox.alert(e);
          tabla.ajax.reload();
        }
      );
    }
  });
}

function mostrar(usu_id) {
  $.post(
    "../ajax/usuario.php?op=mostrar",
    { usu_id: usu_id },
    function (data, status) {
      data = data
        .trim()
        .substring(2, data.length - 1)
        .split('","');
      mostrarform(true);
      $("#usu_nombre").val(data[1]);
      $("#usu_cedula").val(data[2]);
      $("#usu_telefono").val(data[3]);
      $("#usu_correo").val(data[4]);
      $("#usu_cargo").val(data[5]);
      $("#usu_login").val(data[6]);
      $("#usu_clave").val(data[7]);
      $("#claveu").val(data[7]);
      $("#usu_id").val(usu_id);
    }
  );
  $.post("../ajax/usuario.php?op=permisos&id=" + usu_id, function (r) {
    $("#permiso").html(r);
  });
}

//funcion para guardaryeditar
function guardaryeditar(e) {
  e.preventDefault(); //no se activara la accion predeterminada
  $("#btnGuardar").prop("disabled", true);
  var formData = new FormData($("#formulario")[0]);

  $.ajax({
    url: "../ajax/usuario.php?op=guardaryeditar",
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
