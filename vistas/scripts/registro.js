function init() {
    $.post("../ajax/registro.php?op=identificacion", function (r) {
        $("#cat_id_identificacion").html(r); // Actualiza el contenido del select con la respuesta del servidor
        $("#cat_id_identificacion").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
    });
    $.post("../ajax/registro.php?op=provincia", function (r) {
        $("#cat_id_provincia").html(r); // Actualiza el contenido del select con la respuesta del servidor
        $("#cat_id_provincia").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
    });
    $.post("../ajax/registro.php?op=canton", function (r) {
        $("#cat_id_canton").html(r); // Actualiza el contenido del select con la respuesta del servidor

        // Seleccionar el primer valor por defecto
        let primerValor = $("#cat_id_canton option:first").val();
        $("#cat_id_canton").val(primerValor).change();
    });
    $("#cat_id_canton").change(function () {
        let selectedValue = $(this).val(); // Obtener el valor seleccionado del select

        // Realizar solicitud AJAX para cargar parroquias según el cantón seleccionado
        $.post("../ajax/registro.php?op=parroquia", {cat_id_canton: selectedValue}, function (r) {
            $("#cat_id_parroquia").html(r); // Actualiza el contenido del select con la respuesta del servidor
        });
    });
    $.post("../ajax/registro.php?op=sector", function (r) {
        $("#cat_id_sector").html(r); // Actualiza el contenido del select con la respuesta del servidor
        $("#cat_id_sector").select2(); // Vuelve a inicializar select2 después de cambiar su contenido
    });
}

$(document).ready(function () {
    // Inicializar Select2
    $(".select2").select2();
    $(".select2bs4").select2({theme: "bootstrap4"});
    var stepper = new Stepper($(".bs-stepper")[0]);
    var currentStep = 1; // Variable para mantener un registro del paso actual

    $(".btn-next").on("click", function () {
        if (currentStep === 1) {
            if (!validarCedulaPasaporte() || !validarCorreo()) {
                bootbox.alert("Por favor, complete la información correctamente.");
                return;
            }
            currentStep++; // Incrementar el paso actual
        } else if (currentStep === 2) {
            if (!validarNombreApellido() || !validarCelular()) {
                bootbox.alert("Por favor, complete la información correctamente.");
                return;
            }
        }
        stepper.next();
    });

    $(".btn-prev").on("click", function () {
        if (currentStep > 1) {
            currentStep--; // Decrementar el paso actual
        }
        stepper.previous();
    });
});

function guardaryeditar(e) {
    e.preventDefault();

    var formData = new FormData($("#formulario")[0]);

    // Obtener datos para el mensaje de confirmación
    let nombresApellidos = $("#sol_nombre").val();
    let nroIdentificacion = $("#sol_identificacion").val();

    // Construir el mensaje de confirmación
    let mensajeConfirmacion =
        "Yo, " + nombresApellidos + ", con cédula de ciudadanía número " + nroIdentificacion +
        ", declaro bajo juramento que la información proporcionada en este trámite en línea es veraz, completa y correcta. Asumo la responsabilidad de cualquier falsedad o inexactitud en los datos registrados.\n\n" +
        "Entiendo que cualquier intento de fraude o manipulación de la información puede estar sujeto a penalizaciones legales de acuerdo con las leyes ecuatorianas.";

    // Mostrar confirmación utilizando bootbox.confirm
    bootbox.confirm({
        message: mensajeConfirmacion,
        buttons: {
            confirm: {
                label: 'Sí, declaro bajo juramento',
                className: 'btn-success'
            },
            cancel: {
                label: 'Cancelar',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result) {
                // Si el usuario confirma, realizar la solicitud AJAX
                $.ajax({
                    url: "../ajax/registro.php?op=guardaryeditar",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function () {
                        // Redirigir después de una respuesta exitosa
                        window.location.href = "loginsol.html";
                    },
                    error: function (xhr, status, error) {
                        // Manejar errores de la solicitud AJAX
                        console.error("Error en la solicitud AJAX:", status, error);
                        // Puedes mostrar un mensaje de error al usuario si es necesario
                    }
                });
            }

            // Limpieza independientemente de si el usuario confirmó o canceló
            limpiar();
        }
    });
}


$("#btnGuardar").on("click", function (e) {
    e.preventDefault(); // Prevenir la acción predeterminada del botón
    guardaryeditar(e); // Ejecutar la función guardaryeditar al hacer clic en el botón "Guardar"
});
$("#formulario").on("submit", function (e) {
    e.preventDefault(); // Prevenir la acción predeterminada del envío del formulario
    // Aquí no es necesario llamar a guardaryeditar() ya que se maneja el envío del formulario con el botón de "Guardar"
});

function limpiar() {
    $("#cat_id_identificacion").val("");
    $("#sol_identificacion").val("");
    $("#sol_correo").val("");
    $("#sol_nombre").val("");
    $("#sol_telefono").val("");
    $("#sol_direccion").val("");
    $("#cat_id_provincia").val("");
    $("#cat_id_canton").val("");
    $("#cat_id_sector").val("");
    $("#sol_clave").val("");
    $("#sol_id").val("");
    $("#claveu").val("");
}

function cancelarform() {
    window.location.href = "loginsol.html";
}

function validarCedulaPasaporte() {
    let cedulaPasaporte = $("#sol_identificacion").val();
    if (cedulaPasaporte.length !== 10) {
        return false;
    }
    let provincia = parseInt(cedulaPasaporte.substr(0, 2));
    if (provincia < 1 || provincia > 24) {
        return false;
    }
    let total = 0;
    let digits = cedulaPasaporte.split('').map(Number);
    for (let i = 0; i < 9; i++) {
        let digit = digits[i];
        if (i % 2 === 0) {
            digit *= 2;
            if (digit > 9) {
                digit -= 9;
            }
        }
        total += digit;
    }
    let verificador = (10 - (total % 10)) % 10;
    return digits[9] == verificador;
}

function validarCorreo() {
    let correo = $("#sol_correo").val();
    let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(correo);
}

function validarNombreApellido() {
    let nombreApellido = $("#sol_nombre").val();
    let regex = /^[a-zA-ZñÑ\s]*$/;
    return regex.test(nombreApellido);
}

function validarCelular() {
    let celular = $("#sol_telefono").val();
    let regex = /^09\d{8}$/;
    return regex.test(celular);
}

init();