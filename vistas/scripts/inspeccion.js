var tabla;
var tablaConstrucciones;
var tablaInfraestructura;
var tablaSueloUsos;
var tablaAccionesApoyo;
//funcion que se ejecuta al inicio
function init() {
  mostrarform(false);
  mostrarform_const(false);
  mostrarform_tenen(false);
  listar();
  listar_construcciones();
  listar_infraestructura();
  listar_suelousos();
  listar_apoyo();

  $("#form_construccion").on("submit", function (e) {
    guardar_const(e);
  });

  $("#form_tenencia").on("submit", function (e) {
    guardaryeditar_tenencia(e);
  });
  //cargamos los items al select categoria

  /* select explicación */
  $.post("../ajax/inspeccion.php?op=explicacion", function (r) {
    $("#cat_explicacion").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_explicacion").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });
  /* select vias de acceso */
  $.post("../ajax/inspeccion.php?op=vias", function (r) {
    $("#cat_vias").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_vias").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });
  /* select infraestructura */
  $.post("../ajax/inspeccion.php?op=infraestructura", function (r) {
    $("#cat_infraestructura").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_infraestructura").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });
  /* select historia */
  $.post("../ajax/inspeccion.php?op=historia", function (r) {
    $("#cat_historia").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_historia").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });
  /* select obtencion */
  $.post("../ajax/inspeccion.php?op=obtencion", function (r) {
    $("#cat_tenencia").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_tenencia").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });

  /* select construccion */

  $.post("../ajax/inspeccion.php?op=construccion", function (r) {
    $("#cat_construccion").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_construccion").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });

  /* select materiales */

  $.post("../ajax/inspeccion.php?op=materiales", function (r) {
    $("#cat_materiales").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_materiales").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });

  /* select estado construccion */

  $.post("../ajax/inspeccion.php?op=estado_construccion", function (r) {
    $("#cat_estado_construccion").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_estado_construccion").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });
  /* select concepto */
  $.post("../ajax/inspeccion.php?op=concepto", function (r) {
    $("#cat_concepto").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_concepto").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });
  /* select concepto suelo */
  $.post("../ajax/inspeccion.php?op=concepto_suelo", function (r) {
    $("#cat_concepto_suelo").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_concepto_suelo").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });
  /* select estado suelo */
  $.post("../ajax/inspeccion.php?op=estado_suelo", function (r) {
    $("#cat_estado_suelo").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_estado_suelo").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });
  /* select destino economico */
  $.post("../ajax/inspeccion.php?op=destino_economico", function (r) {
    $("#cat_destino_economico").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_destino_economico").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });
  /* select infraestructura */
  $.post("../ajax/inspeccion.php?op=estado_infraestructura", function (r) {
    $("#cat_estado_infraestructura").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_estado_infraestructura").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });
  /* select tipo_posesion */
  $.post("../ajax/inspeccion.php?op=tipo_posesion", function (r) {
    $("#cat_tipo_posesion").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_tipo_posesion").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });
}

//funcion limpiar
function limpiar() {
  $("#cat_id").val("");
  $("#cat_nombre").val("");
  $("#cat_descripcion").val("");
  $("#cat_padre").val("");
}

function limpiar_construcciones() {
  $("#superficie").val("");
  $("#edad_const").val("");
  $("#tiempo_ocupacion").val("");
}

//funcion mostrar formulario
function mostrarform(flag) {
  limpiar();
  if (flag) {
    $("#tblsolicitantes").hide();
    $("#tblsolicitantes_wrapper").hide();
    $("#informe_tecnico").show();
    $("#informe_plan").show();
    $("#btnGuardar").prop("disabled", false);
    $("#btnagregar").hide();
  } else {
    $("#tblsolicitantes").show();
    $("#tblsolicitantes_wrapper").show();
    $("#informe_tecnico").hide();
    $("#informe_plan").hide();
    $("#btnagregar").show();
  }
}

function mostrarform_const(flag2) {
  limpiar();
  if (flag2) {
    $("#tblconstruccion").hide();
    $("#tblconstruccion_wrapper").hide();
    $("#btnGuardar_const").prop("disabled", false);
    $("#btnAgregar_const").hide();
    $("#btnRegresar").show();
    $("#formulariocons").show();
  } else {
    $("#tblconstruccion").show();
    $("#tblconstruccion_wrapper").show();
    $("#btnAgregar_const").show();
    $("#btnRegresar").hide();
    $("#formulariocons").hide();
  }
}

function mostrarform_tenen(flag3) {
  limpiar();
  if (flag3) {
    $("#btnGuardar_Tenencia").prop("disabled", false);
    $("#btnAgregar_ten").show();
    $("#btnRegresar_tenencia").show();
    $("#formtenencia").show();
  } else {
    $("#btnAgregar_ten").hide();
    $("#btnRegresar_tenencia").hide();
    $("#formtenencia").hide();
  }
}

//Funcion regresar
$("#btnRegresar").on("click", function () {
  mostrarform_const(false); // Puedes ajustar esto según tu lógica
});

$("#btnRegresar_tenencia").on("click", function () {
  mostrarform_tenen(false); // Puedes ajustar esto según tu lógica
});

/* Listar Solicitantes */
function listar() {
  tabla = $("#tblsolicitantes")
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

/* Listar construcciones */
function listar_construcciones() {
  tablaConstrucciones = $("#tblconstruccion").DataTable({
    ajax: {
      url: "../ajax/inspeccion.php?op=listar_construcciones",
      type: "get",
      dataType: "json",
      error: function (e) {
        console.log(e.responseText);
      },
    },
    /* initComplete: function deshabilitar_boton() {
      console.log(registros); // Agrega esta línea para verificar el valor de registros

      // Verificar si hay registros
      var registros = tablaConstrucciones.rows().data().length;

      // Obtener el botón btn_Ocultar
      var btnOcultar = $("#btn_Ocultar");

      // Habilitar o deshabilitar el botón según la cantidad de registros
      if (registros > 0) {
        btnOcultar.prop("disabled", false);
      } else {
        btnOcultar.prop("disabled", true);
      }
    }, */
  });
}

/* Listar infraestructura */
function listar_infraestructura() {
  tabla = $("#tblinfraestructura")
    .dataTable({
      ajax: {
        url: "../ajax/inspeccion.php?op=listar_infraestructura",
        type: "get",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
      },
    })
    .DataTable();
}
/* Listar uso de suelos */
function listar_suelousos() {
  tabla = $("#tblusosuelo")
    .dataTable({
      ajax: {
        url: "../ajax/inspeccion.php?op=listar_usosuelos",
        type: "get",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
      },
    })
    .DataTable();
}

/* Listar apoyo */
function listar_apoyo() {
  tabla = $("#tblaccionesapoyo")
    .dataTable({
      ajax: {
        url: "../ajax/inspeccion.php?op=listar_apoyo",
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

/* function mostrar(pro_id) {
  $.post(
    "../ajax/inspeccion.php?op=mostrar",
    { pro_id: pro_id },
    function (data, status) {
      // Parsear la cadena JSON
      var jsonData = JSON.parse(data);

      // Mostrar los valores en los input
      mostrarform(true);
      $("#provincia").val(jsonData.provincia);
      $("#canton").val(jsonData.canton);
      $("#parroquia").val(jsonData.parroquia);
      $("#sector").val(jsonData.sector);
    }
  );
} */

function mostrar(pro_id) {
  $.ajax({
    url: "../ajax/inspeccion.php?op=mostrar&pro=" + pro_id,
    type: "POST",
    contentType: false,
    processData: false,
    success: function (datos) {
      data = JSON.parse(datos);
      $("#provincia").val(data.provincia);
      $("#canton").val(data.canton);
      $("#parroquia").val(data.parroquia);
      $("#sector").val(data.sector);
      $("#pro_id_cons").val(data.pro_id);
      $("#pro_id_tenencia").val(data.pro_id);

      mostrarform(true);
    },
  });

  /*  $.post(
    ,
    { pro_id: pro_id },
    function (data, status) {
      //data = JSON.parse(data);
      alert(data);
      /* mostrarform(true);
      $("#pro_id").val(data.pro_id);

      $("#provincia").val(data.provincia);
      $("#canton").val(data.parroquia);
      $("#parroquia").val(data.parroquia);
      $("#sector").val(data.sector);*/
}

function mostrar2(pro_id) {
  $.ajax({
    url: "../ajax/inspeccion.php?op=mostrar_ten&pro=" + pro_id,
    type: "POST",
    contentType: false,
    processData: false,
    success: function (datos) {
      data = JSON.parse(datos);
      $("#cat_tenencia").val(data.forma_tenencia);
      $("#cat_historia").val(data.historia_tenencia);
      $("#cat_tipo_posesion").val(data.obtencion_predio);
      $("#tiempo_posesion").val(data.tiempo_posesion);
      $("#tenencia_observaciones").val(data.observaciones);
    },
  });
}
function eliminar_construcciones(ins_id) {
  bootbox.confirm("¿Esta seguro de eliminar este dato?", function (result) {
    if (result) {
      $.post(
        "../ajax/inspeccion.php?op=eliminar",
        { ins_id: ins_id },
        function (e) {
          bootbox.alert(e);
          tablaConstrucciones.ajax.reload();
        }
      );
    }
  });
}

function guardar_const(e) {
  e.preventDefault(); //no se activara la accion predeterminada
  $("#btnGuardar_const").prop("disabled", false);
  var formData = new FormData($("#form_construccion")[0]);

  $.ajax({
    url: "../ajax/inspeccion.php?op=guardar_construccion",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function (datos) {
      bootbox.alert(datos);
      tablaConstrucciones.ajax.reload();
    },
  });

  limpiar_construcciones();
}

function guardaryeditar_tenencia(e) {
  e.preventDefault(); //no se activara la accion predeterminada
  $("#btnGuardar_Tenencia").prop("disabled", false);
  var formData = new FormData($("#form_tenencia")[0]);

  $.ajax({
    url: "../ajax/inspeccion.php?op=guardaryeditar_tenencia",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function (datos) {
      bootbox.alert(datos);
    },
  });
}

init();
