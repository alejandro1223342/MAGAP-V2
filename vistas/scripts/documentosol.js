var tabla;

//funcion que se ejecuta al inicio
function init() {
    mostrarform(true, formulario = "");
    mostrarform(false, formulario = "#editar_documento");
    $("#formulariofin").hide();
    listar();
    listafin();

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });
    $("#editar").on("submit", function (e) {
        editarDocumento(e);
    });
    //cargamos los items al select categoria
    $.post("../ajax/documentosol.php?op=documentos", function (r) {
        $("#cat_id_tipodoc").html(r);
        $("#cat_id_tipodoc").select2();
    });

// Captura el cambio en el select y guarda el nombre seleccionado en el input
    $("#cat_id_tipodoc").change(function () {
        var nombreSeleccionado = $("#cat_id_tipodoc option:selected").text();
        $("#nombre_tipodoc").val(nombreSeleccionado);
    });
}

$(document).ready(function () {
    // Inicializar Select2
    $(".select2").select2();
    $(".select2bs4").select2({theme: "bootstrap4"});
    procesoActual();
});

//funcion limpiar
function limpiar() {
    $("#cat_id_tipodoc").val("");
    $("#nombre_tipodoc").val("");
    $("#doc_nombre").val("");
    $("#doc_url").val("");
    $("#doc_id").val("");
}
function procesoActual() {
    $.ajax({
        url: '../ajax/documentosol.php?op=procesoSol',
        method: 'POST',
        dataType: 'json',
    }).done(function(response) {
        let procesoInt = parseInt(response.tra_pro);
        $("#proA").text(procesoInt);
    });
}

