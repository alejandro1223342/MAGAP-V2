var tabla;
var cedula;
var tabla_pdf;

//funcion que se ejecuta al inicio
function init() {
    mostrarform(false, (formulario = ""));
    mostrarform(false, (formulario = "#editar_documento"));
    listInspCat();

    $("#formulario").on("submit", function (e) {
        aprobar(e);
    });
}

function procesoActual(cedula) {
    $.ajax({
        url: '../ajax/documentosGestores.php?op=procesoSol&cedula=' + cedula,
        method: 'POST',
        dataType: 'json',
    }).done(function (response) {
        let procesoInt = parseInt(response.tra_pro);
        $("#proA").val(procesoInt);
        let tramiteInt = parseInt(response.tra_id);
        $("#traA").val(tramiteInt);
    });
}
//funcion limpiar
function limpiar() {
    $("#cat_id_tipodoc").val("");
    $("#nombre_tipodoc").val("");
    $("#doc_nombre").val("");
    $("#doc_url").val("");
    $("#doc_id").val("");
}

function mostrarform(flag, formulario = "") {
    limpiar();
    if (formulario !== "") {
        if (flag) {
            $("#tbllistado").hide();
            $("#tbllistado_wrapper").hide();
            $(formulario).show();
            $("#btnGuardar").prop("disabled", false);
            $("#btnagregar").hide();
        } else {
            $(formulario).hide();
            $("#tbllistado").show();
            $("#tbllistado_wrapper").show();
            $("#btnagregar").show();
        }
    } else {
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
}
function listInspCat() {
    tabla = $("#tbllistado")
        .dataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
            },
            ajax: {
                url: "../ajax/doc_inspeccion.php?op=listInspCat",
                type: "get",
                dataType: "json",
                error: function (e) {
                    console.log(e.responseText);
                },
            },
        })
        .DataTable();
}

function openModal(url, nombreDinamico) {
    let modal = document.querySelector('#my-modal');
    modal.style.display = 'block';

    let iframe = document.querySelector('#modal-iframe');
    iframe.src = url;

    let modalTitle = document.querySelector('#modal-title');
    modalTitle.textContent = nombreDinamico+'-'+cedula;

    let closeBtn = document.querySelector('.close');
    closeBtn.addEventListener('click', closeModal);

    window.addEventListener('click', outsideClick);
}

function closeModal() {
    let modal = document.querySelector("#my-modal");
    modal.style.display = "none";

    let closeBtn = document.querySelector(".close");
    closeBtn.removeEventListener("click", closeModal);

    window.removeEventListener("click", outsideClick);
}

function outsideClick(e) {
    let modal = document.querySelector("#my-modal");
    if (e.target === modal) {
        closeModal();
    }
}

function cancelarform() {
    limpiar();
    mostrarform(false, (formulario = ""));
    mostrarform(false, (formulario = "#editar_documento"));
}

function mostrarTabla(s_ident) {
    cedula = String(s_ident);
    procesoActual(cedula);
    mostrarform(true);
    if ($.fn.DataTable.isDataTable('#tabla_pdf')) {
        $('#tabla_pdf').DataTable().destroy();
    }
    tabla_pdf = $("#tabla_pdf")
        .dataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
            },
            ajax: {
                url: "../ajax/doc_inspeccion.php?op=listarPredefinido&cedula=" + cedula,
                type: "get",
                dataType: "json",
                error: function (e) {
                    console.log(e.responseText);
                },
            },
            columnDefs: [
                {"targets": [1], "visible": false, "searchable": false},
                {"targets": [4], "visible": false, "searchable": false},
                {"targets": [6], "visible": false, "searchable": false},
                {"targets": [9], "visible": false, "searchable": false}
            ],
            responsive: {
                breakpoints: [
                    {name: 'xl', width: Infinity},
                    {name: 'lg', width: 1200},
                    {name: 'md', width: 992},
                    {name: 'sm', width: 770},
                    {name: 'xs', width: 576}
                ]
            },
        }).DataTable();

    tabla_pdf.on('click', '.btn.btn-info', function (event) {
        event.preventDefault(); // Evitar el comportamiento predeterminado del enlace o botón
        let tr = $(this).closest('tr');
        if (tabla_pdf.row(tr).length > 0) {
            let rowData = tabla_pdf.row(tr).data();
            if (rowData && rowData.length > 4) {
                let url = rowData[4];
                let nombreDinamico = rowData[2];
                openModal(url, nombreDinamico);
            } else {
                console.error("No se pudieron obtener datos válidos de la fila.");
            }
        } else {
            console.error("La fila no existe en la tabla.");
        }
    });
}

