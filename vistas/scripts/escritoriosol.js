$(document).ready(function () {
    procesoSol();
    obtenerNotificaciones(); // Llama a la función para obtener notificaciones al cargar la página
    setInterval(obtenerNotificaciones, 5 * 60 * 1000); // Verificar y mostrar notificaciones cada 5 minutos

    $("#btnProceso").on("click", function () {
        // Redirigir a la página deseada
        window.location.href = "../vistas/doc_sol.php";
    });
});

function obtenerNotificaciones() {
    $.ajax({
        url: "../ajax/documentosol.php?op=notify",
        type: "GET",
        dataType: "json",
        error: function (e) {
            console.log(e.responseText);
        },
        success: function (data) {
            // Función para procesar notificaciones
            procesarNotificaciones(data);
        }
    });
}

function procesoSol() {
    $.ajax({
        url: "../ajax/documentosol.php?op=procesoSol",
        type: "GET",
        dataType: "json",
        error: function (e) {
            console.log("Error en la solicitud AJAX:", e.responseText);
        },
        success: function (data) {
            let nuevoProceso;

            // Iterar sobre cada fila en la respuesta del servidor
            $.each(data, function (index, rowData) {
                if (rowData['tra_id'] && rowData['estado'] == 36) {
                    nuevoProceso = rowData['proceso'] + 1;
                    return false;  // Salir del bucle una vez que se encuentre la primera fila que cumple la condición
                }
            });

            $("#btnProceso").text("Iniciar proceso");
            $("#btnProceso").prop("disabled", false);

            if (nuevoProceso !== undefined) {
                $("#btnProceso").text("Comenzar nuevo proceso (" + nuevoProceso + ")");
                $("#btnProceso").prop("disabled", true);

                $("#btnProceso").off("click").on("click", function () {
                    $(this).prop("disabled", true);
                    $(this).text("En proceso...");

                    // Agrega un mensaje de consola para verificar que se ejecuta la función antes de la llamada AJAX
                    console.log("Enviando proceso al servidor:", nuevoProceso);

                    // Llama a la función para enviar el proceso al servidor
                    enviarProcesoAlServidor(nuevoProceso);
                });
            }
        }
    });
}

function enviarProcesoAlServidor(proceso) {
    $.ajax({
        url: "../ajax/documentosol.php?op=guardaryeditar", // Asegúrate de que la URL tenga la operación correcta
        type: "POST",
        dataType: "json",
        data: {proceso: proceso},
        error: function (e) {
            console.log("Error en la solicitud AJAX:", e.responseText);
        },
        success: function (data) {
            console.log("Respuesta del servidor:", data);
        }
    });
}

// Función para procesar notificaciones
function procesarNotificaciones(data) {
    // Itera sobre cada elemento en el array data
    for (let i = 0; i < data.length; i++) {
        let docEstado = data[i].doc_estado;
        let docNombre = data[i].doc_nombre;

        // Verificar el valor de doc_estado y mostrar la notificación si es igual a 'NO APROBADO'
        if (docEstado.trim() === 'NO APROBADO') {
            // Crear y mostrar la notificación
            const notification = new Notification('Documento Rechazado', {
                body: `El documento ${docNombre} ha sido rechazado.`,
                icon: 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M15.354 1.354a2 2 0 0 0-2.828 0L8 5.172 3.172.344a2 2 0 0 0-2.828 2.828L5.172 8l-4.828 4.828a2 2 0 1 0 2.828 2.828L8 10.828l4.828 4.828a2 2 0 1 0 2.828-2.828L10.828 8l4.828-4.828a2 2 0 0 0 0-2.828z"/></svg>'
            });

            // Agregar un evento de clic a la notificación
            notification.onclick = function () {
                // Redirigir a la URL deseada al hacer clic en la notificación
                window.location.href = "../vistas/doc_sol.php";
            };

            // Limpiar las notificaciones después de 3 minutos
            setTimeout(function () {
                notification.close();
            }, 3 * 60 * 1000); // 3 minutos en milisegundos
        }
    }
}
