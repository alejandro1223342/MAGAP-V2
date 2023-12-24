$(document).ready(function () {
  // Inicializar Select2
  $(".select2").select2();
  $(".select2bs4").select2({ theme: "bootstrap4" });

  // Inicializar el stepper
  var stepper = new Stepper($(".bs-stepper")[0]);

  // Ejemplo: avanzar al siguiente paso cuando se hace clic en el botón "Siguiente" del primer paso
  $(".btn-next").click(function () {
    stepper.next();
  });

  // Retroceder al paso anterior cuando se hace clic en el botón "Anterior"
  $(".btn-prev").click(function () {
    stepper.previous();
  });
});

function cancelarform() {
  window.location.href = "loginsol.html";
}
