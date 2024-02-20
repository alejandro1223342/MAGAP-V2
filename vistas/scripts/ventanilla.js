var tabla;
var tabla_pdf;
var cedula;
var index;

//funcion que se ejecuta al inicio
function init() {
    mostrarform(false);
    listar();
    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });
    //cargamos los items al celect categoria
    $.post("../ajax/ventanilla.php?op=estado", function (r) {
        $("#doc_estado").html(r);
    });
}

//funcion limpiar
function limpiar() {
    $("#cat_id").val("");
    $("#cat_nombre").val("");
    $("#cat_padre").val("");
    $("#doc_estado").val("");
    $("#doc_descripcion").val("");
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
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
            },
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
    location.reload();
}

function guardaryeditar(e) {
    e.preventDefault();
    $("#btnGuardar").prop("disabled", true);

    // Verificar si todos los registros de la última columna son "Registrado"
    let todosRegistrados = true;
    $("#tabla_pdf tbody tr").each(function (index, row) {
        let textoUltimaColumna = $(row).find("td:last").text().trim();
        if (textoUltimaColumna !== "Registrado") {
            todosRegistrados = false;
            return false;  // Detener el bucle si encontramos un registro no "Registrado"
        }
    });

    // Mostrar el cuadro de diálogo de confirmación solo si todos están "Registrado"
    if (todosRegistrados) {
        bootbox.confirm({
            message: "¿Estás seguro de Continuar? No se podrá revertir esta acción",
            buttons: {
                confirm: {
                    label: 'Sí',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result) {
                    if (result) {
                        // Obtener datos de la tabla y agregarlos a formData
                        let tableData = [];
                        $("#tabla_pdf tbody tr").each(function (index, row) {
                            // Obtener valor de la columna 01
                            let tra_id = $(row).find("td:eq(2)").text();
                            let estado = $(row).find("td:eq(1)").text();
                            // Convertir el estado a un valor específico
                            let estadoValue = (estado === "Aprobado") ? 18 : (estado === "No Aprobado") ? 28 : null;
                            let observacion = $(row).find("td:eq(5)").text();

                            let rowData = {
                                tra_id: tra_id,
                                estado: estadoValue,
                                observacion: observacion
                            };

                            tableData.push(rowData);
                        });

                        // Empaquetar los datos en un objeto FormData
                        let formData = new FormData();
                        formData.append('tabla_pdf', JSON.stringify(tableData));
                        $.ajax({
                            url: "../ajax/ventanilla.php?op=aprobardocumento",
                            type: "POST",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (datos) {
                                bootbox.alert(datos);
                                mostrarform(false);
                                tabla.ajax.reload();

                                // Utilizar setTimeout para ejecutar el bloque después de 1 segundo
                                setTimeout(function () {
                                    for (let [clave, valor] of Object.entries(localStorage)) {
                                        if (clave.startsWith(`${cedula}_fila_`)) {
                                            localStorage.removeItem(clave);
                                        }
                                    }
                                }, 1000); // 1000 milisegundos = 1 segundo
                            },
                            error: function (xhr, status, error) {
                                console.error("Error en la solicitud AJAX:", error);
                            }
                        });

                        limpiar();
                    }
                } else {
                    $("#btnGuardar").prop("disabled", false);
                }
            }
        });
    } else {

        bootbox.alert("No se puede guardar. Algunos documentos no están 'Registrados'.");
        $("#btnGuardar").prop("disabled", false);
    }
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
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        },
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

    function padLeftWithZeros(input, length) {
        let str = input.toString();
        while (str.length < length) {
            str = '0' + str;
        }
        return str;
    }

    tabla_pdf.on('draw.dt', function () {
        cedula = padLeftWithZeros(s_ident, 10);
        cargarDatosGuardados(cedula);
    });

    // Vincula el evento de clic para los botones .btn-editar una sola vez
    $('#tabla_pdf tbody').on('click', '.btn.btn-secondary.btn-xs', function (event) {
        event.preventDefault(); // Evitar el comportamiento predeterminado del enlace o botón
        index = tabla_pdf.row($(event.target).closest('tr')).node();
        let data = tabla_pdf.row($(this).parents('tr')).data();
        let url = data[6];
        let nombreDinamico = data[3];
        openModal(url, nombreDinamico);
    });
}