function mostrarform(flag, formulario = "") {
    limpiar();
    if (formulario !== "") {
        if (flag) {
            $("#tbllistado").hide();
            $("#tbllistado_wrapper").hide();
            $("#tbproceso").hide();
            $("#btnEditar").prop("disabled", false);
            $("#btnagregar").hide();
            // Ocultar el formulario de edición
            $(formulario).hide();
        } else {
            $(formulario).show();
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


function mostrar(doc_id) {
    $.post("../ajax/documentosol.php?op=mostrar", {doc_id: doc_id}, function (data, status) {
        data = JSON.parse(data);
        mostrarform(true, "#editar_documento");
        $("#cat_id_tipodoc").val(data.cat_id_tipodoc);
        $("#doc_nombre").val(data.doc_nombre);
        $("#doc_url").val(data.doc_url);
        $("#doc_id").val(data.doc_id);
    });
}

function listar() {
    tabla = $("#tbllistado")
        .dataTable({
            ajax: {
                url: "../ajax/documentosol.php?op=listar_predefinido",
                type: "GET",
                dataType: "json",
                error: function (e) {
                    console.log(e.responseText);
                }
            },
            "columnDefs": [{"targets": [1], "visible": false, "searchable": false}, {
                "targets": [4],
                "visible": false,
                "searchable": false
            }, {"targets": [9], "visible": false, "searchable": false},],
            "responsive": {
                "breakpoints": [{name: 'xl', width: Infinity}, {name: 'lg', width: 1200}, {
                    name: 'md',
                    width: 992
                }, {name: 'sm', width: 770}, {name: 'xs', width: 576}]
            },
        }).DataTable();
    tabla.on('click', '.btn.btn-info', function (event) {
        event.preventDefault(); // Evitar el comportamiento predeterminado del enlace o botón
        let tr = $(this).closest('tr');
        if (tabla.row(tr).length > 0) {
            let rowData = tabla.row(tr).data(); // Obtener los datos de la fila
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

function cancelarform() {
    limpiar();
    mostrarform(false, formulario = "");
    mostrarform(false, formulario = "#editar_documento");
}

function cancelar() {
    limpiar();
    $("#formulariofin").hide();
    $('#tablafin').show();
}

function guardar(event) {
    event.preventDefault();
    let fila = $(event.target).closest("tr");
    let rowData = tabla.row(fila).data();
    let procesoAct = $("#proA").text();
    let proA = parseInt(procesoAct);

    if (rowData) {
        let docID = rowData[1];
        let docNombre = rowData[3];
        let cat_id_tipodoc;
        if (docNombre === 'COPIA DE CEDULA') {
            cat_id_tipodoc = 14;
        } else if (docNombre === 'PLANIMETRICO') {
            cat_id_tipodoc = 17;
        } else if (docNombre === 'ADJUDICACION DE TIERRAS') {
            cat_id_tipodoc = 21;
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
                        $.ajax({
                            url: '../ajax/documentosol.php?op=guardaryeditar',
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                dialog.modal('hide');
                                bootbox.alert(response);
                                tabla.ajax.reload();
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


function guardaryeditar(e) {
    e.preventDefault();
    $("#btnGuardar").prop("disabled", true);

    var formData = new FormData($("#formulario")[0]);
    formData.append("exampleInputFile", $("#exampleInputFile")[0].files[0]);

    // Obtener el texto del option seleccionado en el select
    var nombreSeleccionado = $("#cat_id_tipodoc option:selected").text();
    formData.append("nombreSeleccionado", nombreSeleccionado);

    $.ajax({
        url: "../ajax/documentosol.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            bootbox.alert(datos);
            mostrarform(true, formulario = "");
            tabla.ajax.reload();
        },
    });
    limpiar();
}

function editarDocumento(e) {
    e.preventDefault();
    $("#btnEditar").prop("disabled", true);

    var formData = new FormData($("#editar")[0]);
    formData.append("exampleInputFile", $("#editInputFile")[0].files[0]);
    // Obtener el texto del option seleccionado en el select
    var nombreDocumento = $("#nombre_tipodoc").val();
    formData.append("nombreSeleccionado", nombreDocumento);

    $.ajax({
        url: "../ajax/documentosol.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            bootbox.alert(datos);
            mostrarform(false, formulario = "#editar_documento");
            tabla.ajax.reload();
        },
    });
    limpiar();
}


function listafin() {
    $('#tbproceso').dataTable({
        "aProcessing": true, "aServerSide": true, "ajax": {
            url: '../ajax/documentosol.php?op=listafin', type: "POST", dataType: "json", error: function (e) {
                console.log(e.responseText);
            }
        }, "bDestroy": true, "iDisplayLength": 15, "order": [[0, "desc"]],
    }).DataTable();
}


/*function mostrar(tra_pro) {

    $.post(
        "../ajax/documentosol.php?op=profin",
        {tra_pro: tra_pro},
        {tra_pro: tra_pro},
        function (data, status) {
            data = JSON.parse(data);
            mostrarform(true, "#editar_documento");
            $("#cat_id_tipodoc").val(data.cat_id_tipodoc);
            $("#nombre_tipodoc").val(data.doc_nombre);
            $("#doc_url").val(data.doc_url);
            $("#doc_id").val(data.doc_id);

    );
}*/

function mostrar(tra_pro) {
    $("#formulariofin").show();
    $('#tablafin').hide();

    // Verificar si la DataTable ya ha sido inicializada
    if (!$.fn.DataTable.isDataTable('#tabla_docs')) {
        $('#tabla_docs').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: '../ajax/documentosol.php?op=profin',
                type: "POST",
                data: {tra_pro: tra_pro},
                dataType: "json",
                error: function (e) {
                    console.log(e.responseText);
                }
            },
            "columnDefs": [{"targets": [3], "visible": false, "searchable": false},],
            "pageLength": 15,
            "order": [[0, "desc"]],
        });
    }

    // Manejar el evento clic dentro de la tabla
    $('#tabla_docs').on('click', 'tbody tr .btn.btn-info', function (event) {
        event.preventDefault();
        let data = $('#tabla_docs').DataTable().row($(this).closest('tr')).data();
        if (data) {
            let url = data[3];
            let nombreDinamico = data[1];
            openModal(url, nombreDinamico);
        } else {
            console.error("La variable 'data' es undefined o null.");
        }
    });
}


init();
