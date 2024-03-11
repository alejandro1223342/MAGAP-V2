function init() {
    $.post("../ajax/registro.php?op=identificacion", function (r) {
        $("#cat_id_identificacion").html(r); // Actualiza el contenido del select con la respuesta del servidor

    });
    $.post("../ajax/registro.php?op=provincia", function (r) {
        $("#cat_id_provincia").html(r); // Actualiza el contenido del select con la respuesta del servidor

    });
    // Cargar cantones al cargar la página
    $.post("../ajax/registro.php?op=canton", function (r) {
        $("#cat_id_canton").html(r); // Actualiza el contenido del select con la respuesta del servidor

        // Seleccionar el primer valor por defecto
        let primerValor = $("#cat_id_canton option:first").val();
        $("#cat_id_canton").val(primerValor).change();
    });
// Evento de cambio en el select de cantones
    $("#cat_id_canton").change(function () {
        let selectedValue = $(this).val(); // Obtener el valor seleccionado del select

        // Realizar solicitud AJAX para cargar parroquias según el cantón seleccionado
        $.post("../ajax/registro.php?op=parroquia", {cat_id_canton: selectedValue}, function (r) {
            $("#cat_id_parroquia").html(r); // Actualiza el contenido del select con la respuesta del servidor
        });
    });
    $.post("../ajax/registro.php?op=sector", function (r) {
        $("#cat_id_sector").html(r); // Actualiza el contenido del select con la respuesta del servidor

    });
}

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

/*function guardaryeditar(e) {
    e.preventDefault(); //no se activara la accion predeterminada
    var formData = new FormData($("#msform")[0]);

    $.ajax({
        url: "../ajax/registro.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function () {
            setTimeout(function () {
                window.location.href = "loginsol.html";
            }, 2000); // 2000 milisegundos = 2 segundos
        },
    });

    limpiar();
}*/

function validarFormulario() {
    // Obtener los valores de los campos
    var identificacion = $("#cat_id_identificacion").val();
    var nroIdentificacion = $("#sol_identificacion").val();
    var correo = $("#sol_correo").val();
    var nombresApellidos = $("#sol_nombre").val();
    var telefono = $("#sol_telefono").val();
    var clave = $("#sol_clave").val();
    var direccion = $("#sol_direccion").val();
    var provincia = $("#cat_id_provincia").val();
    var canton = $("#cat_id_canton").val();
    var parroquia = $("#cat_id_parroquia").val();
    var sector = $("#cat_id_sector").val();
    // Realizar las validaciones
    if (!identificacion || !nroIdentificacion || !correo || !nombresApellidos || !telefono || !clave || !direccion || !provincia || !canton || !parroquia || !sector) {
        return "Por favor, completa todos los campos.";
    }
    // Validar número de teléfono según Ecuador (10 dígitos)
    if (!/^\d{10}$/.test(telefono)) {
        return "Número de teléfono no válido. Debe contener 10 dígitos.";
    }
    // Validar cédula según Ecuador (10 dígitos)
    if (identificacion === "cedula" && !/^\d{10}$/.test(nroIdentificacion)) {
        return "Número de cédula no válido. Debe contener 10 dígitos.";
    }
    // Validar correo electrónico
    if (!/\S+@\S+\.\S+/.test(correo)) {
        return "Correo electrónico no válido.";
    }
    // Validar que el nombre y apellidos solo contengan letras y espacios
    if (!/^[a-zA-Z\s]+$/.test(nombresApellidos)) {
        return "Nombre y apellidos no válidos. Solo se permiten letras y espacios.";
    }
    // Validar contraseña según estándares mínimos (ejemplo: al menos 6 caracteres)
    if (clave.length < 6) {
        return "Contraseña no válida. Debe contener al menos 6 caracteres.";
    }
    // Si todas las validaciones pasan, el formulario es válido
    return "";
}

function guardaryeditar(e) {
    e.preventDefault(); // No se activará la acción predeterminada
    // Llamar a la función de validación
    var validacionMensaje = validarFormulario();
    if (validacionMensaje !== "") {
        // Mostrar mensaje de error y detener el proceso
        alert(validacionMensaje);
        return;
    }
    var formData = new FormData($("#msform")[0]);
    // Obtener datos para el mensaje de confirmación
    var nombresApellidos = $("#sol_nombre").val();
    var nroIdentificacion = $("#sol_identificacion").val();
    // Construir el mensaje de confirmación
    var mensajeConfirmacion =
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
                        // Redirigir después de 2 segundos
                        setTimeout(function () {
                            window.location.href = "loginsol.html";
                        }, 2000); // 2000 milisegundos = 2 segundos
                    },
                });
                // Limpiar el formulario después de confirmar
                limpiar();
            }
        }
    });
}
$(document).ready(function () {

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;

    setProgressBar(current);

    $(".next").click(function () {

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({'opacity': opacity});
            },
            duration: 500
        });
        setProgressBar(++current);
    });

    $(".previous").click(function () {

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
            },
            duration: 500
        });
        setProgressBar(--current);
    });

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }

    $("#btnGuardar").click(function () {
        guardaryeditar(event);
    });

});

init();