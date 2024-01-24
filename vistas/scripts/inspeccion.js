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
    $.post("../ajax/inspeccion.php?op=estado", function (r) {
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
    mostrarform(false);
}

//funcion para guardaryeditar
function guardaryeditar(e) {
    e.preventDefault(); // Detiene la acción por defecto del formulario
    const tabla = document.getElementById('tbllistado');
    const sol_identificacion = tabla.rows[1].cells[1].textContent;


    /*$("#btnGuardar").prop("disabled", true);
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

    limpiar();*/
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
            url: '../ajax/inspeccion.php?op=tabla&s_ident=' + s_ident,
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
            {"targets": [8], "visible": false, "searchable": false},
        ],
        "createdRow": function (row, data) {
            // Renderizar CheckBox en la columna 5
            $('td', row).eq(5).html(data[1]);
            // Renderizar TextBox en la columna 5
            $('td', row).eq(5).html(data[5]);
        },
        "responsive": {
            "breakpoints": [
                {name: 'xl', width: Infinity},
                {name: 'lg', width: 1200},
                {name: 'md', width: 992},
                {name: 'sm', width: 770},
                {name: 'xs', width: 576}
            ]
        }
    });

    // Evento cuando DataTables termina de dibujar la tabla
    tabla_pdf.on('draw.dt', function () {
        cargarDatosGuardados(s_ident);
    });

    $('#tabla_pdf tbody').on('click', '.btn.btn-secondary.btn-xs', function (event) {
        event.preventDefault(); // Evitar el comportamiento predeterminado del enlace o botón

        let data = tabla_pdf.row($(this).parents('tr')).data();
        let url = data[6]; // Utiliza el nombre correcto del campo que contiene la URL
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

function guardar() {
    event.preventDefault();
    let fila = $(event.target).closest("tr");
    // Obtener el texto de la columna 3
    let textoCedula = fila.find("td:eq(3)").text().trim();
    // Buscar la posición del guion ("-") en el texto
    let posicionGuion = textoCedula.indexOf("-");
    // Extraer la cédula si se encuentra el guion
    let sol_identificacion =
        posicionGuion !== -1 ? textoCedula.substr(posicionGuion + 1) : "";
    let datosFila = {
        cat_id_estado: fila.find('input[type="checkbox"]').is(":checked") ? 18 : 28,
        tra_id: fila.find("td:eq(2)").text(),
        pro_observacion: fila.find('input[type="text"]').val(),
        sol_identificacion: sol_identificacion,
    };

    $.ajax({
        url: "../ajax/inspeccion.php?op=guardardocumento",
        type: "POST",
        data: datosFila,
        success: function (response) {
            bootbox.alert("Documento guardado correctamente");

            // Manejar la respuesta del servidor
            let estado = response.cat_id_estado;
            let observacion = response.pro_observacion;

            // Modificar la tabla y almacenar los cambios en localStorage
            let estadoTexto = estado === "18" ? "Aprobado" : "No Aprobado";
            fila.find("td:eq(1)").text(estadoTexto);
            fila.find("td:eq(5)").text(observacion).prop("readonly", true);
            fila
                .find("td:last")
                .html('<button class="btn btn-editar">Editar</button>');

            // Almacenar los cambios en localStorage
            guardarCambiosEnLocalStorage(
                fila.index(),
                estado,
                observacion,
                sol_identificacion
            );

            cargarDatosGuardados(sol_identificacion);
        },
        error: function (error) {
            console.log("Algo salió mal: " + error);
        },
    });
}

// Función para almacenar los cambios en localStorage
function guardarCambiosEnLocalStorage(
    index,
    estado,
    observacion,
    sol_identificacion
) {
    let cambios = {
        cat_id_estado: estado,
        pro_observacion: observacion,
        sol_identificacion: sol_identificacion,
    };
    localStorage.setItem(
        sol_identificacion + "_fila_" + index,
        JSON.stringify(cambios)
    );
}

function cargarDatosGuardados(s_ident) {
    let sol_identificacion = s_ident;
    if (sol_identificacion) {
        $("#tabla_pdf tbody tr").each((index, element) => {
            let localStorageKey = sol_identificacion + "_fila_" + index;
            let cambios = localStorage.getItem(localStorageKey);

            if (cambios) {

                let datos = JSON.parse(cambios);
                let estado = datos.cat_id_estado;
                let estadoTexto = estado === 18 ? "Aprobado" : "No Aprobado";

                $(element).find("td:eq(1)").text(estadoTexto).data("estado", estado);


                // Verificar si está aprobado para mostrar "Registrado"
                if (estado === 18) {
                    $(element)
                        .find("td:last")
                        .html('<span class="text-success">Registrado</span>');
                } else {
                    $(element)
                        .find("td:last")
                        .html(
                            '<button class="btn btn-editar btn-primary btn-xs">Cambiar<i class="fa fa-pen" style="margin-left: 5px;"></i></button>'
                        );
                }

                $(element)
                    .find("td:eq(5)")
                    .html(
                        '<input type="text" value="' +
                        datos.pro_observacion +
                        '" readonly class="form-control">'
                    );
            }
        });
    }
    $("body").on("click", ".btn-editar", function (event) {
        event.preventDefault();
        let fila = $(this).closest("tr");
        let estado = fila.find("td:eq(1)").data("estado");

        if (estado === "18") {
            fila.find("td:eq(1)").html('<input type="checkbox" checked>');
        } else {
            fila.find("td:eq(1)").html('<input type="checkbox">');
        }

        fila.find('td:eq(5) input[type="text"]').prop("readonly", false);
        $(this).hide();
        fila.find(".btn-aceptar, .btn-cancelar").remove();
        fila
            .find("td:last")
            .append(
                '<div class="btn-group" role="group" aria-label="Botones de acción"><button class="btn btn-aceptar btn-success btn-xs">Aceptar <i class="fa fa-save" style="margin-left: 5px;"></i></button><button class="btn btn-cancelar btn-danger btn-xs">Cancelar</button></div>'
            );
    });

    $("body").on("click", ".btn-cancelar", function (event) {
        event.preventDefault();
        let fila = $(this).closest("tr");
        let estado = fila.find("td:eq(1)").data("estado");
        let estadoTexto = estado === "18" ? "Aprobado" : "No Aprobado";

        fila.find("td:eq(1)").text(estadoTexto);
        fila.find('td:eq(5) input[type="text"]').prop("readonly", true);
        fila.find(".btn-aceptar, .btn-cancelar").remove();
        fila.find(".btn-editar").show();
    });

    $("body")
        .off("click", ".btn-aceptar")
        .on("click", ".btn-aceptar", function (event) {
            event.preventDefault();
            guardar();
            let fila = $(this).closest("tr");
            fila
                .find("td:eq(1)")
                .data(
                    "estado",
                    fila.find('td:eq(1) input[type="checkbox"]').prop("checked")
                        ? "18"
                        : "28"
                );
            fila.find('td:eq(5) input[type="text"]').prop("readonly", true);
            fila.find(".btn-aceptar, .btn-cancelar").remove();
            fila.find(".btn-editar").show();
        });
}


init();
