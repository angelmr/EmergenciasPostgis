$(document).ready(function() {

    //Desavilito boton añadir para que ingrese contraseña
     $('#crear_registro').attr('disabled', true);

    $('#repetir_clave').on('input', function(){
        var password_nuevo = $('#clave').val();
    
        if($(this).val() == password_nuevo){
          $('#resultado_clave').text('Las contraseñas coinciden correctamente');
          $('#resultado_clave').parents('.form-group').addClass('has-success').removeClass('has-error');
          $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
          //Habilito boton añadir ya que ingreso contraseña
          $('#crear_registro').attr('disabled', false);
        }else {
          $('#resultado_clave').text('Las contraseñas no coinciden');
          $('#resultado_clave').parents('.form-group').addClass('has-error').removeClass('has-success');
          $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
        }
      });
});