var tabla;
var tabla_pdf;

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
    $(".select2bs4").select2({theme: "bootstrap4"});
});

//funcion limpiar
function limpiar() {
    $("#cat_id").val("");
    $("#cat_nombre").val("");
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

function guardaryeditar(e) {
    e.preventDefault();

    $("#btnGuardar").prop("disabled", true);

    // Obtener datos de la tabla y agregarlos a formData
    var tableData = [];
    $("#tabla_pdf tbody tr").each(function (index, row) {
        // Obtener valor de la columna 01
        var cellValue = $(row).find("td:eq(1)").text();

        var rowData = {
            tra_id: cellValue
        };

        tableData.push(rowData);
    });

    // Empaquetar los datos en un objeto FormData
    var formData = new FormData();
    formData.append('tabla_pdf', JSON.stringify(tableData));


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
        error: function (xhr, status, error) {
            console.error("Error en la solicitud AJAX:", error);
        }
    });

    limpiar();
}






/*function mostrar(tra_id) {
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
        }
    );
}*/

function mostrarTabla(s_ident) {
    mostrarform(true);
    tabla_pdf = $('#tabla_pdf').DataTable({
        "serverSide": true,
        "ajax": {
            url: '../ajax/ventanilla.php?op=tabla&s_ident=' + s_ident,
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
            {"targets": [4], "visible": false, "searchable": false},
            {"targets": [5], "visible": false, "searchable": false},
        ]
    });

    $('#tabla_pdf tbody').on('click', '.btn.btn-secondary.btn-xs', function (event) {
        event.preventDefault(); // Evitar el comportamiento predeterminado del enlace o botón

        let data = tabla_pdf.row($(this).parents('tr')).data();
        let url = data[4]; // Utiliza el nombre correcto del campo que contiene la URL
        openModal(url); // Abrir modal
    });

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
