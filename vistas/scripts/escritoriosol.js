$(document).ready(function () {
    procesoSol();
    tarjetaNot();
    obtenerNotificaciones();
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
            let btnProceso = $("#btnProceso");
            if (data !== "") {
                btnProceso.text("Continuar el proceso");
                console.log(data);
                enviarProceso(data);
            } else {
                btnProceso.text("Iniciar proceso");
            }
        }
    });
}

function enviarProceso(proceso) {
    $.ajax({
        url: "../ajax/documentosol.php?op=guardaryeditar&proceso=" + proceso,
        type: "POST",
        dataType: "json",
    });
}

function tarjetaNot() {
    if (Notification.permission !== 'granted') {
        const tarjetaNotificaciones = document.createElement('div');
        tarjetaNotificaciones.className = 'tarjeta-notificaciones';
        tarjetaNotificaciones.innerHTML = `
            <div class="mensaje">
                <i class="fas fa-bell"></i> ¿Deseas recibir notificaciones?
                <p>Debes otorgar permisos para recibir notificaciones.</p>
            </div>
            <div class="botones-container">
                <button class="btn btn-success" id="btnSi">Sí</button>
                <button class="btn btn-danger" id="btnNo">No</button>
            </div>
        `;
        tarjetaNotificaciones.style.position = 'fixed';
        tarjetaNotificaciones.style.top = '11%';
        tarjetaNotificaciones.style.left = '50%';
        tarjetaNotificaciones.style.transform = 'translate(-50%, -50%)';
        tarjetaNotificaciones.style.backgroundColor = '#fff';
        tarjetaNotificaciones.style.padding = '20px';
        tarjetaNotificaciones.style.borderRadius = '8px';
        tarjetaNotificaciones.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.5)';
        tarjetaNotificaciones.style.zIndex = '10000';

        const botonesContainer = tarjetaNotificaciones.querySelector('.botones-container');
        botonesContainer.style.display = 'flex';
        botonesContainer.style.justifyContent = 'flex-end';
        botonesContainer.style.gap = '10px';

        document.body.appendChild(tarjetaNotificaciones);

        document.getElementById('btnSi').addEventListener('click', function () {
            console.log('Button "Sí" clicked');
            Notification.requestPermission().then(function (permission) {
                console.log('Notification permission:', permission);
                if (permission === 'granted') {
                    console.log('Permission granted');
                    const notification = new Notification('Notificación activada', {
                        body: 'Ahora recibirás notificaciones.',
                    });
                }
                // Close the floating card regardless of permission status
                document.body.removeChild(tarjetaNotificaciones);
            });
        });

        document.getElementById('btnNo').addEventListener('click', function () {
            // Close the floating card without requesting permission
            document.body.removeChild(tarjetaNotificaciones);
        });
    }
}



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
                icon: 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-x" viewBox="0 0 16 16"><path d="M15.354 1.354a2 2 0 0 0-2.828 0L8 5.172 3.172.344a2 2 0 0 0-2.828 2.828L5.172 8l-4.828 4.828a2 2 0 1 0 2.828 2.828L8 10.828l4.828 4.828a2 2 0 1 0 2.828-2.828L10.828 8l4.828-4.828a2 2 0 0 0 0-2.828z"/></svg>'
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

