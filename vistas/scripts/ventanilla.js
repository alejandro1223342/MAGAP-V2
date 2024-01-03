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

init();
