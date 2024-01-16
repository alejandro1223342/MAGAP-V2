var tabla;

//funcion que se ejecuta al inicio
function init() {
  mostrarform(false);
  listar();
  listar_construcciones();
  listar_infraestructura();
  listar_suelousos();
  listar_apoyo();

  $("#formulario").on("submit", function (e) {
    guardaryeditar(e);
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

  $.post("../ajax/inspeccion.php?op=estado_infraestructura", function (r) {
    $("#cat_estado_infraestructura").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_estado_infraestructura").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });
}

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
  tabla2 = $("#tblconstruccion")
    .dataTable({
      ajax: {
        url: "../ajax/inspeccion.php?op=listar_construcciones",
        type: "get",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
      },
    })
    .DataTable();
}
/* Listar infraestructura */
function listar_infraestructura() {
  tabla3 = $("#tblinfraestructura")
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
  tabla4 = $("#tblusosuelo")
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
  tabla5 = $("#tblaccionesapoyo")
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
      $("#pro_id").val(data.pro_id);
      $("#provincia").val(data.provincia);
      $("#canton").val(data.canton);
      $("#parroquia").val(data.parroquia);
      $("#sector").val(data.sector);
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

init();
