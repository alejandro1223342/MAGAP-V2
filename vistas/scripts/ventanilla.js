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
        $("#sol_iden").val(data.sol_identificacion);
        $("#tra_id").val(data.tra_id);

        // Lógica para DataTables
        let tabla = $('#tabla_pdf').DataTable({
          "serverSide": true,
          "ajax": {
            url: '../ajax/ventanilla.php?op=tabla',
            type: "GET",
            dataType: "json",
            error: function (e) {
              console.log(e.responseText);
            },
          },
          "destroy": true,
          "pageLength": 15,
          "order": [[0, "desc"]],
          "columnDefs": [
            {"targets": [0], "visible": true, "searchable": true, "orderable": false},
            {"targets": [6], "visible": false, "searchable": false},
          ],
          "createdRow": function (row, data) {
            //Renderizar CheckBox en la columna 5
            $('td', row).eq(5).html(data[1]);
            // Renderizar TextBox en la columna 5
            $('td', row).eq(5).html(data[5]);
          }
        });

        // Evento cuando DataTables termina de dibujar la tabla
        tabla.on('draw.dt', function () {
          cargarDatosGuardados();
        });

        // Evento click para los botones .btn-modal dentro de la tabla
        $('#tabla_pdf tbody').on('click', '.btn.btn-dropbox.btn-xs', function (event) {
          event.preventDefault(); // Evitar el comportamiento predeterminado del enlace o botón

          let data = tabla.row($(this).parents('tr')).data();
          let url = data[6]; // Utiliza el nombre correcto del campo que contiene la URL
          openModal(url); // Abrir modal
        });
      }
  );
}


function openModal(url) {
  let modal = document.querySelector('#my-modal');
  modal.style.display = 'block';

  let iframe = document.querySelector('#modal-iframe');
  iframe.src = url;

  let closeBtn = document.querySelector('.close');
  closeBtn.addEventListener('click', closeModal);

  window.addEventListener('click', outsideClick);
}

function closeModal() {
  let modal = document.querySelector('#my-modal');
  modal.style.display = 'none';

  let closeBtn = document.querySelector('.close');
  closeBtn.removeEventListener('click', closeModal);

  window.removeEventListener('click', outsideClick);
}

function outsideClick(e) {
  let modal = document.querySelector('#my-modal');
  if (e.target === modal) {
    closeModal();
  }
}

function guardar() {
  event.preventDefault();
  let fila = $(event.target).closest('tr');
  let datosFila = {
    cat_id_estado: fila.find('input[type="checkbox"]').is(':checked') ? 18 : 28,
    tra_id: fila.find('td:eq(2)').text(),
    pro_observacion: fila.find('input[type="text"]').val(),
  };

  $.ajax({
    url: '../ajax/ventanilla.php?op=guardardocumento',
    type: 'POST',
    data: datosFila,
    success: function (response) {
      bootbox.alert("Documento guardado correctamente");

      // Manejar la respuesta del servidor
      let estado = response.cat_id_estado;
      let observacion = response.pro_observacion;

      // Modificar la tabla y almacenar los cambios en localStorage
      let estadoTexto = estado === '18' ? 'Aprobado' : 'No Aprobado';
      fila.find('td:eq(1)').text(estadoTexto);
      fila.find('td:eq(5)').text(observacion).prop('readonly', true);
      fila.find('td:last').html('<button class="btn btn-editar">Editar</button>');

      // Almacenar los cambios en localStorage
      guardarCambiosEnLocalStorage(fila.index(), estado, observacion);

      // Manejador de eventos para el botón Editar
      $('.btn-editar').on('click', function () {
        event.preventDefault();
        let originalHtml = $(this).parent().html();
        let originalEstado = fila.find('td:eq(1)').text();
        let originalObservacion = fila.find('td:eq(5)').text();

        fila.find('td:eq(1)').html('<input type="checkbox" checked="' + (estado === '18') + '">');
        fila.find('td:eq(5)').html('<input type="text" value="' + observacion + '">');
        fila.find('td:last').html('<button class="btn btn-guardar">Guardar</button><button class="btn btn-cancelar">Cancelar</button>');

        // Manejadores de eventos para los nuevos botones
        $('.btn-guardar').on('click', function () {
          event.preventDefault();
          // Acciones para guardar
          // ...

          // Restaurar el botón Editar al guardar
          fila.find('td:last').html(originalHtml);
        });

        $('.btn-cancelar').on('click', function () {
          event.preventDefault();
          // Restaurar valores originales al cancelar
          fila.find('td:eq(1)').text(originalEstado);
          fila.find('td:eq(5)').text(originalObservacion).prop('readonly', true);

          // Restaurar el botón Editar al cancelar
          fila.find('td:last').html(originalHtml);
        });
      });

    },
    error: function (error) {
      console.log("Algo salió mal: " + error);
    }
  });
}

// Función para almacenar los cambios en localStorage
function guardarCambiosEnLocalStorage(index, estado, observacion) {
  let cambios = {
    cat_id_estado: estado,
    pro_observacion: observacion
  };
  localStorage.setItem('fila_' + index, JSON.stringify(cambios));
}

function cargarDatosGuardados() {
  $('#tabla_pdf tbody tr').each((index, element) => {
    let cambios = localStorage.getItem('fila_' + index);
    if (cambios) {
      let datos = JSON.parse(cambios);
      let estado = datos.cat_id_estado;
      let estadoTexto = estado === '18' ? 'Aprobado' : 'No Aprobado';
      $(element).find('td:eq(1)').text(estadoTexto).data('estado', estado);
      $(element).find('td:eq(5)').html('<input type="text" value="' + datos.pro_observacion + '" readonly>');
      $(element).find('td:last').html('<button class="btn btn-editar">Editar</button>');
    }
  });

  $('body').on('click', '.btn-editar', function(event) {
    event.preventDefault();
    let fila = $(this).closest('tr');
    let estado = fila.find('td:eq(1)').data('estado');

    if (estado === '18') {
      fila.find('td:eq(1)').html('<input type="checkbox" checked>');
    } else {
      fila.find('td:eq(1)').html('<input type="checkbox">');
    }

    fila.find('td:eq(5) input[type="text"]').prop('readonly', false);
    $(this).hide();
    fila.find('.btn-aceptar, .btn-cancelar').remove();
    fila.find('td:last').append('<button class="btn btn-aceptar">Aceptar</button><button class="btn btn-cancelar">Cancelar</button>');
  });

  $('body').on('click', '.btn-cancelar', function(event) {
    event.preventDefault();
    let fila = $(this).closest('tr');
    let estado = fila.find('td:eq(1)').data('estado');
    let estadoTexto = estado === '18' ? 'Aprobado' : 'No Aprobado';

    fila.find('td:eq(1)').text(estadoTexto);
    fila.find('td:eq(5) input[type="text"]').prop('readonly', true);
    fila.find('.btn-aceptar, .btn-cancelar').remove();
    fila.find('.btn-editar').show();
  });

  $('body').on('click', '.btn-aceptar', function(event) {
    event.preventDefault();
    guardar();
    let fila = $(this).closest('tr');
    fila.find('td:eq(1)').data('estado', fila.find('td:eq(1) input[type="checkbox"]').prop('checked') ? '18' : '28');
    fila.find('td:eq(5) input[type="text"]').prop('readonly', true);
    fila.find('.btn-aceptar, .btn-cancelar').remove();
    fila.find('.btn-editar').show();
  });
}

init();
