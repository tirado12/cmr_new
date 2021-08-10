  //ver contraseña
function myPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  //validacion de campos - keyup
$(document).ready(function() {
  $("#formulario input").keyup(function() {
 //console.log($(this).attr('id'));
     var monto = $(this).val();
     
     if(monto != ''){
     $('#error_'+$(this).attr('id')).fadeOut();
     $("#label_"+$(this).attr('id')).removeClass('text-red-500');
     $("#label_"+$(this).attr('id')).addClass('text-gray-700');
     //$('#guardar').removeAttr("disabled");
     }
     else{
     //$("#guardar").attr("disabled", true);
     $('#error_'+$(this).attr('id')).fadeIn();
     $("#label_"+$(this).attr('id')).addClass('text-red-500');
     $("#label_"+$(this).attr('id')).removeClass('text-gray-700');
     }
   
   });
});

 