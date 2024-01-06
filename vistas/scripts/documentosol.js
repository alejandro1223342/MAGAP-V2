var tabla;

//funcion que se ejecuta al inicio
function init() {
    mostrarform(false);
    listar();

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });
    //cargamos los items al celect categoria
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
});

//funcion limpiar
function limpiar() {
    $("#cat_id_tipodoc").val("");
    $("#doc_nombre").val("");
    $("#doc_url").val("");
    $("#doc_id").val("");
}

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
            responsive: true,
            ajax: {
                url: "../ajax/documentosol.php?op=listar",
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

    var formData = new FormData($("#formulario")[0]);
    formData.append("exampleInputFile", $("#exampleInputFile")[0].files[0]);

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
            mostrarform(false);
            tabla.ajax.reload();
        },
    });
    limpiar();
}

function mostrar(doc_id) {
    $.post(
        "../ajax/documentosol.php?op=mostrar",
        {doc_id: doc_id},
        function (data, status) {
            data = JSON.parse(data);
            mostrarform(true);
            $("#cat_id_tipodoc").val(data.cat_id_tipodoc);
            $("#doc_nombre").val(data.doc_nombre);
            $("#doc_url").val(data.doc_url);
            $("#doc_id").val(data.doc_id);
        }
    );
}

init();