function openModal(url, nombreDinamico) {
    let modal = document.querySelector('#my-modal');
    modal.style.display = 'block';

    let iframe = document.querySelector('#modal-iframe');
    iframe.src = url;

    let modalTitle = document.querySelector('#modal-title');
    modalTitle.textContent = nombreDinamico;

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

function capitalizeEachWord(text) {
    return text.toLowerCase().replace(/(?:^|\s)\S/g, function (a) {
        return a.toUpperCase();
    });
}

function guardarModal() {
    event.preventDefault();
    let filaActual = index;
    let catNombre = $('#doc_estado option:selected').text();
    let docDescripcion = $('#doc_descripcion').val();
    let formattedCatNombre = capitalizeEachWord(catNombre);
    let badgeClass = (formattedCatNombre === 'Aprobado') ? 'badge-success' : 'badge-danger';
    filaActual.cells[1].innerHTML = `<span class="badge ${badgeClass}">${formattedCatNombre}</span>`;
    let textColorClass = (formattedCatNombre === 'Aprobado') ? 'text-green' : 'text-red';
    filaActual.cells[1].classList.add(textColorClass);
    let proObservacionInput = filaActual.querySelector('input[name="pro_observacion"]');
    proObservacionInput.value = docDescripcion;
    proObservacionInput.readOnly = true;
    closeModal();
}


function guardar(event) {
    event.preventDefault();
    let fila = $(event.target).closest("tr");
    // Verificar si la celda en la posición 1 está vacía
    if (fila.find("td:eq(1)").text().trim() === "") {
        bootbox.alert("Debes llenar los datos del documento antes de guardar.");
        return;
    }
    bootbox.confirm({
        message: "¿Estás seguro de continuar?",
        buttons: {
            confirm: {
                label: 'Sí',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            // Si el usuario hace clic en "Sí", continúa con la función guardar
            if (result) {
                // Obtener el texto de la columna 3
                let textoCedula = fila.find("td:eq(3)").text().trim();
                // Buscar la posición del guion ("-") en el texto
                let posicionGuion = textoCedula.indexOf("-");
                // Extraer la cédula si se encuentra el guion
                let sol_identificacion =
                    posicionGuion !== -1 ? textoCedula.substr(posicionGuion + 1) : "";
                let datosFila = {
                    cat_id_estado: $('#doc_estado').val(),
                    tra_id: fila.find("td:eq(2)").text(),
                    pro_observacion: $('#doc_descripcion').val(),
                    sol_identificacion: sol_identificacion,
                };

                $.ajax({
                    url: "../ajax/ventanilla.php?op=guardardocumento",
                    type: "POST",
                    data: datosFila,
                    success: function (response) {
                        bootbox.alert("Documento guardado correctamente");

                        // Manejar la respuesta del servidor
                        let estado = response.cat_id_estado;
                        let observacion = response.pro_observacion;

                        // Modificar la tabla y almacenar los cambios en localStorage
                        let estadoTexto = estado === 18 ? "Aprobado" : "No Aprobado";
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
                        limpiar();
                    },
                    error: function (error) {
                        fila.find("td:eq(1)").text("");
                    },
                });
            }
        }
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
            if (cambios !== null) {
                let datos = JSON.parse(cambios);
                let estado = datos.cat_id_estado;
                let estadoTexto = estado === 18 ? "Aprobado" : "No Aprobado";
                let badgeClass = (estado === 18) ? 'badge-success' : 'badge-danger';

                $(element).find("td:eq(1)")
                    .html(`<span class="badge ${badgeClass}">${estadoTexto}</span>`)
                    .data("estado", estado);

                // Verificar si está aprobado para mostrar "Registrado"
                if (estado === 18) {
                    $(element)
                        .find("td:last")
                        .html('<span class="badge badge-primary">Registrado</span>');
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
                        '<input type="text" id="pro_observacion" name="pro_observacion" value="' +
                        datos.pro_observacion +
                        '" readonly class="form-control">'
                    );
            } else {
                console.log('No se encontraron datos en el localStorage para la clave:', localStorageKey);
            }

        });
    }
    $("body").off("click", ".btn-editar").on("click", ".btn-editar", function (event) {
        event.preventDefault();
        guardar(event);
    });
}

init();
