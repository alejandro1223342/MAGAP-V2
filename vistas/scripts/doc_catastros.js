var tabla;

//funcion que se ejecuta al inicio
function init() {
    mostrarform(false, (formulario = ""));
    mostrarform(false, (formulario = "#editar_documento"));
    listar();

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });
    $("#editar").on("submit", function (e) {
        editarDocumento(e);
    });
    //cargamos los items al celect categoria
    $.post("../ajax/doc_catastros.php?op=documentos", function (r) {
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
    $(".select2bs4").select2({ theme: "bootstrap4" });
});

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

function mostrar(doc_id) {
    $.post(
        "../ajax/doc_catastros.php?op=mostrar",
        { doc_id: doc_id },
        function (data, status) {
            data = JSON.parse(data);
            mostrarform(true, "#editar_documento");
            $("#cat_id_tipodoc").val(data.cat_id_tipodoc);
            $("#doc_nombre").val(data.doc_nombre);
            $("#doc_url").val(data.doc_url);
            $("#doc_id").val(data.doc_id);
        }
    );
}

function listar() {
    tabla = $("#tbllistado")
        .dataTable({
            responsive: true,
            ajax: {
                url: "../ajax/doc_catastros.php?op=listar",
                type: "get",
                dataType: "json",
                error: function (e) {
                    console.log(e.responseText);
                },
            },
            columnDefs: [{ targets: [3], visible: false, searchable: false }],
        })
        .DataTable();
    tabla.on("click", ".btn.btn-info", function (event) {
        event.preventDefault(); // Evitar el comportamiento predeterminado del enlace o botón
        let rowData = tabla.row($(this).parents("tr")).data(); // Obtener los datos de la fila
        let url = rowData[3];
        openModal(url);
    });
}

function openModal(url) {
    let modal = document.querySelector("#my-modal");
    modal.style.display = "block";

    let iframe = document.querySelector("#modal-iframe");
    iframe.src = url;

    let closeBtn = document.querySelector(".close");
    closeBtn.addEventListener("click", closeModal);

    window.addEventListener("click", outsideClick);
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

function guardaryeditar(e) {
    e.preventDefault();
    $("#btnGuardar").prop("disabled", true);

    var formData = new FormData($("#formulario")[0]);
    formData.append("exampleInputFile", $("#exampleInputFile")[0].files[0]);

    // Obtener el texto del option seleccionado en el select
    var nombreSeleccionado = $("#cat_id_tipodoc option:selected").text();
    formData.append("nombreSeleccionado", nombreSeleccionado);

    $.ajax({
        url: "../ajax/doc_catastros.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            bootbox.alert(datos);
            mostrarform(false, (formulario = ""));
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
    console.log(nombreDocumento);

    $.ajax({
        url: "../ajax/doc_catastros.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            bootbox.alert(datos);
            mostrarform(false, (formulario = "#editar_documento"));
            tabla.ajax.reload();
        },
    });
    limpiar();
}

function mostrar(doc_id) {
    $.post(
        "../ajax/doc_catastros.php?op=mostrar",
        { doc_id: doc_id },
        function (data, status) {
            data = JSON.parse(data);
            mostrarform(true, "#editar_documento");
            $("#cat_id_tipodoc").val(data.cat_id_tipodoc);
            $("#nombre_tipodoc").val(data.doc_nombre);
            $("#doc_url").val(data.doc_url);
            $("#doc_id").val(data.doc_id);
        }
    );
}

init();