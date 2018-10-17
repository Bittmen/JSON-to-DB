$(document).ready(function() {

  function enviaDatos(){
    $.ajax({
      type: "POST",
      url: "datos.php",
      data: {datos:datos},
      success: function (dat) {
        console.log(dat);
        if (dat == 'OK') {
          console.log("Listo!!!");
        }
        else if (dat == 'Fallo') {
          console.log("Fallo");
        }
        else if (dat == 'Replica') {
          console.log("Ya existe este dato")
        }
      }
    });
  }

$.ajax({
  type: "GET",
  url: "YOUR API",
  success: function (datos) {
    console.log(datos);
    enviaDatos();
  }
});

});
