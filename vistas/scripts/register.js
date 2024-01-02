function init() {


    $.post("../ajax/registro.php?op=identificacion", function (r) {
        $("#cat_id_identificacion").html(r); // Actualiza el contenido del select con la respuesta del servidor

    });

    $.post("../ajax/registro.php?op=provincia", function (r) {
        $("#cat_id_provincia").html(r); // Actualiza el contenido del select con la respuesta del servidor

    });

    $.post("../ajax/registro.php?op=canton", function (r) {
        $("#cat_id_canton").html(r); // Actualiza el contenido del select con la respuesta del servidor
    });

    $.post("../ajax/registro.php?op=parroquia", function (r) {
        $("#cat_id_parroquia").html(r); // Actualiza el contenido del select con la respuesta del servidor

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

function guardaryeditar(e) {
    e.preventDefault(); //no se activara la accion predeterminada
    var formData = new FormData($("#msform")[0]);

    $.ajax({
        url: "../ajax/registro.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function () {
            setTimeout(function(){
                window.location.href = "loginsol.html";
            }, 2000); // 2000 milisegundos = 2 segundos
        },
    });

    limpiar();
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