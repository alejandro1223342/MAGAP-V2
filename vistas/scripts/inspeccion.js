var tabla;
var tablaConstrucciones;
var tablaCoordenadas;
var tablaAgropecuaria;
var tablaSueloUsos;
var tablaApoyo;

//funcion que se ejecuta al inicio
function init() {
  mostrarform(false);
  mostrarform_const(false);
  mostrarform_coor(false);
  mostrarform_agro(false);
  mostrarform_suelos(false);
  mostrarform_apoyo(false);
  listar();
  listar_construcciones();
  listar_coordenadas();
  listar_agro();
  listar_suelousos();
  listar_apoyo();

  $("#form_construccion").on("submit", function (e) {
    guardar_const(e);
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
  /* select tipo_posesion */
  $.post("../ajax/inspeccion.php?op=tipo_posesion", function (r) {
    $("#cat_tipo_posesion").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_tipo_posesion").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });
  /* select concepto */
  $.post("../ajax/inspeccion.php?op=concepto", function (r) {
    $("#cat_concepto").html(r); // Actualiza el contenido del select con la respuesta del servidor
    $("#cat_concepto").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
  });

  /* select infraestructura agropecuaria*/
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

function mostrar(pro_id) {
  $.ajax({
    url: "../ajax/inspeccion.php?op=mostrar&pro=" + pro_id,
    type: "POST",
    contentType: false,
    processData: false,
    success: function (datos) {
      data = JSON.parse(datos);

      // Asigna el valor al input con id 'provincia'
      $("#pro_id").val(data.pro_id);
      $("#provincia").val(data.provincia);
      // Asigna el valor al label con id 'provi'
      // Resto de tu código...
      $("#canton").val(data.canton);
      $("#parroquia").val(data.parroquia);
      $("#sector").val(data.sector);
      $("#pro_id_cons").val(data.pro_id);
      $("#pro_id_tenencia").val(data.pro_id);

      mostrarform(true);
    },
  });
}

function mostrar2(pro_id) {
  $.ajax({
    url: "../ajax/inspeccion.php?op=mostrar_ten&pro=" + pro_id,
    type: "POST",
    contentType: false,
    processData: false,
    success: function (datos) {
      data = JSON.parse(datos);
      $("#ins_tenencia").val(data.ins_id);
      $("#cat_tenencia").val(data.forma_tenencia);
      $("#cat_historia").val(data.historia_tenencia);
      $("#cat_tipo_posesion").val(data.obtencion_predio);
      $("#tiempo_posesion").val(data.tiempo_posesion);
      $("#tenencia_observaciones").val(data.observaciones);
    },
  });
}

//funcion mostrar formulario
function mostrarform(flag) {
  limpiar();
  if (flag) {
    $("#tblsolicitantes").hide();
    $("#tblsolicitantes_wrapper").hide();
    $("#informe_tecnico").show();
    $("#plan_manejo").show();
    $("#informe_rural").show();
    $("#btnGuardar").prop("disabled", false);
    $("#btnagregar").hide();
  } else {
    $("#tblsolicitantes").show();
    $("#tblsolicitantes_wrapper").show();
    $("#informe_tecnico").hide();
    $("#plan_manejo").hide();
    $("#informe_rural").hide();
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

function mostrarform_coor(flag3) {
  limpiar();
  if (flag3) {
    $("#tblcoordenadas").hide();
    $("#tblcoordenadas_wrapper").hide();
    $("#btnGuardar_coor").prop("disabled", false);
    $("#btnAgregar_coor").hide();
    $("#btnRegresar_coor").show();
    $("#formulariocoor").show();
  } else {
    $("#tblcoordenadas").show();
    $("#tblcoordenadas_wrapper").show();
    $("#btnAgregar_coor").show();
    $("#btnRegresar_coor").hide();
    $("#formulariocoor").hide();
  }
}

function mostrarform_agro(flag4) {
  limpiar();
  if (flag4) {
    $("#tblagropecuario").hide();
    $("#tblagropecuario_wrapper").hide();
    $("#btnGuardar_agro").prop("disabled", false);
    $("#btnAgregar_agro").hide();
    $("#btnRegresar_agro").show();
    $("#formularioagro").show();
  } else {
    $("#tblagropecuario").show();
    $("#tblagropecuario_wrapper").show();
    $("#btnAgregar_agro").show();
    $("#btnRegresar_agro").hide();
    $("#formularioagro").hide();
  }
}

function mostrarform_suelos(flag5) {
  limpiar();
  if (flag5) {
    $("#tblusosuelo").hide();
    $("#tblusosuelo_wrapper").hide();
    $("#btnGuardar_suelo").prop("disabled", false);
    $("#btnAgregar_suelo").hide();
    $("#btnRegresar_suelos").show();
    $("#formulariousosuelo").show();
  } else {
    $("#tblusosuelo").show();
    $("#tblusosuelo_wrapper").show();
    $("#btnAgregar_suelo").show();
    $("#btnRegresar_suelos").hide();
    $("#formulariousosuelo").hide();
  }
}

function mostrarform_apoyo(flag6) {
  limpiar();
  if (flag6) {
    $("#tblaccionesapoyo").hide();
    $("#tblaccionesapoyo_wrapper").hide();
    $("#btnGuardar_apoyo").prop("disabled", false);
    $("#btnAgregar_apoyo").hide();
    $("#btnRegresar_apoyo").show();
    $("#formularioapoyo").show();
  } else {
    $("#tblaccionesapoyo").show();
    $("#tblaccionesapoyo_wrapper").show();
    $("#btnAgregar_apoyo").show();
    $("#btnRegresar_apoyo").hide();
    $("#formularioapoyo").hide();
  }
}
function mostrar(pro_id) {
  $.ajax({
    url: "../ajax/inspeccion.php?op=mostrar&pro=" + pro_id,
    type: "POST",
    contentType: false,
    processData: false,
    success: function (datos) {
      data = JSON.parse(datos);

      // Asigna el valor al input con id 'provincia'
      $("#pro_id").val(data.pro_id);
      $("#nombres").val(data.sol_nombre);
      $("#identificacion").val(data.sol_identificacion);

      $("#provincia").val(data.provincia);
      // Asigna el valor al label con id 'provi'
      // Resto de tu código...
      $("#canton").val(data.canton);
      $("#parroquia").val(data.parroquia);
      $("#sector").val(data.sector);
      $("#pro_id_cons").val(data.pro_id);
      $("#pro_id_tenencia").val(data.pro_id);
      $("#pro_id_coor").val(data.pro_id);

      mostrarform(true);
    },
  });
}

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
  });
}

/* Listar construcciones */
function listar_coordenadas() {
  tablaCoordenadas = $("#tblcoordenadas").DataTable({
    ajax: {
      url: "../ajax/inspeccion.php?op=listar_coordenadas",
      type: "get",
      dataType: "json",
      error: function (e) {
        console.log(e.responseText);
      },
    },
  });
}

/* Listar infraestructura agropecuaria */
function listar_agro() {
  tablaAgropecuaria = $("#tblagropecuario").DataTable({
    ajax: {
      url: "../ajax/inspeccion.php?op=listar_agropecuaria",
      type: "get",
      dataType: "json",
      error: function (e) {
        console.log(e.responseText);
      },
    },
  });
}

function listar_suelousos() {
  tablaSueloUsos = $("#tblusosuelo").dataTable({
    ajax: {
      url: "../ajax/inspeccion.php?op=listar_usosuelos",
      type: "get",
      dataType: "json",
      error: function (e) {
        console.log(e.responseText);
      },
    },
  });
}

function listar_apoyo() {
  tablaApoyo = $("#tblaccionesapoyo").dataTable({
    ajax: {
      url: "../ajax/inspeccion.php?op=listar_apoyo",
      type: "get",
      dataType: "json",
      error: function (e) {
        console.log(e.responseText);
      },
    },
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

//Funcion regresar
$("#btnRegresar").on("click", function () {
  mostrarform_const(false); // Puedes ajustar esto según tu lógica
});

$("#btnRegresar_coor").on("click", function () {
  mostrarform_coor(false); // Puedes ajustar esto según tu lógica
});

$("#btnRegresar_agro").on("click", function () {
  mostrarform_agro(false); // Puedes ajustar esto según tu lógica
});

$("#btnRegresar_suelos").on("click", function () {
  mostrarform_suelos(false); // Puedes ajustar esto según tu lógica
});

$("#btnRegresar_apoyo").on("click", function () {
  mostrarform_apoyo(false); // Puedes ajustar esto según tu lógica
});

$(document).ready(function () {
  var stepper = new Stepper(document.querySelector(".bs-stepper"));

  $(".btn-primary").on("click", function () {
    stepper.next();
  });

  $(".btn-secondary").on("click", function () {
    stepper.previous();
  });
});

/*API MAPS*/

// Función para cargar automáticamente la latitud y longitud
function cargarCoordenadas() {
  // Verificar si el navegador soporta la geolocalización
  if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(function (position) {
      // Obtener la latitud y longitud de la posición actual
      var latitud = position.coords.latitude;
      var longitud = position.coords.longitude;

      // Asignar los valores a los campos de entrada correspondientes
      document.getElementById("latitud").value = latitud;
      document.getElementById("longitud").value = longitud;
    });
  } else {
    // El navegador no soporta la geolocalización
    console.log("Geolocalización no está disponible en este navegador.");
  }
}

// Llamar a la función para cargar las coordenadas al cargar la página
window.onload = function () {
  cargarCoordenadas();
};

init();
