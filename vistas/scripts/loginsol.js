$("#frmAcceso").on("submit", function (e) {
  e.preventDefault();
  logina = $("#logina").val();
  clavea = $("#clavea").val();
  $.post(
    "../ajax/solicitante.php?op=verificar",
    { logina: logina, clavea: clavea },
    function (data) {
      if (data == "null") bootbox.alert("Usuario y/o Password incorrectos");
      else {
        $(location).attr("href", "escritoriosol.php");
        //			 alert(data);
      }
    }
  );
});