function guardar(event) {
    event.preventDefault();
    let fila = $(event.target).closest("tr");
    let rowData = tabla_pdf.row(fila).data();
    let procesoAct = $("#proA").val();
    let proA = parseInt(procesoAct);
    let cedulaSol = String(cedula);

    if (rowData) {
        let docID = rowData[1];
        let docNombre = rowData[2];

        let cat_id_tipodoc;
        if (docNombre === 'INFORME TECNICO DE INSPECCION') {
            cat_id_tipodoc = 33;
        } else if (docNombre === 'PLAN RURAL') {
            cat_id_tipodoc = 34;
        } else if (docNombre === 'INFORME RURAL') {
            cat_id_tipodoc = 35;
        }

        let fileInput = fila.find('#pdf')[0];
        let file = fileInput.files[0];

        // Verificar si el archivo está presente
        if (!file) {
            bootbox.alert('Por favor, selecciona un archivo antes de guardar.');
            fileInput.value = '';
            return;
        }

        // Verificar si el archivo es de tipo PDF y no supera el tamaño máximo
        if (file.type === 'application/pdf' && file.size <= 2 * 1024 * 1024) {
            bootbox.confirm({
                message: "¿Desear continuar con la subida del archivo?",
                buttons: {
                    confirm: {
                        label: 'Aceptar',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'Cancelar',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result) {
                        let loadingMessage = $('<div class="text-center"><i class="fa fa-spinner fa-spin"></i> Subiendo archivo...</div>');
                        let dialog = bootbox.dialog({
                            title: 'Procesando', message: loadingMessage, closeButton: false, backdrop: true
                        });
                        let formData = new FormData();
                        formData.append('pdf', file);
                        formData.append('doc_nombre', docNombre);
                        formData.append('doc_id', docID);
                        formData.append('cat_id_tipodoc', cat_id_tipodoc);
                        formData.append('proA', proA);
                        formData.append('cedula_sol', cedulaSol);
                        $.ajax({
                            url: '../ajax/documentosGestores.php?op=gestores',
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                dialog.modal('hide');
                                bootbox.alert(response);
                                tabla_pdf.ajax.reload();
                            },
                            error: function (error) {
                                dialog.modal('hide');
                                console.error(error);
                            }
                        });
                    } else {
                        fileInput.value = '';
                    }
                }
            });
        } else if (file.size > 2 * 1024 * 1024) {
            bootbox.alert('El límite de tamaño permitido (2 MB). Por favor, selecciona un archivo más pequeño.');
            fileInput.value = '';
        } else {
            bootbox.alert('Por favor, selecciona un archivo PDF antes de guardar.');
            fileInput.value = '';
        }
    } else {
        console.error('No se pudo obtener la información de la fila.');
    }
}

function aprobar(e) {
    e.preventDefault();
    $("#btnGuardar").prop("disabled", true);

    // Verificar si todos los registros de la última columna son "Registrado"
    let todosRegistrado = true;
    $("#tabla_pdf tbody tr").each(function (index, row) {
        let textoEstado = $(row).find("td:eq(3)").text().trim();
        if (textoEstado !== "Registrado") {
            todosRegistrado = false;
            return false;  // Detener el bucle si encontramos un registro no "Registrado"
        }
    });
    // Mostrar el cuadro de diálogo de confirmación solo si todos están "Registrado"
    if (todosRegistrado) {
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
                            let tra_id = $("#traA").val();
                            let estado = $(row).find("td:eq(3)").text();
                            // Convertir el estado a un valor específico
                            let estadoValue = (estado === "Aprobado") ? 18 : (estado === "No Aprobado") ? 28 : null;
                            let observacion = "Inspeccion sube documentos a catastros";
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
                            url: "../ajax/doc_inspeccion.php?op=aprobardocumento",
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
                } else {
                    $("#btnGuardar").prop("disabled", false);
                }
            }
        });
    } else {
        bootbox.alert("No se puede continuar hasta que se hayan 'Registrado' todos los documentos");
        $("#btnGuardar").prop("disabled", false);
    }
}

init();